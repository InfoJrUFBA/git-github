<?php
    function on(){
        if(isset($_SESSION['on'])){
            return true;
        }
        session_destroy();
        header('Location: ../views/login');
    }

    function home(){
        if(isset($_SESSION['on'])){
            header('Location: ../views/subscribers');
        }
    }

    function msg(){
        if(isset($_SESSION['msg'])){
            $msg='<div class="msg '.$_SESSION['msg'].'</div>';
            unset($_SESSION['msg']);
        }else{
            $msg=NULL;
        }
        return $msg;
    }
?>
