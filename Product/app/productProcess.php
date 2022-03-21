<?php 

  include "../init.php";
  $imag_dir = "../public/img/";
  $products = new Item();
  if(isset($_POST['submit'])) {
    $title = $_POST['name'];
    $price = $_POST['price'];
    $body = $_POST['description'];
    $img_name='';
    if (isset($_FILES['img'])) {
      $file_type = explode(".", $_FILES['img']["name"]);
      $ext = end($file_type);
      $allowed_ext = array('png', 'jpg', 'jpeg');
      if (in_array($ext, $allowed_ext)) {
          $img_name = time() . '.' . $ext;
          move_uploaded_file($_FILES['img']['tmp_name'], $imag_dir . $img_name);
          $products->addProduct($title, $body, $price, $img_name );
        }
        
      }else{
        $products->addProduct($title, $body, $price, $img_name );
      }


    header('location:/Product/views');
    exit();
  }
     else if(isset($_GET['send']) ) {
       if($_GET['send']=== 'del'){
        $id = $_GET['id'];
        $products->delProduct($id);
        header('location:/Product/views');
        exit();
       }
   

  } else if(isset($_GET['send'])) {
    if($_GET['send'] === 'update'){
      $id = $_GET['id'];
      $title = $_POST['name'];
      $body = $_POST['price'];
      $price = $_POST['description'];
  
      $products->updateProduct($id, $title, $body, $price);
      header('location:/Product/views');
      exit();
    }

    
  }
