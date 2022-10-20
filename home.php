<?php

header("LOCATION:design/login.php");       

session_start();


#####################################################################################
####################           User              ####################################
#####################################################################################
class User{
    public function addUser($name,$pass){
        $adduser=new Query();
        $adduser->addQuery("INSERT INTO `user`(`name`,`password`) VALUES ('$name','$pass')");
        header("LOCATION:design/login.php");
    } 
    public function login($name,$pass){
        $loginuser=new Query();
        $loginuser->addQuery("SELECT * FROM `user` WHERE name='$name'" );
        $loginDate=$loginuser->displayOne();
        if($loginDate['password']==$pass){
            $_SESSION['user_id']=$loginDate['id'];
            header("LOCATION:design/showtasks.php");
        }
        else {

            header("LOCATION:design/login.php");       
         }
    }


    public function logOut(){
        session_destroy();
        header("LOCATION:../design/login.php");
    }

    public function ifHaveTask(){
        $loginuser=new Query();
        $loginuser->addQuery("SELECT * FROM `user` WHERE id='$_SESSION[user_id]'" );
        $dataForCheck=$loginuser->displayOne();
        if($dataForCheck['left_tasks']==0){
            header("LOCATION: design/addtoDB.php");
        }
    }


    public function updateData(){
        
        if($_SESSION['user_id']){
        $updateUserData=new Query();
        $updateData=new task();
        $numOfDone=$updateData->numOfDone();
        $numOfLeft=$updateData->numOfLeft();
        $numOfDeleted=$updateData->numOfDeleted();

        $updateUserData->addQuery("UPDATE `user` SET 
                                    `done_tasks`='$numOfDone ',
                                    `left_tasks`='$numOfLeft',
                                    `deleted`='$numOfDeleted'
                                    WHERE id=$_SESSION[user_id]");
        }
}


    public function getProfile(){
        $userData=new Query();
        $userData->addQuery("SELECT * FROM `user` WHERE id=$_SESSION[user_id]");
        $profile_data=$userData->displayOne(); 
        return $profile_data;
    }
    public function getProfileForPublic($id){
        $userData=new Query();
        $userData->addQuery("SELECT * FROM `user` WHERE id=$id");
        $profile_data=$userData->displayOne(); 
        return $profile_data;
    }
    public function getProfiles(){
        $usersData=new Query();
        $usersData->addQuery("SELECT * FROM `user`");
        $profiles_data=$usersData->display(); 
        return $profiles_data;
    }


}
$user=new User();
if(isset($_POST['user_name'])){
    $user->addUser($_POST['user_name'],$_POST['user_pass']);

}
if(isset($_POST['username'])){
    $user->login($_POST['username'],$_POST['userpass']);
}
$user->updateData();
$user->ifHaveTask();






#####################################################################################
####################           Query             ####################################
#####################################################################################

class Query{
    private $connection ;
    protected $result;
    const localhost="localhost";
    const user="root";
    const pass="";
    const db="todo1";
    public function __construct(){
        $this->connection=mysqli_connect(self::localhost,self::user,self::pass,self::db);
    }
    public function addQuery($q){
        $this->result=mysqli_query($this->connection,$q);
        return $this->result;
    }
    public function display(){
        while($arr=mysqli_fetch_assoc($this->result)){
            $newArr[]=$arr;
        }
        return $newArr;
    }
    public function displayOne(){
       $arr=mysqli_fetch_assoc($this->result);

        return $arr;
    }
    public function ifAffected(){
        return mysqli_affected_rows($this->connection);
    }
    
}
if($_SESSION['user_id']){
$query=new Query();
$query->addQuery("SELECT * FROM `tasks` WHERE user_id=$_SESSION[user_id]");
$data=$query->display();
}

#####################################################################################
####################           Task             ####################################
#####################################################################################
class Task extends Query{
    public function range($d){
        $now=date("20y-m-d");
        $updateStatus=new Query();
        foreach($d as $element){
            if($element["end"]>$now&&$element["status"]!=3){
                $updateStatus->addQuery("UPDATE `tasks` SET `status`='2' WHERE task_id=$element[task_id]");
            }
            elseif ($element["end"]<$now&&$element["status"]!=3){
                $updateStatus->addQuery("UPDATE `tasks` SET `status`='1' WHERE task_id=$element[task_id]");
            }
        }
    }
    public function addtask(){
        $addtask=new Query();
        if(isset($_POST['task_name'])){
            $addtask->addQuery("INSERT INTO `tasks`( `task_name`, `start`, `end`,`user_id`)
             VALUES ('$_POST[task_name]','$_POST[task_start]','$_POST[task_end]',$_SESSION[user_id])");
            header("LOCATION:design/addtoDB.php");
              }
   }

   public function numOfDone(){
       $getnumOfDone=new Query();
    $getnumOfDone->addQuery("SELECT COUNT(status) AS `num_of_done` FROM `tasks` WHERE status=3 AND user_id=$_SESSION[user_id]");
    $num=$getnumOfDone->displayOne();
    return $num['num_of_done'];
   }
   public function numOfLeft(){
       $getnumOfLeft=new Query();
    $getnumOfLeft->addQuery("SELECT COUNT(status) AS `num_of_left` FROM `tasks` WHERE (status=1 OR status=2)AND user_id=$_SESSION[user_id]");
    $num=$getnumOfLeft->displayOne();
    return $num['num_of_left'];
   }
   public function numOfDeleted(){
       $getnumOfDeleted=new Query();
    $getnumOfDeleted->addQuery("SELECT COUNT(task_id) AS `num_of_deleted` FROM `deleted` WHERE user_id=$_SESSION[user_id]");
    $num=$getnumOfDeleted->displayOne();
    return $num['num_of_deleted'];
   }

}
$task=new task();
$task->range($data);
$task->addtask();
$task->numOfDone();
$task->numOfLeft();
$task->numOfDeleted();
if(isset($_POST['update_name'])){
        $query->addQuery("UPDATE `tasks` SET `task_name`='$_POST[update_name]',`start`='$_POST[update_start]',`end`='$_POST[update_end]' WHERE task_id='$_POST[update_id]'");
        header("LOCATION:design/showtasks.php");
}




