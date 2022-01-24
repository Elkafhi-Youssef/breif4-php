<?php require_once '../views.inc/user.nav.php';?>
<!-- <div class="menu_1" >
    <span >
            <i class="fas fa-bars fa-3x"></i>
    </span>
</div> -->

<div class="profile_container">
      <div class="media">
        <img src="../../images/img/doctor.svg" alt="profile" />
        <div class="button">
        <a href="#"><button id="editBtn">Edit Info</button></a>
          
        </div>
      </div>
      <div class="info">
        <h1>youssef elkafhi</h1>
        <h4>2000/01/04</h4>
        <h3>gagga@gmail.com</h3>
        <h3>specialete: specialete1</h3>
      </div>
    </div>

   
      
    </div>
    


        <div class="planing_doc">
            <div class="header_plan">
                <h1>Planing</h1>
                <img src="../../images/img/icon/planinig.svg">
            </div>
            <div class="table">
                <div class="header_profil">
                    <h3>Profile</h3>
                    <h3>User Name</h3>
                    <h3>Email</h3>
                    <h3>Descreption</h3>
                </div>
                
                
            </div>
            <div class="table">
                
                <div>
                    <form>
                    <img alt="profil" src="../../images/img/patient1.svg"></td>
                    <h5>youssef elkafhi</h5>
                    <h5>youssef@gmail.com</h5>
                    <button>Show Profile</button>
                    </form>
                </div>
               
                
            </div>
            
        </div>

        <div id="showp" class="profile_container  pop">
            
            <div class="media">
            <img src="../../images/img/patient1.svg" alt="profile" />
            </div>
            <div class="info">
                <h1>Ramon Ridwan</h1>
                <h4>08/09/1999</h4>
                <h3>Phone :</h3>
                <h3>Address :</h3>
                <h3>Email :</h3>
                <h3>Amrad :</h3>
            </div>
            <div>
                <form>
                    <table>
                        <tr>
                            <th>Date</th>
                            <th>Descreption</th>
                        </tr>
                        <tr>
                            <td>Avril,Monday 2019</td>
                            <td>had khotna mrida chi merd  :) !</td>
                        </tr>
                        <tr>
                            <td>Avril,Monday 2019</td>
                            <td>had khotna mrida chi merd  :) !</td>
                        </tr>
                    </table>
                    <div class="send">
                        <input type="text" placeholder="Write here..." >
                        <img src="../../images/img/icon/send.png" >
                    </div>
                </form>
            </div>
            <div class="close ">
                <img src="/assets/images/icon/close.png">
            </div>
        </div>
        <script>
        let editBtn = document.getElementById("editBtn");
        let edit = document.querySelector('.edit.pop');
        let showBtn = document.getElementById('show');
        let showprofile = document.querySelector('#showp');
        let close = document.querySelectorAll(".close");
        let valider = document.querySelectorAll(".valider");
        let vider = document.querySelectorAll(".vider");


    

      

    editBtn.addEventListener('click',()=>{
        edit.style.display="block";
    });
 
    showBtn.addEventListener('click',(e)=>{
        e.preventDefault();
        showprofile.style.display="block";
        

    });
    close.forEach((e) => {

e.addEventListener("click",(event)=>{
    event.preventDefault();
    edit.style.display="none";
    showprofile.style.display="none";
});
});


    valider.forEach(function (el) {
    el.addEventListener("click",(event)=>{
    
    
    vider.forEach(function (el) {
    el.value = "";
    

    });
    
});
    
});
</script>
<?php require_once '../views.inc/user.footer.php'?>