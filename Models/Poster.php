<?php

declare(strict_types=1);

//namespace Php_guestbook_mysql;

//use PDO;

class Poster
{

    public static function save(Guestbook $guestbookItem): void
    {
        try {
            $pdo = self::openConnection();
            if ($guestbookItem->getID() === '') {
                $sql    = 'INSERT INTO guestbook (name_first, name_last, title, message, date_post) VALUES (:name_first, :name_last, :title, :message, :date_post)';
                $handle = $pdo->prepare($sql);
            } else {
                $sql    = 'UPDATE guestbook SET name_first = :name_first, name_last = :name_last, title = :title, message = :message, date_post = :date_post WHERE ID = :id';
                $handle = $pdo->prepare($sql);
                $handle->bindValue(':id', $guestbookItem->getID());
            }
            $handle->bindValue(':name_first', $guestbookItem->getNameFirst());
            $handle->bindValue(':name_last', $guestbookItem->getNameLast());
            $handle->bindValue(':title', $guestbookItem->getTitle());
            $handle->bindValue(':message', $guestbookItem->getMessage());
            $handle->bindValue(':date_post', $guestbookItem->getDatePost());
            $handle->execute();

        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }

    public static function openConnection(): PDO
    {
        $dbHost = "localhost";
        $dbUser = "root";
        $dbPass = "l@r@cr0ft";
        $db     = "becode_php_guestbook";

        $driverOptions = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        $pdo = new PDO('mysql:host=' . $dbHost . ';dbname=' . $db, $dbUser, $dbPass, $driverOptions);

        return $pdo;
    }

    public static function list(): array
    {
        $rows = [];
        try {
            $pdo    = self::openConnection();
            $sql    = "SELECT ID, name_first, name_last, title, message, date_post FROM guestbook";
            $handle = $pdo->prepare($sql);
            $handle->execute();
            $rows = $handle->fetchAll();
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }

        return $rows;
    }

    public static function get($id): array
    {
        $rows = [];
        try {
            $pdo    = self::openConnection();
            $sql    = 'SELECT ID, name_first, name_last, title, message, date_post FROM guestbook WHERE ID = :id';
            $handle = $pdo->prepare($sql);
            $handle->bindValue(':id', $id);
            $handle->execute();
            $rows = $handle->fetchAll();
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }

        return $rows;
    }

    public static function delete($id): void
    {
        try {
            $pdo    = self::openConnection();
            $sql    = 'DELETE FROM guestbook WHERE ID = :id';
            $handle = $pdo->prepare($sql);
            $handle->bindValue(':id', $id);
            $handle->execute();
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }

}