$(document).ready(function(){
    //Drop Down while mouse hovering
      $('li.dropdown').hover(function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(50).fadeIn(500);
    }, function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(50).fadeOut(500);
         
    }); 
    // </DropDownMenu>
     /*<Enable-zoom-product-photo>*/
    /*The following code is used to zoom in so that users can view closely 
       It is enabled in  "Bags.php" 
     */
     $('#image_1,#image_2,#image_3,#image_4').elevateZoom({
    zoomType: "inner",
cursor: "crosshair",
zoomWindowFadeIn: 500,
zoomWindowFadeOut: 750
   }); 
     /*<Enable-zoom-product-photo>*/
     /*<Enable-drawer-starts>*/
     $('.drawer').drawer();
    /*<Enable-drawer-ends>*/
     /*<Enable-dropdown-menu-starts>*/
    dropDownMenu();
    function dropDownMenu(){
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{dropdown:1},
            success:function(data){
                $("#bageDropDownMenu").html(data);
            }
        });
    }
    /*<Enable-dropdown-menu-ends>*/
     /*<Enable-filter-starts>*/
    $("#filter").change(function(){
        let value=$("#filter").val();
        let brandId=$("#sortBy").attr('brandId');
        let preorderCheck=0; 
        if(value==='selectOne'){
           return false;    
        }
        if(value==='preOrders'){
            preorderCheck=1;
        }
        if(value==='AllProducts'){
            preorderCheck=0;
        }
         
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{filterProduct:1,value:value,brandId:brandId,preorderCheck:preorderCheck},
            success:function(data){
              $(".show-items").html(data);
              
            }
            
        })
    
    })
    /*<Enable-filter-ends>*/
    
    /*<Enable-sorting-products-starts>*/
    //  look -> "collections.php";
    $("#sortBy").change(function(){
        let value=$("#sortBy").val();
        let brandId=$(this).attr('brandId');
        let filterValue=$("#filter").val();
        let preorderCheck=0;
        let allPreorders=$(this).attr('showAll');
        let newArrivals=$(this).attr('newArrivals');
        if(value==='selectOne'){
           return false;    
        }
        if(filterValue==='preOrders'){
            preorderCheck=1;
        }
        if(filterValue==='AllProducts'){
            preorderCheck=0;
        }
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{enableSortBy:1,value:value,brandId:brandId,preorderCheck:preorderCheck,allPreorders:allPreorders,newArrivals:newArrivals},
            success:function(data){
               
              $(".show-items").html(data);
             
            }
            
        })
    })
        /*<Enable-sorting-products-ends>*/

  /*<Enable-login-starts*/   
    //Look -> "header.php"
    /*contents in ".form-area" and heading in ".search-header" will dynamically be changed*/
  $(".login-trigger").click(callingLogin);
    
    $("body").delegate('.callLoginArea','click',callingLogin);
    
    function callingLogin(){
        $(".search-header").html("Login");
      $(".form-area").html(
      '<div class="login-wrapper text-center"><form method="POST" id="loginForm"><div class="form-group"><input type="email" name="userEmail" id="userEmail" class="userEmail form-control" placeholder="Email" required></div><div class="form-group"><input type="password" name="userPassword" id="userPassword" class="form-control" placeholder="password" required></div><div class="form-group"><span class="text text-danger loginMessage"></span><div><a href="javascript:void(0);" class="btn btn-link createNewAccount">Create new account</a></div><input type="submit" value="SIGN IN" class="form-control btn btn-outline-primary" id="signIn"></div></form></div>'
      );  
    }
     
    $("body").delegate('.createNewAccount','click',callingSignIn);
    
    function callingSignIn(){
        $(".login-wrapper").slideUp(1000,function(){
           $(".search-header").html("SIGN UP");
      $(".form-area").html(
      '<div class="login-wrapper text-center signUpWrapper"><form method="POST" id="SignUpForm"><div class="form-group"><input type="text" id="signUpFirstName" class="form-control" placeholder="First Name" required/></div><div class="form-group"><input type="text"    class="form-control" id="signUpLastName" placeholder="Last name" required/></div><div class="form-group"><input type="email" name="signUpEmail" id="signUpEmail" class="signUpEmail form-control" placeholder="Email" required></div><div class="form-group"><input type="password" name="signupPassword" id="signupPassword" class="form-control" placeholder="password" required></div><div class="form-group"><span class="text text-danger signupMessage"></span><div><a href="javascript:void(0);" class="btn btn-link callLoginArea">Login</a></div><input type="submit" value="SIGN UP" class="form-control btn btn-outline-info" id="signIn"></div></form></div>'
      )  
        });
         
     }
     
    $(".mainsignupArea").hide(); //Main sign up form is hidden default ("login.php");
    $("#createanAccount").click(function(){
        $(".mainloginArea").slideUp(500,function(){
             $(".mainsignupArea").slideDown(500);
        });
        
    })
    
    $(".callLoginArea").click(function(){
        $('.mainsignupArea').slideUp(500,function(){
            $(".mainloginArea").slideDown(500); 
        });
    })
    
    
    $("body").delegate('#SignUpForm','submit',function(event){
        event.preventDefault();
       let signUpfirstName=$("#signUpFirstName").val();
        let signUpLastName = $("#signUpLastName").val();
        let signUpEmail = $("#signUpEmail").val();
        let signUpPassword = $("#signupPassword").val();
        
         if(signUpfirstName==''){
             $(".signupMessage").html("All fields required").delay(1000).fadeOut(300);
             $("#signUpFirstName").css("border","2px solid red");
              return false; 
         }
        else if(signUpLastName==''){
            $(".signupMessage").html("All fields required").delay(1000).fadeOut(300);
             $("#signUpLastName").css("border","2px solid red");
             return false; 
        }
        else if(signUpEmail==''){
            $(".signupMessage").html("All fields required").delay(1000).fadeOut(300);
             $("#signUpEmail").css("border","2px solid red");
            return false; 
        }
        else if(signUpPassword==''){
               $(".signupMessage").html("All fields required").delay(1000).fadeOut(300);
            
            $("#signupPassword").css("border",'2px solid red');
            return false; 
        }
        else if(signUpPassword.length <=5){
            $(".signupMessage").html("Password weak");
            return false; 
        }
        else {
           $.ajax({
               url:'action.php',
               method:'POST',
               data:{enableSignUp:1,firstName:signUpfirstName,lastName:signUpLastName,email:signUpEmail,password:signUpPassword},
               success:function(data){
                   if(data=='Yes'){
                       
                       $(".final-result").html("Registered successfully!!. Please login now").delay(3000).fadeOut(1,function(){
                           window.location.reload();
                       });
                       $(".signupMessage").html('<h5 class="text text-danger">Registred successfully. &nbsp;Please login now.</h5>');
                       $("#SignUpForm")[0].reset();
                       $("#signUpFirstName").focus();
                   }
                    if(data=="exist"){
            $(".signupMessage").html("Email already exist....");
                     }
               }
           })
        }
    });
    
     /*<Enable-login-starts*/

     /*<Enalbe-search-starts>*/
        /*contents in ".form-area" and heading in ".search-header" will dynamically be changed*/
     $("#search").click(function(){
       $(".search-header").html("Search for products on our site");
        $(".form-area").html(
        '<div class="input-group"><input class="form-control" placeholder="Search our store" type="search" id="searchBar"><div class="input-group-addon"><a href="javascript:void(0);" id="searchButton"><i class="fa fa-search"></i></a></div></div><div class="form-body"></div>'
        );
        
     });
    
    /*<Search using Jqery>*/
    $('body').delegate('#searchBar','keyup',function(){
          let userInput =$(this).val().trim().toLowerCase();
             
         $.ajax({
            url:'action.php',
             method:'POST',
             data:{enableSearchBar:1,userInput:userInput},
             success:function(data){
                 $('.form-body').html(data);
             }
         });
    });
    /*<//SearchQuery>*/
    
    
    $('body').delegate('.deleteProduct','click',function(){
        let productId=parseInt($(this).attr('removeProductId'));
        if(productId!=''){
            $.ajax({
                url:'action.php',
                method:'POST',
                data:{enableRemove:1,productId:productId},
                success:function(data){ 
                     fetchingCookies();
                    showFerchingCookies();
                }
            })
        }
    })
    
    /*<Enalbe-search-starts>*/
     $("body").delegate("#loginForm",'submit',function(event){
         event.preventDefault();
         let email=$("#userEmail").val();
         let password=$("#userPassword").val();
         if(email=="" && password==""){
             $(".loginMessage").html('Please fill the empty fields');
             return false; 
         }
         else {
           $.ajax({
               url:"action.php",
               method:"POST",
               data:{enableLogin:1,email:email,password:password},
               success:function(data){
                   if(data=="Invalid"){
                       $("#userEmail").css("border-color","red");
                   $(".loginMessage").html("Invalid email address");
                       return false; 
                    }
                   if(data=="notFound"){
                    $("#userEmail").css("border-color","red");
                       $("#userPassword").css("border-color",'red');
                        $(".loginMessage").html('Email or password incorrect');
                      return false; 
                    }
                    
                  if(data=="Success"){
                      window.location.href="index.php";
                  }  
               }
           })
         }   
    })
    
    /*<Closing-drawer-sidebar-starts>*/
    //look ->"Includes/header.php"
    $('#closeDrawer').click(function(){
        $('.drawer').drawer('close');
       
    })
     /*<Closing-drawer-sidebar-ends>*/
     
    
     /*<Increasing-quantity-starts>*/
     // Look -> "Bags.php"
    $("#quantityIncreament").click(function(){
      let quantity=$("#quantity").val();
       quantity++;
      $("#quantity").val(quantity);
        
  })
    /*<Increasing-quantity-ends>*/
    
     /*<Decreasing-quantity-starts>*/
    // Look -> "Bags.php"
    $("#quantityDecreament").click(function(){
        let quantity=$("#quantity").val();
         if(quantity<=1){
               quantity=1;
         }
        else {
            quantity--;
         }
      $("#quantity").val(quantity);
        
    })
      /*<Dec0reasing-quantity-finishes>*/

    /*<Enabling-addto-cart-start>*/
    $(".add-to-cart").click(function(){
        let id=$(this).attr('pid');
        let name=$(this).attr('pname');
        let price=$(this).attr('price');
        let image=$(this).attr('image');
        let quantity=$("#quantity").val();
        $(this).text("Adding to cart...");
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{enableAddtoCart:1,id:id,name:name,price:price,image:image,quantity:quantity},
             success:function(data){
                $(".adding-message").fadeIn(2);
             $(".adding-message").html("Added to cart successfully").delay(3000).fadeOut(800,function(){
                 $(".adding-message").html("");
             });
              $('.add-to-cart').text("ADD TO CART");
                 fetchingCookies();
                showFerchingCookies();
            },
             
        });
    })
    /*<Enabling-Shopping-cart-trigger-ends>*/
    
    function fetchingCookies(){
             $(".search-header").html("Products list");
           $.ajax({
              url:"action.php",
              method:"POST",
              data:{enableCookies:1},
              success:function(data){
               $(".form-area").html(data);
                 }
          });
    }
    
    showFerchingCookies();
     function showFerchingCookies(){
             $(".search-header").html("Products list");
           $.ajax({
              url:"action.php",
              method:"POST",
              data:{enableCookies:1},
              success:function(data){
               $(".orderedProducts").html(data);
                 }
          });
    }
    
    
     $('#shoppingcartTrigger').click(fetchingCookies);
       /*<Enabling-shopping-cart-trigger-finishes>*/
    
     $("body").delegate('.increaseQuantity','click',function(){
         let itemId = $(this).attr('dataId');
       
         //,price:price,name:name,image:image
         $.ajax({
             url:'action.php',
             method:'POST',
             data:{increaseQuantity:1,id:itemId},
             success:function(data){
                  fetchingCookies();
                 showFerchingCookies();
              }
         });
     });
    
    
    $("body").delegate('.decreaseQuantity','click',function(){
         let value = $('.quantityValue').val();
          if(value<=1){
              return false; 
          }
        else {
            
         let itemId = $(this).attr('dataId');
         $(this).attr('productValue',value);
         $.ajax({
            url:'action.php',
             method:'POST',
             data:{decreaseQuantity:1,itemId:itemId},
             success:function(data){
                 fetchingCookies();
                 showFerchingCookies();
             }
         });
        
        }
           
    });
     
  
    
    //Whenever quantity changes, quantity would be upaded. 
    function quantityHandler(){
         let itemId= $(this).attr('dataId');
         let value = $(this).val();
         if(value<=1 || isNaN(value)){
             value=1; 
         }
        $.ajax({
           url:'action.php',
            method:'POST',
            data:{quantityEditEnable:1,itemId:itemId,value:value},
            success:function(){
               fetchingCookies();
                showFerchingCookies();
            }
        });
        
     }
    $('body').delegate('.quantityValue','change',quantityHandler)
      
       $("#subscribeForm").submit(function(event){
           event.preventDefault(); 
         let subEmail=$("#subsEmail").val();
          if(subEmail==""){
              return false; 
          }
        let message='<p class="sub-message text text-success">Thanks for subscribing</p>';
          //$(this).html(message);
          $.ajax({
            url:'action.php',
              method:'POST',
              data:{enableSub:1,subEmail:subEmail},
              success:function(data){
                  if(data=="Yes"){
                     $("#subscribeForm").html(message);
                  }
                  else {
                     $("#subsEmail").css("border","1px solid red");
                     $(".subMessage").html(data);
                      return false; 
                  }
              }
          });
      });
     checkOut();
    function checkOut(){
      $.ajax({
          url:'action.php',
          method:'POST',
          data:{enableCheckOut:1},
          success:function(data){
              $(".showShopping-item").html(data);
          }
      });
        
    }
    
    $("body").delegate('#discountArea','submit',function(event){
        event.preventDefault();
      let discountValue = $("#discountValue").val().trim();
        if(discountValue==''){
            $(".discountErrorMessage").html("Please enter the coupan id");
             return false; 
        } 
        
        $.ajax({
            url:'action.php',
            method:'POST',
            data:{enableDiscountValue:1,discountValue:discountValue},
            success:function(data){
                if(data=="notFound"){
             $(".discountErrorMessage").html("Invalid coupan");
                    return false; 
                 }
            }
        })
        
        
        
    });
    
    /*This form could be found in checkout.php*/
    
    $(".contactInformationForm").submit(function(event){
      
        event.preventDefault();
        let email = $("#contactEmail").val();
       let firstName=$("#first_name").val();
        let lastName= $("#last_name").val();
        let companyName=$("#company_name").val();
        let address =$("#user_address").val();
        let apartment= $("#apartment_address").val();
        let country=$("#selected_countries").val();
        let city = $("#city").val();
        let postal=$("#postalCode").val();
        let check=0; 
          
        if($("#keepOffer").is(":checked")){
            check=1; 
        }
        else {
            check
        }
         
        if(email==''){
         $("#lastnameErrorMessage").html("<small>please enter the email</small>");
            return false; 
         }
        else if(lastName==''){
            $("#lastnameErrorMessage").html("<small>Please enter the last name</small>");
            return false; 
        }
        
       else if(address==''){
           $("#addressMessage").html("<small>Please enter the address</small>");
           return false; 
       }
        else if(city==''){
            $("#cityMessage").html("<small>Please enter the city name.</small>");
            return false; 
       }
        else if(postal==''){
           $("#postalCodeMessage").html("<small>Please enter the postal</small>");
            return false; 
        } 
        else {
         $.ajax({
               url:'action.php',
               method:'POST',
               data:{enableOrderSection:1,firstName:firstName,lastName:lastName,companyName:companyName,address:address,apartment:apartment,country:country,city:city,postal:postal,email:email,check:check},
               success:function(data){
                    if(data=='Yes'){
                     window.location.href='https://www.sandbox.paypal.com/signin?country.x=US&locale.x=en_US';
                 } 
               }
           });
         
         }
     })
     
 }) //Document finishes here
 
     