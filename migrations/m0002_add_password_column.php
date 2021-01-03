<?php

use thecore\phpmvc\Application;

class m0002_add_password_column {
    public function up() {
        $db = Application::$app->database;
        $SQL = "ALTER TABLE users ADD COLUMN password VARCHAR(512) NOT NULL;";
        $db->pdo->exec($SQL);
    } 

    public function down() {
        $db = Application::$app->database;
        $SQL = "ALTER TABLE users DROP COLUMN passwordL;";
        $db->pdo->exec($SQL);
    }
}