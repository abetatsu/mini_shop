<?php

require_once('../common/common.php');

try {

  $pro_name = $_POST['name'];
  $pro_price = $_POST['price'];
  $pro_image_name = $_POST['image_name'];

  $dbh = connectDB();

  $sql = 'insert into product (name, price, image) values (?, ?, ?)';
  $stmt = $dbh->prepare($sql); //準備する命令
  $data[] = $pro_name; //?にセットしたい物を記入する。

  $data[] = intval($pro_price);
  //textのtypeで入力していたものをintval()を使うことで、整数に変換してから保存している。
  $data[] = $pro_image_name;
  $stmt->execute($data); //指令を実行します

  $dbh = null;

  echo $pro_name . ' を追加しました<br>';
} catch (Exception $e) {
  echo '何かしらのエラーが発生しています';
  echo $e->getMessage();
  exit();
}

echo '<a href="pro_list.php">商品一覧ページへ</a>';
