<?php
	include "connect.php";
	$query = "SELECT * FROM producttype";
	$data = mysqli_query($conn, $query);
	$arrayType = array();
	while ($row = mysqli_fetch_assoc($data)) {
		array_push($arrayType, new Type($row['id'], 
			$row['name'], 
			$row['icon']));
	}

	echo json_encode($arrayType);

	class Type{
		function Type($id, $name, $icon){
			$this->id = $id;
			$this->name = $name;
			$this->icon = $icon;
		}
	}
?>