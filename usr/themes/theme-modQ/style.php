<!-- 窗口 -->

<!-- <script src="http://libs.baidu.com/jquery/2.0.0/jquery.js"></script> -->
<script>
	//禁用鼠标右键
	/*window.oncontextmenu = function(e){
            e.preventDefault(); 
        }*/
	function getOperationSys() {
	    let OS = '';
	    let OSArray = {};
	    let UserAgent = navigator.userAgent.toLowerCase();
	    OSArray.Windows = (navigator.platform == 'Win32') || (navigator.platform == 'Windows');
	    OSArray.Mac = (navigator.platform == 'Mac68K') || (navigator.platform == 'MacPPC')
	      || (navigator.platform == 'Macintosh') || (navigator.platform == 'MacIntel');
	    OSArray.iphone = UserAgent.indexOf('iPhone') > -1;
	    OSArray.ipod = UserAgent.indexOf('iPod') > -1;
	    OSArray.ipad = UserAgent.indexOf('iPad') > -1;
	    OSArray.Android = UserAgent.indexOf('Android') > -1;
	    for (let i in OSArray) {
	      if (OSArray[i]) {
	        OS = i;
	      }
	    }
	    return OS;
  }
// 定义事件侦听器函数
function displayWindowSize() {
	let OS = getOperationSys();
	// 获取窗口的宽度和高度，不包括滚动条
	let w = document.documentElement.clientWidth;
	let h = document.documentElement.clientHeight;
	// 在div元素中显示结果
	/*if (w<1256||h<700) {
	// document.getElementById("result").innerHTML ="ok";
	console.log("ok");
	}else{
		// document.getElementById("result").innerHTML = "宽: " + w + ", " + "高: " + h;
		console.log( "宽: " + w + ", " + "高: " + h);
	}*/
	//console.log(OS);
	
	console.log( "宽: " + w + ", " + "高: " + h);
	if (OS!='Windows'||w<1220) {
		$("head").ready(function(){
			//$("#linkcss").attr('href',"wap.css")
			// $(".leftbar, .rightbar").remove();
			$(".leftbar, .rightbar").hide();
			if(w<650){
				$('body').hide();
			}else{
				$('body').show();
			}
		})
	}else{
		$("#pxinfo").remove();
		$(".leftbar, .rightbar").show();
	}
}
// 将事件侦听器函数附加到窗口的resize事件
window.addEventListener("resize", displayWindowSize);
// 第一次调用该函数
displayWindowSize();



//lastpage
    $(document).ready(function(){
    	$(".lastpage a,.right-comments a").attr('color',"blue");
    })



</script>

<!-- post -->
<script type="text/javascript">
	//photoshow
		$(document).ready(function(){
			$(".post-content img").attr('title','点击放大');
			$(".post-content img").click(function(){
				let photo = this.src;
				// console.log(photo);
				$("header").after('<span class="photoshow"></span>');
				$(".photoshow").prepend('<button>X</button>');
				$(".photoshow").append('<span><img src="'+photo+'"alt="'+photo+'"></img></span>');
					$(".photoshow").click(function(){
					$(".photoshow").remove();
					});
			})
		})
</script>
<!-- 函数 -->
<script type="text/javascript">
	// function weibo(weibo){
	// 	bubble.innerHTML='<img src="https://weibo.com/favicon.ico" style="width:100px;height:100px;">'
	// }
	// function github(github){
	// 	bubble.innerHTML='<img src="https://github.com/favicon.ico"" style="width:100px;height:100px;">'
	// }
	// function qq(qq){
	// 	bubble.innerHTML='<img src="https://im.qq.com/favicon.ico" style="width:100px;height:100px;">'
	// }
	function mOut(bubble){
		bubble.innerHTML=''
		mpimg.innerHTML=''
	}
</script>
<script type="text/javascript">
	function qqmp(qqmp){
		mpimg.innerHTML='<img src="//ifdo.ml/qqmp.png" style="width:150px;height:150px;"><br><p>QQ小程序</p><br>'
	}
	function wxxmp(wxxmp){
		mpimg.innerHTML='<img src="//ifdo.ml/wxmp.png"" style="width:150px;height:150px;"><br><p>微信小程序</p><br>'
	}
	function wxmp(wxmp){
		mpimg.innerHTML='<img src="//ifdo.ml/pub.png" style="width:150px;height:150px;"><br><p>微信公众号</p><br>'
	}

	function turnup(){
		// 返回顶部
		document.body.scrollTop = document.documentElement.scrollTop = 0;
	}
	</script>
<!-- 全局变量css -->
<style type="text/css">
	::-webkit-scrollbar { 
	    display: none; 
	}
	:root{
		--main-width: 250px;
		--main-height:50px;
	}
	*{
		margin: 0;
		border: 0;
		padding: 0;
		/*background-color: #888;*/
	}
	
	body{
		/*background-color: rgba(133, 133, 133,0.1);*/
		background-color: rgba(203,203,203,0.1);
	}
	div{
		background-color: white;
	}
	li,ul{
		list-style:none;
	}
	pre, code { 
	  background: #F3F3F3;
	  font-family: Menlo, Monaco, Consolas, "Lucida Console", "Courier New", monospace;
	  font-size: .92857em;
	}
	code { padding: 2px 4px; color: #B94A48; }
	pre {
	  padding: 8px;
	  overflow: auto;
	  max-height: 400px;
	}
	pre code {
	  padding: 3px;
	  color: #444;
	}

	blockquote {
	  margin: 1em 0;
	  padding-left: 1.5em;
	  border-left: 4px solid #eee;
	  color: #666;
	}

	.post-content table {
	  border: 1px solid #ddd;
	  width: 100%;
	}
	.post-content table th,
	.post-content table td {
	  padding: 5px 10px;
	  border: 1px solid #eee;
	}
	.post-content table th {
	  background: #f3f3f3;
	}

	h1, h2, h3, h4, h5, h6 {
	  font-family: "Helvetica Neue", Helvetica, Arial, "PingFang SC", "Hiragino Sans GB", "WenQuanYi Micro Hei","Microsoft Yahei", sans-serif;
	}
	
	input[type="text"],
	input[type="email"],
	input[type="url"],
	input[type="password"],
	textarea {
	  padding: 5px;
	  border: 1px solid #E9E9E9;
	  width: 100%;

	  border-radius: 2px;
	  -webkit-box-sizing: border-box;
	  -moz-box-sizing: border-box;
	  box-sizing: border-box;
	}
	textarea {
	  resize: vertical;
	}
	.photoshow{
		overflow: hidden;
		width: 100%;
		height: 100%;
		background: rgba(0,0,0,0.5);
		position: absolute;
		position: fixed;
		z-index: 100;

	}
	.photoshow button{
		width: 100px;
		height: 100px;
		font-size: 200%;
		background: none;
		position: absolute;
		outline: none;
		z-index: 2;
		/*color: white;*/
	}
	.photoshow img{
		width: auto;
		height: auto;
		position: absolute;
		top: 0px;
		bottom: 0px;
		left: 0px;
		right: 0px;
		margin: auto;
		box-shadow: 0px 0px 1000px -5px black;
	}
	.crumbs_patch{
		align-content: center;
		margin: 8px;
		background: none;
		display: flex;
		flex-direction: row;
		margin: 0 auto 0 auto;
		margin-top:60px;
		margin-bottom: -20px;
		width: 700px;

	}
	.crumbs_patch a{
			margin-right: 5px;
			box-shadow: 0px 0px 5px -2px black;
			padding: 2px 8px;
			border-radius: 10px;
		}
</style>
<!-- leftbar -->
<style type="text/css">
	#topline{
		width: var(--main-width);
		height: var(--main-height);
	}
	.leftbar{
		overflow: hidden;
		/*display: flex;*/
		/*background-color: rgba(222,222,222,0.3);*/
		background-color: #fafafa;
		width: var(--main-width);
		height: 100vh;
		position: absolute;
		position: fixed;
		left: 0;
		top: 0;
		align-content: center;
		text-align: center;
		align-items: center;
		/*overflow: visible;*/
		box-shadow: 0px 0px 10px -7px gray;
		/*z-index: 9;*/
	}
	.lefthead{
		/*background-color: blue;*/
		height: 25%;
	}
	.lefthead span p{
		margin-top: 5px;
	}
	.headimg{
		margin-top: 40px;
		box-shadow: 0px 0px 15px -5px black;
	}
	.siteinfo{
		/*margin-top: 55px;*/
		/*margin: 1000px 0 0 0;*/
		color: rgba(8,8,8,0.3);
	}
	.info{
		display: flex;
		flex-direction: column;
		margin-top: 50px;
		/*background-color: blue;*/
		width: 200px;
		height: 300px;
		margin: 50px auto 10px auto;
		text-align: left;
	}
	.info div,
	.info div button{
		width: 80%;
		margin: auto;
		box-shadow: 0px 0px 12px -7px black;
		text-align: center;
		border-radius: 20px;
		/*background-color: green;*/
	}
	.info div p{
		margin: 10px auto;

		/*background-color: blue;*/
	}
	.social{
		width: var(--main-width);
		/*background-color: green;*/
		text-align: center;
		align-content: center;
		position: absolute;
		bottom: 0;
		margin-bottom: 20px;
	}

	.social img{
		width: 20px;
		height: 20px;
		margin:10px;
	}
	.bubble{
		padding: 0;
		border: 0;
		/*background-color: green;*/
		float: none;
		position: inherit;
		top: -150px;
		box-shadow: 0px 0px 10px 0px black;
		border-radius: 25px;
	}
	/*img{
		margin-top: 100px;
		margin-bottom: 100px;
	}*/



</style>

<!-- tophead -->
<style type="text/css">
	.top{
		overflow: hidden;
		/*display: flex;*/
		/*overflow: visible;*/
		float: left;
		height: var(--main-height);
		width: 100%;
		z-index: 10;
		position: absolute;
		position: fixed;
		top: 0;
		/*background-color: rgba(171, 175, 179,0.5);*/
		background-color: white;
		box-shadow: 0px 0px 10px -6px black;
		/*align-content: center;
		text-align: center;*/
	}
	.topimg{
		width: var(--main-width);
		height: var(--main-height);
		float: left;
		margin: 0;
	}
	.topimg img{
		height: var(--main-height);
		margin:0px 5px 5px 20px;
	}
	button img{
		width: 20px;
		height: 24px;

	}
	.search button,
	.search input,
	.info button{
		border-radius: 100px;
		margin-right: 5px;
		outline: none;
		
	}
	.search button{
		width: 100%;
		height: 100%;
		background: none;
	}
	.search button:hover,.search input:hover{
		background-color: rgba(66, 147, 245,0.2);
	}
	.search input,#s{
		/*width: 150px;
		height: 26px;*/
		width: 100%;
		height: 100%;
		border-width: 0;
		/*padding: 1px 2px 1px 5px;*/
		/*border-radius: 30px;*/
		/*outline: none;*/
	}
	#s{
		/*border-radius: 30px;*/
		display:block;
		/*width:100%;
		height:34px;*/
		/*padding:6px 12px;*/
		font-size:14px;
		line-height:1.42857143;
		color:#555;
		/*background-color:#fff;
		background-image:none;*/
		/*border:1px solid #ccc;*/
	}

	.search{
		overflow: hidden;
		width: 200px;
		height: 30px;
		background-color: white;
		/*border: 2px solid white;*/
		border-radius: 30px;
		box-shadow: 0px 0px 10px -5px gray;
		margin-left: 300px;
		margin-top: 8px;

	}

	.login{
		/*background-color: blue;*/
		/*margin-right: 15px;*/
		/*display: flex;*/
		position: absolute;
		right: 15px;
		top: 15px;
		padding: 2px 5px 2px 5px;
		border-radius: 25px;
		box-shadow: 0px 0px 5px 0px gray;
	}
	.login button{
		background-color: rgba(255,255,255,0);
		border-radius: 25px;
	}
	.login a{
		target:_blank;
		text-decoration:none;
	}
	.login a:link,
	.login a:visited,
	.login a:active,
	.login a:hover{
		color: black;
	}
</style>

<!-- right bar -->
<style type="text/css">
	.rightbar{
		overflow: hidden;
		display: flex;
		flex-direction: column;
		margin-top: 50px;
		background-color: #fafafa;
		width: var(--main-width);
		/*height: 100vh;*/
		float: right;
		position: absolute;
		right: 0;
		top: 0;
		box-shadow: 0px 0px 10px -7px gray;
		align-content: center;
		text-align: center;
		/*margin-right: 0;*/
	}
	.rightbar-col{
		display: flex;
		flex-direction: column;
	}
	.lastpage li{
		width: 200px;
		margin: auto;
		margin-top: 5px;
		box-shadow: 0px 0px 5px -2px black;
		border-radius: 10px;
		padding: 5px;
	}
	.lastpage li button,
	#rightcomment{
		width: 100%;
		height: 100%;
		background: rgba(0,0,0,0);
		outline: none;
	}
	.rightcomment{
		display: flex;
		flex-direction: row;
		width: 200px;
		margin: auto;
		padding: 2px;
		box-shadow: 0px 0px 10px -7px black;
		border-radius: 15px;
		border: 2px solid white;
		margin-top: 5px;
	}
	.rightcomment div{
		width: 100%;
		text-align: left;
	}

	.right-comments{
		display: flex;
		flex-direction: column;
		text-align: left;
	}
	.right-comments #commentsinfo span{
		font-size: 80%;
	}
	.rightcomment #comments-img,
	.rightcomment img{
		width: 50px;
		height: var(--main-height);
		border-radius: 15px;
		margin-right:  3px;
	}
	.rightcomments-algin{
	}

	.aboutblog{
		/*background-color: green;*/
		width: 180px;
		height: 130px;
		align-content: center;
		text-align: center;
		margin-left: auto;
		margin-right: auto;
		padding: 2px;
		box-shadow: 0px 0px 10px -5px gray;
		border-radius: 15px;

	}
	.aboutblog *{
		font-family: "Comic Sans MS", cursive, sans-serif;
		/*font-family: Georgia, serif;*/
		font-size: 100%;
		text-align: right;
		font-weight: bold;
		margin: auto;
		align-content: center;
	}
	.aboutblog tr{
		height: 42px;
	}
	.aboutblog img{
		width: 30px;
		height: 30px;
		border-radius: 5px;
	}
	.aboutblog p{
		background-color: rgba(155,155,155,0.2);
		border-radius: 50px;
		padding: 0px  4px 0px 4px;
		font-size: 70%;
	}
	h3{
		font-weight: 500;
		color: #B6B6B6;
		margin: 10px;
	}
	.mp{
		width: 100%;
		text-align: center;
	}
	.mp img{
		width: 26px;
		height: 26px;
		margin: 0 10px 0 10px;
	}
	.mpimg{
		margin-top: 10px;
		padding: 0;
		border: 0;
		/*background-color: green;*/
		float: none;
		/*position: inherit;*/
		/*bottom: -100px;*/
		padding: 2px;
		box-shadow: 0px 0px 10px 0px black;
		border-radius: 25px;
		/*margin: 10px auto 1px auto;*/

	}
	#mpimg p{
		color: #888;
		text-align: center;
	}

	.turnup{
		overflow: hidden;
		position: fixed;
		bottom: 10%;
		right: 15%;
		background: none;
	}
	.turnup button{
		width: 50px;
		height: 60px;
		outline: none;
		background: none;
	}
	/*.turnup img{
		width: 110%;
		height: 110%;
	}*/
</style>

<!-- 主体 -->
<style type="text/css">
	.body{
		display: flex;
		flex-direction:column;
		/*align-self: center;*/
		margin: 0 auto 0 auto;
		/*background-color: blue;*/
		/*margin-top: 20px;*/
		margin-top:50px;
		width: 700px;
		/*width: 50%;*/
		/*height: 80vh;*/
		/*align-content: center;*/
		/*text-align: center;*/
	}
	.body .article{
		display: flex;
		/*background: rgba(255,255,255,0.5);*/
		/*background-color: rgba(0,0,0,0.1);*/
		box-shadow: 0px 0px 10px -7px black;
		margin-top: 50px;
		/*width: 700px;*/
		text-align: center;
		
	}
	.article{
		/*background: rgba(255,255,255,0);*/
		padding: 20px;
		margin-top: 20px;
		/*box-shadow: 0px 0px 15px -5px black;*/
		/*border-radius: 25px;*/
		border-radius: 10px;
		/*margin: 20px auto 0 auto;*/
		display: flex;
		flex-direction:row;

	}
	.thembimg{
		padding: 0;
	}
	.thembimg .img{
		/*background-color: red;*/
		padding: 0;
		width: 100px;
		height: 100px;
		border-radius: 30px;
		margin: 0px;
		box-shadow: 0px 0px 12px -5px black;
		/*margin-left: 20px;*/

	}
	.acl-post-comment{
		text-align: center;
		overflow: hidden;
		/*width: 200px;*/
		/*margin: 15px;*/
		margin: auto;
	}
	.acl-post{
		display: flex;
	}
	.acl-left{
		/*background: blue;*/
	}
	.acl-right{
		/*background: green;*/
		display: flex;
		flex-direction:column;
		text-align: center;
		/*align-content: center;*/

	}
	.post-comment-auther{
		display: flex;
		flex-direction:column;
		font-size: 70%;
		text-align: center;
		align-content: center;
		margin-top: 8px;
		margin-bottom: 10px;
	}
	
</style>

<!-- post -->
<style type="text/css">
	.post{
		width: 100%;
		/*background-color: green;*/
		/*margin: 0px;*/
		/*margin: auto;*/
		
	}
	.headerimg .img{
		width:680px; 
		height:230px;
	}
	.post-align{
		align-content: center;
		text-align: center;
	}
	.post-content{
		/*background: blue;*/
		width: 640px;
		margin: 20px;
		box-shadow: 0px 0px 10px -6px black;
		border-radius: 10px;
		padding: 10px;
	}
	/*.post-content img{
		width: 100px;
		height: var(--main-height);
		
	}*/
	.post-content-show{
		width: 500px;
	}
	.post-content img {
		width: 100%;
		height: auto;
		border-radius: 15px;
		margin-right: auto;
		margin-left: auto;
	}
	.post-content img:hover{
		/*width: auto;
		height:auto;*/
		cursor:pointer;
	}
	.post-auther{
		display: flex;
		flex-direction: row;
		width: 100%;
	}
	.post-auther div{
		align-content: center;
		margin: auto;
	}
	.post article{
		margin-top: 50px;
	}
	#qrcodeContent{
		margin-top: 10px;
		padding:1px;
	}
	.post-title{

	}
	.post-near{
		display: flex;
		flex-direction: row;
		justify-content:space-between;
		margin: 10px;
	}
	.post-near div{
		border-radius: 15px; 
		padding: 5px;
		box-shadow: 0px 0px 10px -5px black;
	}
	.post-near #li-last{
		margin-left: 50px;
	}
	.post-near #li-next{
		margin-right: 50px;
	}
	.tags{
		background: rgba(180,180,180,0.2);
	}
</style>


<!-- comments -->
<style type="text/css">
	
/* ------------------
 * Comment list
 * --------------- */

#comments {
  padding: 0px 20px 2px 20px;
}
.comment-list, .comment-list ol {
  list-style: none;
  margin: 0;
  padding: 0;
  margin-bottom: 5px;
}
.comment-list li {
  padding: 14px;
  margin-top: 10px;
  border: 1px solid #EEE;
}
.comment-list li.comment-level-odd {
  background: #F6F6F3;
}
.comment-list li.comment-level-even {
  background: #FFF;
}
.comment-list li.comment-by-author {
  background: #FFF9E8;
}
.comment-list li .comment-reply {
  text-align: right;
  font-size: .92857em;
}
.comment-meta a {
  color: #999;
  font-size: .92857em;
}
.comment-author {
  display: block;
  margin-bottom: 3px;
  color: #444;
}
.comment-author .avatar {
  float: left;
  margin-right: 10px;
}
.comment-author cite {
  font-weight: bold;
  font-style: normal;
}

/* Comment reply */
.comment-list .respond {
  margin-top: 15px;
  border-top: 1px solid #EEE;
}
.respond .cancel-comment-reply {
  float: right;
  margin-top: 15px;
  font-size: .92857em;
}
#comment-form label {
  display: block;
  margin-bottom: .5em;
  font-weight: bold;
}
#comment-form .required:after {
  content: " *";
  color: #C00;
}

.comment-author {
	display: block;
	margin-bottom: 3px;
	color: #444;
}

.comment-author .avatar {
	width: 80px;
	height: 80px;
	border-radius: 15px;
	float: left;
	margin-right: 10px;
}

.comment-author cite {
	font-weight: bold;
	font-style: normal;
}

.comment-list .respond {
	margin-top: 15px;
	border-top: 1px solid #EEE;
}
#comment-form .submit{
 	font-size: 20px;
 	width: 100px;
 	height: 30px;
 	margin: 10px;
 	border-radius: 5px;
 	box-shadow: 0px 0px 10px -6px black;
 }

.respond .cancel-comment-reply {
	float: right;
	margin-top: 15px;
	font-size: .92857em;
}

#comment-form label {
	display: block;
	margin-bottom: .5em;
	font-weight: bold;
}

#comment-form .required:after {
	content: " *";
	color: #C00;
}

/* ------------------
 * secondary
 * --------------- */
#secondary {
  padding-top: 15px;
  word-wrap: break-word;
}
.widget {
  margin-bottom: 30px;
}
.widget-list {
  list-style: none;
  padding: 0;
}
.widget-list li {
  margin: 5px 0;
  line-height: 1.6;
}

.widget-list li ul {
  margin-left: 15px;
}


</style>

<!-- footer -->
<style type="text/css">
	#footer{
		width: 640px;
		display: flex;
		flex-direction: row;
		justify-content:space-between;
		/*margin-top: 10px;*/
		margin-bottom: 10px;
	}
	#beian{
		text-align: right;
		margin-right: 30px;
	}
	a,
	#beian a,
	.lastpage a,
	.right-comments a,
	.crumbs_patch a{
		text-decoration:none;
		color: black;
	}
	#beian a:link,
	#beian a:visited,
	#beian a:active,
	#beian a:hover{
		color: black;
	}

</style>



<style type="text/css">
	/*! normalize.css v8.0.0 | MIT License | github.com/necolas/normalize.css */

/* Document
   ========================================================================== */

/**
 * 1. Correct the line height in all browsers.
 * 2. Prevent adjustments of font size after orientation changes in iOS.
 */

 html {
  line-height: 1.15; /* 1 */
  -webkit-text-size-adjust: 100%; /* 2 */
}

/* Sections
   ========================================================================== */

/**
 * Remove the margin in all browsers.
 */

body {
  margin: 0;
}

/**
 * Correct the font size and margin on `h1` elements within `section` and
 * `article` contexts in Chrome, Firefox, and Safari.
 */

h1 {
  font-size: 2em;
  margin: 0.67em 0;
}

/* Grouping content
   ========================================================================== */

/**
 * 1. Add the correct box sizing in Firefox.
 * 2. Show the overflow in Edge and IE.
 */

hr {
  box-sizing: content-box; /* 1 */
  height: 0; /* 1 */
  overflow: visible; /* 2 */
}

/**
 * 1. Correct the inheritance and scaling of font size in all browsers.
 * 2. Correct the odd `em` font sizing in all browsers.
 */

pre {
  font-family: monospace, monospace; /* 1 */
  font-size: 1em; /* 2 */
}

/* Text-level semantics
   ========================================================================== */

/**
 * Remove the gray background on active links in IE 10.
 */

a {
  background-color: transparent;
}

/**
 * 1. Remove the bottom border in Chrome 57-
 * 2. Add the correct text decoration in Chrome, Edge, IE, Opera, and Safari.
 */

abbr[title] {
  border-bottom: none; /* 1 */
  text-decoration: underline; /* 2 */
  text-decoration: underline dotted; /* 2 */
}

/**
 * Add the correct font weight in Chrome, Edge, and Safari.
 */

b,
strong {
  font-weight: bolder;
}

/**
 * 1. Correct the inheritance and scaling of font size in all browsers.
 * 2. Correct the odd `em` font sizing in all browsers.
 */

code,
kbd,
samp {
  font-family: monospace, monospace; /* 1 */
  font-size: 1em; /* 2 */
}

/**
 * Add the correct font size in all browsers.
 */

small {
  font-size: 80%;
}

/**
 * Prevent `sub` and `sup` elements from affecting the line height in
 * all browsers.
 */

sub,
sup {
  font-size: 75%;
  line-height: 0;
  position: relative;
  vertical-align: baseline;
}

sub {
  bottom: -0.25em;
}

sup {
  top: -0.5em;
}

/* Embedded content
   ========================================================================== */

/**
 * Remove the border on images inside links in IE 10.
 */

img {
  border-style: none;
}

/* Forms
   ========================================================================== */

/**
 * 1. Change the font styles in all browsers.
 * 2. Remove the margin in Firefox and Safari.
 */

button,
input,
optgroup,
select,
textarea {
  font-family: inherit; /* 1 */
  font-size: 100%; /* 1 */
  line-height: 1.15; /* 1 */
  margin: 0; /* 2 */
}

/**
 * Show the overflow in IE.
 * 1. Show the overflow in Edge.
 */

button,
input { /* 1 */
  overflow: visible;
}

/**
 * Remove the inheritance of text transform in Edge, Firefox, and IE.
 * 1. Remove the inheritance of text transform in Firefox.
 */

button,
select { /* 1 */
  text-transform: none;
}

/**
 * Correct the inability to style clickable types in iOS and Safari.
 */

button,
[type="button"],
[type="reset"],
[type="submit"] {
  -webkit-appearance: button;
}

/**
 * Remove the inner border and padding in Firefox.
 */

button::-moz-focus-inner,
[type="button"]::-moz-focus-inner,
[type="reset"]::-moz-focus-inner,
[type="submit"]::-moz-focus-inner {
  border-style: none;
  padding: 0;
}

/**
 * Restore the focus styles unset by the previous rule.
 */

button:-moz-focusring,
[type="button"]:-moz-focusring,
[type="reset"]:-moz-focusring,
[type="submit"]:-moz-focusring {
  outline: 1px dotted ButtonText;
}

/**
 * Correct the padding in Firefox.
 */

fieldset {
  padding: 0.35em 0.75em 0.625em;
}

/**
 * 1. Correct the text wrapping in Edge and IE.
 * 2. Correct the color inheritance from `fieldset` elements in IE.
 * 3. Remove the padding so developers are not caught out when they zero out
 *    `fieldset` elements in all browsers.
 */

legend {
  box-sizing: border-box; /* 1 */
  color: inherit; /* 2 */
  display: table; /* 1 */
  max-width: 100%; /* 1 */
  padding: 0; /* 3 */
  white-space: normal; /* 1 */
}

/**
 * Add the correct vertical alignment in Chrome, Firefox, and Opera.
 */

progress {
  vertical-align: baseline;
}

/**
 * Remove the default vertical scrollbar in IE 10+.
 */

textarea {
  overflow: auto;
}

/**
 * 1. Add the correct box sizing in IE 10.
 * 2. Remove the padding in IE 10.
 */

[type="checkbox"],
[type="radio"] {
  box-sizing: border-box; /* 1 */
  padding: 0; /* 2 */
}

/**
 * Correct the cursor style of increment and decrement buttons in Chrome.
 */

[type="number"]::-webkit-inner-spin-button,
[type="number"]::-webkit-outer-spin-button {
  height: auto;
}

/**
 * 1. Correct the odd appearance in Chrome and Safari.
 * 2. Correct the outline style in Safari.
 */

[type="search"] {
  -webkit-appearance: textfield; /* 1 */
  outline-offset: -2px; /* 2 */
}

/**
 * Remove the inner padding in Chrome and Safari on macOS.
 */

[type="search"]::-webkit-search-decoration {
  -webkit-appearance: none;
}

/**
 * 1. Correct the inability to style clickable types in iOS and Safari.
 * 2. Change font properties to `inherit` in Safari.
 */

::-webkit-file-upload-button {
  -webkit-appearance: button; /* 1 */
  font: inherit; /* 2 */
}

/* Interactive
   ========================================================================== */

/*
 * Add the correct display in Edge, IE 10+, and Firefox.
 */

details {
  display: block;
}

/*
 * Add the correct display in all browsers.
 */

summary {
  display: list-item;
}

/* Misc
   ========================================================================== */

/**
 * Add the correct display in IE 10+.
 */

template {
  display: none;
}

/**
 * Add the correct display in IE 10.
 */

[hidden] {
  display: none;
}

</style>