<?php
	include_once("connection.php");
	if(isset($_GET['hash']) && isset($_GET['user']) ){
		$hash = $_GET['hash'];
		$user = $_GET['user'];
		
		$q = "select * from students where std_id = '".$user."' and hash='".$hash."' ";

		$result = mysql_query($q);
		$rows = mysql_num_rows($result);
		$data = mysql_fetch_array($result);
		if($data['checked'] == '1'){
			echo "already confirmed boss";
		}else
		if($rows == 1 ){
			$qq = "update students set checked = 1 where std_id = '".$user."' and hash = '".$hash."'";
			$ress = mysql_query($qq);
			echo $qq;
			if($ress){
				echo "You have confirmed successfully";
			}else{
				echo "something went wrong";
			}
		}else{
			echo "no record found";
		}

	}	

?>