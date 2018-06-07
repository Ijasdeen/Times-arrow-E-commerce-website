 <?php require_once('Includes/header.php');?>
<?php require_once('connection.php');?>
<?php require_once('validation.php');?>
<main>
    <section class="display-products">
        <div class="container-fluid">
             <div class="row">
                 <div class="col-md-2 col-xs-12 col-sm-12 col-lg-2">
                    <div>
                        <h3 class="page-title">New Arrivals</h3><br/>
                            <span>New leather handbags - totes, shoulder bags, wristlets, clutches, tech zip pouches, and crossbody bags.</span>
                     </div>
                     <div class="filter-section">
                         <form method="POST">
                             <div class="form-group">
                                <label for="labelForFilter">Filter</label>
                                 <select name="filter" id="filter" class="form-control">
                                      <option value="AllProducts">All products</option>
                                  </select>
                             </div>
                         </form>
                         
                     </div>
                     <div class="sort-by">
                         <form method="POST">
                             <div class="form-group">
                                 <label for="labelForSoryBy">Sort by</label>
                                 <select name="sortBy" id="sortBy" class="form-control" newArrivals="5">
                                     <option value='selectOne'>--Select One--</option>
                                     <option value="lowToHigh">Price, low to high</option>
                                     <option value="highToLow">Price, High to low</option>
                                     <option value="aZ">Alphabetically, A-Z</option>
                                     <option value="Za">Alphabetically, Z-A</option>
                                     <option value="oldToNew">Date, old to new</option>
                                     <option value="newToOld">Date, new to old</option>
                                      
                                 </select>
                             </div>
                         </form>
                     </div>
                 </div>
                
                 <div class="col-md-10">
                    <div class="show-items wow fadeInUp">
               <div class="row" id="productWrapper">
                          <?php
                      $query="select * from products where newArrivals='Yes'";
                           $result=mysqli_query($connection,$query);
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
                                   <p class="text text-danger text-center"><?php echo $row['product_title']?></p>
                                   <p class="text-center font-weight-bold">
                                      $ <?php echo number_format($row['product_price'],2)?>
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
        </div>
    </section>
</main>

 <?php require_once('Includes/footer.php')?>