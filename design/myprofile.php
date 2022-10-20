<?php 
include "../home.php";
$profileData=$user->getProfile();
if($_GET){

    $dataForAll=$user->getProfileForPublic($_GET['id']);
}
// echo "<pre>";
// print_r($profileData);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />   

    <title>Document</title>
</head>
<body>
    <a href="javascript:history.back()"><i class="fa-sharp fa-solid fa-arrow-left"></i></a>
    <table  cellspacing=5>
        <thead  >
            <td >Name</td>
            <td >TASKS Completed</td>
            <td >TASKS Left</td>
            <td >TASKS Deleted</td>
        </thead>
        <tr  >
        <?php 
        if($_GET){
            ?>
            <td ><?= $dataForAll['name'] ?></td>
            <td ><?= $dataForAll['done_tasks'] ?></td>
            <td ><?= $dataForAll['left_tasks'] ?></td>
            <td ><?= $dataForAll['deleted'] ?></td>
            <?php     }    
   else {?>
       
                        <td ><?= $profileData['name'] ?></td>
                        <td ><?= $profileData['done_tasks'] ?></td>
                        <td ><?= $profileData['left_tasks'] ?></td>
                        <td ><?= $profileData['deleted'] ?></td>
                        <?php }?>
                        </tr>
    </table>
</body>
</html>