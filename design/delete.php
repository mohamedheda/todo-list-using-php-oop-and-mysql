<?php 
include "../home.php";
$query->addQuery("SELECT * FROM `tasks` WHERE task_id=$_GET[id]");
$dataForDelete=$query->display();
$user_id=$dataForDelete[0]['user_id'];
$task_id=$dataForDelete[0]['task_id'];
$query->addQuery("INSERT INTO `deleted`(`task_id`, `user_id`) VALUES ($task_id,$user_id)");
$query->addQuery("DELETE FROM `tasks` WHERE `task_id`=$_GET[id]");
if($query->ifAffected()){
    header("LOCATION:../design/showtasks.php");
}
