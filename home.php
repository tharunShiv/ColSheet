﻿<!Doctype HTML>
<?php
  //establish connection
	session_start();
//the config file
//establish connection
	require_once('dbconfig/config.php');
	//phpinfo();
	if($_SESSION['user_login_status']){
?>
<html>
<head>
<title>Welcome | ColSheet</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" type="text/css" href="./css/style2.css?version=1">
<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
</head>
<body>

<div class="container-fluid">
	<header>


		<div class="navbar">
		<div class="name navbar-header">
						<a href="index.php" class="navbar-brand"><span style="color:black;font-size:26px;">Col</span><span style="color:#1ec87e;font-size:23px;">Sheet</span></a>
				</div>


				<form class="navbar-form  navbar-left" method="POST" action="searchresults.php">
					 <div class="form-group">
						 <input class="header-search" name="squery" type="text"  placeholder="Search yourself..."  />
					                  <input type="submit" value="Search" name="search" class="btn navbar-btn search-button-index"/>
					 <!--<input type="text" class="form-control" placeholder="Search..."/>
						<button type="submit" class="btn btn-default navbar-btn">Search</button>
						---> </div>
				</form>

<!--
        <div style="margin-top:2%;width:50%;display:inline-block;float:left;" class="">
          <form method="POST" action="searchresults.php">
	<input class="header-search" name="squery" type="text" style="width:50%;" placeholder="Search yourself..."  />
                 <input type="submit" value="Search" name="search" style="width:20%;" class="search-button-index"/><br/><br/>
           </form>
				 </div>--->
<div class="buttons" style="width:50%;" >

           <form  method="post" action="home.php">
          <button type="submit" class="btn header-buttons" style="width:70%;" name="logout">logout</button>
    </form>




        </div>
        </header>
			</div>
<hr/>

<div class="container" style="text-align:center;">

<div class="row">



<div class="col-xs-12 col-sm-4 col-md-4 ">
<aside style="border-left:1px solid #1ec87e">

    <h3 style="text-align:center;"> Welcome <span style="color:#1ec87e"><?php echo $_SESSION["username"]; ?></span></h3>

    <?php
    if(!$_SESSION['scholar']){
       $username = $_SESSION['username'];
       //echo $username;
         $q = mysqli_query($con,"SELECT * FROM users WHERE username='$username'");
         //while($row = mysqli_fetch_assoc($q)){
            $row = mysqli_fetch_assoc($q);
                // echo $row['username'];
                 if($row['image'] == ""){
                         echo "<img width='100' class='profilepic'  height='100' src='image/default-profile-picture.png' alt='Default Profile Pic'>";
                 } else {
                    echo "<img width='100' height='100' class='profilepic'  src='image/profilepic/".$row['image']."' alt='Profile Pic'>";
                 }
                 echo "<br>";
         //}
                }else{
                    $username = $_SESSION['username'];
                    //echo $username;
                      $q = mysqli_query($con,"SELECT * FROM usersp WHERE username='$username'");
                      //while($row = mysqli_fetch_assoc($q)){
                         $row = mysqli_fetch_assoc($q);
                             // echo $row['username'];
                              if($row['image'] == ""){
                                      echo "<img width='100' class='profilepic'  height='100' src='image/default-profile-picture.png' alt='Default Profile Pic'>";
                              } else {
                                 echo "<img width='100' height='100' class='profilepic'  src='image/profilepic/".$row['image']."' alt='Profile Pic'>";
                              }
                              echo "<br>";
                      //}

                }
     ?>
<hr/>
<ul style="list-style-type:none;">
<h4>My Dashboard</h4>
<li><a href="editp.php" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">edit my profile</a></li>
<li><a href="viewp.php" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">view my profile</a></li>

</ul><hr/>
<ul style="list-style-type:none;">
<h4>Co-Scholars</h4>
<li><a href="" style="color:#1ec87e;
    text-decoration: none; font-size:18px;">view my co scholars</a></li>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">explore co scholars</a></li>

</ul><hr/>
<ul style="list-style-type:none;">
<h4>publications</h4>
<li><a href="mypublications.php" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">my publications</a></li>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">co scholar publications</a></li>

</ul ><hr/>
<ul style="list-style-type:none;">
<h4>workshops</h4>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">my workshops</a></li>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">co scholar workshops</a></li>

</ul>
<hr/>
<ul style="list-style-type:none;">
<h4>seminars</h4>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">upcomming seminars</a></li>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">add my seminars</a></li>

</ul>

</aside>

</div>



















<div class="col-xs-12  col-sm-4 col-md-4 ">
<section class="main-middle">
<?php if(isset($_GET['msg'])){?>
			<div class="alertmsg">
	           <p style="color:green;"> Status:<?php echo $_GET['msg']; ?></p>
			</div>
		<?php } ?><br/><br/>
    <h2>Upload Your Publication</h2>

		<form action="upload.php" method="POST" enctype="multipart/form-data">
			<div class="form-group">
			<input class="form-control inputField" type="text" placeholder="Publication Name" name="pname" required/>
			<br/><input class="form-control inputField" type="date" placeholder="Date Published" name="pyear" required/>
		<br/>
			<textarea class="form-control inputField" name="comments" placeholder="About This Publication(optional)" rows="4" cols="50"></textarea>
    <br/><br/><p style="color:#1ec87e;font-weight:bold;">Choose A File To Upload</p>
    <div style="text-align:center;">
		<input class="btn btn-default" type="file" name="file" style="text-align:center;width:100%;" required><br/><br/>
	</div>
		<button class="btn upbutton" type="submit" name="submit">Upload File</button>
	</div>

	</form><br/>
	<hr style="width:70%;">
      <p style="text-align:center;color:#1ec87e;font-weight:bold;">(OR)</p>
			<hr style="width:70%;"><br/><br/>
			<form action="home.php" method="POST" >
				<div class="form-group">
         <label style="color:#1ec87e;font-weight:bold;">Enter a Link to the Publication</label><br/><br/>
				 <input class="form-control inputField" type="text" placeholder="URL" name="purl" required/><br/>
				 <input class="form-control inputField" type="text" placeholder="Publication Name" name="pname" required/><br/>
	 			<input class="form-control inputField" type="date" placeholder="Date Published" name="pyear" required/><br/>
	 			<textarea class="form-control inputField" name="comments" placeholder="About This Publication(optional)" rows="4" cols="50"></textarea><br/>
         <button class="btn upbutton" type="submit" name="submit">Submit</button>
			 </div><br/><br/>
			</form>


</section>
</div>

<?php
    if(isset($_POST['submit'])){
        $purl = $_POST['purl'];
        $pname = $_POST['pname'];
        $pdate = $_POST['pyear'];
        $comments = $_POST['comments'];
        $username = $_SESSION['username'];

        $q = mysqli_query($con, "INSERT INTO userspd(username,pname,pdate,purl,pcomment) values ('$username','$pname','$pdate','$purl','$comments')");
        if($q){
            header("Location: home.php?url+ins+success");
        }else{
            header("Location: home.php?db+error+123");
        }
    }
?>

<br/><br/>

<div class="col-xs-12 col-sm-4 col-md-4 " style="margin-top:15px;">
<aside class="left" style="border-right:1px solid #1ec87e">
<ul style="list-style-type:none;">
<h4>most viewed publications</h4>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">an intro to space</a></li>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">big data</a></li>

</ul><hr/>
<ul style="list-style-type:none;">
<h4>latest publications</h4>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">cloud computing</a></li>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">nutrition </a></li>

</ul><hr/>
<ul style="list-style-type:none;">
<h4>editors choice</h4>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">Machine Learning</a></li>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">Android Is Cool</a></li>

</ul>
</aside>
</div>
</div>
</div>

<?php } else{/*
	session_unset(); //unsets all variables
    session_destroy();
    $_SESSION['user_login_status'] = false;
    */
	header("location: index.php?msg=Logged+Out+Successfully");
}?>

<?php

    if(isset($_POST['logout'])){

			       $_SESSION['user_login_status'] = false;

						// session_unset(); //unsets all variables
              //session_destroy();

        session_destroy();
    echo '<script type="application/javascript"> alert ("You have been logged out successfully");  </script>';
    header("Location: index.php?msg=Logged+Out+Successfully");
        //session_destroy();
    }
           ?>


	<footer style="height:100px;">
	</footer>
</body>
</html>
