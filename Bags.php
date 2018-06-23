<?php $myid=(int)$_GET['id'];
$myid=(int)$_GET['id'];
//If $myid ===0, which means id isn't gotton from URL. 
if($myid==0){
    header("location:index.php");
}
 ?>
<?php require_once('Includes/header.php');?>
<?php require_once('connection.php');?>
<?php require_once('validation.php');?>
<?php
   $id=(int)mysqli_real_escape_string($connection,testdata($_GET['id']));
 ?>
 
<main>
     <div class="container" id="prouctDetailsSection">
         <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12" id="bindingArea">
                  <?php 
                  $query="SELECT product_id,product_image, product_title,product_price,H,L,D,Handle_Drop,product_desc,created_by FROM products where product_id='$id'";
                  $result=mysqli_query($connection,$query);
                  if($result){
                      while($row=mysqli_fetch_array($result)){
                          ?>
                          <div>
                            <h4><?php echo $row['product_title']?></h4>  
                              <div class="quantity-area">
                                <label for="QuantityLabel">Quantity</label>
                                 <div class="d-flex flex-row">
                                     <div class="p-1"><button id="quantityIncreament">+</button></div>
                                     <div class="p-1"><input type="text" value="1" min="1" id="quantity" size="1" pattern="[0-9]+"></div>
                                     <div class="p-1"><button id="quantityDecreament">-</button></div>
                                  </div>
                                  
                           </div>
                           <h4 class="font-weight-bold">$<?php echo number_format($row['product_price'],2)?></h4>
                           
                           <button class="btn add-to-cart drawer-toggle d-none d-lg-block" id="add_to_cart" name="add_to_cart" pid="<?php echo $row['product_id']?>" pname="<?php echo $row['product_title']?>" price="<?php echo $row['product_price']?>" image="<?php echo $row['product_image']?>">ADD TO CART</button>
                           <a id="add_to_cart" name="add_to_cart" pid="<?php echo $row['product_id']?>" pname="<?php echo $row['product_title']?>" price="<?php echo $row['product_price']?>" image="<?php echo $row['product_image']?>" class="btn add-to-cart add-to-cart-sm d-xs-block d-md-block d-sm-block d-lg-none" href="javascript:void(0);">ADD TO CART</a><br/>
                           <span class="adding-message text text-danger"></span>
                           <div class="description-area py-4">
                               <p>
                                   <?php echo $row['product_desc']?>
                               </p>
                           </div>
                           <div class="size-area">
                               <p>
<!--                             I have checked every row that is retrieved from database if it is equal to 0. Because If it is qual to 0, we don't need to display. 0 means there is nothing to display-->
                               <?php
                              if($row['H']!=0){
                                  echo 'H : '.$row['H'];
                              }
                                   ?>
                                </p>
                               <p>
                             <?php
                              if($row['L']!=0){
                                  echo 'L : '.$row['L'];
                              }
                                   ?>
                             </p>
                               <p>
                               <?php
                              if($row['D']!=0){
                                  echo 'D : '.$row['D'];
                              }
                                   ?>
                               </p>
                               <p>
                               <?php
                              if($row['Handle_Drop']!=0){
                                  echo 'Handle Drop : '.$row['Handle_Drop'];
                              }
                                    ?>
                              </p>
                            </div>
                            <div class="my-5">
                                <p>
                                    <?php echo $row['created_by']?>
                                </p>
                            </div>
                            <label for="shareTheLove">SHARE THE LOVE</label>
                            
                   </div>
                          <?php
                      }
                  }
                  
                  ?>
                  <div class="share-loveArea">
                      <div class="d-flex flex-row">
                           <div class="px-2"><a href="javascript:void(0)"><i class="fa fa-facebook" aria-hidden="true"></i></a></div>
                           <div class="px-2"><a href="javascript:void(0)"><i class="fa fa-twitter" aria-hidden="true"></i></a></div>
                           <div class="px-2"><a href="javascript:void(0)"><i class="fa fa-pinterest" aria-hidden="true"></i></a></div>
                      </div>
                  </div>
              </div>
              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                 <section class="items">
                      <div class="picture-area">
                     <div class="row">
                      <?php
                      $sql="select product_image,interior_image,side_image,back_image from products where product_id='$id'";
                      $result=mysqli_query($connection,$sql);
                      if($result){
                          while($row=mysqli_fetch_array($result)){
                              if(!empty($row['product_image'])){
                                  ?>
                            <div class="col-md-6 item">
                                      <img src="Images/Bags/<?php echo $row['product_image']?>"  id="image_1" data-zoom-image="Images/Bags/<?php echo $row['product_image']?>"></div>
                                    <?php
                              }
                              if(!empty($row['interior_image'])){
                                ?>
                             <div class="col-md-6 col-xs-12 col-sm-12">
                                <img src="Images/Bags/<?php echo $row['interior_image']?>" id="image_2" data-zoom-image="Images/Bags/<?php echo $row['interior_image']?>"></div>
                                 <?php  
                              }
                              if(!empty($row['side_image'])){
                                  ?>
                              <div class="col-md-6 col-xs-12 col-sm-12">
                                 <img src="Images/Bags/<?php echo $row['side_image']?>" id="image_3" data-zoom-image="Images/Bags/<?php echo $row['side_image']?>" class="img-fluid">
                                 </div>
                                  <?php
                              }
                              if(!empty($row['back_image'])){
                                  ?>
                             <div class="col-md-6"><img src="Images/Bags/<?php echo $row['back_image']?>" id="image_4" data-zoom-image="Images/Bags/<?php echo $row['back_image']?>"></div>
                                   <?php
                              }
                           }
                      }
                      ?>
                      </div>
                  </div>
                 </section>
              </div>
         </div>
     </div>
</main>
 <div class="footer-wrapper">
    <?php require_once('Includes/footer.php');?>
</div>
</div>
 
