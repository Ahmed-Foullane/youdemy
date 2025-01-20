-- Active: 1736615308540@@127.0.0.1@3306@youdemy

show databases;

create DATABASE youdemy;
use  youdemy;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(30),
    status VARCHAR(20) DEFAULT "pending"
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


insert into users (name, email,password, role) VALUES ("ahmed", "admin@gmail.com", "ahmed_foullane", "teacher");
insert into users (name, email,password, role) VALUES ("zakarya", "zak@gmail.com", "sak123", "teacher");
insert into users (name, email,password, role) VALUES ("admin", "admin@gmail.com", "ahmed_foullane", "admin");

SELECT * from users;
CREATE TABLE courses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    teacher_id INT,
    content_link VARCHAR(300),
    category_id INT,
    FOREIGN KEY (teacher_id) REFERENCES users(id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE playlists (
    id INT PRIMARY KEY AUTO_INCREMENT, 
    teacher_id INT NOT NULL,      
    category_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    FOREIGN KEY (category_id) REFERENCES categories(id),  
    name VARCHAR(255) NOT NULL,       
    FOREIGN KEY (teacher_id) REFERENCES users(id) ON DELETE CASCADE 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



select * from playlists;


drop TABLE playlists;
SELECT * from playlists;

CREATE TABLE playlist_videos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    playlist_id INT,
    video_url VARCHAR(500) NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    FOREIGN KEY (playlist_id) REFERENCES playlists(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SELECT * from playlist_videos pv JOIN playlists p on pv.playlist_id = p.id;

select * from playlist_videos;
CREATE TABLE video_tags (
    video_id INT,
    tag_id INT,
    PRIMARY KEY (video_id, tag_id), 
    FOREIGN KEY (video_id) REFERENCES videos(id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES tags(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


SELECT * from video_tags;

CREATE TABLE categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE tags (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

select * from tags;

CREATE TABLE videos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    video_url VARCHAR(500) NOT NULL,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE enrollments (
    student_id INT PRIMARY KEY,
    course_id INT PRIMARY KEY,
    FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
) ENGINE=InnoDB;

SELECT * from videos;