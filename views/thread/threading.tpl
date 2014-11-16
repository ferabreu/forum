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
        
        <?php
            if (isset($errors))
            {
                echo '<ul>';
                foreach ($errors as $e)
                {
                    echo '<li>' . $e . '</li>';
                }
            echo '</ul>';
            }
         
            if (isset($saveError))
            {
                echo "<h2>Error saving data. Please try again.</h2>" . $saveError;
            }
        ?>
         
        <form action="/forum/thread/save/<?php echo $id ?>" method="post">     
            <!--<p>
                <label for="thread_id">thread_id:</label>
                <input value="<?php if(isset($formData['thread_id'])) echo $formData['thread_id']; ?>" type="hidden" id="thread_id" name="thread_id" />
            </p>-->
            <p>
                <label for="user_id">user_id:</label>
                <input value="<?php if(isset($formData)) echo $formData['user_id']; ?>" type="text" id="user_id" name="user_id" />
            </p>
            <p>
                <label for="title">Title:</label>
                <input value="<?php if(isset($formData)) echo $formData['title']; ?>" type="text" id="title" name="title" />
            </p>
            <p>
                <label for="contents">* Message:</label>
                <textarea name="contents" id="contents" rows="5" cols="50"><?php if(isset($formData)) echo $formData['contents']; ?></textarea>
            </p>
            <input type="submit" name="threadFormSubmit" value="Send" />
        </form>
        
    </body>
</html>
