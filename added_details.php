<html>
<head>
<title>Add Student</title>
</head>

<body>


<?php

  if( $_POST ){
  $con = mysqli_connect("localhost","root","","mallesh");
         
  
  if(!con){
        echo "no connection";   
        }

                 
        $com = "INSERT INTO `employee` (`employee_name`, `employee_salary`, `employee_age`) VALUES ( '$_POST[employee_name]', '$_POST[employee_salary]', '$_POST[employee_age]');";
}


    // echo "$com";



    $ok =  mysqli_query($con,$com);
 
   if(!$ok){

    echo "Added data was insufficient";
  }

  else{

   header("Location:index.php");
    exit;


  echo "successfully added the information";


    }


?>

</body>

</html>






