<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// Define variables and set them to empty values
$nameErr = $nicknameErr = "";
$name = $nickname = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate Name
  if (empty($_POST["name"])) {
    $nameErr = "โปรดใส่ชื่อ";
  } else {
    $name = test_input($_POST["name"]);
    // Check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "ชื่อสามารถมีแค่ตัวอักษรและช่องว่างเท่านั้น";
    }
  }
  
  // Validate Nickname
  if (empty($_POST["nickname"])) {
    $nicknameErr = "โปรดใส่ชื่อเล่น";
  } else {
    $nickname = test_input($_POST["nickname"]);
    // Check if nickname only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$nickname)) {
      $nicknameErr = "ชื่อเล่นสามารถมีแค่ตัวอักษรและช่องว่างเท่านั้น";
    }
  }

  // If no errors, save the data to a file
  if (empty($nameErr) && empty($nicknameErr)) {
    // Open the file in append mode to add new data at the end
    $myfile = fopen("form.txt", "a") or die("Unable to open file!");
    
    // Prepare data to be saved
    $txt = "Name: " . $name . "\n";
    fwrite($myfile, $txt);  // Write name to file
    $txt = "Nickname: " . $nickname . "\n\n";
    fwrite($myfile, $txt);  // Write nickname to file

    fclose($myfile);  // Close the file
  }
}

// Function to clean input
function test_input($data) {
  $data = trim($data);  // Remove extra spaces
  $data = stripslashes($data);  // Remove backslashes
  $data = htmlspecialchars($data);  // Convert special characters
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  
  Nickname: <input type="text" name="nickname" value="<?php echo $nickname;?>">
  <span class="error">* <?php echo $nicknameErr;?></span>
  <br><br>

  <input type="submit" name="submit" value="Submit">  
</form>

<?php
// Displaying user input after form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nameErr) && empty($nicknameErr)) {
  echo "<h2>Your Input:</h2>";
  echo "Name: " . $name . "<br>";
  echo "Nickname: " . $nickname . "<br>";
}
?>

</body>
</html>
