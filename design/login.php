<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="parent">
<h1>TO-DO LIST </h1>
<div class="register">
<h2>Login</h2>
    <form action="../home.php" method="POST">
        <input type="text" name="username" class="text" placeholder="enter your name ">
        <input type="password" name="userpass" class="text" placeholder="enter your password ">
        <input type="submit" value="Login" class="button">
    </form>

    <p>don't have an acount? <a href="adduser.php">Register now</a></p> 

</div>

</div>
</body>
</html>
