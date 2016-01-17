<?php
    require_once('../helpers/connect.php');

    class Login extends Connect {
        public $email;
        public $password;

        public function __construct($attributes) {

            if (!empty($attributes)) {
                $this->email = $attributes['email'];
                $this->password = md5($attributes['password']);
            }
        }

        public function login() {
            $connect = static::start();
            $stm = $connect->prepare('SELECT * FROM managers WHERE email = :email AND password = :password LIMIT 1');
            $stm->BindValue(':email',$this->email, PDO::PARAM_STR);
            $stm->BindValue(':password',$this->password, PDO::PARAM_STR);
            $stm->execute();
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>
