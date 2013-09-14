<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class ProductsController extends BaseController {

  function index() {
    $this->set('title', 'All Products - Productlist');
    $this->set('searchterm',0);
    $this->View('products/search');
//$this->set('products', $this->Item->selectAll());
  }

  function postupload() {
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = strtolower(end($temp));
    if (($_FILES["file"]["size"] < 2000000 && $extension === 'csv')) {
      if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
      } else {
        if (file_exists("uploads/" . $_FILES["file"]["name"])) {
          echo $_FILES["file"]["name"] . " already exists. ";
        } else {
          $uploaddir = ROOT . '/uploads/' . $_FILES['file']['name'];
          if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploaddir)) {
            
          } else {
            echo 'failed to upload';
          }
        }
      }
    } else {
      echo "Invalid file";
    }
    die();
  }

  function readcsv($filename) {
    $location = ROOT . '/uploads/' . $filename;
    $csv = new File_CSV_DataSource($location);
    //$category = $csv->getColumn('Category');
    //$this->_insertCategory($category);
    //get all category as associate array;
    $reult = $this->Product->query('SELECT * FROM category');
    $catemap = array();
    foreach ($reult as $category)
      $catemap[$category['Category']['name']] = $category['Category']["id"];
    $data = $csv->connect();
    foreach ($data as $key) {
      $pid = $key['ProductId'];
      $name = $key['MovieTitle'];
      $store = $key['Store'];
      $gpid = $key['GroupId'];
      $price = $key['Price'];
      $dur = $key['ShippingDuration'];
      $ifcategory = $this->Product->get_single('SELECT id FROM category where name="' . $key['SubCategory'] . '" and parent=' . $catemap[$key['Category']]);
      //print_r($ifcategory);die();
      if ($ifcategory == 0) {
        $cat_id = $this->Product->query('INSERT INTO category (name,parent) VALUES("' . $key['SubCategory'] . '",' . $catemap[$key['Category']] . ')');
        $this->Product->query("INSERT INTO product (product_id,name,store,category_id,group_id,price,shipping_duration) VALUES('$pid','$name','$store',$cat_id,'$gpid',$price,$dur)");
      } else {
        //echo "INSERT INTO product (product_id,name,store,category_id,group_id,price,shipping_duration) VALUES('$pid','$name','$store',$ifcategory,'$gpid',$price,$dur)";die();
        $this->Product->query("INSERT INTO product (product_id,name,store,category_id,group_id,price,shipping_duration) VALUES('$pid','$name','$store',$ifcategory,'$gpid',$price,$dur)");
      }
    }
  }

  private function _insertCategory($cat) {
    $unique = array_unique($cat);
    $sql = "INSERT INTO category (name) VALUES";
    $string = '';
    foreach ($unique as $cate) {
      $string.=",('" . $cate . "')";
    }
    $mysql_string = substr($string, 1);

    $reult = $this->Product->query($sql . $mysql_string);
    echo $reult;
  }

  function search() {
    $key=$_POST['find'];
    $search_key = trim($key); //remove white spaces
    $search_key = htmlspecialchars($key);
    $search_key = strtoupper($search_key);
    $escape_string = $this->Product->get_escape($search_key);
    $result1 = $this->Product->query("SELECT * FROM product WHERE UPPER(name) LIKE '%$escape_string%' GROUP BY group_id");
    //print_r($result1);die();
    $this->set('rescount', count($result1));
    $this->set('searchterm', $key);
    $this->set('ser_result', $result1);
    $this->View('products/search');
  }

  function details($id) {
    if ((int) ($id) > 0) {
      $related=FALSE;
      $product = $this->Product->query("SELECT prod.name as name,prod.store,prod.group_id,prod.price,prod.shipping_duration,sub.name as sub_category,cat.name as category FROM `product` as prod join category as sub on prod.category_id=sub.id join category cat on sub.parent=cat.id  where prod.id=$id");
      //print_r($product);
      $group_id = $product[0]['Prod']['group_id'];
      if (!empty($group_id)) {
        $related = $this->Product->query("SELECT * from product where group_id='$group_id' AND id !=$id");
      }
      $this->set('product', $product);
      $this->set('related', $related);
      $this->View('products/details');
    }
  }

}

?>
