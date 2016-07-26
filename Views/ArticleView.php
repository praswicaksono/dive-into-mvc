<html>
    <head>
        <title<?php echo $article->title() ?></title>
    </head>
    <body>
        <h1>Body : <?php echo $article->body() ?></h1>
        <h1>Voting Count : <?php echo $article->voteCount() ?></h1>
        <h1>Rating : <?php echo $article->rating() ?></h1>
    </body>
</html>