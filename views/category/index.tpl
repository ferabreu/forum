<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf8" />
        <!--<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="js/bootstrap.min.js"></script>-->
        
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
        
        <h1>F O R U M</h1>
        
        <?php
            if ($category):
            foreach ($category as $c): ?>
            
            <article>
                <header>
                    <h1><a href="/forum/thread/index/<?php echo $c['id']; ?>"><?php echo $c['subject']; ?></a></h1>
                    <p><?php echo $c['description']; ?></p>
                </header>
                <hr/>
            </article>
        <?php
            endforeach;
            else: ?>
        
        <h1>Test message:</h1>
        <p>F O R U M is empty.</p>
        
        <?php endif; ?>
        
    </body>
</html>
