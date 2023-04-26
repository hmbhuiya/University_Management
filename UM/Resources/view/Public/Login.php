<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/Public/Login.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="content">
            <h3>LOGIN</h3>
            <div class="input-field">
                <form action="../../../Controller/Public/Login.php" method="post">
                    <input type="email" name="email" id="email"
                        value="<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];}?>">
                    <input type="password" name="pass" id="pass"
                        value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}?>"
                        placeholder="Password..">
                    <div class="rem">
                        <input type="checkbox" name="rememberme" value="rememberme"> Remember Me
                    </div>
                    <input type="submit">
                    <div class="loginvalidation" align="center">
                        <?php 
               if(isset($_GET['message']))
               {
                   $message=$_GET['message'];
                   if($message=='wrongmessage')
                   {
    
                      echo ' <span class="password_error"> Username or password is missing </span> <br> <br>';
                   }
                   $mess=$_GET['message'];
                   if($message=='invalid')
                   {
    
                      echo ' <span class="password_error"> Invalid Username or Password </span> <br> <br>';
                   }
               }
           ?>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>