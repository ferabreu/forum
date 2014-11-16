<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf8" />
        
        <!-- Latest compiled and minified CSS -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <!-- Optional theme -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->        

        <title><?php echo $title; ?></title>
    </head>
    <body>
        
        <?php include HOME . DS . 'includes' . DS . 'menu.inc.php'; ?>
        
        <h1><?php echo $title; ?></h1>
        
        <?php if ($thread): ?>

            <li><a href="/forum/thread/threading/<?php echo $id; ?>">NEW THREAD</a></li>
            
            <?php foreach ($thread as $t): ?>
            
            <article>
                <header>
                    <h1><a href="/forum/post/index/<?php echo $t['id']; ?>"><?php echo $t['title']; ?></a></h1>
                    <p>Author: <?php echo $t['user_id']; ?></p>
                </header>
                <hr/>
            </article>
        <?php
            endforeach;
            else: ?>
        
        <h1>Test message:</h1>
        <p>Category is empty.</p>
        
        <?php endif; ?>
        
    </body>
</html>
