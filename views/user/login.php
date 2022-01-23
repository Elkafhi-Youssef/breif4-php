<?php require_once '../views.inc/user.nav.php';?>

<div class="login_container">
        <div class="login-left">
            <img src="../../images/img/login.png" alt="background">
        </div>
        <div class="login-right">
           <form method="" action="./profileDoctor.php" >
               <select name="user" id="">
                   <option selected value="">who are you?</option>
                   <option value="admin">admin</option>
                   <option value="doctor">doctor</option>
                   <option value="patient">patient</option>
               </select>
               <input type="text"  placeholder="Email" name="login" id="login">
               <input type="password"  placeholder="Password" name="password" id="password">
               <a>Create New Account</a>
               <button>Login</button>
           </form>
        </div>
    </div>









<?php require_once '../views.inc/user.footer.php';?>
