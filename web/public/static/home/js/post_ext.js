function GetRandomNum(Min, Max) {
	var Range = Max - Min;
	var Rand = Math.random();
	return (Min + Math.round(Rand * Range))
}
function SetRandomNum() {
	for (var i = 1; i <= 8; i++) {
		$("#viewnums" + i).html(GetRandomNum(2000, 10000))
	}
};
SetRandomNum();
var Subtit = ["有21个网友阅读后感到不可思议！", "震惊！不看后悔的文章", "阅读过这篇文章的用户，85%还会查看这篇文章！", "我服！这报道真是脑洞大开", "脑洞大开！看完我的世界观崩塌了", "看完这篇文章，牛顿表示要哭晕在厕所了！", "网友潘多拉：不怕吓尿的进来看看！", "56%的用户在搜索这篇报道！", "今日头条爆文推荐，上千点赞", "网易最新跟帖爆文，赶快加入！", "有一种疼，叫做看着就疼！", "估计很快就要删除了，赶快看！", "编辑良心推荐，你值得阅读！！", " ", "厉害了word哥：1分钟讲清整件事！", " ", " ", "错过等一年！", " ", "丧心病狂！", "惊呆!", "跪了！", "「百度TOP10文章」", " ", "坐等反转！", "举世震惊！", "多图大新闻！", "天啦撸！", "革命性变化！老外惊慌", "画面太美不敢看了！", "脸红心跳！", "颠覆想象，开始怀疑人生了！", "「知乎热帖」", "论作者装逼是一种什么体验？！", "恍然大悟，之前的文章白看了！", " 深刻！犀利！理性！值得一看！", "前所未闻，看完我已哭晕！", "尴尬，编辑写着写着离职了！", "千万别分享到朋友圈！", "深度好文！", "你绝对没看过!不明觉厉，又有点毁三观！", "35%的网友选择了默转！", "赶快转载，一起闪瞎你朋友的眼睛！", "43个网友火前留名！", "最新消息！", "重磅首发，内部消息报道！", "无语，编辑写的太扯淡！", "全文燃爆，微信圈疯转！", "太厉害了！可是知道的人太少了！"];

function SetRandomTit() {
	for (var i = 1; i <= 10; i++) {
		var n = Math.floor(Math.random() * Subtit.length + 1) - 1;
		var Tit = Subtit[n];
		$(".subtit" + i).html("" + Tit + "")
	}
}
SetRandomTit();
	// set shareleft begin
	window.onload = function(){changeResize();}
	window.onresize = function(){changeResize();}
	function changeResize(){                 			                
		var mleftw = $(".lmain").offset().left;
		/*$(".share-view").css({left:mleftw - 50})
		if( mleftw < 60){
			$(".share-view").css({bottom:"0",left:mleftw})			
		}
*/		
	}
	// set shareleft end 
	 
	//  setCenter begin	
	var getInner = function () {
		return {
			width: window.innerWidth || document.documentElement && document.documentElement.clientWidth || 0,
			height: window.innerHeight || document.documentElement && document.documentElement.clientHeight || 0
		}
	}
	var center = function (elm) {
		var inner = getInner();
		elm.style.left = ((inner.width - elm.clientWidth) / 2-10) + "px";
		elm.style.top = ((inner.height - elm.clientHeight) / 2) + "px";
	} 
	
	function showcont(){ 
			$(".pop-bg,.popwrap").css({ visibility: "visible",opacity: 1}).addClass("trans"); 
			var setCenter = document.getElementById("showMore")
			center(setCenter);
			$(window).bind('scroll resize',function(){
	        	center(setCenter);
	       })		
		} 
	
	// ---- click hidden	
	$(".pop-bg,.ptopclose").click(function(){  
		$(".pop-bg,.popwrap").css({visibility: "hidden",opacity: 0}).addClass("trans")
	})
	//	setCenter end   
	
	// ---	pageTimer begin
	function pageTimer(sleep, callback) {
	    var btime = new Date().getTime();
	    var etime;
	    var sleep = sleep;
	    var f;
	    var clerar;
	    timer();
	    
	    $(document).mousemove(function () { 
	        btime = new Date().getTime();
	        if (!f) timer();
	    }); 
	  	$(window).scroll(function () { 
	        btime = new Date().getTime();
	        if (!f) timer();
	    });
	    function timer() {
	        f = true;
	        clearInterval(clerar);
	        clerar = setInterval(function () {
	            etime = new Date().getTime();
	            if (etime - btime >= sleep) {
	                f = false;
	                if (callback) callback();
	                clearInterval(clerar);
	            } 
	  		}, 1000);
	    }
	}

	pageTimer(1000 * 60 * 3,showcont)

	//	pageTimer end
	

//document.getElementById("content-media1").innerHTML=document.getElementById("ad_code1").innerHTML;
document.getElementById("content-media2").innerHTML = document.getElementById("ad_code2").innerHTML;
document.getElementById("content-media3").innerHTML = document.getElementById("ad_code3").innerHTML;
if(document.getElementById("content-media4")){document.getElementById("content-media4").innerHTML = document.getElementById("ad_code4").innerHTML};
document.getElementById("content-media5").innerHTML = document.getElementById("ad_code5").innerHTML;
if(document.getElementById("content-media6")){document.getElementById("content-media6").innerHTML = document.getElementById("ad_code6").innerHTML};
if(document.getElementById("content-media7")){document.getElementById("content-media7").innerHTML = document.getElementById("ad_code7").innerHTML};
if(document.getElementById("content-media8")){document.getElementById("content-media8").innerHTML = document.getElementById("ad_code8").innerHTML};
document.getElementById("side-media1").innerHTML = document.getElementById("ad_code13").innerHTML;
document.getElementById("side-media2").innerHTML = document.getElementById("ad_code9").innerHTML;
document.getElementById("side-media3").innerHTML = document.getElementById("ad_code10").innerHTML;
//document.getElementById("side-media4").innerHTML = document.getElementById("ad_code11").innerHTML;
//document.getElementById("content-share").innerHTML = document.getElementById("ad_code12").innerHTML;
//侧栏跟随
(function() {

	var oDiv = document.getElementById("float");
	var H = 0,
		iE6;
	var Y = oDiv;
	while (Y) {
		H += Y.offsetTop;
		Y = Y.offsetParent
	};
	iE6 = window.ActiveXObject && !window.XMLHttpRequest;
	if (!iE6) {
		window.onscroll = function() {
			var s = document.body.scrollTop || document.documentElement.scrollTop;
			if (s > H) {
				oDiv.className = "div1 div2";
				if (iE6) {
					oDiv.style.top = (s - H) + "px";
				}
			} else {
				oDiv.className = "div1";
			}
		};
	}

})();


function holdpic() { //控制内容区域的的图片大小并为过大的图片添加查看原图
	var IMG_URL = "http://img.chinaz.com/";
	var options = {
		imageLoading: IMG_URL + 'js/lib/lightBox/lightbox-ico-loading.gif',
		imageBtnPrev: IMG_URL + 'js/lib/lightBox/lightbox-btn-prev.gif',
		imageBtnNext: IMG_URL + 'js/lib/lightBox/lightbox-btn-next.gif',
		imageBtnClose: IMG_URL + 'js/lib/lightBox/lightbox-btn-close.gif',
		imageBlank: IMG_URL + 'js/lib/lightBox/lightbox-blank.gif',
		auto_resize: false
	};
	$('#ctrlfscont').find('img').each(function() {
		var img = this;
		if (img.width > 590) {
			img.style.width = "590px";
			img.style.height = "auto";
			//$(img).removeAttr('height');
			var aTag = document.createElement('a');
			aTag.href = img.src;
			$(aTag).addClass('bPic').insertAfter(img).append(img).lightBox(options);
		}
	});
}
//$(window).load(function() {
	//holdpic();
//});

$(window).on('load',function(){
	holdpic();
});