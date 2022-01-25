<?php require_once '../views.inc/aside.php'; ?>
<?php require_once '../views.inc/nav.php'; ?>
<?php include '../../connect.php'; ?>
<?php include '../../functions_user.php'; ?>
<?php
if(isset($_GET['id'])){
  $data = getDoctor($conn,$_GET['id']);
  }
  
?>

<div class="menu_1 hamburger_menu" >
<span >
        <i class="fas fa-bars fa-3x"></i>
</span>
</div>
<div class="profile_container">
      <div class="media">
        <img src="../../images/img/doctor.svg" alt="profile" />
        <!-- <div class="button">
        <a href="#"><button id="editBtn">Edit Info</button></a>
          
        </div> -->
      </div>
      <div class="info">
        <h1><?=$data['fn_doctor']; ?></h1>
        <h4><?=$data['date_birth']; ?></h4>
        <h3><?=$data['email_doctor']; ?></h3>
        <h3>specialete: <?=$data['type_Compence']; ?></h3>
      </div>
</div>



