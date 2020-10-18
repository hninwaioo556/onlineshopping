<?php 
	session_start();

	include 'backend/dbconnect.php';
	$sql="SELECT * FROM categories";
	$stmt=$pdo->prepare($sql);
	$stmt->execute();
	$categories=$stmt->fetchAll();


?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Store</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="product-carousel/css/style.css">
	<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
</head>
<body>

<!-- Navigation -->
	<nav class="navbar navbar-expand-md navbar-light bg-light menu py-3 fixed-top menu">
		<div class="container">
			<a href="index.html" class="navbar-brand">Online Store</a>
			<button class="navbar-toggler" data-toggle="collapse" data-target="#mainMenu">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="mainMenu">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a href="index.php" class="nav-link">HOME</a></li>
					<li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          CATEGORIES
				        </a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
				        	<?php 

				        	foreach ($categories as $category) {
				        		
				        	?>
				        		<a class="dropdown-item" href="cate.php?id=<?=$category['id']?>"><?=$category['name']?></a>
					       	<?php } ?>
				          
				        </div>
				      </li>
					<li class="nav-item"><a href="item.php" class="nav-link">ITEMS</a></li>
					<li class="nav-item"><a href="contact.html" class="nav-link">ABOUT</a></li>
					<?php 
						if (isset($_SESSION['loginuser'])) {
						
					?>
					<li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          <?= $_SESSION['loginuser']['name']; ?>
				        </a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				          <a class="dropdown-item" href="#">Profile</a>
				          <a class="dropdown-item" href="backend/logout.php">Logout</a>
				          
				        </div>
				      </li>
				      <?php 
				      	}else{
				      ?>
					<li class="nav-item"><a href="backend/login.php" class="nav-link">LOGIN</a></li>
					<li class="nav-item"><a href="backend/register.php" class="nav-link">REGISTER</a></li>
				<?php } ?>

					<li class="nav-item">
						<a href="checkout.php" class="nav-link" id="count">
							<span class="p1 fa-stack has-badge" id="item_count">
								<i class="p3 fa fa-shopping-cart fa-stack-1x xfa-inverse"></i>
							</span>
						
						</a>
					</li>
				</ul>
				
			</div>


		</div>
	</nav>