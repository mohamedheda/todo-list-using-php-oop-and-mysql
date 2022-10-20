<!DOCTYPE html>
<?php 
include "../home.php";
$query->addQuery("SELECT * FROM `tasks` WHERE task_id=$_GET[id]");
$dataForUpdate=$query->display();
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="css/update.css">
    </head>
    <body>
    <div class="parent">
<div class="register">
        <form action="../home.php" method="post">
        <p>task name </p>
        <input type="text"  class="text" name="update_name" value="<?=$dataForUpdate[0]['task_name']?>">
        
        <p>day of start </p>
        <input type="date"  class="text" name="update_start" value="<?=$dataForUpdate[0]['start']?>">
        <p>day of end </p>
        <input type="date"  class="text" name="update_end" value="<?=$dataForUpdate[0]['end']?>">
        <input type="hidden"  name="update_id" value="<?=$_GET['id']?>" >
        <input type="submit" class="button" value="UPDATE">
        <a href="showtasks.php">Show tasks ??</a>

    </form>
    </div>
</div>
</body>
</html>
