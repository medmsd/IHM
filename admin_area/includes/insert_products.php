<?php require_once 'includes/header.php';?>
<?php
if (isset($_POST['submit'])) {
    $product_title = $_POST['product_title'];
    $manufacturer_id = $_POST['manufacturer'];
    $product_cat = $_POST['product_cat'];
    $cat_id = $_POST['cat'];
    $product_price = $_POST['product_price'];
    $product_psp_price = $_POST['product_psp_price'];
    $product_desc = $_POST['product_desc'];
    $product_features = $_POST['product_features'];
    $product_video = $_POST['product_video'];
    $product_keywords = $_POST['product_keywords'];
    $product_label = $_POST['product_label'];
	$status = 'product';
	$colors = $_POST['colors'];
	$sizes = $_POST['sizes'];

    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];

    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];

    move_uploaded_file($temp_name1, "product_images/$product_img1");
    move_uploaded_file($temp_name2, "product_images/$product_img2");
    move_uploaded_file($temp_name3, "product_images/$product_img3");

    $insert_product = $getFromU->create("products", array("p_cat_id" => $product_cat, "cat_id" => $cat_id, "manufacturer_id" => $manufacturer_id, "add_date" => date("Y-m-d H:i:s"), "product_title" => $product_title, "product_img1" => $product_img1, "product_img2" => $product_img2, "product_img3" => $product_img3, "product_price" => $product_price, "product_psp_price" => $product_psp_price, "product_desc" => $product_desc, "product_features" => $product_features, "product_video" => $product_video, "product_keywords" => $product_keywords, "product_label" => $product_label, "status" => $status, "colors" => $colors, "sizes" => $sizes));
    if ($insert_product) {
        echo '<script>alert("Product has been added Sucessfully")</script>';
        echo '<script>window.open("index.php?add_product", "self")</script>';
    } else {
        echo '<script>alert("Product has not added")</script>';
    }

}

?>



<nav aria-label="breadcrumb" class="my-4">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Insert Products</li>
	</ol>
</nav>



<div class="card rounded">
	<div class="card-header bg-light h5"><i class="fas fa-plus-square"></i> Insert Products</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="product_title">Product Title</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="product_title" class="form-control" id="product_title" placeholder="Product Title" required>
				      <div class="invalid-feedback">
				        Please provide a Product Title.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
						<div class="col-3">
							<label for="manufacturer">Manufacturer</label>
						</div>
						<div class="col-md-9">
							<select name="manufacturer" id="manufacturer" class="form-control" required>
								<option value="">----- Select a Manufacturer -----</option>
								<?php
$manufacturers = $getFromU->viewAllFromTable("manufacturers");
foreach ($manufacturers as $manufacturer) {
    $manufacturer_id = $manufacturer->manufacturer_id;
    $manufacturer_title = $manufacturer->manufacturer_title;
    ?>
								<option value="<?php echo $manufacturer_id; ?>"><?php echo $manufacturer_title; ?></option>
								<?php }?>
							</select>
							<div class="invalid-feedback">
								Please select a Manufacturer.
							</div>
						</div>
					</div>

					<div class="form-row mb-3">
						<div class="col-3">
							<label for="product_cat">Product Categories</label>
						</div>
						<div class="col-md-9">
							<select name="product_cat" id="product_cat" class="form-control" required>
								<option value="">----- Select a Product Category -----</option>
								<?php
$p_categories = $getFromU->viewAllFromTable("product_categories");
foreach ($p_categories as $p_category) {
    $p_cat_id = $p_category->p_cat_id;
    $p_cat_title = $p_category->p_cat_title;
    ?>
								<option value="<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></option>
								<?php }?>
							</select>
							<div class="invalid-feedback">
								Please select a Product Categories.
							</div>
						</div>
					</div>

					<div class="form-row mb-3">
						<div class="col-md-3">
							<label for="cat">Categories</label>
						</div>
						<div class="col-md-9">
							<select name="cat" id="cat" class="form-control" required>
								<option value="">----- Select a Category -----</option>
								<?php
$categories = $getFromU->viewAllFromTable("categories");
foreach ($categories as $category) {
    $cat_id = $category->cat_id;
    $cat_title = $category->cat_title;
    ?>
								<option value="<?php echo $cat_id; ?>"><?php echo $cat_title; ?></option>
								<?php }?>
							</select>
							<div class="invalid-feedback">
								Please select a Categories.
							</div>
						</div>
					</div>


				  <div class="form-row mb-3">
				    <div class="col-md-3">
				      <label for="product_img1">Product Image 1</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="file" name="product_img1"  id="product_img1" required>
				      <div class="invalid-feedback">
				        Please provide a Product Image 1.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-md-3">
				      <label for="product_img2">Product Image 2</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="file" name="product_img2"  id="product_img2" required>
				      <div class="invalid-feedback">
				        Please provide a Product Image 2.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-md-3">
				      <label for="product_img3">Product Image 3</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="file" name="product_img3"  id="product_img3" required>
				      <div class="invalid-feedback">
				        Please provide a Product Image 3.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="colors">Colors</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="colors" class="form-control" id="colors" placeholder="colors" required>
				      <div class="invalid-feedback">
				        Please provide a colors.
				      </div>
				    </div>
				  </div>
				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="sizes">sizes</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="sizes" class="form-control" id="sizes" placeholder="sizes" required>
				      <div class="invalid-feedback">
				        Please provide a sizes.
				      </div>
				    </div>
				  </div>
				  

					<div class="form-row mb-3">
				    <div class="col-md-3">
				      <label for="product_price">Product Price</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="number" name="product_price" class="form-control" id="product_price" placeholder="Enter Product Price" required>
				      <div class="invalid-feedback">
				        Please provide a Product Price.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-md-3">
				      <label for="product_price">Product Sale Price</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="number" name="product_psp_price" class="form-control" id="product_price" placeholder="Enter Product Sale Price" required>
				      <div class="invalid-feedback">
				        Please provide a Product Sale Price.
				      </div>
				    </div>
				  </div>

					<div class="form-row mb-3">
				    <div class="col-md-3 ">
				      <label for="product_desc">Product Tabs</label>
				    </div>
				    <div class="col-md-9">
				    	<ul class="nav nav-tabs" id="myTab" role="tablist">
							  <li class="nav-item">
							    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Product Description</a>
							  </li>
							  <li class="nav-item">
							    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Product Features</a>
							  </li>
							  <li class="nav-item">
							    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Product Video</a>
							  </li>
							</ul>
							<div class="tab-content" id="myTabContent">
							  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							  	<textarea name="product_desc" class="form-control summernote" rows="15" id="product_desc" placeholder="Enter Product Description" required></textarea>
						      <div class="invalid-feedback">
						        Please provide Product Description.
						      </div>
							  </div>
							  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
							  	<textarea name="product_features" class="form-control summernote" rows="15"  id="product_features" placeholder="Enter Product Video" required></textarea>
						      <div class="invalid-feedback">
						        Please provide Product Features.
						      </div>
							  </div>
							  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
							  	<textarea name="product_video" class="form-control summernote" rows="15" id="product_video" placeholder="Enter Product Video" required></textarea>
						      <div class="invalid-feedback">
						        Please provide Product Video.
						      </div>
							  </div>
							</div>

				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-3 ">
				      <label for="product_keywords">Product Keyword</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="product_keywords" class="form-control" id="product_keywords" placeholder="Enter Product Keyword" required>
				      <div class="invalid-feedback">
				        Please provide Product Keyword.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-3 ">
				      <label for="product_label">Product Label</label>
				    </div>
				    <div class="col-md-9">
				    	<select name="product_label" id="product_label" class="form-control" required>
				      	<option value="">--- Select Product Label ---</option>
				      	<option value="New">New</option>
				      	<option value="Sale">Sale</option>
				      	<option value="Gift">Gift</option>
				      </select>
				      <div class="invalid-feedback">
				        Please Select Product Label.
				      </div>
				    </div>
				  </div>


				  <div class="row">
				  	<div class="col-12 my-5">
				  		<button class="btn btn-info form-control" name="submit" type="submit"><i class="fas fa-plus-circle"></i> Insert Product</button>
				  	</div>
				  </div>
				</form>
			</div>
		</div>

		<script>
			// Example starter JavaScript for disabling form submissions if there are invalid fields
			(function() {
			  'use strict';
			  window.addEventListener('load', function() {
			    // Fetch all the forms we want to apply custom Bootstrap validation styles to
			    var forms = document.getElementsByClassName('needs-validation');
			    // Loop over them and prevent submission
			    var validation = Array.prototype.filter.call(forms, function(form) {
			      form.addEventListener('submit', function(event) {
			        if (form.checkValidity() === false) {
			          event.preventDefault();
			          event.stopPropagation();
			        }
			        form.classList.add('was-validated');
			      }, false);
			    });
			  }, false);
			})();
		</script>
	</div>
</div>





<?php require_once 'includes/footer.php';?>


<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

<script>
  $(document).ready(function() {
      $('.summernote').summernote();
  });
</script>