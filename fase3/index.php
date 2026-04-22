<?php
$db = new SQLite3('database.db');

$db->exec("CREATE TABLE IF NOT EXISTS usuaris (
    usu_id INTEGER PRIMARY KEY AUTOINCREMENT,
    usu_nom TEXT,
    usu_email TEXT UNIQUE
    )");

    $db->exec("INSERT OR IGNORE INTO usuaris (usu_nom, usu_email) VALUES ('Joan', 'joan@itb.cat')");
    $db->exec("INSERT OR IGNORE INTO usuaris (usu_nom, usu_email) VALUES ('Rai', 'rai@itb.cat')");
    $db->exec("INSERT OR IGNORE INTO usuaris (usu_nom, usu_email) VALUES ('David', 'david@itb.cat')");

    echo "Files afectades: " . $db->changes();


$db->exec("CREATE TABLE IF NOT EXISTS marcas (
    mrc_id INTEGER PRIMARY KEY AUTOINCREMENT,
    mrc_nom TEXT,
    mrc_anys NUMBER UNIQUE
    )");

$db->exec("INSERT OR IGNORE INTO marcas (mrc_nom, mrc_anys) VALUES ('Nike', 30)");
$db->exec("INSERT OR IGNORE INTO marcas (mrc_nom, mrc_anys) VALUES ('Adidas', 33)");
$db->exec("INSERT OR IGNORE INTO marcas (mrc_nom, mrc_anys) VALUES ('Puma', 20)");

echo "\nFiles afectades: " . $db->changes();

$db->close();