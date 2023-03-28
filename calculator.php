<?php
$result = "";
$errorString = "";

if (isset($_POST['cal'])) {
  if (isset($_POST['operation'])) {
    $x = $_POST['num1'];
    $y = $_POST['num2'];
    $op = $_POST['operation'];
    //operation
    if ($op == "operation") {
      $errorString .= "Operator not selected<br/>";
    } else {
      if (is_numeric($y) != 1) {
        $errorString .= "Input 2 is missing or not a valid number";
      } else {
        switch ($op) {
          case '+':
            $result = $x + $y;
            break;
          case '-':
            $result = $x - $y;
            break;
          case '*':
            $result = $x * $y;
            break;
          case '/':
            $result = $x / $y;
            break;
        }
      }
    }
    // validate y

  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP-Calculator</title>
</head>

<body>

  <form action="calculator.php" method="post" id="form" onsubmit="return validateField();">
    <div>
      <label for="num1"> Number 1:</label>
      <input type="text" name="num1" id="num1" value="<?= $x ?>">
    </div>
    <br />
    <label for="operation"> Operation:</label>
    <select name="operation" id="operation">
      <option value="operation" <?php if ($op == "operation") {
        echo "selected=\"selected\"";
      } ?>> Operator</option>
      <option value="+" <?php if ($op == "+") {
        echo "selected=\"selected\"";
      } ?>> Add</option>
      <option value="-" <?php if ($op == "-") {
        echo "selected=\"selected\"";
      } ?>> Subtract</option>
      <option value="*" <?php if ($op == "*") {
        echo "selected=\"selected\"";
      } ?>> Multiply</option>
      <option value="/" <?php if ($op == "/") {
        echo "selected=\"selected\"";
      } ?>> Divive</option>
    </select><br /><br />
    <div>
      <label for="num2"> Number 2:</label>
      <input name="num2" id="num2" value="<?= $y ?>">
    </div>
    <br />
    <button type="submit" id="cal" name="cal">Calculate</button>
  </form>


  <!-- <div id="errorString" style="color:red;"></div> -->

  <?php
  echo "<div id=\"result\" type=\"number\" style=\"color:blue\">";
  if ($result !="") {
    echo "$x $op $y = $result";
  }
  echo "</div>";
  echo "<div style=\"color:red\" id=\"error\">";
  if ($errorString != "") {
    echo $errorString;
  }
  echo "</div>";
  ?>

  <script type="text/javascript">
    function validateField() {
      var xValue = document.getElementById('num1').value;
      var result = document.getElementById("result");
      var error = document.getElementById("error");
      if (error) {
        error.remove();
      }
      if (result) {
        result.remove();
      }
      if (isNaN(xValue) || xValue == "") {
        console.log("xValue: " + xValue);
        var error = document.createElement("div")
        error.id = "error"
        error.style.color = "red"
        error.innerHTML = "Input 1 is missing or not a valid number ";
        document.body.appendChild(error);
        return false;
      }
      return true;
    }
  </script>

</body>

</html>