<?php require_once '../views.inc/aside.php'; ?>
<?php require_once '../views.inc/nav.php'; ?>
<?php include '../../connect.php'; ?>
<?php include '../../functions_user.php'; ?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'   ) {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
        $name = $_POST['fullname'];
                 
        $data = searchDoctor($conn,"%$name%");

        if($data){
          
        }else{
          header('Location:showDoctor.php');
        }

}else {
  $data = getDoctors($conn);

}

if(isset($_GET['id'])){
    
    deleteDoctor($conn, $_GET['id']);
    header('Location:doctors.php');
}
?>
<section class="content">
        <div class="head_content">
            <div class="hamburger_menu">
                <span >
                  <i class="fas fa-bars fa-3x"></i>
              </span></div>
            <div class="search_bar">
                  <form action="./doctors.php" method="post">

                      <div class="search">
                          <input type="text" name="fullname" placeholder="search by name">
                          <button  type="submit">
                              <span><i class="fas fa-search fa-2x "></i></span>  
                          </button>

                  </div>
                  </form>
            </div>
            <div class="add_doctor">
                <a  href="addDoctor.php">
                <span><i class="fas fa-plus"></i></span>
                <span>Add Doctor</span></a>
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
           <?php foreach($data as $doctors){ ?>
            <div class="doctor">
              <div class="doctor_info">
                  <img src= "../../images/doctor2.png" alt="doctor">

                  <h4 class="full_name"><?php echo $doctors['fn_doctor'];?>  </h4>
                  <h4 class="speciality"><?php echo $doctors['type_Compence'];?></h4>
              </div>
              <div class="doctor_operation">
                  <a href="./editDoctor.php?idediDoc=<?=$doctors['id_doctor'];?>" class="button edit"><span><i class="fas fa-user-edit"></i></span> </a>
                  <a href="doctors.php?id=<?=$doctors['id_doctor'];?>" class="button"><span>
                      <i class="fas fa-trash-alt"></i>
                  </span></a>
                  <a href="showDoctor.php?id=<?=$doctors['id_doctor'];?>" class="button"><span><i class="fas fa-eye"></i></span></a>
              </div>
            </div>
           <?php }?>

            
         </div>
      </section>
      
     
      <script>
       
        // var editPop =document.querySelectorAll(".doctor_operation .edit");
        // const popEdit =document.querySelector('.editPop')
        // const divsArr = Array.from(editPop);
        // divsArr.forEach( el =>{
        // el.addEventListener('click',(e)=>{
        //         e.preventDefault();
        //         popEdit.classList.add("showedit")
        //     })
        // })
    </script>
</body>
</html>