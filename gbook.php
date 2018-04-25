<?php 
	$db = new mysqli("127.0.0.1","root",'root','php');
	if ( $db->connect_errno <> 0 ){
		echo "connect failed " ;
		echo $db->connect_errno;
		exit;
	}
	$sql = "select  user,content,time from comment order by id desc limit 3";
	$result  = $db->query($sql);
	if($result){
		$rows = [];
		while($row = $result->fetch_array( MYSQLI_ASSOC) ){
			$rows[] = $row;
		}
		#var_dump($result);
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>留言本</title>
	<style type="text/css">
		.wrap{
			width:800px;
			/*background: gray;*/
			margin: 0px auto;
		}
		.add .content{
			width: 794px ;
			height: 70px;
		}
		.add{
			overflow: hidden;
		}
		.add .user{
			float: left;

		}
		.add .submit{
			float: right;
		}
		.msg{margin: 20px 0;background: #ccc;padding: 5px;}
		.msg .info{overflow: hidden;}
		.msg .user{float:left;color: blue;}
		.msg .time{float: right;color: #999;}
		.msg .content{ width:100%; padding:5px;}
	</style>
</head>
<body>
	<div class = "wrap">
		<div class = "add">
			<form action = "test.php" method="post">
				<textarea class="content" clos='100' row='5' name="wenben"><?php $zz ?></textarea>	
				<br> 
				<input class = "user" type="text" name="user">
				<input class = "submit" type="submit" value="发表留言" >
			</form>
		</div>
		<div>
			<?php 
				foreach($rows as $row){
			 ?>
				<div class='msg'>
					<div class="info">
						<span class="user"><?php echo $row['user']; ?></span>
						<span class="time"><?php echo date("Y-m-d H:m:s",$row['time']); ?></span>
					</div>
					<div class="content">
						<?php echo $row['content']; ?>
					</div>
				</div>
			<?php 
				}
			 ?>
			

		</div>
	</div>
</body>
</html>