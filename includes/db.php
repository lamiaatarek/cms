<?php
/*$conn=mysqli_connect('localhost','root','','cms');
if($conn){
    echo"connecting";
}*/
define('DB_HOST','localhost');
define('USER_NAME','root');
define('USER_PASS','');
define('DB_NAME','cms');
$conn=mysqli_connect(DB_HOST,USER_NAME,USER_PASS,DB_NAME);

?>