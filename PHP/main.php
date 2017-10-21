<?
  $user = empty($_GET['user']) ? 'Unknown' : $_GET['user'];
  echo $user;
  echo 1;
　setcookie("nick",$user) //用cookie记录用户昵称,是常用的传递变量方法
?>

<html>
<title></title>
<frameset rows="80%,*">
<frame src="cdisplay.php" name="chatdisplay">
<frame src="speak.php" name="speak">
</frameset>
</html>
