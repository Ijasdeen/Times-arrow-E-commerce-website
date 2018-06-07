<?php
//We are validating data that is taken from URL;
function testdata($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;    
}

?>