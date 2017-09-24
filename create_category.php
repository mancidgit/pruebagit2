<?php
// set page headers
$page_title = "Create Category";
include_once "header.php";
 
// contents will be here

echo "<div class='right-button-margin'>";
echo "<a href='index_category.php' class='btn btn-primary pull-right'>";
echo "<span class='glyphicon glyphicon-list'></span> Read Category";
echo "</a>";
echo "</div>";
// footer
include_once "footer.php";
// include database and object files
include_once 'config/database.php';
include_once 'objects/category.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// pass connection to objects
$category = new Category($db);
// if the form was submitted - PHP OOP CRUD Tutorial
if($_POST){
 
    // set product property values
    $product->id = $_POST['id'];
    $product->name = $_POST['name1'];
    
 
    // create the product
    if($category->create()){
        echo "<div class='alert alert-success'>Category was created.</div>";
    }
 
    // if unable to create the Category, tell the user
    else{
        echo "<div class='alert alert-danger'>Unable to create category.</div>";
    }
}
?>
<!-- HTML form for creating a product -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
 
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>id</td>
            <td><input type='text' name='id' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Name</td>
            <td><input type='text' name='name1' class='form-control' /></td>
        </tr>
 
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Create</button>
            </td>
        </tr>
 
    </table>
</form>
