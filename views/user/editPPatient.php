<?php require_once '../views.inc/user.nav.php';?>


<div style="margin-left: 0px;"  class="edit pop ">
        <form action="#" method="POST">
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
              <select style="margin-top: 20px;" value="" name="sickness" id="">
                <option selected value=""></option>
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
       








      <?php require_once '../views.inc/user.footer.php'?>
