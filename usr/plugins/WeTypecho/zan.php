
<?php
$host = 'localhost';
$dbuser = 'root';
$pwd  = '!@Hello.UWP1996#!';
$dbname = 'tyecho';
$db = new mysqli( $host, $dbuser, $pwd, $dbname );

//检查是否成功
if( $db->connect_errno <> 0 ){
	die('链接数据库失败');
}

//设定数据库数据传输的编码
$db->query("SET NAMES UTF8");

$sql = "SELECT * FROM typecho_wetypecholike ";
$mysqli_result = $db->query($sql);
if( $mysqli_result === false ){
	echo "SQL错误";
		
	exit;
}
$rows = [];
while( $row = $mysqli_result->fetch_array( MYSQLI_ASSOC ) ){
	$rows[] = $row;
};



  		$zaid = $row['openid'];
	
	 	$countNum = $row['cid']
	 
	 ?>

<div>
		<table border="1">
		  <tr>
		    <th>IP</th>
			<th>地址</th>
		  <?php
			foreach( $rows as $row ){
			?>
			
			  <tr>
			    <td><?php $zaid = $row['openid']; echo $zaid;?></td>
			    <td><?php echo $row['cid'];?></td>

			  </tr>
			
		  <?php
			}
			?>
		</table>
	</div>