<?php

class Article
{
    private $title;

    private $body;

    private $ratings;

    private function __construct()
    {

    }

    public static function create($title, $body, $ratings = [])
    {
        $object = new self();

        $object->title = $title;
        $object->body = $body;
        $object->ratings = $ratings;

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
}
