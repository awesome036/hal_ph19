<?php
	function cartIn($code){
		$i = 0;
		$check = true;
		while($check == true){
			if(!isset($_SESSION["cart"][$i])){
				$_SESSION["cart"][$i] = $code;
				$check = false;
			}else{
				$i++;
			}
		}
	}

	function cartOut($index){
		array_splice($_SESSION["cart"],$index,1);
	}

	function codeList(){
		if(isset($_SESSION["cart"])){
			$list = array();
			foreach($_SESSION["cart"] as $product){
				$list[] = $product;
			}
			return $list;
		}else{
			return false;
		}
	}
?>