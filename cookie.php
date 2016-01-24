<?php
setcookie("CookieTest",$_GET['value'], time()+1200);
 ?>
 <html>
  <head><title>Functions</title></head>
  <body>
    <h1>Using Cookies</h1>
    <?php
      echo "<h2>The cookie is:".$_COOKIE['CookieTest']."</h2>"
    ?>
  </body>
 </html>
