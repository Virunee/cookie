<?php
session_start();

  $name=$_POST['user'];
  $pwd=$_POST['pwd'];

  if (isset($_POST['on'])) {
    if ($name && $pwd) {
      $_SESSION['user']=$name;
      $_SESSION['pwd']=$pwd;
      if (isset($_SESSION['counter'])) {
      $_SESSION['counter']+=1;
    } else {
      $_SESSION['counter']=1;
    }
  }

  } elseif (isset($_POST['off'])) {
  unset($_SESSION['user']);
  unset($_SESSION['pwd']);
  unset($_SESSION['counter']);
}
 ?>

 <html>
    <head><title>Access Control with Sessions</title></head>
    <body>
      <h1>Access Control with Sessions</h1>

      <?php

      if ($_POST['_check_']) {
        checkForm();
      } else {
        printForm();
      }

      function checkForm() {
        global $name, $pwd;

        if (isset($_POST['show'])) {
          echo "<h3>Session contains ".$_SESSION["user"]." and ".$_SESSION["pwd"]."</h3>";
          echo "<h3>You have logged on ".$_SESSION["counter"] ." times</h3>";
        } else {
          if (!$name || !$pwd)
          echo "<h3>Please enter username and password</h3>";
          else
            echo "<h3>You submitted $name and $pwd</h3>";
        }

        printForm();

      } //checkForm

      function printForm() {
        $thisURL = $_SERVER['PHP_SELF'];

      echo "<form action = " . $thisURL . " method='post'>";
    } // printForm
           ?>
           <table>
             <tr>
               <td>Enter your name</td>
               <td><input type="text" length="20" name="user"></td>
             </tr>
             <tr>
               <td>Password</td>
               <td><input type="password" length="10" name="pwd"></td>
             </tr>
             <tr>
                 <td><input type="submit" name="on" value="Log On"/></td>
                 <td><input type="submit" name="off" value="Log Off"/></td>
             </tr>
             <tr>
               <td colspan="2" align="center">
                 <input type="submit" name="show" value="Show the Session"/>
               </td>
             </tr>
             <input type="hidden" name="_check_" value="1"/>
           </table>
         </form>
         </body>
       </html>
