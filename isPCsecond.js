function isPC(){
	var userAgentinfo=navigator.userAgent;
	var Agents = ["Android", "iPhone",
        "SymbianOS", "Windows Phone",
        "iPad", "iPod"
    ];
	
	var flag=true;
	for(var i=0;i<Agents.length;i++){
		if(userAgentinfo.indexOf(Agents[i])>0){
			flag=false;
			break;
		}
	}
	
	return flag;
}



//手机版的只负责生成二微码图片；
//电脑版，负责签到功能的实现；
window.onload=function(){
	
	var clientType = isPC() ? "pc" : "phone" //客户端类型(手机或者电脑)
	
	var imgfirstInfo=document.getElementById("imgsecond");
	imgfirstInfo.src="../images/img"+clientType+"/imgsecond.jpg";
	
	if(clientType=="phone"){
		var formInfo=document.getElementById("login_form");
		formInfo.action="../register/regiseter_1.php";
	}
	
}