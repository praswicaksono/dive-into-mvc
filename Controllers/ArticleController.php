<?php

require_once __DIR__ . '/../Models/Article.php';
require_once __DIR__ . '/../Persistance/FilePersistance.php';

class ArticleController
{
    public function __invoke()
    {
        $storage = new FilePersistance();

        $article = Article::create('Title', 'Body');

        $article->upvote();
        $article->upvote();
        $article->downvote();
        $article->giveRating(5);
        $article->giveRating(5);
        $article->giveRating(3);

        $storage->set(rand(), $article);

        ob_start();

        include __DIR__ . '/../Views/ArticleView.php';

        $renderedHtml = ob_get_clean();

        return $renderedHtml;
    }
}
