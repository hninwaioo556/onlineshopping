<?php
	
	include 'dbconnect.php';
	$id = $_POST['id'];
	$name = $_POST['name'];
	$category_id = $_POST['category_id'];

	$sql="UPDATE subcategories SET name=:item_name, category_id=:category_id WHERE id=:id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->bindParam(':item_name',$name);
	$stmt->bindParam(':category_id',$category_id);
	$stmt->execute();

	if ($stmt->rowCount()) {
		header("location:subcategory_list.php");
	}else{
		echo "Error";
	}


?>
