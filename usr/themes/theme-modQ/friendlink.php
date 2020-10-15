<?php
/**
 * 友链页面模板
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 $db = Typecho_Db::get();
$posts = $db->fetchAll($db->select()->from('table.friendlink')
    ->order('id', Typecho_Db::SORT_DESC));
 ?>
 <style type="text/css">
 	.friends{
 		display: flex;
 		flex-wrap: wrap;
 	}
 	.inputfriend{
		width: 700px;
		font-size: 120%;
		margin: 20px;
	}
	.inputfriend *{
		background: none;
	}
	.inputfriend .width{
		width: 100%;
	}
	.inputfriend p{
		color: rgba(0,0,0,0.5);
		font-weight: bold;
		width: 100%;
	}
	.inputfriend input{
		outline: none;
		border: 0;
		height: 20px;
		border-bottom: 2px solid black;
		padding: 15px 5px; 
		border-radius: 5px;
	}
	.inputfriend button{
		font-size: 130%;
		padding: 5px;
		border:1px solid black;
		border-radius: 15px;
		margin: 10px;
	}
	.inputfriend input:hover,
	.inputfriend button:hover{
		background: rgba(0,0,0,0.2);
	}

	.flshow{
		width: 600px;
		height: 200px;
		/*background: blue;*/
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.flshow .flshowbox{
		display: flex;
		width: 500px;
		height: 150px;
		background: rgba(225,225,225,0.3);
		padding: 15px;
		flex-direction: row;
		border-radius: 20px;
		box-shadow: 0px 0px 7px -3px black;
	}
	.flshow .flshowbox .flshow-img{
		width: 150px;
		background: none;
		border-radius: 20px;
	}
	.flshow .flshowbox .flshow-img img{
		width: 100%;
		align-content: center;
		align-items: center;
		text-align: center;
		border-radius: 20px;
	}
	.flshow .flshowbox .flshow-text{
		margin: 0px 20px;
	}
	.flshow .flshowbox .flshow-text .flshow-title{
		overflow: hidden;
		width: 200px;
		align-content: center;
		text-align: center;
		/*background: red;*/
	}
	.flshow .flshowbox .flshow-text .flshow-description{
		overflow: hidden;
		width: 300px;
		height: 80px;
		color: rgba(0,0,0,0.5);
		word-wrap:break-word; 
		word-break:break-all;
	}
	.frcards{
		background: rgba(222,222,222,0.2);
		margin: 10px 15px;
		box-shadow: 0px 0px 5px -2px black;
		border-radius: 8px;
		padding: 2px;
	}
	.frcards *{
		background: none;
	}
	.fr{
		width: 190px;
		height: 60px;
		border-radius: 8px;
	}
	.frbox{
		width: 100%;
		height: 100%;
		display: flex;
		flex-direction: row;
		border-radius: 8px;
	}
	.frbox .frimg{
		width: 60px;
		height: 60px;
		border-radius: 8px;
	}
	.frbox .frimg img{
		width: 100%;
		height: 100%;
		border-radius: 8px;
	}
	.frbox .frtext{
		margin: 0px 3px;
	}
	.frbox .frtext .frtitle{
		width: 100px;
		height: 20px;
		margin: auto;
		overflow: hidden;
	}
	.frbox .frtext .frdirection{
		width: 100px;
		height: 35px;
		word-wrap:break-word; 
		word-break:break-all;
		overflow: hidden;
		font-size: 80%;
		color: rgba(0,0,0,0.5);
	}
 </style>
 <article class="body">
 	<div class="friends">
 		<?php foreach ($posts as $id): ?>
 		<div class="frcards">
	 		<a href="<?php echo $id['url'];?>">
	 			<button class="fr" id="<?php echo $id['id'];?>">
		 			<div class="frbox">
		 				<div class="frimg"><img src="<?php echo $id['icourl'];?>"></div>
		 				<div class="frtext">
		 					<div class="frtitle"><p><?php echo $id['name'];?></p></div>
		 					<div class="frdirection"><span><p><?php echo $id['description'];?></span></div>
		 				</div>
		 			</div>
	 			</button>
	 		</a>
 		</div>
 		<?php endforeach; ?>
 	</div> 
 	<div class="inputfriend">
 		<form action="<?php $this->options->index('/action/friend?write'); ?>" method="post" name="write_post" onkeyup="flshow()">
 			<p>
 				<label>站名</label>
 				<input type="text" id="name" name="name" placeholder="站名">
 				<label>域名</label>
 				<input type="url" id="url" name="url" placeholder="http(s)://">
 			</p>
 			<p>
 				<label>站点图</label>
 				<input class="width" id="icourl" type="url" name="icourl" placeholder="http(s)://localhost/ico.png（favicon.ico)">
 			</p>
 			<p>
 				<label>站描述</label>
 				<input class="width" id="description" type="text" name="description" placeholder="请添加站点描述信息">
 			</p>
 			<!-- <p><input type="submit" value="提交"></p> -->
 			<p><button type="submit">提交</button></p>
 		</form>
 		<div class="flshow">
 			<div class="flshowbox">
 				<div class="flshow-img"><img src="" id="flshow-img" hidden></div>
 				<div class="flshow-text">
 				<div class="flshow-title"><a id="flshow-title-a" href=""><h3 id="flshow-title"></h3></a></div>
 				<div class="flshow-description"><span id="flshow-description"></span></div>
 				</div>
 			</div>
 		</div>
 		<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
 		<script type="text/javascript">
 			function flshow(){
 				let name = document.getElementById('name').value;
 				let url = document.getElementById('url').value;
 				let icourl = document.getElementById('icourl').value;
 				let description = document.getElementById('description').value;
 				let  showname= document.getElementById('flshow-title');
 				let  showlink= document.getElementById('flshow-title-a"');
 				let  showdescription= document.getElementById('flshow-description');
 				let showico=$('#flshow-img');
 				$('#flshow-title-a').attr('href',url);;
 				showname.innerHTML=name;
 				showdescription.innerHTML=description;
 				if (icourl=='') {
 					icourl=`${url}/favicon.ico`;
 				}
 				showico.attr('src',icourl);
 				showico.show();
 			}
 		</script>
 	</div>
 	<?php $this->need('footer.php'); ?>
</article>
<?php $this->need('sidebar.php'); ?>
