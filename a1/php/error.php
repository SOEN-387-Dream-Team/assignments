<?php
echo "Oops, an error occured. You might not be logged in or did an invalid action";
if(isset($_SESSION)) {
  session_destroy();
}
header( "refresh:3;url=../html/MainPage.html" );
?>
