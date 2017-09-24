<?php
// leer las categorias y despliegue en una tabla  
// core.php holds pagination variables
include_once 'config/core.php';
include_once 'config/database.php';
include_once 'objects/category.php';
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
$category = new Category($db);
$page_title = "Read Categorias";
include_once "header.php";
$stmt = $category->readAll($from_record_num, $records_per_page);
$total_rows=$category->countAll();
include_once "read_template_category.php";
include_once "footer.php";
?>