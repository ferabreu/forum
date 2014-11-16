<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf8" />
        <!--<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="js/bootstrap.min.js"></script>-->
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
         
        <form action="/forum/user/save" method="post">     
            <!--<p>
                <label for="thread_id">thread_id:</label>
                <input value="<?php if(isset($formData['thread_id'])) echo $formData['thread_id']; ?>" type="hidden" id="thread_id" name="thread_id" />
            </p>
            <p>
                <label for="user_id">user_id:</label>
                <input value="<?php if(isset($formData)) echo $formData['user_id']; ?>" type="text" id="user_id" name="user_id" />
            </p>-->
            <p>
                <label for="username">Username:</label>
                <input value="<?php if(isset($formData)) echo $formData['username']; ?>" type="text" id="username" name="username" />
            </p>
            <p>
                <label for="email">e-mail:</label>
                <input value="<?php if(isset($formData)) echo $formData['email']; ?>" type="text" id="email" name="email" />
            </p>
            <p>
                <label for="password">Password:</label>
                <input value="<?php if(isset($formData)) echo $formData['password']; ?>" type="password" id="password" name="password" />
            </p>
            <p>
                <label for="passwordconfirm">Confirm password:</label>
                <input value="<?php if(isset($formData)) echo $formData['passwordconfirm']; ?>" type="password" id="passwordconfirm" name="passwordconfirm" />
            </p>
            <input type="submit" name="userformsubmit" value="signup" />
        </form> 
    </body>
</html>
