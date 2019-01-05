<?php
	// session_start();
	// require('connect.php');
	// if ($_SESSION['tbl_users'] != 'true') {
	// 	header('Location:../login.php');
	// }
	
	require ('connect2.php');
	session_start();
	// if ($_SESSION['tbl_users'] != 'true') {
	// 	header('location:../index.php');
	// }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="jquery/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/style-responsive.css" />
   
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
        </button>
          <a class="navbar-brand" href="#" style="color: #1b99d5;">Admin</a>
        </div>
      <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
            <li class="active"><a href="#">Manage Accounts</a></li>
            <li class="#"><a href="mngpat.php?p=1">Manage Patients</a></li>
         
      </ul>
        <div class="top-nav ">
          <ul class="nav pull-right top-menu">
            <button type="button" class="btn btn-info">
            <span class="glyphicon glyphicon-log-out"></span> 
            Log Out
            </button>
          </ul>
        </div>
       </div>
 	</div>
   </nav>
   <br><br><br><br><br><br>
            <div class="container-fluid">
			<div class="row">
				<div class="container-fluid">
					<div class="table-responsive" style="background-color:white; padding:20px;">  
						<button type="button" class="btn btn-info" name='add' value='Insert' 
            				data-toggle="modal" data-target="#addacc"><span class="glyphicon glyphicon-user"></span> Add Account</button>      
						<table class="table table-hover table-striped">
							<thead>
								<tr>
									<th>First Name</th>
									<th>Middle Name</th>
									<th>Last Name</th>
									<th>Email Address</th>
									<th>Username</th>
									<!-- <th>Password</th> -->
									<th>Class</th>
									<th>Status</th>
									<th>Token</th>
									<th>Privelages</th>
									
								</tr>
							</thead>
							<tbody>							
								<?PHP
									if(isset($_GET['edit']))
									{
										$query1 = mysqli_query($conn, "SELECT * FROM tbl_users order by id='".$_GET['id']."' desc,id desc");
										while($query2 = mysqli_fetch_array($query1))
										{

											if($query2[0]==$_GET['id'])
											{	
												echo "<form method='POST'>";
												echo "<tr>";
													echo "<td><input type='text' class='form-control' name='fn' value='".$query2[1]."' required></td>";
													echo "<td><input type='text' class='form-control' name='mn' value='".$query2[2]."' required></td>";
													echo "<td><input type='text' class='form-control' name='ln' value='".$query2[3]."' required></td>";
													echo "<td><input type='text' class='form-control' name='email' value='".$query2[4]."' required></td>";
													echo "<td><input type='text' class='form-control' name='user' value='".$query2[5]."' required></td>";
													
													echo "<td><input type='text' class='form-control' name='cl' value='".$query2[7]."' required></td>";
													echo "<td><select name='status'>
															<option>".$query2[8]."</option>
															<option value='Active'>Active</option>
															<option value='Deactivate'>Deactivate</option>
														 </select></td>";
													echo "<td>".$query2[9]."</td>";
													echo "<td><input type='submit' name='btnEdit' class='btn btn-link' value='Save'></td>";
													echo "<td><a href='../Admin/index.php' class='btn btn-link'>Cancel</a></td>";
												
												echo "</form>";
            									echo "</tr>";
											}
											else
											{
												echo "<tr>";
													echo "<td>".$query2[1]."</td>";
													echo "<td>".$query2[2]."</td>";
													echo "<td>".$query2[3]."</td>";
													echo "<td>".$query2[4]."</td>";
													echo "<td>".$query2[5]."</td>";
													//echo "<td>".$query2[6]."</td>";
													echo "<td>".$query2[7]."</td>";
													echo "<td>".$query2[8]."</td>";
													echo "<td>".$query2[9]."</td>";
													//echo "<td><a href='?delete&id=".$query2[0]."'>Delete</a></td>";
													echo "<td><a href='?edit&id=".$query2[0]."'>Edit</a></td>";
												echo "</tr>";
											}
											if(isset($_POST['btnEdit']))
											{
												mysqli_query($conn, "UPDATE tbl_users SET 
													f_name='".$_POST['fn']."',
													m_name='".$_POST['mn']."',
													l_name='".$_POST['ln']."',
													email='".$_POST['email']."',
													u_name='".$_POST['user']."',
													class='".$_POST['cl']."',
													status='".$_POST['status']."' where id=".$_GET['id']);
												header("location:../Admin/index.php");
											}
										}
									}
									elseif(isset($_GET['new']))
									{
										$query1 = mysqli_query($conn, "SELECT * FROM tbl_users order by id='".$_GET['new']."' desc,id desc");
										while($query2 = mysqli_fetch_array($query1))
										{
											if($query2[0]==$_GET['new'])
											{
												echo "<tr style='background-color:#41D53C;'>";
													echo "<td>".$query2[1]."</td>";
													echo "<td>".$query2[2]."</td>";
													echo "<td>".$query2[3]."</td>";
													echo "<td>".$query2[4]."</td>";
													echo "<td>".$query2[5]."</td>";
													//echo "<td>".$query2[6]."</td>";
													echo "<td>".$query2[7]."</td>";
													echo "<td>".$query2[8]."</td>";
													echo "<td>".$query2[9]."</td>";
													//echo "<td><a href='?delete&id=".$query2[0]."'>Delete</a></td>";
													echo "<td><a href='?edit&id=".$query2[0]."'>Edit</a></td>";
												echo "</tr>";
											}
											else
											{
												echo "<tr>";
													echo "<td>".$query2[1]."</td>";
													echo "<td>".$query2[2]."</td>";
													echo "<td>".$query2[3]."</td>";
													echo "<td>".$query2[4]."</td>";
													echo "<td>".$query2[5]."</td>";
													//echo "<td>".$query2[6]."</td>";
													echo "<td>".$query2[7]."</td>";
													echo "<td>".$query2[8]."</td>";
													echo "<td>".$query2[9]."</td>";
													//echo "<td><a href='?delete&id=".$query2[0]."'>Delete</a></td>";
													echo "<td><a href='?edit&id=".$query2[0]."'>Edit</a></td>";
												echo "</tr>";
											}
										}
									}
									else
									{
										$query1 = mysqli_query($conn, "SELECT * FROM tbl_users where status='Active'");
										while($query2 = mysqli_fetch_array($query1))
										{
											echo "<tr>";
												echo "<td>".$query2[1]."</td>";
													echo "<td>".$query2[2]."</td>";
													echo "<td>".$query2[3]."</td>";
													echo "<td>".$query2[4]."</td>";
													echo "<td>".$query2[5]."</td>";
													//echo "<td>".$query2[6]."</td>";
													echo "<td>".$query2[7]."</td>";
													echo "<td>".$query2[8]."</td>";
													echo "<td>".$query2[9]."</td>";
												//echo "<td><a href='?delete&id=".$query2[0]."'>Delete</a></td>";
												echo "<td><a href='?edit&id=".$query2[0]."'>Edit</a></td>";
											echo "</tr>";
										}
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

<!--modal add account-->
<div>
	<div class="modal fade" id="addacc" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Acount</h4>
        </div>
        <div class="modal-body">
         <form method="POST" enctype="multipart/form-data">
               <form accept-charset="UTF-8" role="form" name="register"  method="POST">	
                    <fieldset>
                    	<div class="form-group">
			    		    <input class="form-control" placeholder="First Name" name="fn" type="text" autocomplete="off" autofocus required>
			    		</div>
			    		<div class="form-group">
			    		    <input class="form-control" placeholder="Middle Name" name="mn" type="text" autocomplete="off" autofocus required>
			    		</div>
			    		<div class="form-group">
			    		    <input class="form-control" placeholder="Last Name" name="ln" type="text" autocomplete="off" required >
			    		</div>
			    		<div class="form-group">
			    		    <input class="form-control" placeholder="Email Address" name="email" type="text" autocomplete="off" required >
			    		</div>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Username" name="user" type="text" autocomplete="off" required>
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="pass" type="password" value="" minlength=5 required>
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" type="text" name="token" value="<?php echo bin2hex(random_bytes(6))?>">
			    		</div>
			    		<div class="row">
			    			<div class="form-group">
			    				<div class="col-lg-2">
					    			<label>Class:</label><br>
					    		    <input type="radio" name="class" value="Admin" checked> Admin
		           					<input type="radio" name="class" value="Cashier"> Cashier
		           					<input type="radio" name="class" value="Doctor"> Doctor
		           					<input type="radio" name="class" value="Nurse"> Nurse
		           				</div>
		           				<div class="col-lg-2">
		           					<label style="opacity: 0;">Class</label><br>
		           					<input type="radio" name="class" value="Radtech"> Radtech
		           					<input type="radio" name="class" value="Medtech"> Medtech
		           					<input type="radio" name="class" value="QC"> QC
					    		</div>
					    	</div>
			    		</div>
			    	</fieldset>
        <div class="modal-footer">
               <input type="submit" class="btn btn-info"  value="Register" name="register">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
        </div>
      </div>
      
    </div>
  	</div>
</div>

<!--modal update password-->
<div>
	<div class="modal fade" id="uppass" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Password </h4>
        </div>
        <div class="modal-body">
         <form method="POST" enctype="multipart/form-data">
               <form accept-charset="UTF-8" role="form" name="register"  method="POST">	
                    <fieldset>
                    	<div class="form-group">
                    		<span><i>Old Password*</i></span>
			    		    <input class="form-control" placeholder="Old Password" name="op" type="password" autocomplete="off" autofocus required>
			    		</div>
			    		<div class="form-group">
			    			<span><i>New Password*</i></span>
			    		    <input class="form-control" placeholder="New Password" name="np" type="password" autocomplete="off" autofocus required>
			    		</div>
			    		<div class="form-group">
			    			<span><i>Enter Admin Password*</i></span>
			    		    <input class="form-control" placeholder="Admin Password" name="ap" type="password" autocomplete="off" required >
			    		</div>
			    	</fieldset>
        <div class="modal-footer">
               <input type="submit" class="btn btn-info"  value="Update" name="#">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </form>
        </div>
      </div>
      
    </div>
  	</div>
</div>


	<!--modal taken-->
	<div>
<div class="modal fade " id="taken" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <center>
                        <h4 >An account with the Same Username Already Exists!</h4>
                    </center>
                </div>
                <div class="modal-footer" style="">
                    <button type="button" class="btn btnsubmit" data-dismiss="modal" data-toggle="modal" data-target="#addacc">Okay</button>
                </div>
            </div>

        </div>
    </div>
</div>

   <!--modal succcess-->
   <div>
	<div class="modal fade " id="success" role="dialog">
	    <div class="modal-dialog">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Success</h4>
	        </div>
	        <div class="modal-body">
	            <h4>Account successfully registered!</h4>
	        <div class="modal-footer">
	              <form method="POST" enctype="multipart/form-data">
	          <button type="button" class="btn btn-info" data-dismiss="modal">Okay</button>
	        </form>
	        </div>
	      </div>
	      
	    </div>
	  </div>
	</div> 
  	</div>
</body>
</html>

<?php
if(isset($_POST['register'])){
	
				$query4=mysqli_query($conn, "SELECT * from tbl_users where u_name='".$_POST['user']."'");
				$query5=mysqli_num_rows($query4);
				if($query5==0)
				{
					$query1=mysqli_query($conn,"INSERT INTO tbl_users (f_name, m_name, l_name, email, u_name, password, status, class, token) VALUES ('".$_POST['fn']."','".$_POST['mn']."','".$_POST['ln']."','".$_POST['email']."','".$_POST['user']."','".sha1($_POST['pass'])."','Active','".$_POST['class']."','".$_POST['token']."')");
					//echo"<script>$('#success').modal('show');</script>";
					header('location:../Admin/index.php');	
				}
				else
				{
				echo"<script>$('#taken').modal('show');</script>";			
			}	
			
	}
?>
