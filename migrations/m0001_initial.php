<?php

use thecore\phpmvc\Application;

class m0001_initial {
    public function up() {
        $db = Application::$app->database;
        $SQL = "CREATE TABLE users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            email varchar(255) NOT NULL,
            firstname varchar(255) NOT NULL,
            lastname varchar(255) NOT NULL,
            status TINYINT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB";
        $db->pdo->exec($SQL);
    } 

    public function down() {
        $db = Application::$app->database;
        $SQL = "DROP TABLE users;";
        $db->pdo->exec($SQL);
    }
}