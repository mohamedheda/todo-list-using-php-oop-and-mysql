<?php
    include "../home.php";
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
    <link rel="stylesheet" href="css/showtasks.css">
    <link rel="stylesheet" href="css/showtask.css">
    <link rel="stylesheet" href="css/addtask.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
    <title>Document</title>
</head>
<body>
    
    <ul>
    <i class="fa-solid fa-rectangle-list" style="      padding-left: 4%;"></i>
    <p>TO DO</p>
        <li><a href="logout.php">logout</a></li>
        <li><a href="profiles.php">users</a></li>
        <li><a href="myprofile.php">profile</a></li>
</ul>
    <h1>TO DO LIST</h1>
    
    <?php 
    $doneQuery=new Query();
    ?>
    <table border=1 cellspacing=10 >
        <thead class="thead">
            <td   >Name </td>
            <td  >Start</td>
            <td  >End</td>
        </thead>

        <?php foreach($data as $e){
            ?>
            
            <?php if($e["status"]==1){?>
                <tr  class="late">
                    <td  class="task" ><?= $e["task_name"] ?></td>
                    <td  class="task" ><?= $e["start"] ?></td>
                    <td  class="task" ><?= $e["end"] ?></td>
                    <td   style="border: none;">
                        <a href="done.php?id=<?= $e["task_id"] ?>" title="Done">    <i class="fa-solid fa-square-check" style="color: #850E35;
    font-size: 35px; "></i>
</a>
                    </td>
                    <td  style="border: none;">
                    <a href="update.php?id=<?= $e["task_id"] ?>" title="Update"> <i class="fa-solid fa-pen-to-square" style="color: #850E35;
    font-size: 30px;"></i> </a>
                    </td>
                    <td   style="border: none;">
                    <a href="delete.php?id=<?= $e["task_id"] ?>"  title="DELETE"><i class="fa-solid fa-trash" style="color: #850E35;
    font-size: 25px;"></i></a>
                    </td>
                    
                </tr>
                <?php 
            }} ?>
                <?php foreach($data as $e){
                    ?>
                    <?php if($e["status"]==2){?>
                        <tr  >
                    <td  style="border-radius: 10%;
    background-color: #EE6983;
    border: none;
    color: #FFF5E4;        padding: 10px;" ><?= $e["task_name"] ?></td>
                    <td  style="border-radius: 10%;
    background-color: #EE6983;
    border: none;        padding: 10px;

    color: #FFF5E4;" ><?= $e["start"] ?></td>
                    <td  style="border-radius: 10%;
    background-color: #EE6983;        padding: 10px;

    border: none;
    color: #FFF5E4;" ><?= $e["end"] ?></td>
                    <td   style="border: none;">
                        <a href="done.php?id=<?= $e["task_id"] ?>" title="Done">    <i class="fa-solid fa-square-check" style="color: #EE6983;
    font-size: 35px; "></i>
</a>
                    </td>
                    <td  style="border: none;">
                    <a href="update.php?id=<?= $e["task_id"] ?>" title="Update"> <i class="fa-solid fa-pen-to-square" style="color: #EE6983;
    font-size: 30px;"></i> </a>
                    </td>
                    <td   style="border: none;">
                    <a href="delete.php?id=<?= $e["task_id"] ?>"  title="DELETE"><i class="fa-solid fa-trash" style="color: #EE6983;
    font-size: 25px;"></i></a>
                    </td>
                    
                </tr>
                <?php 
            }} ?>
                
            </table>
            <div class="divadd">

<a href="addtoDB.php" class="add">add task ..</a>
</div>   
            <hr style="color: #850E35; margin:20px 0px ;">
            <h2 style="text-align: center;
    color: #850E35; padding-bottom:20px;">Completed</h2>
            <table  cellspacing=5>
        <?php foreach($data as $e){?>
                    <?php if($e["status"]==3){?>
                        <tr  >
                            <td style="color: #000;padding: 10px;background-color: #EE6983;    color: #FFF5E4;     border-radius: 10%; text-decoration: line-through;" ><?= $e["task_name"] ?></td>
                            <td style="color: #000;padding: 10px;background-color: #EE6983;    color: #FFF5E4;     border-radius: 10%; text-decoration: line-through;" ><?= $e["start"] ?></td>
                            <td style="color: #000;padding: 10px;background-color: #EE6983;    color: #FFF5E4;     border-radius: 10%; text-decoration: line-through;" ><?= $e["end"] ?></td>
                            <td   style="border: none;">
                    <a href="delete.php?id=<?= $e["task_id"] ?>"  title="DELETE"><i class="fa-solid fa-trash" style="color: #850E35;
    font-size: 25px;"></i></a>
                    </td>
                        </tr>
                        <?php }} ?>
                    </table>
                </body>
</html>
