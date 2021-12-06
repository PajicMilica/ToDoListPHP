<?php
class Dodaj{
    public $id;   
    public $nameItem;   
    public $datum;   
    public $urgent;  
    public $user; 
    
    public function __construct($id=null, $nameItem=null, $datum=null, $urgent=null, $user=null)
    {
        $this->id = $id;
        $this->nameItem = $nameItem;
        $this->datum = $datum;
        $this->urgent = $urgent;
        $this->user = $user;
    }

    public function deleteById(mysqli $conn)
    {
        $query = "DELETE FROM iteme WHERE id=$this->id";
        return $conn->query($query);
    }

    public function update($id, mysqli $conn)
    {
        $query = "UPDATE item set nameItem = $this->nameItem, datum = $this->datum,urgent = $this->urgent WHERE id=$id";
        return $conn->query($query);
    }

    public static function add(Dodaj $dodaj, mysqli $conn)
    {
        $query = "INSERT INTO item(nameItem, datum, urgent, user) VALUES('$dodaj->nameItem','$dodaj->datum','$dodaj->urgent','$dodaj->user')";
        return $conn->query($query);
    }

  public static function getAll($id, mysqli $conn)
  {
      $query = "SELECT * FROM item WHERE user=$id";
      return $conn->query($query);
  }

}

?>