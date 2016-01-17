<?php
    require_once('../helpers/connect.php');

    class Users extends Connect {
        public $name;
        public $email;
        public $phone;
        public $registry;
        public $semester;
        public $course;
        public $password;
        public $status;

        function __construct($attributes = array()) {

            if (!empty($attributes)) {
                $this->name = $attributes['name'];
                $this->email = $attributes['email'];
                $this->phone = $attributes['phone'];
                $this->registry = $attributes['registry'];
                $this->semester = $attributes['semester'];
                $this->course = $attributes['course'];
                $this->status = array_key_exists("status", $attributes) ? $attributes['status']: 0;
            }
        }

        public function insert() {
            $connect = static::start();
            $stm = $connect->prepare("INSERT INTO users(name, email, phone, registry, semester, course, status) VALUES (:name, :email, :phone, :registry, :semester, :course, :status)");
            $stm->BindValue(":name", $this->name, PDO::PARAM_STR);
            $stm->BindValue(":email", $this->email, PDO::PARAM_STR);
            $stm->BindValue(":phone", $this->phone, PDO::PARAM_STR);
            $stm->BindValue(":registry", $this->registry, PDO::PARAM_INT);
            $stm->BindValue(":semester", $this->semester, PDO::PARAM_INT);
            $stm->BindValue(":course", $this->course, PDO::PARAM_STR);
            $stm->BindValue(":status", $this->status, PDO::PARAM_INT);
            return $stm->execute();
        }

        public function update($id) {
            $connect = static::start();
            $stm = $connect->prepare("UPDATE users SET name = :name, email = :email, phone = :phone, registry = :registry, semester = :semester, course = :course, status = :status WHERE id = :id LIMIT 1");
            $stm->BindValue(":id", $id, PDO::PARAM_INT);
            $stm->BindValue(":name", $this->name, PDO::PARAM_STR);
            $stm->BindValue(":email", $this->email, PDO::PARAM_STR);
            $stm->BindValue(":phone", $this->phone, PDO::PARAM_STR);
            $stm->BindValue(":registry", $this->registry, PDO::PARAM_INT);
            $stm->BindValue(":semester", $this->semester, PDO::PARAM_INT);
            $stm->BindValue(":course", $this->course, PDO::PARAM_STR);
            $stm->BindValue(":status", $this->status, PDO::PARAM_INT);
            return $stm->execute();
        }

        public static function changeStatus($id, $status) {
            $connect = static::start();
            $stm = $connect->prepare("UPDATE users SET status = :status WHERE id = :id LIMIT 1");
            $stm->BindValue(":id", $id, PDO::PARAM_INT);
            $stm->BindValue(":status", $status, PDO::PARAM_INT);
            return $stm->execute();
        }

        public static function selectAll() {
            $connect = static::start();
            $stm = $connect->query("SELECT * FROM users ORDER BY name ASC");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        public static function selectSubscribers() {
            $connect = static::start();
            $stm = $connect->query("SELECT * FROM users WHERE status =0 ORDER BY id ASC");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        public static function selectCandidates() {
            $connect = static::start();
            $stm = $connect->query("SELECT * FROM users WHERE status =1 ORDER BY id ASC");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        public static function select($id) {
            $connect = static::start();
            $stm = $connect->prepare("SELECT id, name, email, phone, registry, semester, course, status FROM users WHERE id = :id");
            $stm->BindValue(":id",$id, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);
        }

        public function delete($id) {
            $connect = static::start();
            $stm = $connect->prepare("DELETE FROM users where id = :id");
            $stm->BindValue(":id", $id, PDO::PARAM_INT);
            return $stm->execute();
        }
    }
?>
