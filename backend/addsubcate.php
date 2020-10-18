<?php 
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
	include 'dbconnect.php';

	$name = $_POST['name'];
	$category_id = $_POST['category_id'];

	$sql="INSERT INTO subcategories (name,category_id) VALUES(:item_name,:category_id)";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':item_name',$name);
	$stmt->bindParam(':category_id',$category_id);
	$stmt->execute();
	
	if ($stmt->rowCount()) {
		header("location:subcate_list.php");
	}else{
		echo "Error";
	}

	}else{
	header("location:index.php");
	}


?>