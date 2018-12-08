	</head>
	<body>
<div class="div1">
				<?php
					$info=file_get_contents("../bin/aria2.conf");
					preg_match_all('/(.*)=(.*)/',$info,$arr);
					foreach($arr[1] as $k=>$v){
					if ("$v" == "rpc-secret"){
					$rpc_pwd=$arr[2][$k];
					    }
					}
				?>


		<h1>Aria2相关信息</h1>
        <p align="right"><a href='config.php?logout=1'><input type="button" value="退出登录" class="button"></input></a></p>
		<li><b>推荐* AriaNG控制台 * </span><a title="推荐使用本地服务" href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].':6789/'; ?>" target="_blank" ><?php echo 'http://'.$_SERVER['SERVER_NAME'].':6789/'; ?></a></b><br><br></li>
		<li><b>Glutton控制台 <a href="http://aria2.me/glutton/" target="_blank">http://aria2.me/glutton/</a></b><br><br></li>	
		<li><b>yaaw控制台 <a href="http://aria2.me/yaaw/" target="_blank">http://aria2.me/yaaw/</a></b><br><br></li>
		<li><b>aria2-webui控制台 <a href="http://aria2.me/webui-aria2/" target="_blank">http://aria2.me/webui-aria2/</a></b><br><br></li>
		<li><b>RPC授权令牌：<?php echo "<input type='text' size='20' style='color:red;' readonly='readonly' value='{$rpc_pwd}' />" ?></b><br><br></li>				
		<h1>Aria2 配置文件修改</h1>
		<li><b>配置说明请参考 <a href="readme.html" target="_blank">Aria2 Manual</a></b><br><br></li>
		
<?php
if(isset($_POST['content'])){
file_put_contents('../bin/aria2.conf', $_POST['content']);
echo "<script>location.href='../aria2/config.php';</script>";
system('start-stop-daemon -K -R 5 -q -p "/var/run/aria2c.pid"');
}
$string=file('../bin/aria2.conf');
?>

<form name="" method="post" action="" onSubmit="javascript:return window.confirm('确定修改内容？')"> 
<textarea name="content" id="content" rows="40" cols="83" >
<?php
for ($i=0;$i<count($string);$i++){
  echo  $string[$i]."";
}

?>
</textarea>
<tr>

<?php 
    if(!empty($_POST['load_default'])){ //点击提交按钮后才执行   
echo "<script>location.href='../aria2/config.php';</script>";
system("cp ../bin/aria2.conf_bak ../bin/aria2.conf --preserve >/dev/null");
system('start-stop-daemon -K -R 5 -q -p "/var/run/aria2c.pid"');
    }
?>

<div style="text-align:center;margin:0 auto; width:600px;">
<br>
<input type="submit" name="Submit" class="button" value="提交修改" />
<input type='reset' class="button" />
<input type="submit" name="load_default" value="恢复默认配置" class="button1" />



</div>
</form>
</div>
</body>
</html>
