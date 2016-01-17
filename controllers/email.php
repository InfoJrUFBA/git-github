<?php
    require_once '../models/email.php';
    if(isset($_POST) && $_POST['message']!="" && $_POST['type']!=""){
        $email = new Email($_POST);
        if($user = $email->send()){
            echo '<div class="msg success"><div class="emoji-sucesso"></div>Seu e-mail foi enviado com sucesso!</div>';
        }else{
            echo '<div class="msg fail"><div class="emoji-falha"></div>Falha ao enviar e-mail, tente novamente.</div>';
        }
    }
?>