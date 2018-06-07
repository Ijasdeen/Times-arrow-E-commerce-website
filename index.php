<?php require_once('Includes/header.php')?>
     
    <main>
         
          <section>
          <div class="hero-section"><img src="Images/Hero%20Image.jpg"s alt="" class="img-fluid"></div>
      </section>
      <section class="featured-collection wow fadeInUp">
          <div class="container">
           <div class="row">
               <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
                      <h4 class="text text-center">FEATURED COLLECTION</h4>
               </div>
               <div class="col-md-12">
              <div class="row">
                       <?php
                   $query="select * from products limit 0,4"; 
                   $result=mysqli_query($connection,$query);
                   if($result){
                       while($row=mysqli_fetch_array($result)){
                         
                       ?>
                          <div class="col-md-3 col-xs-12">
                            <div class="grid-view-item-image">
                                <a href="Bags.php?id=<?php echo $row[0]?>" class="img-fluid grid-image-match" title="<?php echo $row['product_title']?>">
                                    <img src="Images/Bags/<?php echo $row['product_image'];?>" alt="<?php echo $row['product_title'];?>" class="img-fluid">
                                </a>
                                <div class="preorder-badge ribbon">
                                     
                                </div>
                            </div>
                            <div class="grid-view-item">
                                <div>
                                    <p>
                                        <?php echo $row['product_title'];?>
                                    </p>
                                    <p class="font-weight-bold">$
                                        <?php
                                        echo number_format($row['product_price']);
                                        ?>.00
                                    </p>
                                </div>
                            </div>
                          </div>
                          <?php
                           
                       }
                   }
                   
                   ?>
              </div>
               </div>
           </div>
          </div>
      </section>
      
      <section class="img-banner">
          <img src="Images/Fall-PReorder_832cd79d-ad92-472c-81c5-c9b7795a7c61_2000x.jpg" alt="Fall pre order" class="img-fluid">
      </section>
      
         <section class="pre-order-section wow fadeInUp">
         <div class="col-md-12 col-sm-12 col-xs-12">
          <h4 class="text text-center">FALL 2018</h4>
         </div>
         <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 productWrapper">
             <div class="row">
                 <?php
                 $selectQuery="select * from products limit 4,4";
                 $runQuery=mysqli_query($connection,$selectQuery);
                 if($runQuery){
                     while($row=mysqli_fetch_array($runQuery)){
                        ?>
                         <div class="col-md-3 col-xs-12">
                            <div class="pre-orders">
                                <a href="Bags.php?id=<?php echo $row[0]?>" class="img-fluid grid-image-match" title="<?php echo $row['product_title']?>">
                                    <img src="Images/Bags/<?php echo $row['product_image'];?>" alt="<?php echo $row['product_title'];?>" class="img-fluid">
                                </a>
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
                            <div class="grid-view-item">
                                <div>
                                    <p>
                                        <?php echo $row['product_title'];?>
                                    </p>
                                    <p class="font-weight-bold">$
                                        <?php
                                        echo number_format($row['product_price'],2);
                                        ?>
                                    </p>
                                </div>
                            </div>
                          </div>
                        <?php
                         
                         
                     }
                 }
                 
                 ?>
             </div>
         </div>
          
          <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
              <div class="row">
                  <?php
                  $sql="select product_id,product_brand,product_title,product_desc,product_image from products limit 8,4";
                  $runSql=mysqli_query($connection,$sql);
                  if($runSql){
                      while($row=mysqli_fetch_array($runSql))
                      {
                          ?>
                          <div class="col-md-3 col-xs-12">
                            <div class="brand-highlighter pre-orders">
                                <a href="javascript:void(0);" class="img-fluid grid-image-match" title="<?php echo $row['product_title']?>">
                                    <img src="Images/Bags/<?php echo $row['product_image'];?>" alt="<?php echo $row['product_title'];?>" class="img-fluid">
                                </a>
                            </div>
                            <div class="grid-view-item brand-highlighter-photo">
                                <div>
                               <p class="font-weight-bold text-center"><?php echo $row['product_title']?></p>            
                               <p class="text text-center"><?php echo $row['product_desc']?>  </p>                        
                                </div>
                            </div>
                          </div>
                          <?php
                      }
                  }
                  ?>
              </div>
          </div>
      </section>
 
   <section>
       <div class="advert-section">
           <div class="row">
               <div class="col-md-4 style-tag wow fadeInLeft" data-wow-delay="0.8s">
                    <p class="text-center">FREE SHIPPING<br/>
                  <span class="text text-muted text-center">No minimums needed</span>
                 </p>
               </div>
                   
                   <div class="col-md-4 style-tag wow fadeInLeft" data-wow-delay="0.5s">
                   <p class="text-center">PRE-ORDER OUR ALL COLLECTION <br>
                <span class="text text-muted text-center">Get ready for Fall</span>
                 </p>
               </div>
               
               <div class="col-md-4 wow fadeInLeft" data-wow-delay="0.2s">
                    <p class="text-center">FIND A RETAILER
                  <br/>
                  <span class="text text-muted text-center">Find Time's Arrow in Stores</span>
                  </p>
               </div>
           </div>
       </div>
   </section>
    
      </main>
     <?php require_once('Includes/footer.php')?>
