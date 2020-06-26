<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>
<!DOCTYPE html>

<html>

<head>
    <title>Registration PAGE</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body style="background-image: linear-gradient( 99.6deg,  rgba(112,128,152,1) 10.6%, rgba(242,227,234,1) 32.9%, rgba(234,202,213,1) 52.7%, rgba(220,227,239,1) 72.8%, rgba(185,205,227,1) 81.1%, rgba(154,180,212,1) 102.4% );">

    <div id="main-wrapper">


        <div class="head">
            <center><img src="cynthians.jpg" class="logo" /></center>
        </div>
        <div class="header">
            <h2> Faculty Registration Form</h2>
        </div>
        <div class="inst-fac">
			<div id="fbtn"></div>
            <a href="index.php"><button type="button" class="ins">Institute</button></a>
            <button type="button" class="ins">Faculty</button>
        </div>


        <form class="myform" action="facultyreg.php" method="post">
            <div class="username">
                <div class="user">Faculty Name</div>
                <input  name="facultyname" type="text" class="inputvalues" placeholder="Enter your Username" required/>
            </div>
            <div class="password">
                <div class="pass">ID Password</label>
                    <input name="id_password" type="password" class="inputvalues" placeholder="Enter your password" required/>
                </div>
                <div class="cpass"> Confirm ID Password</label>
                    <input name="cid_password" type="password" class="inputvalues" placeholder="Confirm password" required/>
                </div>

                <div class="Rlast">
                    <button name="submit_btn" id="login_btn" type="submit">Sign Up</button>
					<a href="Faculty.php"><button type="button" id="register_btn"><< Login page</button></a>
                </div>
            </div>
        </form>
        <?php
            if(isset($_POST['submit_btn']))
            {
                @$facultyname=$_POST['facultyname'];
				@$id_password=$_POST['id_password'];
				@$cid_password=$_POST['cid_password'];
				
				if($id_password==$cid_password)
				{
					$query = "select * from faculty_name where facultyname='$facultyname'";
					//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
					{
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
						}
						else
						{
							$query = "insert into faculty_name values('$facultyname','$id_password')";
							$query_run = mysqli_query($con,$query);
							if($query_run)
							{
								echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';
								$_SESSION['facultyname'] = $facultyname;
								$_SESSION['id_password'] = $id_password;
								header( "Location: admin.php");
							}
							else
							{
								echo '<p class="bg-danger msg-block">Registration Unsuccessful due to server error. Please try later</p>';
							}
						}
					}
					else
					{
						echo '<script type="text/javascript">alert("DB error")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
					
				}
				
			}
        ?>
        </div>



</body>

</html>