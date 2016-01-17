<?php
    session_start();
    require('../models/users.php');
    require_once '../models/email.php';
    require_once('../helpers/htmlpurifier/library/HTMLPurifier.auto.php');

    class User {
        
        protected static function isRobot() {
            if (isset($_POST['g-recaptcha-response']) && empty($_POST['g-recaptcha-response'])) {
                $_SESSION['msg'] = 'fail">Opa! Identificamos você como um robô... Você preencheu o captcha corretamente?';
                header('Location: ../#subscribe');
            }
        }
        
        protected static function purifier() {
            try {
                $purifier = new HTMLPurifier();
                foreach ($_POST as $key => $value) {
                    $_POST[$key] = str_replace(['(',')',':',';','%','&','='], '', $purifier->purify(utf8_encode($value)));
                }
            } catch (Exception $e) {
                $_SESSION['msg'] = 'fail">Erro ao cadastrar. Confira as informações inseridas.';
                (isset($_SESSION['id'])) ? header('Location: ../views/subscribers') : header('Location: ../#subscribe');
            }
        
        }
        
        public static function create() {
            (!$_SESSION['id']) ? static::isRobot() : null;
            static::purifier();
            if ($_POST['name'] != "" && $_POST['email'] != "" && $_POST['course'] != "" && $_POST['phone'] != "" && $_POST['semester'] != "" && $_POST['registry'] != "") {
                $user = new Users($_POST);
                try {
                    $user->insert();
                    $_SESSION['msg'] = 'success">Cadastro realizado com sucesso!';
                    $email = new Email($_POST);
                    $email->send();
                }
                catch(pdoexception $e) {
                    $_SESSION['msg'] = 'fail">Erro ao cadastrar. Confira as informações inseridas.';
                }
            }
            (isset($_SESSION['id'])) ? header('Location: ../views/subscribers') : header('Location: ../#subscribe');
        }
        
        public static function update() {
            static::purifier();
            if ($_POST['id'] != "" && $_POST['name'] != "" && $_POST['email'] != "" && $_POST['course'] != "" && $_POST['phone'] != "" && $_POST['semester'] != "" && $_POST['registry'] != "") {
                $user = new Users($_POST);
                try {
                    $user->update($_POST['id']);
                    $_SESSION['msg'] = 'success">Atualizado!';
                    (array_key_exists('status', $_POST) && $_POST['status'] == '1') ? 
                        header('Location: ../views/candidates'): header('Location: ../views/subscribers');
                }
                catch(pdoexception $e) {
                    $_SESSION['msg'] = 'fail">Erro.';
                    header('Location: ../views/edit-user');
                }
            }
        }

        public static function changeStatus() {
            if ($_POST['id'] != "" && $_POST['status'] != "") {
                try {
                    Users::changeStatus($_POST['id'], $_POST['status']);
                    ($_POST['type'] == '1' ) ? $results = Users::selectCandidates() : $results = Users::selectSubscribers();
                    foreach ($results as $result){
                        $second = $first = null;
                        ($result->status == "0") ? $first = 'selected' : $second = 'selected';
                        echo '<tr>
                            <td>'.$result->name.'</td>
                            <td class="hxs">'.$result->email.'</td>
                            <td>'.$result->registry.'</td>
                            <td class="hxs">
                                <select name="status" id="status" onchange="modify(this.value, '.$result->id.')">
                                    <option value="0" '.$first.'>Inscrito</option>
                                    <option value="1" '.$second.'>Participante</option>
                                </select>
                            </td>
                            <td>
                                <a href="edit-user?id='.$result->id.'" class="btn-action edit" title="Editar Usuário"><i class="fa fa-edit fa-lg"></i></a>
                                <a href="../controllers/users?delete='.$result->id.'" onclick="confirm(\'Deseja remover esse registro?\')" class="btn-action del" title="Excluir Usuário"><i class="fa fa-trash-o fa-lg"></i></a>
                            </td>
                        </tr>';
                    }
                }
                catch(pdoexception $e) {
                    $_SESSION['msg'] = 'Erro.';
                    $_SESSION['type'] = 'fail';
                    header('Location: ../views/edit-user');
                }
            }
        }

        public static function delete() {
            if ($_GET['delete'] != "") {
                try {
                    Users::delete($_GET['delete']);
                    $_SESSION['msg'] = 'success">Deletado!';
                }
                catch (pdoexception $e) {
                    $_SESSION['msg'] = 'fail">Erro.';
                }
            }
            header('Location: ../views/subscribers');
        }
    }

    $postActions = array('create', 'update', 'changeStatus');
    $getActions = array('delete');

    if(isset($_POST['action']) && in_array($_POST['action'], $postActions)) {
        User::$_POST['action']();
    }
    elseif((key($_GET))!==null && in_array(key($_GET), $getActions)) {
        $command = key($_GET);
        User::$command();
    }
    else {
        header('Location: ../');
    }
?>
