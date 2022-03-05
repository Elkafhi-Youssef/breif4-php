<?php require_once '../views.inc/nav-login.php';?>

<?php include '../../connect.php'; ?>
<?php include '../../functions_user.php'; ?>
<?php 
// session_start();
global $user_err;
 global $email_err;
 global$password_err;
    if (($_SERVER['REQUEST_METHOD'] == 'POST') ){

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    //assciative arrays
        $data = [
            'user' => $_POST['user'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            
        ];
    
        if (empty($data['user'])){$user_err = 'who are you?';}
        if (empty($data['email'])){$email_err = 'Please fill your email';}
        if(empty($data['password'])){$password_err = 'Please fill your password';}
        if (empty($data['email']) && empty($data['password']) && empty($data['user'])){
           $password_err = 'Please fill your eamil and password and user type'; }
    
    
         if (empty($email_err) && empty($password_err) && empty($user_err)) {
            
                    // $dt = call function here
                   $dt = login($conn ,$data['user'],$data['email'],$data['password']);
                   if ($dt) {
                       
                       $_SESSION['email'] =$data['email'] ;
                       $_SESSION['user_id'] = $dt['id_admin'];
                       
                        // die();
                       header('Location:../admin/doctors.php');
                   } else {
                       //password incorrect
                       $email_err = 'password or email incorrect';
                       $password_err = 'password or email incorrect';
                       
                      

                   }
                }else{
                
                    
                }
     }

    //  else{
    //     $data = [
    //         'email' => '',
    //         'password' => '',
    //         'email_err' => '',
    //         'password_err' => ''
    //     ];
    //     return $data;
    // }

?>
<div class="login_container">
        <div class="login-left">
            <img src="../../images/img/login.png" alt="background">
        </div>
        <div class="login-right">
           <form method="POST" action="./login.php" >
               <select name="user" id="">
                   <option selected value="">who are you?</option>
                   <option value="admin">admin</option>
                   <option value="doctor">doctor</option>
                   <option value="patient">patient</option>
               </select>
               <span style="font-size: 10px;color:red;"><?= $user_err ;?></span>
               <input type="email" value=""  placeholder="Email" name="email" id="login">
               <span style="font-size: 10px;color:red;"><?= $email_err ;?></span>
               <input type="password" value="" placeholder="Password" name="password" id="password">
               <span style="font-size: 10px;color:red;"><?= $password_err ;?></span>
               <a>Create New Account</a>
               <button type="submit">Login</button>
           </form>
        </div>
    </div>









<?php require_once '../views.inc/user.footer.php';?>
