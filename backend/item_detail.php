<?php 

	session_start();
    if (isset($_SESSION['loginuser']) && $_SESSION['loginuser']['role_name']=="Admin") {

	include 'include/header.php';
	include 'dbconnect.php';

	$id = $_GET['id'];

	$sql = "SELECT items.*, brands.name as brand_name, subcategories.name as sub_name FROM items INNER JOIN
	brands ON items.brand_id = brands.id INNER JOIN subcategories ON items.subcategory_id = subcategories.id WHERE items.id = :id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id', $id);
	$stmt->execute();
	$item=$stmt->fetch(PDO::FETCH_ASSOC);

 ?>

<!-- Page Heading -->
	<div class="d-sm-flex justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Item Detail</h1>
		<a href="item_list.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-chevron-left text-white-50 mx-1"></i>Go Back</a>
	</div>

	<div class="row">
		<div class="col-md-4">
			<img src="<?php echo $item['photo']; ?>" class="img-fluid">
		</div>
		<div class="col-md-8">
			<h3>Item Name: <?php echo $item['name']; ?></h3>
			<h3>Item Brand: <?php echo $item['brand_name']; ?></h3>
			<h3>Item Category: <?php echo $item['sub_name']; ?></h3>
			<h3>
				Item Price: 
				<?php
				if($item['discount']){
					echo $item['discount']." MMK";
				?>
					<s><?php echo $item['price']." MMK";?></s>
				<?php }else{

				?>
					<?php echo $item['price']." MMK";?>
				<?php } ?>
			</h3>
			<h4>Item Description</h4>
			<p><?php echo $item['description']; ?></p>
		</div>
	</div>

<?php  
  include 'include/footer.php';

}else{
  header("location:../index.php");
}
?>
