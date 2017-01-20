<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>comments</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php
	include "config.php";

	//добавление родительского комментария
	if (isset($_POST['ok'])){
		$text = $_POST['msg'];
		mysql_query("INSERT INTO hotels_comments (comment) VALUES ('$text')");
    	// header("Location: ".$_SERVER["REQUEST_URI"]);
	}
	


	//удаление комментария
	$ath = mysql_query("select * from hotels_comments");
	while($data = mysql_fetch_array($ath)){
		if (isset($_POST['del_'.$data[id]])){
			mysql_query("DELETE FROM hotels_comments WHERE id = $data[id] OR parent_id = $data[id]");
	    	// header("Location: ".$_SERVER["REQUEST_URI"]);   
		}
	}

	//добавление дочернего комментария
	$ath = mysql_query("select * from hotels_comments");
	while($data = mysql_fetch_array($ath)){
		$reply_text = $_POST['reply_text_'.$data[id]];
		$parent = $data[id];
		if (isset($_POST['send_reply_'.$data[id]])){
			mysql_query("INSERT INTO hotels_comments (parent_id, comment) VALUES ('$parent','$reply_text')");
	   	    // header("Location: ".$_SERVER["REQUEST_URI"]);   
		}
	}	

	//формирование дерева комментариев
	$ath = mysql_query("select * from hotels_comments where parent_id=0");
	while($data = mysql_fetch_array($ath)){
		echo "<br><div class=\"reply_area\">".$data[comment]."<br>";
		// echo "<form action=\"\" method=\"post\"><input type=\"submit\" name=\"reply_".$data[id]."\" value=\"Reply\"></form>";
		echo "<form action=\"\" method=\"post\"><input type=\"submit\" name=\"del_".$data[id]."\" value=\"Delete\"></form>";
		echo "<br><form action=\"\" method=\"post\"><textarea name=\"reply_text_".$data[id]."\" rows=\"1\"></textarea>";
		echo "<input type=\"submit\" name=\"send_reply_".$data[id]."\" value=\"Send reply\"></form>";
		// getChild($data[id]);
		$ath_child_1 = mysql_query("select * from hotels_comments where parent_id=$data[id]");
		while($data = mysql_fetch_array($ath_child_1)){
			echo "<br><div class=\"reply_area\">".$data[comment]."<br>";
			// echo "<form action=\"\" method=\"post\"><input type=\"submit\" name=\"reply_".$data[id]."\" value=\"Reply\"></form>";
			echo "<form action=\"\" method=\"post\"><input type=\"submit\" name=\"del_".$data[id]."\" value=\"Delete\"></form>";
			echo "<br><form action=\"\" method=\"post\"><textarea name=\"reply_text_".$data[id]."\" rows=\"1\"></textarea>";
			echo "<input type=\"submit\" name=\"send_reply_".$data[id]."\" value=\"Send reply\"></form>";
			$ath_child_2 = mysql_query("select * from hotels_comments where parent_id=$data[id]");
			while($data = mysql_fetch_array($ath_child_2)){
				echo "<br>div class=\"reply_area\">".$data[comment]."<br>";
				// echo "<form action=\"\" method=\"post\"><input type=\"submit\" name=\"reply_".$data[id]."\" value=\"Reply\"></form>";
				echo "<form action=\"\" method=\"post\"><input type=\"submit\" name=\"del_".$data[id]."\" value=\"Delete\"></form>";
				echo "<br><<form action=\"\" method=\"post\"><textarea name=\"reply_text_".$data[id]."\" rows=\"1\"></textarea>";
				echo "<input type=\"submit\" name=\"send_reply_".$data[id]."\" value=\"Send reply\"></form>";
				$ath_child_3 = mysql_query("select * from hotels_comments where parent_id=$data[id]");
				while($data = mysql_fetch_array($ath_child_3)){
					echo "<br><div class=\"reply_area\">".$data[comment]."<br>";
					// echo "<form action=\"\" method=\"post\"><input type=\"submit\" name=\"reply_".$data[id]."\" value=\"Reply\"></form>";
					echo "<form action=\"\" method=\"post\"><input type=\"submit\" name=\"del_".$data[id]."\" value=\"Delete\"></form>";
					echo "<br><form action=\"\" method=\"post\"><textarea name=\"reply_text_".$data[id]."\" rows=\"1\"></textarea>";
					echo "<input type=\"submit\" name=\"send_reply_".$data[id]."\" value=\"Send reply\"></form>";
					$ath_child_4 = mysql_query("select * from hotels_comments where parent_id=$data[id]");
					while($data = mysql_fetch_array($ath_child_4)){
						echo "<br><div class=\"reply_area\">".$data[comment]."<br>";
						// echo "<form action=\"\" method=\"post\"><input type=\"submit\" name=\"reply_".$data[id]."\" value=\"Reply\"></form>";
						echo "<form action=\"\" method=\"post\"><input type=\"submit\" name=\"del_".$data[id]."\" value=\"Delete\"></form>";
						echo "<br><form action=\"\" method=\"post\"><textarea name=\"reply_text_".$data[id]."\" rows=\"1\"></textarea>";
						echo "<input type=\"submit\" name=\"send_reply_".$data[id]."\" value=\"Send reply\"></form>";
						$ath_child_5 = mysql_query("select * from hotels_comments where parent_id=$data[id]");
						while($data = mysql_fetch_array($ath_child_5)){
							echo "<br><div class=\"reply_area\">".$data[comment]."<br>";
							// echo "<form action=\"\" method=\"post\"><input type=\"submit\" name=\"reply_".$data[id]."\" value=\"Reply\"></form>";
							echo "<form action=\"\" method=\"post\"><input type=\"submit\" name=\"del_".$data[id]."\" value=\"Delete\"></form>";
							echo "<br><form action=\"\" method=\"post\"><textarea name=\"reply_text_".$data[id]."\" rows=\"1\"></textarea></form>";
												
	}
	}
	}
	}
	}
	}
	echo "</div>";
	echo "</div>";
	echo "</div>";
	echo "</div>";
	echo "</div>";
	echo "</div>";	
	// function getChild($data_memo){
	// 	$ath_child = mysql_query("select * from 'hotels_comments' where 'parent_id'=$data_memo[id]");
	// 	while($data_memo = mysql_fetch_array($ath_child)){
	// 		echo "<br>".$data[comment]."<br>";
	// 		echo "<form action=\"\" method=\"post\"><input type=\"submit\" name=\"reply_".$data_memo[id]."\" value=\"Reply\"></form>";
	// 		echo "<form action=\"\" method=\"post\"><input type=\"submit\" name=\"del_".$data_memo[id]."\" value=\"Delete\"></form>";
	// 		echo "<br><div class=\"reply_area\"><form action=\"\" method=\"post\"><textarea name=\"reply_text_".$data_memo[id]."\" rows=\"1\"></textarea>";
	// 		// getChild();				
	// }
	// }

	?>
	<br>
	<form action="" method="post">
		<br><textarea name="msg" rows="1"></textarea>
		<br>
		<input type="submit" name="ok" value="Send" >
	</form>

</body>

</html>