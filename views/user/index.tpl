<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf8" />
        <title><?php echo $title; ?></title>
    </head>
    <body>
        
        <?php include HOME . DS . 'includes' . DS . 'menu.inc.php'; ?>
        
        <h1>F O R U M</h1>
        
        <?php
            if ($user):
            <article>
                <header>
                    <h1><a href="?load=post"><?php echo $t['title']; ?></a></h1>
                    <p>Author: <?php echo $t['user_id']; ?></p>
                </header>
                <hr/>
            </article>
            
            else: ?>
        
        <h1>Test message:</h1>
        <p>User is empty.</p>
        
        <?php endif; ?>
        
    </body>
</html>