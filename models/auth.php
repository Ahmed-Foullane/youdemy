<?php

require_once '../utils/utils.php';
require_once '../DAOs/auth.php';

class AuthSystem {
    private $auth;
   
    public function __construct() {
        $this->auth = new Auth();
    }

    public function registerUser($role, $name, $email, $password, $confirm_password) {
      $name = Utils::sanitize($name);
      $email = Utils::sanitize($email);
      $password = Utils::sanitize($password);
      $confirm_password = Utils::sanitize($confirm_password);   
      
      if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
          Utils::setFlash('register_error', 'All fields are required!');
          Utils::redirect('register');
          return;
        }
        
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
               Utils::setFlash('register_error', 'invlid user name');
               Utils::redirect('register');
               return;
           }

           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            Utils::setFlash('register_error', 'Unvalid Emial');
            Utils::redirect('register');
            return;
        }

        if (strlen($password) < 8 || 
           !preg_match("/[A-Z]/", $password) || 
           !preg_match("/[a-z]/", $password) || 
           !preg_match("/[0-9]/", $password)) {
            Utils::setFlash('register_error', 'passwrd must contain uper and lower case and more then 8 characters');
            Utils::redirect('register');
           return;
        }
      if ($password !== $confirm_password) {
        
        Utils::setFlash('register_error', 'Passwords do not match!');
        Utils::redirect('register');
        return;
      }


      
      
      
      $user = $this->auth->getUserByEmail($email);
      if ($user) {
          Utils::setFlash('register_error', 'Email already exists!');
          Utils::redirect('register');
          return;
      }
  
     

      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      if ($this->auth->register($role, $name, $email, $hashed_password)) {
          Utils::setFlash('register_success', 'You are now registered and can login now!');
          Utils::redirect('login');
      } else {
          Utils::setFlash('register_error', 'Registration failed. Please try again.');
          Utils::redirect('register');
      }
  }

    public function loginUser($email, $password) {
        $email = Utils::sanitize($email);
        $password = Utils::sanitize($password);

        $user = $this->auth->login($email, $password);
        if ($user) {
            unset($user['password']);
            $_SESSION['user'] = $user;
            Utils::redirect('');
        } else {
            Utils::setFlash('login_error', 'Invalid email or password!');
            Utils::redirect('login');
        }
    }

    public function logoutUser() {
        unset($_SESSION['user']);
        Utils::redirect('');
    }
}