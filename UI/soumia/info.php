<?php

 if(isset($_POST['add']))
 {
	//print_r($_POST['ProdctID']);
	if (isset($_SESSION['cart'])) {
		$itemsId= array_column($_SESSION['cart'], 'ProdctID');
		print_r($itemsId);
		if (in_array($_POST['ProdctID'] , $itemsId)) {
			echo "<script>alert('already in ')</script>";
		}else
		{
				$count= count($_SESSION['cart']);
				$item_array= array('ProdctID'=>$_POST['ProdctID'] )	;
				$_SESSION['cart'][$count]=$item_array;
				print_r($_SESSION['cart']);

		}
	}
	else{


		$item_array= array('ProdctID'=>$_POST['ProdctID'] )	;
		$_SESSION['cart'][0]=$item_array;
		print_r($_SESSION['cart']);
	}



 }else
    echo 'makyn walo ';



?>