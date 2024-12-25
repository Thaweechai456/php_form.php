<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Read Textfile</title>
<style>
    .mytxt { color: #FF6969; }
</style>
</head>
<body>
    <h1>ข้อมูลนักศึกษา ใช้ fread</h1>
<?php
    $myfile = fopen("myname.txt", "r") or die("Unable to open file!");
    echo fread($myfile, filesize("myname.txt"));
    fclose($myfile);
?>
    <h1>ข้อมูลนักศึกษา ใช้ fgets</h1>
    <?php
        $myfile = fopen("myname.txt", "r") or die("Unable to open file!");
        echo fgets($myfile);
        fclose($myfile);
?>
    <h1>ข้อมูลนักศึกษา ใช้ fgets ร่วมกับ feof</h1>
<?php
$myfile = fopen("myname.txt", "r") or die("Unable to open file!");
//วนรอบด้วย While จนกว่าจะหมดหากหมดไฟล์แล้ว feof จะมีค่าเป็น
while(!feof($myfile)) {
echo fgets($myfile) . "<br>";
}
fclose($myfile);
?>
</body>
</html>
