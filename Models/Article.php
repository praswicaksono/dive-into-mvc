<?php

class Article
{
    private $title;

    private $body;

    private $voteCount;

    private $ratings;

    private function __construct()
    {

    }

    public static function create($title, $body, $ratings = [], $voteCount = 0)
    {
        $object = new self();

        $object->title = $title;
        $object->body = $body;
        $object->ratings = $ratings;
        $object->voteCount = $voteCount;

        return $object;
    }

    public function updateBody($body)
    {
        $this->body = $body;
    }

    public function updateTitle($title)
    {
        $this->title = $title;
    }

    public function body()
    {
        return $this->body;
    }

    public function title()
    {
        return $this->title;
    }

    public function downvote()
    {
        $this->voteCount--;
    }

    public function upvote()
    {
        $this->voteCount++;
    }

    public function giveRating($scale)
    {
        if ($scale < 0 || $scale > 5) {
            throw new \DomainException('Rating scale out of bond');
        }
        
        $this->ratings[] = $scale;
    }

    public function rating()
    {
        $sumRating = 0;
        foreach ($this->ratings as $rating) {
            $sumRating += $rating;
        }

        return round($sumRating / count($this->ratings), 1);
    }

    public function voteCount()
    {
        return $this->voteCount;
    }
}
