<?php
include "../home.php";
$doneQuery=new Query();
$doneQuery->addQuery("UPDATE `tasks` SET `status`=3 WHERE `task_id`=$_GET[id]");
header("LOCATION:showtasks.php");