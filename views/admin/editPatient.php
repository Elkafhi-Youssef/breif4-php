<?php require_once '../views.inc/aside.php'; ?>
<?php require_once '../views.inc/nav.php'; ?>
<?php include '../../connect.php'; ?>
<?php include '../../functions_user.php'; ?>
<?php

if(isset($_GET['idediPat'])){
$data = getPatient($conn,$_GET['idediPat']);

}else{
  echo "error";
}
  if ($_SERVER['REQUEST_METHOD'] == 'POST'   ) {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $data = [
              'fn_patient' => $_POST['fullname'],
              'email_patient' => $_POST['gmail'],
              'passwod' => $_POST['password'],
              'date_birth' => $_POST['date'],
              'type_sickness' => $_POST['sickness'],
              'id_patient'=>$_GET['idedit']
          ];
        $dt = updatePatient($conn,$data['fn_patient'] ,$data['email_patient'],$data['passwod'],$data['date_birth'],$data['type_sickness'],$data['id_patient']);
        if($dt){
          header('Location:patients.php');
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


 <div class="edit pop ">
        <form action="./editPatient.php?idedit=<?=$data['id_patient']; ?>" method="POST">
          <div>
              <label>fullname :</label>
          <input type="text" value="<?=$data['fn_patient']; ?>" name="fullname" id="fullname">
          </div>
          <div>
              <label>Birthday :</label>
              <input type="Date" value="<?=$data['date_birth']; ?>" name="date" id="date">
          </div>
          <div>
              <label>Email :</label>
              <input type="email"value="<?=$data['email_patient']; ?>" name="gmail" id="email">
          </div>
          <div>
              <label>password :</label>
              <input type="password" value="<?=$data['passwod']; ?>" name="password" id="password">
          </div>
          <div>
              <select style="margin-top: 20px;" value="" name="sickness" id="">
                <option selected value="<?=$data['type_sickness']; ?>"><?=$data['type_sickness']; ?></option>
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
       