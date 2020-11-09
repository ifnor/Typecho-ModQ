// 函数 -->
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
function mOut(bubble){
	bubble.innerHTML='';
	mpimg.innerHTML='';
}
function weibo(weibo){
	bubble.innerHTML='<img src="https://weibo.com/favicon.ico" style="width:100px;height:100px;">';
}
function github(github){
	bubble.innerHTML='<img src="https://github.com/favicon.ico"" style="width:100px;height:100px;">';
}
function qq(qq){
	bubble.innerHTML='<img src="https://im.qq.com/favicon.ico" style="width:100px;height:100px;">';
}

function qqmp(qqmp){
	mpimg.innerHTML='<img src="//ifdo.cool/qqmp.png" style="width:150px;height:150px;">';
}
function wxxmp(wxxmp){
	mpimg.innerHTML='<img src="//ifdo.cool/wxmp.png"" style="width:150px;height:150px;">';
}
function wxmp(wxmp){
	mpimg.innerHTML='<img src="//ifdo.cool/pub.png" style="width:150px;height:150px;">';
}
function qqmp(qqmp){
		mpimg.innerHTML='<img src="//ifdo.cool/qqmp.png" style="width:150px;height:150px;"><br><p>QQ小程序</p><br>'
	}
	function wxxmp(wxxmp){
		mpimg.innerHTML='<img src="//ifdo.cool/wxmp.png"" style="width:150px;height:150px;"><br><p>微信小程序</p><br>'
	}
	function wxmp(wxmp){
		mpimg.innerHTML='<img src="//ifdo.cool/pub.png" style="width:150px;height:150px;"><br><p>微信公众号</p><br>'
	}

	function turnup(){
		// 返回顶部
		document.body.scrollTop = document.documentElement.scrollTop = 0;
	}

function getOperationSys() {
    var OS = '';
    var OSArray = {};
    var UserAgent = navigator.userAgent.toLowerCase();
    OSArray.Windows = (navigator.platform == 'Win32') || (navigator.platform == 'Windows');
    OSArray.Mac = (navigator.platform == 'Mac68K') || (navigator.platform == 'MacPPC')
      || (navigator.platform == 'Macintosh') || (navigator.platform == 'MacIntel');
    OSArray.iphone = UserAgent.indexOf('iPhone') > -1;
    OSArray.ipod = UserAgent.indexOf('iPod') > -1;
    OSArray.ipad = UserAgent.indexOf('iPad') > -1;
    OSArray.Android = UserAgent.indexOf('Android') > -1;
    for (var i in OSArray) {
      if (OSArray[i]) {
        OS = i;
      }
    }
    return OS;
}
// 定义事件侦听器函数
function displayWindowSize() {
var OS = getOperationSys();
// 获取窗口的宽度和高度，不包括滚动条
var w = document.documentElement.clientWidth;
var h = document.documentElement.clientHeight;
// 在div元素中显示结果
if (w<1256||h<700) {
// document.getElementById("result").innerHTML ="ok";
console.log("ok");
}else{
	// document.getElementById("result").innerHTML = "宽: " + w + ", " + "高: " + h;
	console.log( "宽: " + w + ", " + "高: " + h);
}
console.log(OS);
if (OS!='Windows'||w<1220) {
	$("head").ready(function(){
		$("#linkcss").attr('href',"wap.css")
	})
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



//主页图片显示
function prePhoto(){
	let preImg = $(".post-content-show img")[0].src;
	let headimg = $(".post-align img")[0].src;
	$(".post-align img").attr('src',preImg);
	console.log(preImg);
	console.log(headimg);
}
prePhoto();





