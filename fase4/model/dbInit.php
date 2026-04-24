<?php

$db = new SQLite3('../database/database_login.db');

$db->exec("CREATE TABLE IF NOT EXISTS users (
    id_user INTEGER PRIMARY KEY AUTOINCREMENT, 
    username TEXT UNIQUE, 
    password TEXT
    )");

$db->exec("INSERT OR IGNORE INTO users (username, password) VALUES ('admin', '123') ");

$db->close();