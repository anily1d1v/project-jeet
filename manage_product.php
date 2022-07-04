 <?php
require('top.inc.php');
 $categories_id='';
 $name='';
 $mrp='';
 $price='';
 $qty='';
 $images='';
 $short_desc='';
 $description='';
 $meta_title='';
 $meta_desc='';
 $meta_keyword='';

$msg='';
 if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from product where id = '$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
       $row=mysqli_fetch_assoc($res);
       $categories=$row['categories'];
	}else{
		header('location:product.php');
	die();
	}

};

if(isset($_POST['submit'])){
	$categories_id=get_safe_value($con,$_POST['categories_id']);
	$name=get_safe_value($con,$_POST['name']);
	$mrp=get_safe_value($con,$_POST['mrp']);
	$price=get_safe_value($con,$_POST['price']);
	$qty=get_safe_value($con,$_POST['qty']);
	$images=get_safe_value($con,$_POST['images']);
	$short_desc=get_safe_value($con,$_POST['short_desc']);
	$description=get_safe_value($con,$_POST['description']);
	$meta_title=get_safe_value($con,$_POST['meta_title']);
	$meta_desc=get_safe_value($con,$_POST['meta_desc']);
	$meta_keyword=get_safe_value($con,$_POST['meta_keyword']);
	$res=mysqli_query($con,"select * from product where name = '$name'");
	$check=mysqli_num_rows($res);
	if($check>0){
          $msg="product already exit";
	}else{if(isset($_GET['id']) && $_GET['id']!=''){
		mysqli_query($con,"update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',images='$images',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword', where id='$id' ");
	}else{
	mysqli_query($con,"insert into product(categories_id,name,mrp,price,qty,images,short_desc,description,meta_title,meta_desc,meta_keyword,status) value ('$categories_id','$name','$mrp','$price','$qty','$images','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword','$status',1)");
    }
	header('location:product.php');
	die();

}
}

?>

     <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Product</strong><small> Form</small>
                        <button style=" color: black;"><a href="product.php">BACK</a></button>

                         </div>
                        <form method="post">
							<div class="card-body card-block">
							   <div class="form-group">
								   <label for="categories" class=" form-control-label">Categories</label>
									<select class=" form-control" name="categories_id">
										<option>select categories</option>
										<?php
										$res = mysqli_query($con,"select id,categories from categories order by categories asc");

										while($row =mysqli_fetch_assoc($res)){
											echo "<option value=".$row['id'].">".$row['categories']."</option>";
										}
										?>
									</select>
								</div>
								<div class="form-group">
								   <label for="categories" class=" form-control-label">Product Name</label>
									<input type="text" name="categories" placeholder="Enter Product name" class="form-control" required value="<?php echo $name  ?>">
								</div>
								<div class="form-group">
								   <label for="categories" class=" form-control-label">MRP</label>
									<input type="text" name="mrp" placeholder="Enter Mrp" class="form-control" required value="<?php echo $mrp  ?>">
								</div>
								<div class="form-group">
								   <label for="categories" class=" form-control-label">Quantity</label>
									<input type="text" name="qty" placeholder="Enter Quantity name" class="form-control" required value="<?php echo $qty  ?>">
								</div>
								<div class="form-group">
								   <label for="categories" class=" form-control-label">Image</label>
									<input type="file" name="images" placeholder="Enter Image" class="form-control" required value="<?php echo $images  ?>">
								</div>
								<div class="form-group">
								   <label for="categories" class=" form-control-label">Short description</label>
									<input type="text" name="short_desc" placeholder="Shot description" class="form-control" required value="<?php echo $short_desc  ?>">
								</div>
								<div class="form-group">
								   <label for="categories" class=" form-control-label">Description</label>
									<input type="text" name="description" placeholder="Description" class="form-control" required value="<?php echo $description  ?>">
								</div>
								<div class="form-group">
								   <label for="categories" class=" form-control-label">Meta title</label>
									<input type="text" name="meta_title" placeholder="Enter Product meta_title" class="form-control" required value="<?php echo $meta_title  ?>">
								</div>
								<div class="form-group">
								   <label for="categories" class=" form-control-label">Meta description</label>
									<input type="text" name="meta_desc" placeholder="Enter meta description" class="form-control" required value="<?php echo $meta_desc  ?>">
								</div>
								<div class="form-group">
								   <label for="categories" class=" form-control-label">Meta keyword</label>
									<input type="text" name="meta_keyword" placeholder="Enter Meta keyword" class="form-control" required value="<?php echo $meta_keyword  ?>">
								</div>

							        <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							        <span id="payment-button-amount">Submit</span>
							   </button>
							   <div class="field_error"><?php echo $msg ?></div>
							   <!-- <div class="field_error"><?php echo $msg?></div> -->
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>


<?php
require('footer.inc.php');
?>