<?php require_once '../views.inc/aside.php'; ?>
<?php require_once '../views.inc/nav.php'; ?>
<?php include '../../connect.php'; ?>
<?php include '../../functions_user.php'; ?>
<?php

if(isset($_GET['idediDoc'])){
$data = getDoctor($conn,$_GET['idediDoc']);
}

 
  if ($_SERVER['REQUEST_METHOD'] == 'POST'   ) {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
    $data = [
              'fn_doctor' => $_POST['fullname'],
              'email_doctor' => $_POST['gmail'],
              'passwod' => $_POST['password'],
              'date_birth' => $_POST['date'],
              'type_Compence' => $_POST['Compence'],
              'id_doctor'=>$_GET['idedit']
          ];
          
         
        $dt = updateDoctor($conn,$data['fn_doctor'] ,$data['email_doctor'],$data['passwod'],$data['date_birth'],$data['type_Compence'],$data['id_doctor']);
        if($dt){
          header('Location:doctors.php');
        }else{
          $data = getDoctor($conn,$_GET['idediDoc']);
          header('Location:editDoctor.php');

        }

}
 
  
 
?>
 <!-- pop up edit -->
 <div class="menu_1 hamburger_menu">
 <span >
                  <i class="fas fa-bars fa-3x"></i>
              </span>
 </div>


 <div " class="edit pop ">
        <form action="./editDoctor.php?idedit=<?=$data['id_doctor']; ?>" method="POST">
          <div>
              <label>fullname :</label>
          <input type="text" value="<?=$data['fn_doctor']; ?>" name="fullname" id="fullname">
          </div>
          <div>
              <label>Birthday :</label>
              <input type="Date" value="<?=$data['date_birth']; ?>" name="date" id="date">
          </div>
          <div>
              <label>Email :</label>
              <input type="email"value="<?=$data['email_doctor']; ?>" name="gmail" id="email">
          </div>
          <div>
              <label>password :</label>
              <input type="password" value="<?=$data['passwod']; ?>" name="password" id="password">
          </div>
          <div>
              <select style="margin-top: 20px;" value="" name="Compence" id="">
                <option selected value="<?=$data['type_Compence']; ?>"><?=$data['type_Compence']; ?></option>
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
            <button type="submit">Edit</button>
          </div>
        </form>
      </div>
       