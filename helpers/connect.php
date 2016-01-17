<?php
    class Connect {
        protected static function start()
        {
            $pdo = new PDO('mysql:host=localhost;dbname=git-github', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }
    }
?>