<?php 

session_start();
if (isset($_SESSION['loginuser']) && $_SESSION['loginuser']['role_name']=="Admin") {


include 'include/header.php';
include 'dbconnect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM brands WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam('id', $id);
$stmt->execute();
$brand = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!-- Page Heading -->
	<div class="d-sm-flex justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Brand Edit</h1>
		<a href="brand_list.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-chevron-left text-white-50 mx-1"></i>Go Back</a>
	</div>

	<div class="row">
		<div class="offset-md-2 col-md-8">
			<form action="updatebrand.php" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $brand['id']; ?>">
				<div class="form-group">
					<label for="name">Brand Name</label>
					<input type="text" name="name" id="name" class="form-control" value="<?php echo $brand['name'] ?>">
				</div>
				<div class="form-group">
					<label for="photo">Brand Photo</label>
					<input type="file" name="photo" id="photo" class="form-control-file" accept="image/*">
					<input type="hidden" name="oldphoto" value="<?php echo $brand['photo']; ?>">
					<img src="<?php echo $brand['photo']; ?>" width="150px" height="150px">
				</div>
				<input type="submit" name="save" value="Save" class="btn btn-success float-right">
			</form>
		</div>
	</div>

<?php 

include 'include/footer.php';
}else{
  header("location:../index.php");
}
?>