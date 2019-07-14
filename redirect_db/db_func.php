<?php
	function all_display(){
		$con = mysqli_connect("localhost","root","");
		mysqli_set_charset($con,"utf8");
		mysqli_select_db($con,"ph22_test");

		$sql = "SELECT * FROM students";

		$result = mysqli_query($con,$sql);

		while($row = mysqli_fetch_array($result)){
			echo $row["class"]." ".$row["no"]." ".$row["name"]."<br>";
		}

		mysqli_close($con);
	}

	function exist_db($class,$no){
		$con = mysqli_connect("localhost","root","");
		mysqli_set_charset($con,"utf8");
		mysqli_select_db($con,"ph22_test");

		$sql = "SELECT *
				FROM students
				WHERE 	class = '$class'
				 AND	no = $no"
		;

		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_row($result);

		mysqli_close($con);

		return $row;
	}

	function insert_db($class,$no,$name){
		$con = mysqli_connect("localhost","root","");
		mysqli_set_charset($con,"utf8");
		mysqli_select_db($con,"ph22_test");

		$sql = "INSERT INTO students VALUES('$class',$no,'$name')";

		mysqli_query($con,$sql);

		mysqli_close($con);
	}
?>