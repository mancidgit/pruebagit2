<?php
// search form
echo "<form role='search' action='search_category.php'>";
    echo "<div class='input-group col-md-3 pull-left margin-right-1em'>";
    $search_value=isset($search_term) ? "value='{$search_term}'" : "";
    echo "<input type='text' class='form-control' placeholder='Type product name or description...' name='s' id='srch-term' required {$search_value} />";
    echo "<div class='input-group-btn'>";
    echo "<button class='btn btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i></button>";
    echo "</div>";
    echo "</div>";
echo "</form>";
// create category button
echo "<div class='right-button-margin'>";
    echo "<a href='create_category.php' class='btn btn-primary pull-right'>";
    echo "<span class='glyphicon glyphicon-plus'></span> Create Category";
    echo "</a>";
echo "</div>";
// display the categorias if there are any
if($total_rows>0){
 
    echo "<table class='table table-hover table-responsive table-bordered'>";
        echo "<tr>";
            echo "<th>id</th>";
            echo "<th>Nombre categoria/th>";
            echo "<th>Actions</th>";
        echo "</tr>";
 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
 
            extract($row);
 
            echo "<tr>";
                echo "<td>{$id}</td>";
                echo "<td>{$name}</td>";
                echo "<td>";
 
                    // read categoria button
                    echo "<a href='read_one-.php?id={$id}' class='btn btn-primary left-margin'>";
                        echo "<span class='glyphicon glyphicon-list'></span> Read";
                    echo "</a>";
 
                    // edit categoria button
                    echo "<a href='update_product.php?id={$id}' class='btn btn-info left-margin'>";
                        echo "<span class='glyphicon glyphicon-edit'></span> Edit";
                    echo "</a>";
 
                    // delete categoria button
                    echo "<a href='delete_product.php?id={$id}' class='btn btn-danger delete-object'>";
                        echo "<span class='glyphicon glyphicon-remove'></span> Delete";
                    echo "</a>";
 
                echo "</td>";
  echo "</tr>";
 
        }
 
    echo "</table>";
 
    // paging buttons
    include_once 'paging.php';
}
 
// tell the user there are no categorias
else{
    echo "<div class='alert alert-danger'>No categorias found.</div>";
}
?>