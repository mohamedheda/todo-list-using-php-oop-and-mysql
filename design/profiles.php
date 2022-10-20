<?php 
include "../home.php";
$users=new User();
$profilesData=$users->getProfiles();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profiles.css">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />   

</head>
<body>
<a href="javascript:history.back()"><i class="fa-sharp fa-solid fa-arrow-left"></i></a>

    <table  cellspacing=5>
        <thead  >
            <td style="color: #fff;padding: 10px;" bgcolor="black">Name</td>
            <td style="color: #fff;padding: 10px;" bgcolor="black">TASKS Completed</td>
            <td style="color: #fff;padding: 10px;" bgcolor="black">TASKS Left</td>
            <td style="color: #fff;padding: 10px;" bgcolor="black">TASKS Deleted</td>
        </thead>
        <?php foreach($profilesData as $e){ ?>
        <tr  >
                        <td style="color: #000;padding: 10px;"><a href="myprofile.php?id=<?=$e['id']?>"><?= $e['name'] ?></a> </td>
                        <td style="color: #000;padding: 10px;"><?= $e['done_tasks'] ?></td>
                        <td style="color: #000;padding: 10px;"><?= $e['left_tasks'] ?></td>
                        <td style="color: #000;padding: 10px;"><?= $e['deleted'] ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>