 <?php

session_start();
$con=mysqli_connect("localhost","root","","e_com");

if($con){
	echo "<h5 style='color:white;'>connection done<h5>";

}else{
	echo "connection fail";
}

 ?> 