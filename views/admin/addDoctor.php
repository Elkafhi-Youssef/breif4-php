<?php require_once '../views.inc/aside.php'; ?>
<?php require_once '../views.inc/nav.php'; ?>
<?php include '../../connect.php'; ?>
<?php include '../../functions_user.php'; ?>
<?php

  if ($_SERVER['REQUEST_METHOD'] == 'POST'   ) {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $data = [
              'fn_doctor' => $_POST['fullname'],
              'email_doctor' => $_POST['gmail'],
              'passwod' => $_POST['password'],
              'date_birth' => $_POST['date'],
              'type_Compence' => $_POST['Compence'],
              
          ];
        $dt = addDoctor($conn,$data['fn_doctor'] ,$data['email_doctor'],$data['passwod'],$data['date_birth'],$data['type_Compence']);
        if($dt){
          header('Location:doctors.php');
        }else{
          
          header('Location:addDoctor.php');

        }
}
 
  
   
        
?>
 <!-- pop up edit -->
 <div class="menu_1 hamburger_menu">
    <span >
            <i class="fas fa-bars fa-3x"></i>
    </span>
 </div>


 <div  class="edit pop ">
        <form action="./addDoctor.php" method="POST">
          <div>
              <label>fullname :</label>
          <input type="text" value="" name="fullname" id="fullname">
          </div>
          <div>
              <label>Birthday :</label>
              <input type="Date" value="" name="date" id="date">
          </div>
          <div>
              <label>Email :</label>
              <input type="email"value="" name="gmail" id="email">
          </div>
          <div>
              <label>password :</label>
              <input type="password" value="" name="password" id="password">
          </div>
          <div>
              <select style="margin-top: 20px;" value="" name="Compence" id="">
                <option selected value="">Choose your specialite </option>
                <option value="sickness1">sickness1</option>
                <option value="sickness2">sickness2</option>
                <option value="sickness3">sickness3</option>
                <option value="sickness4">sickness4</option>
              </select>
              
          </div>
          <div>
              <label>
             <img src="<../../../../images/doctor2.png" alt=""></label>
          </div>
          <div class="button">
            <button type="submit">Add</button>
          </div>
        </form>
      </div>
       