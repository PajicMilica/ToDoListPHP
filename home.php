<?php

require "dbbroker.php";
require "model/dodaj.php";


session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/cssHome.css">
   
</head>

<body>


    <div class="row" style=" margin-top: 16%; background-color: rgba(225, 225, 208, 0.5);">
        <div class="col-md-4">
            <button id="btn" class="btn btn-info btn-block" style="border-radius: 50%; background-color: rgb(128, 0, 0);!important; border: 3px solid black; "> Show</button>
        </div>
        <div class="col-md-4">
            <button id="btn-dodaj" type="button" class="btn btn-success btn-block" style=" border-radius: 50%; background-color: rgb(128, 0, 0); border: 3px solid black;" data-toggle="modal" data-target="#myModal"> Add Item</button>

        </div>
        <div class="col-md-4">
            <button id="btn-pretraga" class="btn btn-warning btn-block" style="border-radius: 50%; background-color:  rgb(128, 0, 0); border: 3px solid black;"> Search</button>
        </div>
    </div>



    <div id="pregled" class="panel panel-success" style="margin-top:5%; margin-left: 5%; margin-right: 5%;">
            <div class="panel-body">
                <table id="myTable" class="table table-hover table-striped" style=" color: rgb(128, 0, 0); background-color:rgb(128, 0, 0);">
                    <thead class="thead">
                        <tr>
                            <th scope="col">Name item</th>
                            <th scope="col">Final date</th>
                            <th scope="col">Urgency of execution</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> </td>
                            <td> </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>      
    </div>

    

        <div class="modal fade" id="myModal" role="dialog" style="width: 800px; height: 500px; background-color: rgb(128, 0, 0); border: 5px solid #3d1a1a;">
            <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                    <div class="modal-body">
                        <div class="container prijava-form">
                            <form action="#" method="post" id="dodajForm"  >
                                <h2>Add item</h2>
                                <label for="item">Name item:</label><br>
                                <input type="text" id="item" name="nameItem" placeholder="Name item.."><br>
                            
                                <label for="">Datum</label>
                                <input type="date" style="border: 1px solid black; width: 180px;" name="datum" class="form-control" /><br>

                                <label for="item">Urgent:</label><br>
                                <input type="text" id="item" name="urgent" placeholder="Urgent or not urgent.."><br>

                                
                                <button id="btnDodaj" type="submit" class="btn btn-success btn-block" style="width: 100px; color:rgb(128, 0, 0); background-color: rgb(233, 211, 197); border: 3px solid rgb(128, 0, 0);" tyle="background-color: pink; border: 1px solid black;">Add item</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="JS/javascript.js"></script>
        




</body>
</html>