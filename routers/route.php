<?php
session_start();

require_once "../utils/utils.php";
require_once "../DAOs/user.php";
require_once "../DAOs/playlist.php";


if (isset($_SESSION['user'])) {
    $userDAO = new UserDAO();
    $user = $userDAO->findById($_SESSION['user']['id']);
    if ($user) {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'role' => $user['role'],
            'status' => $user['status']
        ];
    } else {
        unset($_SESSION['user']);
        Utils::redirect("login");
    }
}

function requireAuth() {
   if (!Utils::isLoggedIn()) {
       Utils::redirect("login");
       exit();
   } ;
}

function requireRole($allowedRole) {
    requireAuth();
    
    $user = $_SESSION['user'];
    if (!in_array($user['role'], $allowedRole)) {
        Utils::redirect("");
        exit();
    }
    
    if ($user['role'] === 'teacher' && $user['status'] === 'pending') {
        Utils::redirect("pending");
        exit();
    }
}

$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);


$adminRoutes = ['/admin', '/tags', '/categors', '/statistics', '/create_tag', 
                '/delete_tag', '/create_category', '/delete_category', 
                '/accept_teacher', '/reject_teacher'];

$teacherRoutes = ['/teacher-statistics', '/teacher-courses', '/teacher-playlist', 
                  '/create-playlist', '/teacher/video'];

$studentRoutes = ['/courses', '/teachers', '/contact', 'playlist'];

$publicRoutes = ['/', '/login', '/register', '/controllers/auth.php', 
                 '/controllers/auth.php?logout=1', '/pending'];

if (in_array($uri, $adminRoutes)) {
    requireRole(['admin']);
    
    switch ($uri) {
        case '/admin':
            require_once "../views/admin/admin.php";
            break;
        case '/tags':
            require_once "../views/admin/tags.php";
            break;
        case '/categors':
            require_once "../views/admin/categories.php";
            break;
        case '/statistics':
            require_once "../views/admin/statistcsadmin.php";
            break;
        case '/create_tag':
            require_once "../controllers/admin/tags/create_tag.php";
            break;
        case '/delete_tag':
            require_once "../controllers/admin/tags/delete_tag.php";
            break;
        case '/create_category':
            require_once "../controllers/admin/categorys/create_category.php";
            break;
        case '/delete_category':
            require_once "../controllers/admin/categorys/delete_category.php";
            break;
        case '/accept_teacher':
            require_once "../controllers/admin/accept_teacher.php";
            break;
        case '/reject_teacher':
            require_once "../controllers/admin/reject_teacher.php";
            break;
    }
}
elseif (in_array($uri, $teacherRoutes)) {
    requireRole(['teacher']);
    
   
    if ($_SESSION['user']['status'] !== 'active') {
        Utils::redirect("pending");
        exit();
    }
    
    switch ($uri) {
        case '/teacher-statistics':
            require_once "../views/teacher/statistics.php";
            break;
        case '/teacher-courses':
            require_once "../views/teacher/courses.php";
            break;
        case '/teacher-playlist':
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                require_once "../controllers/teacher/video.php";
            } else {
                
                $playlistId = $_GET['id'] ?? null;
                if (!$playlistId) {
                    Utils::redirect("teacher-courses");
                    exit();
                }
                
                $playlistDAO = new PlaylistDAO();
                $playlist = $playlistDAO->findById($playlistId);
                
                if (!$playlist || $playlist['teacher_id'] != $_SESSION['user']['id']) {
                    Utils::redirect("teacher-courses");
                    exit();
                }
                
                require_once "../views/teacher/playlist.php";
            }
            break;
        case '/create-playlist':
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                require_once "../controllers/teacher/create_playlist.php";
            } else {
                require_once "../views/teacher/create_playlist.php";
            }
            break;
        case '/teacher/video':
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                require_once "../controllers/teacher/video.php";
            } else {
                Utils::redirect("teacher-courses");
            }
            break;
    }
}
elseif (in_array($uri, $studentRoutes)) {
    requireRole(['student']);
    
    switch ($uri) {
        case '/courses':
            require_once "../views/student/courses.php";
            break;
        case '/teachers':
            require_once "../views/student/teachers.php";
            break;
        case '/contact':
            require_once "../views/student/contact_us.php";
            break;
        case '/playlist':
            require_once "../views/student/playlist.php";
            break;
    }
}
elseif (in_array($uri, $publicRoutes)) {
    switch ($uri) {
        case '/pending':
            if (isset($_SESSION['user']) && 
                $_SESSION['user']['role'] === 'teacher' && 
                $_SESSION['user']['status'] === 'pending') {
                require_once "../views/teacher/pending.php";
            } else {
                Utils::redirect("");
            }
            break;
            
        case '/':
            if (isset($_SESSION['user'])) {
                switch($_SESSION['user']['role']) {
                    case 'teacher':
                        if ($_SESSION['user']['status'] === 'pending') {
                            Utils::redirect("pending");
                        } else {
                            Utils::redirect("teacher-courses");
                        }
                        break;
                    case 'admin':
                        Utils::redirect("admin");
                        break;
                    case 'student':
                        require_once "../views/student/courses.php";
                        break;
                }
            } else {
                require_once "../views/student/courses.php";
            }
            break;
        case '/login':
            require_once "../views/auth/login.php";
            break;
        case '/register':
            require_once "../views/auth/register.php";
            break;
        case '/controllers/auth.php':
        case '/controllers/auth.php?logout=1':
            require_once "../controllers/auth.php";
            break;
    }
}
else {
    http_response_code(404);
    echo "404 Not Found";
}
?>