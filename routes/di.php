<?php
session_start();
if(!isset($_SESSION['userdata'])){
    header("location: ../");
}
$userdata = $_SESSION['userdata'];
$groupsdata = $_SESSION['groupsdata'];
if($userdata['status']==0){
$status = '<b>NOT Voted</b>';
}
else{
$status ='<b> Voted </b>';
}
?>
<!DOCTYPE html>
<html lang="eng">
    <head>
        <title>hi</title>
        <link rel="stylesheet" href="../css/di's.css">
    </head>
        <body>
            <center>
            <button id ="b1">back</button>
            <button id ="b2">Log out</button>
            <h2>online voting system </h2>
 </center>
            <hr>
<div id="mainpanel">
<div id ="profile">
          <img src="../uploads/<?php echo $userdata['photo'] ?>" height=" 200" width="200">
          NAME:<?php echo $userdata['name']?><br><br>
          MOBILE:<?php echo $userdata['mobile']?><br><br>
          EMAIL:<?php echo $userdata['email']?><br><br>
          STATUS:<?php echo $status?>
    </div>
   <div id="group">
<?php
if($_SESSION['groupsdata']){
 for($i=0 ; $i<count($groupsdata) ; $i++){
?>
<div>
<img src ="../uploads/<?php echo $groupsdata[$i]['photo'] ?>" height ="100" width="100">
Group Name :<?php echo $groupsdata[$i]['name']?><br>
Votes:<?php echo $groupsdata[$i]['votes']?><br>
<form action="../api/vote.php" method="POST">
<input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
<input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">
<input type="submit" name="votebtn" value="vote" id="votebtn">
</form>
</div>
<?php
}
}
else{
}
?>
</div>
</div>
      
        </body>
        </html>