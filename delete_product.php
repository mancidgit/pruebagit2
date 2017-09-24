<?php
// check if value was posted
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
 
    // include database and object file
    include_once 'config/database.php';
    include_once 'objects/product.php';
 
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
 
    // prepare product object
    $product = new Product($db);
     
    // set product id to be deleted
    $product->id = $id;
 
  //if($_POST){  
$page_title = "Delete One Product";
include_once "header.php";

  // delete the product
if($product->delete()){
// read products button
echo "<div class='right-button-margin'>";
echo "<a href='index.php' class='btn btn-primary pull-right'>";
echo "<span class='glyphicon glyphicon-list'></span> Read Products";
echo "</a>";
echo "</div>";
echo "<div class='alert alert-danger alert-dismissable'>";
echo "Object was deleted.";
echo "</div>";
   	 }
     
    	// if unable to delete the product
    	else{
        	echo "Unable to delete object.";
    	}
// set footer
include_once "footer.php";
   //  }
?>
