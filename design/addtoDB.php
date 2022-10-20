<?php
session_start();
if(!$_SESSION['user_id']){
    header("LOCATION:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/addtoDB.css">
</head>
<body>
<div class="parent">
<div class="register">

    <h1>add task </h1>
    <form action="../home.php" method="post">
        <input type="text" class="text" name="task_name" placeholder="task name ">
        <p>day of start </p>
        <input type="date" class="text" name="task_start" placeholder="task start ">
        <p>day of end </p>
        <input type="date" class="text" name="task_end" placeholder="task end ">
        <input type="submit" class="button" value="add">
        <a href="showtasks.php">Show tasks ??</a>
    </form>
</div>
</div>
</body>
</html>