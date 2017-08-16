<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "mallesh";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: ".mysqli_connect_error());
/* check connection */
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}

$limit                           = 3;
if (isset($_GET["page"])) {$page = $_GET["page"];} else { $page = 1;};

$start_from = ($page-1)*$limit;

$sql       = "SELECT * FROM employee ORDER BY id ASC LIMIT $start_from, $limit";
$rs_result = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title></title>
<script>
</script>
</head>
<body>
<h2  align="center">Emplyee Details</h2>
<div class="container" style="padding-top:20px;">
     <form action="http://localhost/siddu/index.php" method="GET">


     <table>
      <tr>
      <td >
        <div class = "form-group">
            <input type="text" class="form-control" name = "sname" placeholder="Full Name">
        </div>
      </td>
      <td>
            &nbsp;
            &nbsp;
            &nbsp;
      </td>
      <td >
        <div class = "form-group">
            <input type="submit" class = "btn btn-primary" value = "Search Student">
        </div>
      </td>      
    </table>
     </tr>
    </form>
  	


<?php
if (isset($_GET["sname"])) {
	$name     = $_GET['sname'];
	$query    = "SELECT employee_name, employee_salary, employee_age FROM employee WHERE employee_name = '$name'";
	$i        = 99;
	$response = @mysqli_query($conn, $query);
	$row      = mysqli_fetch_array($response);

	echo '<table     class = "table table-bordered table-responsive">
                            <td align="center" class="col-md-5"><b>Name</b></td>
                            <td align="center" class="col-md-5"><b>Salary</b></td>
                            <td align="center" class="col-md-3"><b>Age</b></td>';
	
	echo '<tr><td align="center">'.
	$row['employee_name'].'</td><td align="center" >'.
	$row['employee_salary'].'</td><td align="center">'.

	$row['employee_age'].'</td></table>';

	
	echo '<a href="index.php">.</a>';
}
?>






<table class="table table-bordered"  class="table table-hover" >
<thead>
<tr>
<th>Name</th>
<th>Salary</th>
<th>Age</th>
<th>delete</th>
<th>Update</th>
</tr>
</thead>
<tbody>
<?php $i=0;?>
<?php while ($row = mysqli_fetch_assoc($rs_result)) {
	?>
					       <tr>
					          <td><?php echo $row["employee_name"];?></td>
					          <td><?php echo $row["employee_salary"];?></td>
						      <td><?php echo $row["employee_age"];?></td>


		     

 			  <?php
	          echo "<td>";

              echo "<form action='deleted_details.php' method='post'>";

              echo " <p>";
              echo "<input type='hidden' name='id' size='10' value='$row[id]' />";
              echo"</p>";

	            echo "<p>";
              echo "<input class='btn btn-warning' type='submit' name='submit' value='Delete' />";
              echo "</p>";
              
              echo "</form>";

              echo "</td>";

              ?>

           
              <?php
	          echo "<td>";
	          

              echo "<form action ='updated.php' method = 'GET'>
					    <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#update$i'>Update
					    </button>
					  <div class='modal fade' id='update$i' role='dialog'>
					    <div class='modal-dialog'>
					      <div class='modal-content'>
					        <div class='modal-header'>
					           <button type='button' class='close' data-dismiss='modal'>&times;</button>
					          <h4 class='modal-title'>Student Details</h4>
					          </div>
					              <div class='modal-body'>
					                <form action='updated.php' method ='GET'>
					                      <input type='hidden' class='form-control' id='id' name='id' value =" .$row["id"].">
					                		
					                       <label for='name'>name:</label>
					                       <input type='text' class='form-control' id='employee_name' name='employee_name' value =" .$row["employee_name"].">

					                       <label for='email'>Email address:</label>
					                       <input type='name' class='form-control' id='employee_salary' name='employee_salary' value =".$row["employee_salary"].">

					                       <label for='phone'>mobile:</label>
					                       <input type='number_format' class='form-control' id='employee_age' name='employee_age' value =".$row["employee_age"].">
					                   <span>
					                         <button type='submit' class='btn btn-default'>Submit</button>
					                   </span>
					                </form>
					            </div>
					    </div>
					</div></td>
					</form>";

              echo "</td>";
              $i++;
              ?>


						      



					        </tr>
	<?php
};
?></tbody>
</table>

<?php
$sql           = "SELECT COUNT(id) FROM employee";
$rs_result     = mysqli_query($conn, $sql);
$row           = mysqli_fetch_row($rs_result);
$total_records = $row[0];
$total_pages   = ceil($total_records/$limit);
$pagLink       = "<nav><ul class='pagination'>";
for ($i = 1; $i <= $total_pages; $i++) {
	$pagLink .= "<li><a href='index.php?page=".$i."'>".$i."</a></li>";
};
echo $pagLink."</ul></nav>";
?>
</div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
$('.pagination').pagination({
        items: <?php echo $total_records;?>,
        itemsOnPage: <?php echo $limit;?>,
        cssStyle: 'light-theme',
		currentPage : <?php echo $page;?>,
		hrefTextPrefix : 'index.php?page='
    });
	});
</script>



<?php

//for adding the student details in form 
echo '<div class="container">';
echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  >Add employee</button>';

echo '</div>';




echo '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';


 echo ' <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add student Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 

      <div class="modal-body">


        <form action="added_details.php" method="post">


          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Name:</label>
            <input type="text" class="form-control" id="recipient-name" name ="employee_name" >
          </div>

          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Salary:</label>
            <input type="text" class="form-control" id="recipient-name" name = "employee_salary">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Age:</label>
            <input type="text" class="form-control" id="recipient-name" name = "employee_age">
          </div>
     



<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

<input type="submit" name="submit" value="Add Student" class = "btn btn-success"/>
</div>



</form>

</div>
</div>
</div>
</div>' ; //end of the form


?>


