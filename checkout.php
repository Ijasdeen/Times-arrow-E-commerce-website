<?php
if(!isset($_COOKIE['shopping_cart'])){
    header("location:index.php");
}
?>
    <?php require_once('Includes/header.php');?>
<?php require_once('connection.php');?>
<?php require_once('validation.php');?> 
 <main>
 <section class="checkout-area">
     <div class="container-fluid">
         <div class="row">
            <div class="col-md-6 d-md-none d-xs-inline-block d-sm-inline-block d-lg-none col-xs-12 col-sm-12">
                 <?php
                if(isset($_SESSION['firstName'])){
                    ?>
                    <div class="collapseImage">
                     <img src="Images/avatar.png" alt="Avatar" class="img-fluid">
                     <span><?php echo $_SESSION['firstName']." ".$_SESSION['lastName']?></span>
                     <span>(<?php echo $_SESSION['userEmail']?>)</span>
                 </div>
                    <?php
                }
                ?>
                   <div id="accordition" data-target="#collapseArea" data-toggle="collapse">
                     <div class="card">
                         <div class="card-header">
                             <div class="container">
                                 <h5 class="mb-0">
                               <div class="d-flex">
                                   <div class="p-2 mr-auto">
                                         <a href="#collapseArea" data-toggle="collapse" class="btn btn-link">
                                         <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                         &nbsp;<span>Show order memory <span class="fa fa-caret-down"></span></span>
                                        </a>
                                   </div>
                                </div>
                                <div class="d-flex">
                                    <div class="p-2">
                                         <div class="p-2"><h4>$<?php
                                    if(isset($_SESSION['totalPrice'])){
                                        echo $_SESSION['totalPrice'];
                                    }    
                                       ?></h4></div>
                                    </div>
                                </div>
                             </h5>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div id="collapseArea" class="collapse">
                       <div class="card-body">
                              <?php
                            if($_COOKIE['shopping_cart']){
                                $total=0;
                                $cookie_data=stripslashes($_COOKIE['shopping_cart']);
                                $cart_data=json_decode($cookie_data,true);
                                foreach($cart_data as $keys =>$values){
                                    ?>
                                    <div class="container">
                                        <div class="collapseProduct-container">
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
                                              <div class="p-2 ml-auto align-self-center">
                                                  <span>$<?php echo number_format($values['price'],2)?></span>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                  $total+=($values['price']*$values['item_quantity']);
                                    
                                 }
                                ?>
                                <hr/>
                                <div class="discount-area">
             <form method="POST">
                  <div class="d-flex flex-row justify-content-center">
                  <div class="p-2"><div class="form-group">
                      <input type="text" placeholder="Discount" class="form-control discount" id="discount">
                      <small class="form-text text text-danger" id="discountErrorMessage"></small>
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
                  <span>$<?php  echo number_format($total,2);?></span>
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
                                <?php
                               }
                            ?>
                         
                     </div>
                     
                    
                 </div>
              
                
                
             </div> 
             <div class="col-md-6" id="contactArea"> 
            <?php
                 if(!isset($_SESSION['userEmail'])){
                     ?>
                        <div class="d-flex">
                 <div class="p-2 mr-auto"><h4>Contact information</h4></div>
                 <div class="p-2 d-none d-lg-block">Already have an account? <a href="javascript:void(0);" class="login-trigger drawer-toggle btn btn-link">Log in</a></div>
                <div class="p-2 d-xs-block d-sm-block d-md-block d-lg-none">Already have an account? <a href="login.php" class="btn btn-link">Log in</a></div>
             </div>
                     <?php
                 }
                 ?>
             
             <form method="POST" class="contactInformationForm">
                 <?php
                 if(isset($_SESSION['userEmail'])){
                   ?>
                   <div class="form-group d-none d-md-block d-xs-none d-sm-none d-lg-block">
                       <div class="d-flex">
                       <div class="p-2 justify-content-xl-start">
                           <div class="avatar-area">
                               <img src="Images/avatar.png" alt="Avatar-pic" class="img-fluid">
                           </div>
                       </div>
                       <div class="p-2 justify-content-xl-end">
                           <h5><?php echo $_SESSION['lastName']." ".$_SESSION['lastName']?></h5>
                           <h5>(<?php echo $_SESSION['userEmail']?>)</h5>
                           <label class="form-check-label" for="check1">
        <input type="checkbox" class="form-check-input" id="keepOffer" name="option1"/>	
      Keep me up to date on news and exclusive offers
            </label>
                      <input type="email" class="contact-email form-control d-none" id="contactEmail" placeholder="Contact email" required value="<?php if(isset($_SESSION['userEmail'])){echo $_SESSION['userEmail'];}?>">
                       </div>
                   </div>
                   </div>
                   <?php 
                 }
                 else {
                     ?>
                    <div class="form-group">
                 <input type="email" class="contact-email form-control" id="contactEmail" placeholder="Contact email" required>
                 <small class="form-text" id="ContactEmailmessage"></small>
              <span class="form-text">
                  <label class="form-check-label" for="check1">
        <input type="checkbox" class="form-check-input" id="keepOffer" name="option1"/>	
      Keep me up to date on news and exclusive offers
            </label>
             
              </span>
             </div> 
                     <?php
                 }
                 ?>
                 
                 
             <br><br>
             <div class="d-flex">
                 <div class="p-1 mr-auto"><h4>Shipping Address</h4></div>
             </div>
             <div class="form-group">
                 <div class="row">
                     <div class="col-md-6" style="padding-bottom:10px;">
                         <input type="text" class="form-control first-name" id="first_name" placeholder="First name (optional)" value="<?php if(isset($_SESSION['firstName'])){echo $_SESSION['firstName'];}?>">
                         <small class="form-text text text-danger" id="firstNameErrorMessage"></small>
                     </div>
                     <div class="col-md-6">
                         <input type="text" class="form-control last-name" id="last_name" placeholder="Last name" required value="<?php if(isset($_SESSION['lastName'])){echo $_SESSION['lastName'];}?>">
                          <span class="form-text text-center" id="lastnameErrorMessage"></span>
                     </div>
                 </div>
             </div>
             <div class="form-group">
                 <input type="text" class="form-control company-name" id="company_name" placeholder="Company(optional)">
             </div>
             <div class="form-group">
                 <input type="text" class="form-control user-address" id="user_address" placeholder="Address" required>
                 <span class="form-text text text-danger" id="addressMessage"></span>
                 
             </div>
             <div class="form-group">
                 <input type="text" class="form-control apartment-address" id="apartment_address" placeholder="Apartment, suite, etc. (optional)">
             </div>
             <div class="form-group">
                 <input type="text" class="form-control city" id="city" placeholder="city" required>
                 <span class="form-text text-danger" id="cityMessage"></span>
             </div>
             <div class="form-group">
                 <div class="row">
                     <div class="col-md-6" style="padding-bottom:10px;">
                         <select id="selected_countries" class="form-control" required>
                             <option value="USA">USA</option>
                             <option value="UK">England (UK)</option>
                             <option value="germany">Germany</option>
                         </select> 
                     </div>
                     <div class="col-md-6"><input type="text" class="form-control postal-code" placeholder="Postal code" id="postalCode" required>
                     <span class="form-text text-danger" id="postalCodeMessage"></span>
                     </div>
                 </div>
             </div>
             <div class="form-group">
                 <div class="d-flex flex-row-reverse">
                     <div class="p-2">
                         <input type="submit" class="form-control btn btn-primary text-center continueShopping-method" id="continueShopping" value="Place the order">
                     </div>
                 </div>
             </div>
             </form>
             
             </div> 
             <div class="col-md-6 d-none d-md-block d-xs-none d-sm-none d-lg-block">
                 <div class="showShopping-item">
<!--     Will be rendered using jquery                -->
                 </div>
             </div>
         </div>
     </div>
 </section>
</main>
 <?php require_once('Includes/footer.php')?>