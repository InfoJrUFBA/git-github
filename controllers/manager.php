<?php
    session_start();
    require('../models/managers.php');
    require_once('../helpers/htmlpurifier/library/HTMLPurifier.auto.php');

    class Manager {
        
        protected static function purifier() {
            try {
                $purifier = new HTMLPurifier();
                foreach ($_POST as $key => $value) {
                    $_POST[$key] = str_replace(['(',')',':',';','%','&','='], '', $purifier->purify(utf8_encode($value)));
                }
            } catch (Exception $e) {
                $_SESSION['msg'] = 'fail">Erro ao cadastrar. Confira as informações inseridas.';
                (isset($_SESSION['id'])) ? header('Location: ../views/managers') : header('Location: ../#subscribe');
            }
        
        }
        
        public static function create() {
            static::purifier();
            if ($_POST['name'] != "" && $_POST['email'] != "" && $_POST['password'] != "") {
                $manager = new Managers($_POST);
                try {
                    $manager->insert();
                    $_SESSION['msg'] = 'success">Cadastro realizado com sucesso!';
                }
                catch(pdoexception $e) {
                    $_SESSION['msg'] = 'fail">Erro ao cadastrar. Confira as informações inseridas.';
                }
            }
            (isset($_SESSION['id'])) ? header('Location: ../views/managers') : header('Location: ../');
        }
        
        public static function update() {
            static::purifier();
            if ($_POST['id'] != "" && $_POST['name'] != "" && $_POST['email'] != "") {
                $manager = new Managers($_POST);
                try {
                    $manager->update($_POST['id']);
                    if($_POST['password'] != "") {
                        $manager->changePassword($_POST['id']);
                    }
                    $_SESSION['msg'] = 'success">Atualizado!';
                    header('Location: ../views/managers');
                }
                catch(pdoexception $e) {
                    $_SESSION['msg'] = 'fail">Erro.';
                    header('Location: ../views/edit-manager');
                }
            }
        }

        public static function delete() {
            if ($_GET['delete'] != "") {
                try {
                    managers::delete($_GET['delete']);
                    $_SESSION['msg'] = 'success">Deletado!';
                }
                catch (pdoexception $e) {
                    $_SESSION['msg'] = 'fail">Erro.';
                }
            }
            header('Location: ../views/subscribers');
        }
    }

    $postActions = array('create', 'update', 'changePassword');
    $getActions = array('delete');

    if(isset($_POST['action']) && in_array($_POST['action'], $postActions)) {
        manager::$_POST['action']();
    }
    elseif((key($_GET))!==null && in_array(key($_GET), $getActions)) {
        $command = key($_GET);
        manager::$command();
    }
?>
