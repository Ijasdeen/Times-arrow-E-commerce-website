<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
require_once('connection.php');
require_once('validation.php');
// <Dropdown-starts>
    session_start();
if(isset($_POST['dropdown'])){
     $query="select * from brands";
    $result=mysqli_query($connection,$query);
    if($result){
        while($row=mysqli_fetch_array($result)){
            //
          ?>
    <a class="dropdown-item" href="collections.php?id=<?php echo $row[0]?>" brandId="<?php echo $row[0]?>">
        <?php
                echo $row['brand_name'];
          ?>
    </a>
    <?php
        }
    }
}
    //<Dropdown-finishes>

 /*<Filtering-products-start>*/
if(isset($_POST['enableSortBy']) || isset($_POST['filterProduct'])){
     if(isset($_POST['value'])){
       $value=mysqli_real_escape_string($connection,$_POST['value']);
       if(isset($_POST['brandId']))
       {
            $brandId=mysqli_real_escape_string($connection,testdata($_POST['brandId']));
        } 
         //Checking preorder
         if(isset($_POST['preorderCheck'])){
       $preOrderCheck=mysqli_real_escape_string($connection,testdata($_POST['preorderCheck']));
             
         }
         if(isset($_POST['allPreorders'])){
             $showAll=mysqli_real_escape_string($connection,testdata($_POST['allPreorders']));
         }
          
         if(isset($_POST['newArrivals'])){
             $newArrivals=mysqli_real_escape_string($connection,testdata($_POST['newArrivals']));
         } 
         /*We are getting value from users via ajax and check what it is. After that it retrieves from database and dsiplay. Suppose if the user checks "Pre order" and filters, "PreOrderCheck" would be 1 else => it would be 0*/
          switch($value){
             case 'AllProducts':
                $query="SELECT * FROM `products` WHERE product_brand='$brandId'";
                 break; 
             case 'preOrders':
                 $query="SELECT * FROM `products` WHERE product_brand='$brandId' AND preOrder='Yes'";
                  break; 
             case 'selectOne':
                 header("location:collection.php?id='$brandId'");
                 break; 
              case 'lowToHigh':
                  if(isset($newArrivals)){
                      $query="SELECT * FROM `products` where newArrivals='Yes' ORDER BY product_price ASC";
                  }
                  else if(isset($showAll)){
                      $query="SELECT * FROM `products` where preOrder='Yes' ORDER BY product_price ASC";
                  }
                 else if($preOrderCheck==1){
                 $query="SELECT * FROM `products` WHERE product_brand='$brandId' AND preOrder='Yes' ORDER BY product_price ASC";
                  }
                 else {
               $query="SELECT * FROM `products` WHERE product_brand='$brandId' ORDER BY product_price ASC";
                  }
                    break; 
             case 'highToLow':
                  if(isset($newArrivals)){
                      $query="SELECT * FROM `products` WHERE newArrivals='Yes' ORDER BY product_price DESC";
                  }
                  else if(isset($showAll)){
                      $query="SELECT * FROM `products` WHERE preOrder='Yes' ORDER BY product_price DESC";
                  }
               else if($preOrderCheck==1)
               {
                   $query="SELECT * FROM `products` WHERE product_brand='$brandId' AND preOrder='Yes' ORDER BY product_price DESC";
               }
                 else {
                     $query="SELECT * FROM `products` WHERE product_brand='$brandId' ORDER BY product_price DESC";
                 }
                 break; 
             case 'aZ':
                  if(isset($newArrivals)){
                      $query="SELECT * FROM `products` WHERE newArrivals='Yes' ORDER BY product_title ASC";
                  }
                  else if(isset($showAll)){
                      $query="SELECT * FROM `products` WHERE preOrder='Yes' ORDER BY product_title ASC";
                  }
               else if($preOrderCheck==1){
             $query="SELECT * FROM `products` WHERE product_brand='$brandId' AND preOrder='Yes' ORDER BY product_title ASC ";  
               }
                 else {
               $query="SELECT * FROM `products` WHERE product_brand='$brandId' ORDER BY product_title ASC ";         
                 }
                 break; 
             case 'Za':
                  if(isset($newArrivals)){
                      $query="SELECT * FROM `products` WHERE newArrivals='Yes' ORDER BY product_title DESC";
                  }
                  else if(isset($showAll)){
                      $query="SELECT * FROM `products` WHERE preOrder='Yes' ORDER BY product_title DESC";
                  }
                 else if($preOrderCheck==1){
                     $query="SELECT * FROM `products` WHERE product_brand='$brandId' AND preOrder='Yes' ORDER BY product_title DESC";
                 }
                 else {
                     $query="SELECT * FROM `products` WHERE product_brand='$brandId' ORDER BY product_title DESC";
                 }
                 break; 
             case 'oldToNew':
                  if(isset($newArrivals)){
                      $query="SELECT * FROM `products` WHERE newArrivals='Yes' ORDER BY InsertedDate DESC";
                  }
                 else if(isset($showAll)){
                    $query="SELECT * FROM `products` WHERE preorder='Yes' ORDER BY InsertedDate DESC";
                  }
               else if($preOrderCheck==1){
        $query="SELECT * FROM `products` WHERE product_brand='$brandId' AND preorder='Yes' ORDER BY InsertedDate DESC";     
               }
                 else {
        $query="SELECT * FROM `products` WHERE product_brand='$brandId' ORDER BY InsertedDate DESC";             
                 }
                 break; 
             case 'newToOld':
                  if(isset($newArrivals)){
                      $query="SELECT * FROM `products` WHERE newArrivals='Yes' ORDER BY InsertedDate ASC";
                  }
                  else if(isset($showAll)){
                      $query="SELECT * FROM `products` WHERE preOrder='Yes' ORDER BY InsertedDate ASC";
                  }
                 else if($preOrderCheck==1){
                     $query="SELECT * FROM `products` WHERE product_brand='$brandId' AND preOrder='Yes' ORDER BY InsertedDate ASC";
                 }
                 else {
                     $query="SELECT * FROM `products` WHERE product_brand='$brandId' ORDER BY InsertedDate ASC";
                 }
                 break; 
            
             default:
                 echo 'Nothing is chosen';
                 
                
         }
         
?>
        <div class="row">
            <?php
                      $validatedQuery=$query;
                           $result=mysqli_query($connection,$validatedQuery);
                          if($result){
                               while($row=mysqli_fetch_array($result)){
                                   $_SESSION['name']=$row['product_title'];
                                   ?>
                <div class="col-md-3">
                    <div class="list-products">
                        <div class="products-img">
                            <a href="Bags.php?id=<?php echo $row[0]?>"><img src="Images/Bags/<?php echo $row['product_image']?>" alt="<?php echo $row['product_title']?>"></a>
                            <?php
                                if($row['preOrder']=='Yes'){
                                    ?>
                                <div class="pre-order">
                                    <span>Pre orders</span>
                                </div>
                                <?php   
                                }
                                ?>
                        </div>
                        <div class="text-area">
                            <p class="text text-danger text-center">
                                <?php echo $row['product_title']?>
                            </p>
                            <p class="text-center font-weight-bold">
                                $
                                <?php echo number_format($row['product_price'],2)?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
                     
                               }
                           }
                           ?>

        </div>
        <?php
         
         
          
     }
    
   
}
 
    /*<Filtering-products-finishes>*/
      //<Enable-Login-starts>
 if(isset($_POST['enableLogin'])){
     $email=mysqli_real_escape_string($connection,testdata($_POST['email']));
     $password=mysqli_real_escape_string($connection,testdata(md5($_POST['password'])));
      
     if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        echo 'Invalid';
         exit();
     }
      
     $query="select * from user_info where userEmail='$email' and userPassword='$password'";
     $result=mysqli_query($connection,$query);
     if(mysqli_num_rows($result) >0){
         while($row=mysqli_fetch_array($result)){
             $_SESSION['firstName']=$row['userFirstName'];
             $_SESSION['lastName']=$row['userLastName'];
             $_SESSION['userId']=$row['user_id'];
             $_SESSION['userEmail']=$row['userEmail'];
          }
          echo 'Success';
      }
     else {
         echo 'notFound';
          
     }
     
    
     
 }
    //<Enable-login-ends>
    
    
    /*<Enable-addtocart-starts*/
     if(isset($_POST['enableAddtoCart']) && isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['image']) && isset($_POST['quantity'])){
         if(isset($_COOKIE['shopping_cart'])){
             $cookie_data=stripslashes($_COOKIE['shopping_cart']);
             $cart_data=json_decode($cookie_data,true);
         }
         else {
             $cart_data=array();
         }
         
        
 $item_id_list = array_column($cart_data, 'item_id');

//If already item is available..
 if(in_array($_POST["id"], $item_id_list))
 {
  foreach($cart_data as $keys => $values)
  {
   if($cart_data[$keys]["item_id"] == $_POST["id"])
   {
    $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
    }
  }
     
  }
   else {
       //If it is a new item....
        $id=$_POST['id'];
         $name=$_POST['name'];
         $price=$_POST['price'];
         $image=$_POST['image'];
         $quantity=$_POST['quantity'];
          $item_array=array(
            'item_id' =>$id, 
             'item_name' =>$name, 
             'price' =>$price, 
             'image' =>$image,
              'item_quantity' =>$quantity
          );
             $cart_data[]=$item_array;
         
         }
        
          $item_data=json_encode($cart_data);
         setcookie("shopping_cart",$item_data,time()+(86400*30));
         // time() + ((86400)*30) == One day;    
       }
    /*<//Enable-addtocart-finishes*/
    
    if(isset($_POST['increaseQuantity']) && isset($_POST['id'])){
        $item_id=$_POST['id'];
        
         if(isset($_COOKIE['shopping_cart'])){
             $cookie_data=stripslashes($_COOKIE['shopping_cart']);
             $cart_data=json_decode($cookie_data,true);
         }
   $item_id_list = array_column($cart_data, 'item_id');
       
      if(in_array($item_id, $item_id_list))
     {
      foreach($cart_data as $keys => $values)
      {
       if($cart_data[$keys]["item_id"] ==$item_id)
       {
        $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + 1;
         $quantity= $cart_data[$keys]['item_quantity'];
        }
          
      }

      }
        else {
         $item_array=array(
            'item_id' =>$id, 
             'item_name' =>$name, 
             'price' =>$price, 
             'image' =>$image,
              'item_quantity' =>$quantity
          );
             $cart_data[]=$item_array;
         }
        
       $item_data=json_encode($cart_data);
         setcookie("shopping_cart",$item_data,time()+(86400*30));
    
    }
        
    
    /*<Decrease-quantity-in-bags.php*/
    if(isset($_POST['decreaseQuantity']) && isset($_POST['itemId'])){
            
        $item_id=$_POST['itemId'];
          if(isset($_COOKIE['shopping_cart'])){
             $cookie_data=stripslashes($_COOKIE['shopping_cart']);
             $cart_data=json_decode($cookie_data,true);
         }
   $item_id_list = array_column($cart_data, 'item_id');
       
      if(in_array($item_id, $item_id_list))
     {
      foreach($cart_data as $keys => $values)
      {
       if($cart_data[$keys]["item_id"] ==$item_id)
       {
        $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] - 1;
         $quantity= $cart_data[$keys]['item_quantity'];
        }
          
      }

      }
        else {
         $item_array=array(
            'item_id' =>$id, 
             'item_name' =>$name, 
             'price' =>$price, 
             'image' =>$image,
              'item_quantity' =>$quantity
          );
             $cart_data[]=$item_array;
         }
        
       $item_data=json_encode($cart_data);
         setcookie("shopping_cart",$item_data,time()+(86400*30));
    
         
    }
    
    /*<//DecraseQuantity>*/
    
    /*<EditQuantity-via-textbox>*/
    if(isset($_POST['quantityEditEnable']) && isset($_POST['itemId']) && isset($_POST['value'])){
                 $item_id=$_POST['itemId'];
                 $value=(int)mysqli_real_escape_string($connection,testdata($_POST['value']));
         if(isset($_COOKIE['shopping_cart'])){
             $cookie_data=stripslashes($_COOKIE['shopping_cart']);
             $cart_data=json_decode($cookie_data,true);
         }
        $item_id_list = array_column($cart_data, 'item_id');
       
      if(in_array($item_id, $item_id_list))
     {
      foreach($cart_data as $keys => $values)
      {
       if($cart_data[$keys]["item_id"] ==$item_id)
       {
        $cart_data[$keys]["item_quantity"] = $value;
         $quantity= $cart_data[$keys]['item_quantity'];
        }
          
      }

      }
        else {
         $item_array=array(
            'item_id' =>$id, 
             'item_name' =>$name, 
             'price' =>$price, 
             'image' =>$image,
              'item_quantity' =>$quantity
          );
             $cart_data[]=$item_array;
         }
        
       $item_data=json_encode($cart_data);
         setcookie("shopping_cart",$item_data,time()+(86400*30));
    
     }
    /*<//EditQuntitu-via-textbox>*/
    
    
     /*<Enable-cookies-start*/
    
    /*We are storing what user clicks to add cart and will finally insert into database*/
     if(isset($_POST['enableCookies'])){
          if(isset($_COOKIE['shopping_cart'])){
           $total=0;
              $count=0; 
              $cookie_data=stripslashes($_COOKIE['shopping_cart']);
             $cart_data=json_decode($cookie_data,true);
             foreach($cart_data as $keys =>$values){
                  ?>
               <div class="row" id="cartTable">
               
                <div class="col-md-3">
                    <img src="Images/Bags/<?php echo $values['image']?>" alt="">
                </div>
                    <div class="col-md-6 text-center">
                      <a href="javascript:void(0);" class="text text-danger deleteProduct" id="deleteProduct" removeProductId="<?php echo $values['item_id']?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        <p><?php echo $values['item_name']?></p>
                        <p class="text-muted">$<?php echo number_format($values['price'],2)?></p><br/>
                        <p>
                            <div class="quantity-area">
                                <label for="QuantityLabel">Quantity</label>
                                 <div class="d-flex justify-content-center mb-3">
                                     <div class="p-1"><button id="increaseQuantity" class="increaseQuantity" dataId="<?php echo $values['item_id']?>">+</button></div>
                                     <div class="p-1"><input type="text" value="<?php echo $values['item_quantity']?>" min="1" id="value" size="1" pattern="[0-9]+" class="quantityValue" dataId="<?php echo $values['item_id']?>"></div>
                                     <div class="p-1"><button id="decreaseQuantity" class="decreaseQuantity" dataId="<?php echo $values['item_id']?>">-</button></div>
                                </div></div>
                                
                        </p>
                         
                    </div>
                    <?php
                      $total+=($values['price'] * $values['item_quantity']);
                 $_SESSION['totalPrice']=number_format($total,2);
                      $count++; //This count is used to detect If item is on shopping_cart cookies. 
                       ?>
              </div>
                   <hr>
                
                  <?php
             }
              if($count!=0){
                 ?>
                <div class="row" id="subTotalArea">
                    <div class="col-md-6">
                        <div class="text-center">
                        
                         <span class="text text-muted">SUBTOTAL</span>                         
                          <span class="text text-danger">$<?php echo number_format($total,2)?></span>
                         <br/><br/>
                        <span class="text text-muted">Shipping & taxes calculated at checkout</span>
                        <br/>
                        <a href="checkout.php" class="btn btn-info" id="checkout">Check Out</a>
                      
                        </div>
                       
                    </div>
                </div>
                <?php  
              }
              else {
               echo '<p class="text text-center">Cart is empty...</p>';
               }
          }     
         else {
             echo '<p class="text text-center">No Item added to cart...</p>';
         }
          
          
     }
     /*<Enable-cookies-finishes*/
     if(isset($_POST['enableSearchBar']) && isset($_POST['userInput'])){
        $userinput=mysqli_real_escape_string($connection,testdata($_POST['userInput']));
         
        $query="SELECT product_id,product_title,product_price,product_desc,product_image from products where product_title like '$userinput%'";
        $result=mysqli_query($connection,$query);
        if(mysqli_num_rows($result) >1){
          while($row=mysqli_fetch_array($result)){
              ?>
              <div class="row">
                  <div class="col-md-3 searchimg-control">
                      <a href="Bags.php?id=<?php echo $row['product_id']?>"><img src="Images/Bags/<?php echo $row['product_image']?>" class="img-fluid"></a>
                  </div>
                  <div class="col-md-9">
                      <h4><a href="Bags.php?id=<?php echo $row['product_id']?>"><?php echo $row['product_title']?></a></h4>
                    <p><small class="text text-muted">$<?php echo number_format($row['product_price'],2)?></small></p>
                      <p>
                          <?php echo substr($row['product_desc'],0,100)?>...
                      </p>
                  </div>
              </div>
              <?php
          }    
        }
        else {
            echo "<p>Your search for <b>'$userinput'</b> did not yield any results.</p>";
        }
    }
    
    
//Removing selected items from shopping cart.
    if(isset($_POST['enableRemove']) && isset($_POST['productId'])){
        $productId=(int)mysqli_real_escape_string($connection,testdata($_POST['productId']));
         $cookie_data=stripslashes($_COOKIE['shopping_cart']);
        $cart_data=json_decode($cookie_data,true);
        
        foreach($cart_data as $keys =>$values){
            if($cart_data[$keys]['item_id']==$productId){
                unset($cart_data[$keys]);
           $item_data=json_encode($cart_data);
         setcookie("shopping_cart",$item_data,time()+(86400*30));
            }
        }
       
     }
 
    if(isset($_POST['enableSub']) && isset($_POST['subEmail'])){
        $email=mysqli_real_escape_string($connection,testdata($_POST['subEmail']));
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
          $runcheckSql="select * from subscribers where subscribeEmail='$email'";
            $runResult=mysqli_query($connection,$runcheckSql);
            if(mysqli_num_rows($runResult) >0){
                echo '<small>Email already exists.</small>';
                exit();
            }
            $query="insert into subscribers values('','$email')";
          $result=mysqli_query($connection,$query);
            if($result){
                echo 'Yes';
            }
            else {
                echo '<small>Could not save...Please try again.</small>';
                exit();
            }
        }
        else {
            echo '<small>Invalid Email address.</small>';
            exit();
        }
    }
   
    
    if(isset($_POST['enableCheckOut'])){
       if(isset($_COOKIE['shopping_cart'])){
          $total=0;  
    $cookie_data=stripslashes($_COOKIE['shopping_cart']);
        $cart_data=json_decode($cookie_data,true);
           foreach($cart_data as $keys =>$values){
              ?>
              <div class="container">
              <div id="chekoutProductContainer">
                  <div class="d-flex flex-row">
                  <div class="p-2">
                   <span class="badge badge-secondary"><?php echo $values['item_quantity']?></span>
                    <img src="Images/Bags/<?php echo $values['image']?>" class="img-fluid">
                  </div>
                  <div class="p-2 align-self-center">
                      <span>
                          <?php echo $values['item_name']?>
                      </span>
                  </div>
                  <div class="ml-auto p-2 align-self-center">
                      <span>$<?php echo number_format($values['price'],2)?></span>
                  </div>
              </div>
               </div>
              <?php
                  $total+=($values['item_quantity']*$values['price']);
               
           }
          ?>
          <hr/> 
          <div class="discount-area">
             <form method="POST" id="discountArea">
                  <div class="d-flex flex-row justify-content-center">
                  <div class="p-2"><div class="form-group">
                      <input type="text" placeholder="Discount" class="form-control discount" id="discountValue" required>
                <span class="discountErrorMessage text text-danger"></span>
                   </div></div>
                  <div lang="p-2">
                    <div class="p-2">
                        <div class="form-group">
                          <input type="submit" class="form-control btn btn-secondary btn-md" id="submitDiscount" value="Apply">
                    </div>
                    </div>
                  </div>
              </div>
             </form>
          </div>
          <hr/> 
          <div class="d-flex">
              <div class="mr-auto p-2">
                  <span class="text text-muted">Subtotal</span>
              </div>
              <div class="p-2">
                  <span>$<?php echo number_format($total,2)?></span>
              </div>
          </div>
          <div class="d-flex">
              <div class="mr-auto p-2">
                  <span class="text text-muted">Shipping</span>
              </div>
              <div class="p-2">
                $00.00 (Free)
              </div>
          </div>
          <hr>
          <div class="d-flex">
              <div class="mr-auto p-2">
                  Total
              </div>
              <div class="p-2">
                  <small>USD</small><h4>$<?php echo number_format($total,2)?></h4>
              </div>
          </div>
</div>
          <?php
       }
    }
    
    
     
    if(isset($_POST['enableOrderSection'])){
        //testdata() = This is a validation from validation.php
       $firstName =mysqli_real_escape_string($connection,testdata($_POST['firstName']));
       $lastName =mysqli_real_escape_string($connection,testdata($_POST['lastName']));
       $companyName =mysqli_real_escape_string($connection,testdata($_POST['companyName']));
       $address =mysqli_real_escape_string($connection,testdata($_POST['address']));
       $apartment = mysqli_real_escape_string($connection,testdata($_POST['apartment']));
       $country = mysqli_real_escape_string($connection,testdata($_POST['country']));
       $city=mysqli_real_escape_string($connection,testdata($_POST['city']));
       $postal=mysqli_real_escape_string($connection,testdata($_POST['postal']));
       $email = mysqli_real_escape_string($connection,testdata($_POST['email']));
       $check=mysqli_real_escape_string($connection,testdata($_POST['check']));
       
        //If any of value is empty, it would return to checkout.php
        //Values already validated using jquery -> this is a second protection
        if(empty($lastName) || empty($address) || empty($country) || empty($city) || empty($email)){
            header("location:checkout.php");
        }
        
        //If user signs in, then his own userEmail has to be used as default one. 
        if(isset($_SESSION['userEmail'])){
                $email=$_SESSION['userEmail'];
            }
        //If check == 1 means => Subscribers..
        if($check==1){
            
          $checkQuery="select * from subscribers where subscribeEmail='$email'";
            $runCheckQuery=mysqli_query($connection,$checkQuery);
            if(mysqli_num_rows($runCheckQuery)==0){
               $insertSubQuery="insert into subscribers values('','$email')";
                mysqli_query($connection,$insertSubQuery);     
             }
        }
         
        /*If email exists, that would be deleted*/
        //It is manipulated here for preventing dublicate data.
       
        $viewQuery="SELECT email from customer_details where email='$email'";
        if(mysqli_num_rows(mysqli_query($connection,$viewQuery)) >0){
           $deleteQuery="DELETE FROM customer_details where email ='$email'";
            mysqli_query($connection,$deleteQuery);
            
        }
        
        //Insert -> into -> "customer_details"
          $query="INSERT INTO customer_details(first_name,last_name,companyName,address,apartment,city,country,postal,email) values('$firstName','$lastName','$companyName','$address','$apartment','$city','$country','$postal','$email');";
       mysqli_query($connection,$query);
         
        
        //Retrieving customer_id from db to store into another table
        $retrieveid="select customer_id from customer_details where email='$email'";
        $retrieveresult=mysqli_query($connection,$retrieveid);
        while($row=mysqli_fetch_array($retrieveresult)){
          $customerId=$row['customer_id'];       
        }
        if(isset($_SESSION['userId'])){
            $customerId=$_SESSION['userId'];
        }
        
         //Decoding order detail from shopping cart cookies. 
        //And save value in cookies to db.
        if($_COOKIE['shopping_cart']){
            $cookie_data=stripslashes($_COOKIE['shopping_cart']);
            $cart_data=json_decode($cookie_data,true);
             
            foreach($cart_data as $keys =>$values){
                  $product_id=$cart_data[$keys]['item_id'];
                  $item_quantity=$cart_data[$keys]['item_quantity'];
                 $insertQuery="insert into orderdetails values('','$customerId','$product_id','$item_quantity','completed')";
                mysqli_query($connection,$insertQuery);
                 
            }
              
        }
        setcookie ("shopping_cart", "", time() - 45000);
        echo 'Yes';
        
     } //<//Enable order section/> 
     
    
    /*Enable sign up*/
    if(isset($_POST['enableSignUp']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['password'])){
       $firstName=mysqli_real_escape_string($connection,testdata($_POST['firstName']));
       $lastName= mysqli_real_escape_string($connection,testdata($_POST['lastName']));
       $email = mysqli_real_escape_string($connection,testdata($_POST['email']));
       $password= mysqli_real_escape_string($connection,testdata(md5($_POST['password'])));
        
      if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
          header("location:index.php");
     }
     $checkExistEmail="select userEmail from user_info where userEmail='$email'";
     $result=mysqli_query($connection,$checkExistEmail);
     if(mysqli_num_rows($result) >0){
         echo 'exist';
         exit();
     }
     $insertSql="insert into user_info values('','$firstName','$lastName','$email','$password')";
     if(mysqli_query($connection,$insertSql)){
         echo 'Yes';
     }
        
     }
    
    /*<//Enable sign up>*/
    
    
    if(isset($_POST['enableDiscountValue']) && isset($_POST['discountValue'])){
        $discountValue=mysqli_real_escape_string($connection,testdata($_POST['discountValue']));
        $query="select coupan_title from coupans where coupan_title='$discountValue'";
        $result=mysqli_query($connection,$query);
        if(mysqli_num_rows($result) >0){
            echo 'It worked';
        }
        else {
            echo 'notFound';
        }
    }
    
} //If method is only POST
    
 
mysqli_close($connection);
?>