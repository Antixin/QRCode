<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<title>国创标题</title> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
.new_form{ margin:0px; 0px; 0px; 0px;
		   position:absolute; left:420px; top:380px;}
.frame{ width:300px; height:25px;
		padding: 6px 0;
		font: 25px arial;}
.search{ width:75px; height:42px;
		 padding: 0px 0;
		 font: 25px arial;}
</style>
</head>
<body id="imgsecond" background="../images/imgpc/imgthird.jpg">
<form class="new_form" method="post" action="../handing/handing.php">
	<span >
  		<input name="kuang" value="" maxlength="1000" class="frame" autocomplete="off"></span>
	<span >
  		<input type="submit" value="签到" class="search"></span>
</form>

	<canvas id="canvas"style="height:500px">
        当前浏览器不支持Canvas，请更换浏览器后再试

    </canvas>
	
    <script src="canvas/digit.js"></script>
    <script src="canvas/countdown.js"></script>

</body>
</html>