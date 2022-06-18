<?php
require "index.html";
$resetButton = $_POST['resetButton'];
$firstNumber = $_POST['FN'];
$secondNumber = $_POST['SN'];
$operator = $_POST['option'];

if ($operator === "+") {
  $final = $firstNumber + $secondNumber;
}

if ($operator === "-") {
  $final = $firstNumber - $secondNumber;
}

if ($operator === "*") {
  $final = $firstNumber * $secondNumber;
}

if ($operator === "/") {

  $final = $firstNumber / $secondNumber;
}

if ($operator === "%") {
  $final = $firstNumber % $secondNumber;
}


//echo " <span id='text'>Result: </span><input type='text' value=' $final ' readonly/>";
echo "<SCRIPT>
    var a = document.createElement('span');
    span.innerHTML = 'Result: '
    document.body.appendChild(a);

    var b = document.createElement('input');
    b.value = '$final';
    b.readOnly = true;
    document.body.appendChild(b);
</Script>";


