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



//�ֻ����ֻ�������ɶ�΢��ͼƬ��
//���԰棬����ǩ�����ܵ�ʵ�֣�
window.onload=function(){
	
	var clientType = isPC() ? "pc" : "phone" //�ͻ�������(�ֻ����ߵ���)

	//�����ڼ䣬�Զ�����Ϊ�ֻ�
	clientType = "phone";
	alert(clientType);

	var imgfirstInfo=document.getElementById("imgfirst");
	imgfirstInfo.src="../images/img"+clientType+"/imgfirst.jpg";
	
	if(clientType=="phone"){
		var formInfo=document.getElementById("login_form");
		formInfo.action="../login/phoneCheck.php";
	}
	
}