<?php 

	include 'dbconnect.php';
	$id = $_POST['id'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$discount = $_POST['discount'];
	$brand = $_POST['brand'];
	$subcategory = $_POST['subcategory'];
	$description = $_POST['description'];
	$photo = $_FILES['photo'];
	$codeno = "CODE_".mt_rand(100000, 999999);

	$basepath = "img/items/";
	$fullpath = $basepath.$photo['name'];
	move_uploaded_file($photo['tmp_name'], $fullpath);

	$sql="UPDATE items SET codeno=:item_codeno, name=:item_name, photo=:item_photo, price=:item_price, discount=:item_discount, description=:item_description, brand_id=:item_brand, subcategory_id=:item_subcategory WHERE id = :id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->bindParam(':item_codeno',$codeno);
	$stmt->bindParam(':item_name',$name);
	$stmt->bindParam(':item_photo',$fullpath);
	$stmt->bindParam(':item_price',$price);
	$stmt->bindParam(':item_discount',$discount);
	$stmt->bindParam(':item_description',$description);
	$stmt->bindParam(':item_brand',$brand);
	$stmt->bindParam(':item_subcategory',$subcategory);
	$stmt->execute();

	if ($stmt->rowCount()) {
		header("location:item_list.php");
	}else{
		echo "Error";
	}

 ?>