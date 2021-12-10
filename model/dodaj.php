<?php
class Dodaj{
    public $id;   
    public $nameItem;   
    public $date;   
    public $urgent;  
    public $user; 
    
    public function __construct($id=null, $nameItem=null, $date=null, $urgent=null, $user=null)
    {
        $this->id = $id;
        $this->nameItem = $nameItem;
        $this->date = $date;
        $this->urgent = $urgent;
        $this->user = $user;
    }

    public function deleteById(mysqli $conn)
    {
        $query = "DELETE FROM item WHERE idItem=$this->id";
        return $conn->query($query);
    }


    public static function update(Dodaj $dodaj, mysqli $conn)
    {
        $query = "UPDATE item set nameItem = '$dodaj->nameItem', dateItem = '$dodaj->date', urgent = '$dodaj->urgent' WHERE idItem='$dodaj->id'";
        return $conn->query($query);
    }

    public static function add(Dodaj $dodaj, mysqli $conn)
    {
        $query = "INSERT INTO item(nameItem, dateItem, urgent, User) VALUES('$dodaj->nameItem','$dodaj->date','$dodaj->urgent','$dodaj->user')";
        return $conn->query($query);
    }

  public static function getAll($idUser, mysqli $conn)
  {
      $query = "SELECT * FROM item WHERE User=$idUser";
      return $conn->query($query);
  }

}

?>