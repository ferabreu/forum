<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf8" />
        <title><?php echo $title; ?></title>
    </head>
    <body>
    
        <?php include HOME . DS . 'includes' . DS . 'menu.inc.php'; ?>
        
        <h1><?php echo $title; ?></h1>

        <?php if ($post): ?>

            <li><a href="/forum/post/posting/<?php echo $id; ?>">NEW POST</a></li>

            <?php foreach ($post as $p): ?>
            
            <article>
                <header>
                    <p>Author: <?php echo $p['user_id']; ?></p>
                    <p><?php echo $p['contents']; ?></p>
                </header>
                <hr/>
            </article>

        <?php
            endforeach;
            else: ?>
        
        <h1>Test message:</h1>
        <p>Thread is empty.</p>
        
        <?php endif; ?>
        
    </body>
</html>
