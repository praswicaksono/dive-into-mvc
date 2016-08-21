<?php

require_once __DIR__ . '/../Models/Article.php';

class ArticleController
{
    public function __invoke()
    {
        $article = Article::create('Title', 'Body');

        $article->giveRating(5);
        $article->giveRating(5);
        $article->giveRating(3);

        $data = ['article' => $article];

        extract($data);

        ob_start();

        include __DIR__ . '/../Views/ArticleView.php';

        $renderedHtml = ob_get_clean();

        return $renderedHtml;
    }
}
