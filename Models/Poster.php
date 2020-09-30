<?php

declare(strict_types=1);

const FILE_FOLDER = 'Data';
const FILE_NAME   = 'guestbook_data.txt';
const FILE_PATH   = DIRECTORY_SEPARATOR . FILE_FOLDER . DIRECTORY_SEPARATOR . FILE_NAME;

class Poster
{

    public static function openConnection() : PDO {
        // Try to figure out what these should be for you
        $dbhost    = "localhost";
        $dbuser    = "root";
        $dbpass    = "l@r@cr0ft";
        $db        = "becode_php_guestbook";

        $driverOptions = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        // Try to understand what happens here
        $pdo = new PDO('mysql:host='. $dbhost .';dbname='. $db, $dbuser, $dbpass, $driverOptions);

        // Why we do this here
        return $pdo;
    }

    public static function save(Guestbook $guestbookItem): void
    {
        try {
            $pdo = self::openConnection();
            $sql = "INSERT INTO guestbook (name, title, message, date) VALUES ('" . $guestbookItem->getAuthor() . "', '" . $guestbookItem->getTitle() . "', '" . $guestbookItem->getContent() . "', '". $guestbookItem->getPostdate() . "')";
            $handle = $pdo->prepare($sql);
            $handle->execute();

        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }

    public static function get()
    {
        $rows = [];
        try {
            $pdo = self::openConnection();
            $sql = "SELECT ID, name, title, message, date FROM guestbook";
            $handle = $pdo->prepare($sql);
            $handle->execute();
            $rows = $handle->fetchAll();
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }

        return $rows;
    }
}