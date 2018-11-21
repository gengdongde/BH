$(function(){
	$('#tel').keyup(function(event) {
		$('.tel-warn').addClass('hide');
		checkBtn();
	});

	$('#veri-code').keyup(function(event) {
		$('.tel-warn').addClass('hide');
		checkBtn();
	});

	// 按钮是否可点击
	function checkBtn()
	{
		$(".lang-btn").off('click');
		
		var phone = $.trim($('#tel').val());
		var code = $.trim($('#veri-code').val());
		if (phone != '' && code != '') {
			$(".lang-btn").removeClass("off");
			sendBtn();
		} else {
			$(".lang-btn").addClass("off");
		}
		
	}


	function checkPhone(phone){
		var status = true;
		if (phone == '') {
			$('.tel-err').removeClass('hide').find("em").text('请输入手机号');
			return false;
		}
		var param = /^1[34578]\d{9}$/;
		if (!param.test(phone)) {
			// globalTip({'msg':'手机号不合法，请重新输入','setTime':3});
			$('.tel-err').removeClass('hide');
			$('.tel-err').text('手机号不合法，请重新输入');
			return false;
		}
		$.ajax({
            url: '/',
            type: 'post',
            dataType: 'json',
            async: false,
            data: {phone:phone,type:"login"},
            success:function(data){
                if (data.code == '0') {
                    $('.tel-err').addClass('hide');
                    // console.log('aa');
                    // return true;
                } else {
                    $('.tel-err').removeClass('hide').text(data.msg);
                    // console.log('bb');
					status = false;
					// return false;
                }
            },
            error:function(){
            	status = false;
                // return false;
            }
        });
		return status;
	}

	function checkPhoneCode(pCode){
		if (pCode == '') {
			$('.error').removeClass('hide').text('请输入验证码');
			return false;
		} else {
			$('.error').addClass('hide');
			return true;
		}
	}

		// 登录点击事件
	function sendBtn(){
		
			$(".lang-btn").click(function(){
				// var type = 'phone';
				var phone = $.trim($('#tel2').val());
				var pcode = $.trim($('#veri-code').val());
				if (checkPhone(phone) && checkPass(pcode)) {
					$.ajax({
			            url: '/plogin',
			            type: 'post',
			            dataType: 'json',
			            async: true,
			            data: {phone:phone,code:pcode},
			            success:function(data){
			                if (data.code == '0') {
			                	// globalTip({'msg':'登录成功!','setTime':3,'jump':true,'URL':'http://www.ui.cn'});
			                	globalTip(data.msg);
			                } else if(data.code == '1') {
			                	$(".lang-btn").off('click').addClass("off");
			                    $('.tel2-err').removeClass('hide').text(data.msg);
			                    return false;
			                } else if(data.code == '2') {
			                	$(".lang-btn").off('click').addClass("off");
			                    $('.error').removeClass('hide').text(data.msg);
			                    return false;
			                }
			            },
			            error:function(){
			                
			            }
			        });
				} else {
					$(".lang-btn").off('click').addClass("off");
					// $('.tel-warn').removeClass('hide').text('登录失败');
					return false;
				}
			});
		
	}

})