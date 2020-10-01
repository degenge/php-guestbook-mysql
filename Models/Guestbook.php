<?php

declare(strict_types=1);

//namespace Php_guestbook_mysql;

class Guestbook
{
    const MAX_POSTS = 20;

    private string $ID;
    private string $author;
    private string $title;
    private string $content;
    private string $postdate;

    /**
     * Guestbook constructor.
     * @param string $author
     * @param string $title
     * @param string $content
     * @param string $id
     * @throws Exception
     */
    public function __construct(string $author, string $title, string $content, string $id = '')
    {
        $currentDate = new DateTime("now", new DateTimeZone('Europe/Brussels'));

        $this->ID       = $id;
        $this->author   = $author;
        $this->title    = $title;
        $this->content  = $content;
        $this->postdate = $currentDate->format('Y-m-d H:i:s');
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
    public function getAuthor(): string
    {
        return $this->author;
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
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getPostdate(): string
    {
        return $this->postdate;
    }

    public function savePost(): void
    {
        Poster::save($this);
    }

}