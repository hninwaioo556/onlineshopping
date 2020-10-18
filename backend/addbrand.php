<?php
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	
	include 'dbconnect.php';

	$name = $_POST['name'];
	$photo = $_FILES['photo'];

	$basepath = "img/brands/";
	$fullpath = $basepath.$photo['name'];
	move_uploaded_file($photo['tmp_name'], $fullpath);

	$sql="INSERT INTO brands (name,photo) VALUES(:item_name,:item_photo)";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':item_name',$name);
	$stmt->bindParam(':item_photo',$fullpath);
	$stmt->execute();

	if ($stmt->rowCount()) {
		header("location:brand_list.php");
	}else{
		echo "Error";
	}

	}else{
	header("location:index.php");
	}

?>