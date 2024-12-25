<?php
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\n";
fwrite($myfile, $txt);
fclose($myfile);
?>

<h1>ข้อมูลนักศึกษา ใช้ fgets ร่วมกับ feof</h1>
<?php
$myfile = fopen("newfile.txt", "r") or die("Unable to open file!");
//วนรอบด้วย While จนกว่าจะหมดหากหมดไฟล์แล้ว feof จะมีค่าเป็น
while(!feof($myfile)) {
echo fgets($myfile) . "<br>";
}
fclose($myfile);
?>