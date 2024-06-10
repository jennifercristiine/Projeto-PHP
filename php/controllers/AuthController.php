// controllers/AuthController.php
<?php
require_once '../models/User.php';

class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            $userModel = new User();
            $loggedInUser = $userModel->login($email, $password);

            if ($loggedInUser) {
                $_SESSION['user_id'] = $loggedInUser->id;
                $_SESSION['user_email'] = $loggedInUser->email;
                $_SESSION['user_name'] = $loggedInUser->name;
                redirect('home');
            } else {
                flash('login_message', 'Invalid login credentials', 'alert alert-danger');
                require_once '../views/login.php';
            }
        } else {
            require_once '../views/login.php';
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            $userModel = new User();
            $result = $userModel->register($name, $email, $password);

            if ($result === true) {
                flash('register_message', 'You are registered and can log in');
                redirect('auth/login');
            } else {
                flash('register_message', $result, 'alert alert-danger');
                require_once '../views/register.php';
            }
        } else {
            require_once '../views/register.php';
        }
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('home');
    }
}
?>
