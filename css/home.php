﻿<!Doctype HTML>
<?php
  //establish connection
	session_start();
//the config file
//establish connection
	require_once('dbconfig/config.php');
	//phpinfo();
	if(isset($_SESSION['user_login_status'])){
?>
<html>
<head>
<title>Welcome | ColSheet</title>
<link rel="stylesheet" type="text/css" href="./css/style2.css">
</head>
<body>
	<header>


		  <div class="name">
              <h1>Col<span style="color:#1ec87e">Sheet</span></h1>

          </div>
<div class="buttons">
	<input class="header-search" type="text" placeholder="Search yourself..."  />
                 <input type="submit" value="Search" class="search-button-index"/><br/><br/>
           <form  method="post" action="home.php">
          <input type="submit" class="header-buttons" name="logout"  value="LogOut"/>
    </form>


        </div>
        </header>
<hr/>

<aside>

    <h3 style="text-align:center;"> Welcome <span style="color:#1ec87e"><?php echo $_SESSION["username"]; ?></span></h3>

<img src="image/default-profile-picture.png" alt="user image" class="profilepic">
<hr/>
<ul style="list-style-type:none;">
<p>My Dashboard</p>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">edit my profile</a></li>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">veiw my profile</a></li>

</ul><hr/>
<ul style="list-style-type:none;">
<p>Co-Scholars</p>
<li><a href="" style="color:#1ec87e;
    text-decoration: none; font-size:18px;">view my co scholars</a></li>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">explore co scholars</a></li>

</ul><hr/>
<ul style="list-style-type:none;">
<p>publications</p>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">my publications</a></li>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">co scholar publications</a></li>

</ul ><hr/>
<ul style="list-style-type:none;">
<p>workshops</p>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">my workshops</a></li>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">co scholar workshops</a></li>

</ul>
<hr/>
<ul style="list-style-type:none;">
<p>seminars</p>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">upcomming seminars</a></li>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">add my seminars</a></li>

</ul>

</aside>


<section class="main-middle">
    <h2>Upload Your Publication</h2>

		<form action="upload.php" method="POST" enctype="multipart/form-data">
			<input class="inputField" type="text" placeholder="Publication Name" name="pname" required/>
			<input class="inputField" type="date" placeholder="Date Published" name="pyear" required/><br/><br/>
			<textarea class="inputField" name="comments" placeholder="About This Publication(optional)" rows="4" cols="50"></textarea>
    <br/><br/><p style="color:#1ec87e;font-weight:bold;">Choose A File To Upload</p><input  type="file" name="file"/><br/><br/>
		<button class="upbutton" type="submit" name="submit">Upload File</button>

	</form><br/>
	<hr style="width:70%;">
      <p style="text-align:center;color:#1ec87e;font-weight:bold;">(OR)</p>
			<hr style="width:70%;"><br/><br/>
			<form action="" method="POST" >
         <label style="color:#1ec87e;font-weight:bold;">Enter a Link to the Publication</label><br/><br/>
				 <input class="inputField" type="text" placeholder="URL" name="purl" required/><br/><br/>
				 <input class="inputField" type="text" placeholder="Publication Name" name="pname" required/>
	 			<input class="inputField" type="date" placeholder="Date Published" name="pyear" required/><br/><br/>
	 			<textarea class="inputField" name="comments" placeholder="About This Publication(optional)" rows="4" cols="50"></textarea><br/><br/>
         <button class="upbutton" type="submit" name="submit">Submit</button>
			</form>
	<?php if(isset($_GET['msg'])){?>
			<div class="alertmsg">
	           <p style="color:green;"> Status:<?php echo $_GET['msg']; ?></p>
			</div>
		<?php } ?>

</section>




<aside class="left">
<ul style="list-style-type:none;">
<p>most viewed publications</p>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">an intro to space</a></li>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">big data</a></li>

</ul><hr/>
<ul style="list-style-type:none;">
<p>latest publications</p>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">cloud computing</a></li>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">nutrition </a></li>

</ul><hr/>
<ul style="list-style-type:none;">
<p>editors choice</p>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">Machine Learning</a></li>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">Android Is Cool</a></li>

</ul>
</aside>

<?php

    if(isset($_POST['logout'])){
		   	header("location: index.php");
			       $_SESSION['user_login_status'] = false;

						// session_unset(); //unsets all variables
              //session_destroy();
    echo '<script type="application/javascript"> alert ("You have been logged out successfully"); </script>';

        session_destroy();
    }
           ?>
<?php } else{
	header("location: index.php");
}?>

</body>
</html>
