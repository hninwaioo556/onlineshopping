<?php
	
	include 'dbconnect.php';
	$id = $_POST['id'];
	$name = $_POST['name'];
	$photo = $_FILES['photo'];

	$oldphoto = $_POST['oldphoto'];

	$basepath = "img/cate/";
	$fullpath = "";
	if($photo['name'] == NULL){
		$fullpath = $oldphoto;
	}else{
		 $fullpath = $basepath.$photo['name'];
		move_uploaded_file($photo['tmp_name'], $fullpath);
	}
	$sql="UPDATE categories SET name=:item_name, logo=:item_photo WHERE id=:id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->bindParam(':item_name',$name);
	$stmt->bindParam(':item_photo',$fullpath);
	$stmt->execute();

	if ($stmt->rowCount()) {
		header("location:cate_list.php");
	}else{
		echo "Error";
	}
?>