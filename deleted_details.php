
<html>
<head>
<title>Delete Student</title>
</head>

<body>
<?php

   if( $_POST ){


	$con = mysqli_connect("localhost","root","");
        mysqli_select_db($con,"mallesh");
  
	if(!con){
        echo "no connection";   
        }
        


        $com = "DELETE FROM `employee` WHERE id = $_POST[id]";
      }


    // echo "$com";



    $ok =  mysqli_query($con,$com);
 
   if(!$ok){

    echo "not";
  }

  else{
 header("Location:index.php");
    exit;

  echo "successfully deleted the information";

    }

?>


</body>

</html>





