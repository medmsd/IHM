<?php require_once 'includes/header.php';?>
<?php
if (isset($_POST['add_p_cat'])) {
    $p_cat_title = $getFromU->checkInput($_POST['p_cat_title']);
    $p_cat_top = $getFromU->checkInput($_POST['p_cat_top']);

    $p_cat_image = $_FILES['p_cat_image']['name'];
    $temp_name = $_FILES['p_cat_image']['tmp_name'];

    move_uploaded_file($temp_name, "other_images/$p_cat_image");

    $insert_product_cat = $getFromU->create("product_categories", array("p_cat_title" => $p_cat_title, "p_cat_top" => $p_cat_top, "p_cat_image" => $p_cat_image));

    if ($insert_product_cat) {
        $_SESSION['insert_product_cat_msg'] = "Product Category has been added Sucessfully";
        header('Location: index.php?view_p_cats');

    } else {
        echo '<script>alert("Product Category has not added")</script>';
    }

}

?>



<nav aria-label="breadcrumb" class="my-4">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Insert Product Category</li>
	</ol>
</nav>



<div class="card rounded">
	<div class="card-header bg-light h5"><i class="fas fa-plus-square"></i> Insert Product Category</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="p_cat_title">Product Category Title</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="p_cat_title" class="form-control" id="p_cat_title" placeholder="Product Category Title" required>
				      <div class="invalid-feedback">
				        Please provide a Product Category Title.
				      </div>
				    </div>
				  </div>

					<div class="form-row mb-3">
				    <div class="col-3">
				      <label for="p_cat_top">Product Category Top</label>
				    </div>
				    <div class="col-md-9">
				    	<div class="custom-control custom-radio custom-control-inline">
							  <input type="radio" id="radio1" name="p_cat_top" value="Yes" class="custom-control-input" required>
							  <label class="custom-control-label" for="radio1">Yes</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
							  <input type="radio" id="radio2" name="p_cat_top" value="No" class="custom-control-input" required>
							  <label class="custom-control-label" for="radio2">No</label>
							</div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="p_cat_image">Product Category Image</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="file" name="p_cat_image" id="p_cat_image">
				      <div class="invalid-feedback">
				        Please provide a Category Image.
				      </div>
				    </div>
				  </div>

				  <div class="row">
				  	<div class="col-12 mt-4">
				  		<button class="btn btn-info form-control" name="add_p_cat" type="submit"><i class="fas fa-plus-circle"></i> Insert Product Category</button>
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

