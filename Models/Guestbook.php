<?php

declare(strict_types=1);

class Guestbook
{
    const MAX_POSTS = 20;

    private string $author;
    private string $title;
    private string $content;
    private string $postdate;

    /**
     * Guestbook constructor.
     * @param string $author
     * @param string $title
     * @param string $content
     * @throws Exception
     */
    public function __construct(string $author, string $title, string $content)
    {
        $currentDate = new DateTime("now", new DateTimeZone('Europe/Brussels'));

        $this->author   = $author;
        $this->title    = $title;
        $this->content  = $content;
        $this->postdate = $currentDate->format('Y-m-d H:i:s');
    }

    public static function getPosts(): array
    {
        $guestbookItems = [];

        foreach (Poster::get() as $guestbookItem) {
                $guestbookItems[] = $guestbookItem;
        }
        
        return array_slice(array_reverse($guestbookItems), 0, self::MAX_POSTS - 1);
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