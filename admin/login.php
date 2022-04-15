<?php  if (isset($_COOKIE["PHPADLGADP"])) {
    header("location:index.php?rd");
} ?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" media="screen" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="container">
	<section id="row">
		<form action="login_core.php" class="col-sm-6 mx-auto card bg-seconday" method="post">
			<h1 class="text-center" >Admin Login</h1>
			<div>
				<input type="text" class="form-control" placeholder="User Name" required="" name="emailaddr"/>
			</div>
			<div>
				<input type="password" class="form-control my-3" placeholder="Password" required="" name="pwd"/>
			</div>
			<?php 
          if (isset($_REQUEST["wrongUsrPwd"])) { echo '<div style="color: red;font-weight:700;margin:10px;text-align:center;">Wrong User Or Password!</div>';} ?>
			
			<div>
				<input type="submit" class="btn btn-success btn-block"  value="Log in" />
			</div>
<a href="../">Alor Dishari Publications</a>
		</form>
		
	</section><!-- content -->
</div><!-- container -->
</body>
</html>
