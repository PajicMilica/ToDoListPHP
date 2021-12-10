<?php

require "dbbroker.php";
require "model/dodaj.php";


session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$podaci = Dodaj::getAll($_SESSION['user_id'],$conn);
if (!$podaci) {
    echo "Nastala je greška pri preuzimanju podataka";
    die();
}
if ($podaci->num_rows == 0) {
    echo "Nema item-a";
    die();
} else {
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
        <div class="col-md-6">
            <button id="btn" class="btn btn-info btn-block" style="border-radius: 50%; background-color: rgb(128, 0, 0);!important; border: 3px solid black; "> Show</button>
        </div>
        <div class="col-md-6">
            <button id="btn-dodaj" type="button" class="btn btn-success btn-block" style=" border-radius: 50%; background-color: rgb(128, 0, 0); border: 3px solid black;" data-toggle="modal" data-target="#myModal"> Add Item</button>
        </div>
        
    </div>



    <div id="pregled" class="panel panel-success" style="margin-top:5%; margin-left: 5%; margin-right: 5%;">
        <div class="panel-body">
                <table id="myTable" class="table table-hover table-striped"  style="color: black; background-color: white;" >
                    <thead class="thead">
                        <tr>
                        <th scope="col">Id item</th>
                            <th scope="col">Name item</th>
                            <th scope="col">Final date</th>
                            <th scope="col">Urgency of execution</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    
                       <?php
                        while ($red = $podaci->fetch_array()) :
                        ?>
                            <tr>
                            <td><?php echo $red["idItem"] ?></td>
                                <td><?php echo $red["nameItem"] ?></td>
                                <td><?php echo $red["dateItem"] ?></td>
                                <td><?php echo $red["urgent"] ?></td>
                                <td>
                                    <label class="custom-radio-btn" ;>
                                        <input type="radio" name="checked-donut" value=<?php echo $red["idItem"] ?>>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                            </tr>
                        <?php
                        endwhile;
                    }
                        ?>
                        
                    </tbody>
                </table>
                <div class="row">
                        <div class="col-md-1" style="text-align: right">
                            <button id="btn-izmeni" class="btn btn-warning"  style="background-color: rgb(128, 0, 0); border: 1px solid white;" data-toggle="modal" data-target="#izmeniModal" >Change</button>
                        </div>

                        <div >
                            <button id="btn-obrisi" formmethod="post" class="btn btn-danger" style="background-color: rgb(128, 0, 0); border: 1px solid white;">Delete</button>          
                        </div>
                </div>
        </div>      
    </div>
   

    

        <div class="modal fade" id="myModal" role="dialog" style="margin-top:5%; margin-left: 25%; margin-right: 25%; margin-bottom: 10%; background-color: rgb(128, 0, 0); border: 5px solid #3d1a1a;">
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
                            
                                <label for="">Date</label>
                                <input type="date" style="border: 1px solid black; width: 180px;" name="date" class="form-control" /><br>

                                <label for="item">Urgent:</label><br>
                                <input type="text" id="item" name="urgent" placeholder="Urgent or not urgent.."><br>

                                
                                <button id="btnDodaj" type="submit" class="btn btn-success btn-block" style="width: 100px; color:rgb(128, 0, 0); background-color: rgb(233, 211, 197); border: 3px solid rgb(128, 0, 0);" tyle="background-color: pink; border: 1px solid black;">Add item</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

           
    </div>
    <div class="modal fade" id="izmeniModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                    <div class="modal-body">
                        <div class="container prijava-form">

                            <form action="#" method="post" id="izmeniForm" >
                                <h2>Change item</h2>

                                <label for="id">Id of the item you want to change:</label><br>
                                <input type="text" id="id" name="id" placeholder="id.."><br>

                                <label for="item">New name item:</label><br>
                                <input type="text" id="nameItem" name="nameItem" placeholder="New name item.."><br>
                            
                                <label for="">Date</label>
                                <input type="date" id="date" style="border: 1px solid black; width: 180px;" name="date" class="form-control" /><br>

                                <label for="item">Urgent:</label><br>
                                <input type="text" id="urgent" name="urgent" placeholder="Urgent or not urgent.."><br>

                                <button id="btnIzmeni" type="submit" class="btn btn-success btn-block" style="width: 100px; color:rgb(128, 0, 0); background-color: rgb(233, 211, 197); border: 3px solid rgb(128, 0, 0);" >Change item</button>
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