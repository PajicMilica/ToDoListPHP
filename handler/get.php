<?php

require "../dbbroker.php";
require "../model/dodaj.php";

if(isset($_POST['id'])){
    $myArray = Dodaj::getById($_POST['id'], $conn);
    echo json_encode($myArray);
}

?>