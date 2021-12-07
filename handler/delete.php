<?php

require "../dbbroker.php";
require "../model/dodaj.php";

if(isset($_POST['idItem'])){
    $obj = new Dodaj($_POST['idItem']);
    $status = $obj->deleteById($conn);
    if ($status){
        echo "Success";
    }else{
        echo "Failed";
    }
}

?>