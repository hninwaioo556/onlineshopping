<?php 

session_start();
if (isset($_SESSION['loginuser']) && $_SESSION['loginuser']['role_name']=="Admin") {

include 'include/header.php';
include 'dbconnect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM categories WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam('id', $id);
$stmt->execute();
$category = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!-- Page Heading -->
	<div class="d-sm-flex justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Category Edit</h1>
		<a href="cate_list.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-chevron-left text-white-50 mx-1"></i>Go Back</a>
	</div>

	<div class="row">
		<div class="offset-md-2 col-md-8">
			<form action="updatcate.php" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $category['id']; ?>">
				<div class="form-group">
					<label for="name">Category Name</label>
					<input type="text" name="name" id="name" class="form-control" value="<?php echo $category['name']?>">
				</div>
				<div class="form-group">
					<label for="photo">Category Photo</label>
					<input type="file" name="photo" id="photo" class="form-control-file" accept="image/*">
					<input type="hidden" name="oldphoto" value="<?php echo $category['logo']; ?>">
					<img src="<?php echo $category['logo']; ?>" width="150px" height="150px">
				</div>
				<input type="submit" name="save" value="Save" class="btn btn-primary float-right">
			</form>
		</div>
	</div>

<?php 

include 'include/footer.php';
}else{
  header("location:../index.php");
}
?>