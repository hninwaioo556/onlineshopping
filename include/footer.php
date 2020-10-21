
<!-- Footer -->
	<footer class="bg-light pt-4 mt-5">
		<div class="container">
			<div class="row">
				<div class="col-md-6 text-left">
					<p>All Right Reserved Design By HNIN</p>
				</div>
				<div class="col-md-6 text-right">
					<i class="fab fa-facebook-square fa-2x"></i>
					<i class="fab fa-twitter-square fa-2x"></i>
					<i class="fab fa-instagram-square fa-2x"></i>
				</div>
			</div>
		</div>
	</footer>	

<!-- Detail Modal -->
<div class="modal fade" id="product_detail">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h3>Item Detail</h3>
				<button class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<img src="" class="img-fluid pimg">
						</div>
						<div class="col-md-6">
							<h4>Item Infomations</h4>
							<p class="pname"></p>
							<p class="pbrand"></p>
							<p class="psubcategory"></p>
							<p class="pprice"></p>
							<p class="pdiscount"></p>
							<p class="pdescription"></p>
			
							<div class="form-group">
								<label for="qty">Qty</label>
								<input type="number" name="" id="qty" class="form-control w-50">
							</div>
							<button class="btn btn-outline-success">Buy Now</button>
							<button class="btn btn-outline-success addtocart cart_data">Add To Cart</button>

						</div>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<button class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
			</div>

		</div>
	</div>
</div>


<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>