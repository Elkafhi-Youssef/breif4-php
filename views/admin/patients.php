<?php require_once '../views.inc/aside.php'; ?>
<?php require_once '../views.inc/nav.php'; ?>
<?php include '../../connect.php'; ?>
<?php include '../../functions_user.php'; ?>
<?php
$data = getPatients($conn);
if(isset($_GET['id'])){
    deletePatient($conn, $_GET['id']);
    header('Location:patients.php');
}
?>
<section class="content">
        <div class="head_content">
            <div class="hamburger_menu">
                <span >
                  <i class="fas fa-bars fa-3x"></i>
              </span></div>
            <div class="search_bar">
                  
                  <div class="search">
                      <input type="text" placeholder="search by name">
                      <span><i class="fas fa-search"></i></span>
                  </div>
            </div>
            <div class="add_doctor">
                <span><i class="fas fa-plus"></i></span>
                <span>Add Doctor</span>
            </div>
        </div>
        <div class="all_doctors">
            <div class="doctor bar_decs">
              <div class="doctor_info">
                  <h4 class="full_name">Image</h4>
                  <h4 class="full_name">Full name</h4>
                  <h4 class="speciality spe">type seckness</h4>
              </div>
              <div class="doctor_operation">
                  <h4 class="Operation">Operation</h4>
                  
              </div>
            </div>
           <?php foreach($data as $patient){ ?>
            <div class="doctor">
              <div class="doctor_info">
                  <img src= "../../images/doctor2.png" alt="doctor">
                  <h4 class="full_name"><?=$patient['fn_patient'];?> </h4>
                  <h4 class="speciality"><?=$patient['type_sickness'];?> </h4>
              </div>
              <div class="doctor_operation">
                  <a href="" class="button edit"><span><i class="fas fa-user-edit"></i></span> </a>
                  <a href="patients.php?id=<?=$patient['id_patient'];?>" class="button"><span>
                      <i class="fas fa-trash-alt"></i>
                  </span></a>
                  <?=$patient['id_patient'];?>
                  
                  <a href="#" class="button"><span><i class="fas fa-eye"></i></span></a>
              </div>
            </div>
            <?php }?>
          

            
         </div>
      </section>
     
      <!-- <script>
       
        var editPop =document.querySelectorAll(".doctor_operation .edit");
        const popEdit =document.querySelector('.editPop')
        const divsArr = Array.from(editPop);
        divsArr.forEach( el =>{
        el.addEventListener('click',(e)=>{
                e.preventDefault();
                popEdit.classList.add("showedit")
            })
        })
    </script> -->
</body>
</html>