<?php

declare(strict_types=1);

//namespace Php_guestbook_mysql;

class Guestbook
{
    public const MAX_POSTS = 20;

    private string $ID;
    private string $nameFirst;
    private string $nameLast;
    private string $title;
    private string $message;
    private string $datePost;

    /**
     * Guestbook constructor.
     * @param string $nameFirst
     * @param string $nameLast
     * @param string $title
     * @param string $message
     * @param string $id
     * @throws Exception
     */
    public function __construct(string $nameFirst, string $nameLast, string $title, string $message, string $id = '')
    {
        $currentDate = new DateTime("now", new DateTimeZone('Europe/Brussels'));

        $this->ID        = $id;
        $this->nameFirst = $nameFirst;
        $this->nameLast  = $nameLast;
        $this->title     = $title;
        $this->message   = $message;
        $this->datePost  = $currentDate->format('Y-m-d H:i:s');
    }

    public static function getPosts(): array
    {
        $guestbookItems = [];

        foreach (Poster::list() as $guestbookItem) {
            $guestbookItems[] = $guestbookItem;
        }

        return array_slice(array_reverse($guestbookItems), 0, self::MAX_POSTS - 1);
    }

    public static function getPost($id): array
    {
        $guestbookItems = [];

        foreach (Poster::get($id) as $guestbookItem) {
            $guestbookItems[] = $guestbookItem;
        }

        return $guestbookItems;
    }

    public static function deletePost($id): void
    {
        Poster::delete($id);
    }

    /**
     * @return string
     */
    public function getID(): string
    {
        return $this->ID;
    }

    /**
     * @return string
     */
    public function getNameFirst(): string
    {
        return $this->nameFirst;
    }

    /**
     * @return string
     */
    public function getNameLast(): string
    {
        return $this->nameLast;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getDatePost(): string
    {
        return $this->datePost;
    }

    public function savePost(): void
    {
        Poster::save($this);
    }

}