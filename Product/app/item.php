<?php 

class Item extends Dbhndel {
  
    // public $name;
    // public $desc;
    // public $price;
    // public $img;
    

  public function getIems() {
    $sql = "SELECT * FROM items";
    $stmt = self::connect()->prepare($sql);
    $stmt->execute();

    while($result = $stmt->fetchAll()) {
      return $result;
    };
  }

  public function addProduct($title, $body, $price,$img) {
    $sql = "INSERT INTO items(name, description, price,img) VALUES (?, ?, ?,?)";
    $stmt = self::connect()->prepare($sql);
    $stmt->execute([$title, $body, $price,$img]);
  }

  public function editProduct($id) {
    $sql = "SELECT * FROM items WHERE id = ?";
    $stmt = self::connect()->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetch();

    return $result;
  }

  public function updateProduct($id, $title, $body, $price) {
    $sql = "UPDATE items SET name = ?, description = ?, price = ? WHERE id = ?";
    $stmt = self::connect()->prepare($sql);
    $stmt->execute([$title, $body, $price, $id]);
  }

  public function delProduct($id) {
    $sql = "DELETE FROM items WHERE id = ?";
    $stmt = self::connect()->prepare($sql);
    $stmt->execute([$id]);
  }
}