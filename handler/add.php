<?php

require "../dbbroker.php";
require "../model/dodaj.php";

session_start();

if(isset($_POST['nameItem']) && isset($_POST['date']) 
&& isset($_POST['urgent']) && isset($_SESSION['user_id']) ){
    $dodaj = new Dodaj(null,$_POST['nameItem'],$_POST['date'],$_POST['urgent'], $_SESSION['user_id']);
    $status = Dodaj::add($dodaj, $conn);

    if($status){
        echo "Success";
    }else{
        echo $status;
        echo "Failed";
    }
}

?>