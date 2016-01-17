<?php
    require_once('../helpers/connect.php');

    class Managers extends Connect {
        public $name;
        public $email;
        public $password;

        function __construct($attributes = array()) {

            if (!empty($attributes)) {
                $this->name = $attributes['name'];
                $this->email = $attributes['email'];
                $this->password = array_key_exists("password", $attributes) ? md5($attributes['password']) : null;
            }
        }

        public function insert() {
            $connect = static::start();
            $stm = $connect->prepare("INSERT INTO managers(name, email, password) VALUES (:name, :email, :password)");
            $stm->BindValue(":name", $this->name, PDO::PARAM_STR);
            $stm->BindValue(":email", $this->email, PDO::PARAM_STR);
            $stm->BindValue(":password", Cript::encryptpassword($this->password), PDO::PARAM_STR);
            return $stm->execute();
        }

        public function update($id) {
            $connect = static::start();
            $stm = $connect->prepare("UPDATE managers SET name = :name, email = :email WHERE id = :id LIMIT 1");
            $stm->BindValue(":id", $id, PDO::PARAM_INT);
            $stm->BindValue(":name", $this->name, PDO::PARAM_STR);
            $stm->BindValue(":email", $this->email, PDO::PARAM_STR);
            return $stm->execute();
        }
        
        public function changePassword($id) {
            $connect = static::start();
            $stm = $connect->prepare("UPDATE managers SET password = :password WHERE id = :id LIMIT 1");
            $stm->BindValue(":id", $id, PDO::PARAM_INT);
            $stm->BindValue(":password", $this->password, PDO::PARAM_STR);
            return $stm->execute();
        }

        public static function selectAll() {
            $connect = static::start();
            $stm = $connect->query("SELECT * FROM managers ORDER BY name ASC");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        public static function select($id) {
            $connect = static::start();
            $stm = $connect->prepare("SELECT id, name, email FROM managers WHERE id = :id");
            $stm->BindValue(":id",$id, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);
        }

        public function delete($id) {
            $connect = static::start();
            $stm = $connect->prepare("DELETE FROM managers where id = :id");
            $stm->BindValue(":id", $id, PDO::PARAM_INT);
            return $stm->execute();
        }
    }
?>
