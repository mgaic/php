<?php 
	#echo $_POST['wenben'];
	#echo $_POST['user'];
	$wenben = $_POST['wenben'];
	$user = $_POST['user'];
	$db = new mysqli("127.0.0.1","root","root","php");
	$time = time(); 
	$sql = "insert comment(content,user,time) values('{$wenben}','{$user}','{$time}')";
	$db->query($sql);
	$sql = 'select * from comment';
	$result = $db->query($sql);//返回结果集对象 失败返回false成功返回对象
	if ($result == false){#执行query语句 失败时返回false 否则
		#如果执行select语句 返回结果集 执行insert语句 返回TRUE
		echo "sql error";
	} else{//有数据返回键值对 无数据返回NULL
		$rows = [];
		while($row = $result->fetch_array( MYSQLI_ASSOC) ){
			$rows[] = $row;
			echo $row['user'];
			echo "------------";
			echo $row['content'];
			echo "<br>";
		}
	}
	echo '===================='.'<br>';
	foreach($rows as $row ){
		echo $row['user'];
		echo $row['content'];
		
		echo "<br>";
	}
	#$zz="zzzz"
	header("Location:gbook.php");
 ?>
<!--  <form action="index.php" method="post">
<textarea cols="30" rows="10" name="contents">123456</textarea>
<input type="submit" value="提交">
</form>
<?php
#$contents = $_POST['contents'];
#echo $contents  ;
?> -->
 