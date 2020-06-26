<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>
<!DOCTYPE html>

<html>

<head>
    <title>LOGIN PAGE</title>
    <link rel="stylesheet" href="css/style.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body style="background-image: linear-gradient( 99.6deg,  rgba(112,128,152,1) 10.6%, rgba(242,227,234,1) 32.9%, rgba(234,202,213,1) 52.7%, rgba(220,227,239,1) 72.8%, rgba(185,205,227,1) 81.1%, rgba(154,180,212,1) 102.4% );
">

    <div id="main-wrapper">


        <div class="head">
            <center><img src="cynthians.jpg" class="logo" /></center>
        </div>
        <div class="header">
            <h2>Login Form</h2>
        </div>
        <div class="inst-fac">
			<div id="btn"></div>
            <button type="button" class="ins">Institute</button>
            <a href="Faculty.php"><button type="button" class="ins">Faculty</button></a>
        </div>

		
        <form id="login" class="myform" action="index.php" method="post">
            <div class="username">
			<div class="user">Username</div>
               <input name="username" type="text" class="inputvalues" placeholder="Enter your Username" required/>
            </div>
            <div class="password">
                <div class="pass">Password</label>
                    <input name="password" type="password" class="inputvalues" placeholder="Enter your password" required/>
                </div>
                <div class="last">
                    <button id="login_btn" name="login" type="submit">Log me in</button>
				    <a href="registration.php"><button type="button" id="register_btn">Register user</button></a>
                </div>
		</form>
		
        <?php
			if(isset($_POST['login']))
			{
				@$username=$_POST['username'];
				@$password=$_POST['password'];
				$query = "select * from user_info where username='$username' and password='$password' ";
				//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
					
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					
					header( "Location: home.php");
					}
					else
					{
						echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
			else
			{
			}
		?>
    </div>

</body>

</html>