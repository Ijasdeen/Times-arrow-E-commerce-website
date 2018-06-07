<?php require_once('connection.php')?>
<?php require_once('Includes/header.php')?>
<main class="searchMainArea d-xs-block d-sm-block d-md-block d-lg-none">
    <div class="container" id="searchMainContainer">
        <div class="row">
            <div class="col-md-12">
                <h3 class="search-header">Search here</h3>
            </div>
            <div class="col-md-12 col-xs-12 col-sm-12">
                <div class="form-area">
                    <div class="input-group"><input class="form-control" placeholder="Search our store" type="search" id="searchBar">
                        <div class="input-group-addon"><a href="javascript:void(0);" id="searchButton"><i class="fa fa-search"></i></a></div>
                    </div>
                    
                    <div class="form-body" id="formBody">
<!--                        Content will be rendered via jquery-->
                    </div>
                </div>
            </div>
        </div>
    </div>
 </main>     
<?php require_once('Includes/footer.php')?>
  

