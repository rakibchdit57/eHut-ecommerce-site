<?php

function delete_categories(){
        global $connection;
       if(isset($_GET['delete']))
       {
         $the_cat_id=$_GET['delete'];
         $query="DELETE FROM categories WHERE cat_id={$the_cat_id}";
         $delete_query=mysqli_query($connection,$query);
         /*header("Location: categories.php");*/
       }
}



?>