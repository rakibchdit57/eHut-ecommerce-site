<?php
ob_start();
session_start();
include "db.php";

   if(isset($_POST['page']))
   {
       $sql="SELECT * FROM product";
       $run_query=mysqli_query($connection,$sql);
       $count=mysqli_num_rows($run_query);
       $pageno=$count/6;
       for($i=1;$i<=$pageno;$i++)
       {
            echo "<li><a href='#' page='$i' id='page'>$i</a></li>";
       }
       
       
   }




    if(isset($_POST['getProduct']))
    {
        $limit=9;
        if(isset($_POST['setPage']))
        {
            $pageno=$_POST['pageNumber'];
            $start=ceil(($pageno*$limit)-$limit);
        }
        else{
            $start=0;
        }
        $query="SELECT * FROM product LIMIT $start,$limit ";
        $select_all_product=mysqli_query($connection,$query);
     
    while($row=mysqli_fetch_array($select_all_product))
        {
         $product_id=$row['product_id'];
         $product_category_id=$row['product_category_id'];
         $product_brand_id=$row['product_brand_id'];
         $product_title=$row['product_title'];
         $product_price=$row['product_price'];
         $product_description=$row['product_description'];
         $product_image=$row['product_image'];
         $product_keyword=$row['product_keyword'];
         $product_status=$row['product_status'];
         
         echo "<div class='col-md-4'>
                      <div class='panel panel-info'>
                          
                          <div class='panel-heading'>$product_title
                          <p style='float:right;color: 	#A52A2A; font-weight: bold;  text-decoration: underline;'>$product_status</p>
                          </div>
                          <div class='panel-body'>
                          <img width='200' class='img-responsive' src='img/$product_image'>
                          </div>
                          <div class='panel-heading'>$product_price$
                          <a href='customer_order1.php?pid=$product_id' style='float:right;' class='btn btn-success btn-xs' >Details</a>
                          <a href='register.php' style='float:right;' class='btn btn-danger btn-xs' >Add to Cart</a>
                          
                        
                          </div>
                      </div>
                  </div>";
        }              
    }

    if(isset($_POST['getProduct1']))
    {
        $limit=9;
        if(isset($_POST['setPage1']))
        {
            $pageno=$_POST['pageNumber1'];
            $start=ceil(($pageno*$limit)-$limit);
        }
        else{
            $start=0;
        }
        $query="SELECT * FROM product LIMIT $start,$limit ";
        $select_all_product=mysqli_query($connection,$query);
     
   while($row=mysqli_fetch_array($select_all_product))
        {
         $product_id=$row['product_id'];
         $product_category_id=$row['product_category_id'];
         $product_brand_id=$row['product_brand_id'];
         $product_title=$row['product_title'];
         $product_price=$row['product_price'];
         $product_description=$row['product_description'];
         $product_image=$row['product_image'];
         $product_keyword=$row['product_keyword'];
         $product_status=$row['product_status'];
         echo "<div class='col-md-4'>
                      <div class='panel panel-info'>
                          
                          <div class='panel-heading'>$product_title<p style='float:right;color: 	#A52A2A; font-weight: bold;  text-decoration: underline;'>$product_status</p></div>
                          <div class='panel-body'>
                          <img width='200' class='img-responsive' src='img/$product_image'>
                          </div>
                           
                          <div class='panel-heading'>$product_price$
                          <button pid='$product_id' style='float:right;' class='btn btn-danger btn-xs' id='product' >Add to Cart</button>
                           <a href='customer_order.php?pid=$product_id' style='float:right;' class='btn btn-success btn-xs'>Details</a>
                          
                          </div>
                         
                      </div>
                  </div>";
          }   
    }




    if(isset($_POST['addToProduct']))
    {
        $p_id=$_POST['proId'];
        $user_id=$_SESSION['user_id'];
        $sql="SELECT * FROM cart WHERE p_id='$p_id' AND user_id='$user_id'";
        $run_query=mysqli_query($connection,$sql);
        $count=mysqli_num_rows($run_query);
        if($count>0)
        {
            echo "<div class='alert alert-success'>
            
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <b>Product is already added.Continue shopping...</b></div>";
        }
        else{
            $sql="SELECT * FROM product WHERE product_id='$p_id'";
            $run_query=mysqli_query($connection,$sql);
            $row=mysqli_fetch_array($run_query);
            $product_id=$row['product_id'];
            $product_name=$row['product_title'];
            $product_image=$row['product_image'];
            $product_price=$row['product_price'];
            
            $sql="INSERT INTO cart (`p_id`, `user_id`, `product_title`, `product_image`, `qty`, `price`, `total_amt`) VALUES ('$p_id', '$user_id', '$product_name', '$product_image', '1', '$product_price', '$product_price')";
            if(mysqli_query($connection,$sql));
            {
                echo "<div class='alert alert-success'>
                
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <b>Product Is added</b>
                
                
                </div>";
            }
            
        }
    }
     

     if(isset($_POST['get_cart_product'])||(isset($_POST['cart_checkout'])))
     {
         $user_id=$_SESSION['user_id'];
         $sql="SELECT * FROM cart WHERE user_id='$user_id' ";
         $run_query=mysqli_query($connection,$sql);
         $count=mysqli_num_rows($run_query);
             if($count>0)
             {
                 $no=1;
                 $total_amt=0;
                 while($row=mysqli_fetch_array($run_query))
                 {
                     $id=$row['id'];
                     $p_id=$row['p_id'];
                     $product_title=$row['product_title'];
                     $product_image=$row['product_image'];
                     $product_price=$row['price'];
                     $product_qty=$row['qty'];
                     $product_total_amt=$row['total_amt'];
                     $price_array=array($product_total_amt);
                     $total_sum=array_sum($price_array);
                     $total_amt= $total_amt+$total_sum;
                     
                     if(isset($_POST['get_cart_product'])){
                     echo "<div class='row'>
                     <div class='col-md-3'>$no</div>
                    <div class='col-md-3'><img src='img/$product_image' width='40px' height='40px'></div>
                    <div class='col-md-3'>$product_title</div>
                    <div class='col-md-3'>$product_price</div>
                    </div>";
                   $no=$no+1;
                     }
                     else{
                         echo "
                         <div class='row'>
                  
                  <div class='col-md-2'>
                      
                      <div class='btn btn-group'>
                      
                       <a href='#' remove_id='$p_id' class='btn btn-danger remove'><span class='glyphicon glyphicon-trash'></span></a>
                          <a href='' update_id='$p_id' class='btn btn-primary update'><span class='glyphicon glyphicon-ok-sign'></span></a>
                      </div>
                      
                      </div>
                  <div class='col-md-2'><img src='img/$product_image' width='40px' height='40px'></div>
                  
                  <div class='col-md-2'>$product_title</div>
                  
                  <div class='col-md-2'><input type='text' class='form-control price' value='$product_price' pid='$p_id' id='price-$p_id' disabled></div>
                  
                  <div class='col-md-2'><input type='text' class='form-control qty' value='$product_qty' pid='$p_id' id='qty-$p_id'></div>
                  
                  <div class='col-md-2'><input type='text' class='form-control total' value=' $product_total_amt' pid='$p_id' id='total-$p_id' disabled></div>
                  </div>";
                         
                     }
            
                
                 }
                 if(isset($_POST['cart_checkout']))
                 {
                     echo "<div class='row'>
                  <div class='col-md-8'>
                  </div>
                      <div class='col-md-4'>
                          <h3>Total: $total_amt $</h3>
                      </div>
                  </div>";
                 }
                 echo '<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                      <input type="hidden" name="cmd" value="_cart">
                      <input type="hidden" name="business" value="kazi32@gmail.com">
                      <input type="hidden" name="upload" value="1">';
                      global $connection;
                      $x=0;
                      $user_id=$_SESSION['user_id'];
                    
                      $sql="SELECT * FROM cart WHERE user_id='$user_id' ";
                      $run_query=mysqli_query($connection,$sql);  
                      if(!$run_query)
                      {
                          die('QUARY FAILED'.mysqli_error($connection));
                      }
                     while($row=mysqli_fetch_array($run_query))
                     { 
                         $x++;
                      echo '<input type="hidden" name="item_name_'.$x.'"
                       value="'.$row["product_title"].'">
                      <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
                      <input type="hidden" name="amount_'.$x.'"  value="'.$row["price"].'">
                      <input type="hidden" name="quantity_'.$x.'"  value="'.$row["qty"].'">';
                    }
                   
                  echo '<input style="float:right;margin-right:80px;" type="image" name="submit" src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/blue-rect-paypalcheckout-34px.png" alt="PayPal Checkout">
                   
              </form>';
             }
         }
     
if(isset($_POST['removeFromCart']))
{
    $pid=$_POST['removeId'];
    $user_id=$_SESSION['user_id'];
    $sql="DELETE FROM cart WHERE user_id='$user_id' AND p_id='$pid'";
    $run_query=mysqli_query($connection,$sql);
    if($run_query)
    {
        echo " 
        <div class='alert alert-danger'>
                
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <b>Product Is removed</b>
                
                </div>";        
    }
   
}
if(isset($_POST['cart_count']))
{
    $user_id=$_SESSION['user_id'];
    $sql="SELECT * FROM cart WHERE user_id='$user_id'";
    $run_query=mysqli_query($connection,$sql);
    echo mysqli_num_rows($run_query);
    
}

if(isset($_POST['updateProduct']))
{
    $user_id=$_SESSION['user_id'];
    $pid=$_POST['updateId'];
    $qty=$_POST['qty'];
    $price=$_POST['price'];
    $total=$_POST['total'];
    
    $sql="UPDATE cart SET qty='$qty',price='$price',total_amt='$total' WHERE user_id='$user_id' AND p_id='$pid'";
    $run_query=mysqli_query($connection,$sql);
    
    if($run_query)
    {
        echo "<div class='alert alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <b>Product Is added</b>
                </div>";
    }
}


?>
<!-- <input type="image" name="submit"
                    src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
                   alt="PayPal - The safer, easier way to pay online">-->