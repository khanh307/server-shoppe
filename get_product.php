<?php
	include "connect.php";
	$page = $_GET['page'];
	$id = $_POST['id'];
	$space = 6;
	$limit = ($page - 1) * $space; // vị trí đầu tiên

	$arrayproduct = array();
	$query = "SELECT * FROM product WHERE idtype = $id LIMIT $limit, $space";
	$data = mysqli_query($conn, $query);

	while ($row = mysqli_fetch_assoc($data)) {
		array_push($arrayproduct, new Product(
			$row['id'],
			$row['name'],
			$row['image'],
			$row['price'],
			$row['detail'],
			$row['idtype']
		));
	}

	echo json_encode($arrayproduct);

	class Product{
		function Product($id, $name, $image, $price, $detail, $idtype){
			$this->id = $id;
			$this->name = $name;
			$this->image = $image;
			$this->price = $price;
			$this->detail = $detail;
			$this->idtype = $idtype;
		}
	}

?>