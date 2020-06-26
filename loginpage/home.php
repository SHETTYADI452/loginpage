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
</head>

<body style="background-image: linear-gradient( 99.6deg,  rgba(112,128,152,1) 10.6%, rgba(242,227,234,1) 32.9%, rgba(234,202,213,1) 52.7%, rgba(220,227,239,1) 72.8%, rgba(185,205,227,1) 81.1%, rgba(154,180,212,1) 102.4% )">

    <div id="main-wrapper">


        <div class="head">
            <center><img src="cynthians.jpg" class="logo" /></center>
        </div>
        <div class="header">
         <center></center>   <h2>User page </h2>
        </div>

        <form class="myform" action="home.php" method="post">
        <center><h3>Welcome <?php echo $_SESSION['username']; ?></h3></center> 
           <center><button name="logout" id="logout_btn" type="submit">Log Out</button><br></center>
           
        </form>
        <?php
			if(isset($_POST['logout'])){
                session_destroy();
                header( "Location: index.php");
            }
        ?>
       
        </div>



</body>

</html>