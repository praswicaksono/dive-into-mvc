<?php

require_once __DIR__ . '/../Models/Article.php';

class CreateArticleController
{
    private $serviceLocator;

    public function __construct($serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }

    public function __invoke()
    {
        $article = Article::create('Title', 'Body');

        $article->giveRating(5);
        $article->giveRating(5);
        $article->giveRating(3);

        $this->serviceLocator['persistence']->set(rand(), $article);

        $data = ['article' => $article];

        extract($data);

        ob_start();

        include __DIR__ . '/../Views/CreateArticleView.php';

        $renderedHtml = ob_get_clean();

        return $renderedHtml;
    }
}