// JavaScript Document

	Array.prototype.trimArray = function () {
		var array = this;
		var narray = [];
		for (var i = 0; i < array.length; i++)

			if (array[i]) {
				if (typeof array[i] == "string") {
					if (array[i].trim())
						narray.push(array[i]);
				} else {
					narray.push(array[i]);
				}
			}
		return narray;
	};

	function getcookie(name) {
		var cookie_start = document.cookie.indexOf(name);
		var cookie_end = document.cookie.indexOf(";", cookie_start);
		return cookie_start == -1 ? '' : unescape(document.cookie.substring(cookie_start + name.length + 1, (cookie_end > cookie_start ? cookie_end : document.cookie.length)));
	}
	function setcookie(cookieName, cookieValue) {
		var expires = new Date();
		var now = parseInt(expires.getTime());
		var et = (86400 - expires.getHours() * 3600 - expires.getMinutes() * 60 - expires.getSeconds());
		expires.setTime(now + 1000000 * (et - expires.getTimezoneOffset() * 60));
		document.cookie = escape(cookieName) + "=" + escape(cookieValue) + ";expires=" + expires.toGMTString() + "; path=/";
	}


//Autoplay-img----------------------------begin

    var curIndex=0;
    var timeInterval=3000;	//时间间隔 单位毫秒
    //图片路径
    var urlimg=[
        '//stats.chinaz.com/zx_g/27arrowshoe.jpg','//stats.chinaz.com/zx_g/27arrowshoe.jpg','//stats.chinaz.com/zx_g/27arrowshoe.jpg'
    ]
    //链接地址
    var urlhref=[
        'http://27.2wk.com','http://27.2wk.com','http://27.2wk.com'
    ]

var oRaw_l = $(".oRaw_l");
var img_area_l = $("#img_area_l")
var oRaw_r = $(".oRaw_r");
var img_area_r = $("#img_area_r")

    var arr = [0,1,2];
    function getnum() {
        var cookie=getcookie("nums");
        var cookiearr=cookie?cookie.split('|'):arr;
        var n = Math.ceil(Math.random() * cookiearr.length - 1);
        var num = cookiearr[n];
        cookiearr[n]="";
        cookiearr=cookiearr.trimArray();
        setcookie("nums",cookiearr.join('|'));
        if (cookiearr.length == 0){
            cookiearr = arr;
            setcookie("nums",cookiearr.join('|'));
        }
        return num;
    }
    function rand() {
        var num = getnum();
        if(!num) num = 0;
        img_area_l.attr({"src":urlimg[num]});
        oRaw_l.attr({"href":urlhref[num]});
        img_area_r.attr({"src":urlimg[num]});
        oRaw_r.attr({"href":urlhref[num]});
    }
    rand()






