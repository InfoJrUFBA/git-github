<?php
    session_start();
    require_once('../helpers/session.php');
    home();
    require_once('../models/login.php');

    if (isset($_POST)) {
        $new = new Login($_POST);
        $user = $new->login();
        
        if ($user) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['on'] = true;
            header('Location: ../views/subscribers');
        }
        else {
            header('Location: ../views/login');
        }
    }
?>
