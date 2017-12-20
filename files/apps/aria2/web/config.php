<html>
	<head>
		<title>Aria2 - 信息及配置文件</title>
		<meta charset='utf-8' />
		    <style>
    h4 img{
        display:none;
    }
    h4:hover img{
        display:block;
    }	
        input{
            border: 1px solid #ccc;
            border-radius: 2px;
            color: #000;
            font-family: 'Open Sans', sans-serif;
            font-size: 1em;
            height: 35px;
            padding: 0 16px;
            transition: background 0.3s ease-in-out;
        }
        input:focus {
            outline: none;
            border-color: #9ecaed;
            box-shadow: 0 0 10px #9ecaed;
        }
        .button{
            -webkit-appearance: none;
            background: #009dff;
            border: none;
            border-radius: 2px;
            color: #fff;
            cursor: pointer;
            height: 35px;
            font-family: 'Open Sans', sans-serif;
            font-size: 1em;
            letter-spacing: 0.05em;
            text-align: center;
            text-transform: uppercase;
            transition: background 0.3s ease-in-out;
            width: 120px;
        }
        .button:hover {
            background: #00c8ff;
        }
        .button1{
            -webkit-appearance: none;
            background: #009dff;
            border: none;
            border-radius: 2px;
            color: #fff;
            cursor: pointer;
            height: 35px;
            font-family: 'Open Sans', sans-serif;
            font-size: 1em;
            letter-spacing: 0.05em;
            text-align: center;
            text-transform: uppercase;
            transition: background 0.3s ease-in-out;
            width: 150px;
        }
        .button1:hover {
            background: #00c8ff;
        }
        body{ text-align:left} 
        .div{ margin:0 auto; width:600px;} 
        .div1{ margin:0 auto; width:600px;} 
    </style>

<?php
$password='netgear';
session_start();
if(isset($_GET['logout'])){
    unset($_SESSION['login']);
}

if(!isset($_SESSION['login'])){
    if(isset($_POST['pwd'])){
        if($_POST['pwd'] == $password){
            $_SESSION['login'] = time();
            header("refresh:0;url=config.php");
        }else{
            echo "<script language=\"JavaScript\">alert(\"密码错误，请重新输入！\");</script>";
            header("refresh:0;url=config.php");
        }
    }else{
?>
<div class="div1"><br><br><br><br><br>
<h2>用户登录验证</h2>
<form action="config.php" method="post">
<input type="password" name="pwd" />
<input type="submit" value="登录" class="button1"/>
</form>
<h4 align="center">
    <div><br />找不到密码？点我</div>
    <img src="getpassword.png" />
</h4>    
</div>
<?php
    }
}else{ 
    include '../bin/diy.php';
}
?>
