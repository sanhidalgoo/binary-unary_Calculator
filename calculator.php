<?php

$bResult = "";
$uResult = 0;

// Binary Calculator
if (isset($_POST['submit'])) {
    $firstNumber = $_POST['f_num'];
    $secondNumber = $_POST['s_num'];
    $operator = $_POST['B-operation'];

    //Choose operator.
    switch ($operator) {
        case 'None':
            $uResult = "Please choose operation";
            break;

        case "Addition":
            $bResult = "$firstNumber + $secondNumber = " . ($firstNumber + $secondNumber);
            break;

        case "Subtraction":
            $bResult = "$firstNumber - $secondNumber = " . ($firstNumber - $secondNumber);
            break;

        case "Multiplication":
            $bResult = "$firstNumber * $secondNumber = " . ($firstNumber * $secondNumber);
            break;

        case "Division":
            $bResult = "$firstNumber / $secondNumber = " . ($firstNumber / $secondNumber);
            break;
    }
}

// UNARY CALCULATOR

if (isset($_POST['usubmit'])) {
    $number = $_POST['number'];
    $operator = $_POST['U-operation'];
    $uResult = "";
    switch ($operator) {
        case 'None':
            $uResult = "Please choose operation";
            break;

        case "Factorial":
            if (is_numeric($number)) {
                $uResult = "The factorial of $number is: " . factorial($number);
            }
            break;

        case "Is_Prime?":
            $uResult = isPrime($number) ? "$number is prime" : "$number is not prime";
            break;

        case "Square root":
            $uResult = "Square root of $number is " . sqrt($number);
            break;

        case "Even/odd number?":
            $uResult = $number % 2 == 0 ? "$number is even" : "$number is odd";
            break;
    }
}

// Determine if a number is prime 

function isPrime($number)
{
    if ($number == 1)
        return false;

    if ($number == 2)
        return true;

    /**
     * if the number is divisible by two, then it's not prime and it's no longer
     * needed to check other even numbers
     */
    if ($number % 2 == 0) {
        return false;
    }

    $ceil = ceil(sqrt($number));
    for ($i = 3; $i <= $ceil; $i = $i + 2) {
        if ($number % $i == 0)
            return false;
    }

    return true;
}


// Returns the factorial of a number
function factorial($num)
{
    $factorial = 1;
    for ($i = 1; $i <= $num; $i++) {
        $factorial = $factorial * $i;
    }
    return $factorial;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel='stylesheet' href='styles_cal.css'>
</head>

<body>
    <div class="binary-calculator">
        <img class="login-image" src="img/math.png" alt="math sybol">
        <h1><strong>Binary Calculator</strong></h1>
        <form method="POST">
            <label for="Firs number">Enter First Number:</label>
            <input type="number" name="f_num" class="form-control">
            <br>
            <label for="Second number:">Enter Second Number</label>
            <input type="number" name="s_num" class="form-control">
            <br>
            <p>Choose Operator</p>
            <select name="B-operation" class="form-control">
                <option>None</option>
                <option>Addition</option>
                <option>Subtraction</option>
                <option>Multiplication</option>
                <option>Division</option>
            </select>
            <br>
            <input type="submit" name="submit" value="Calculate" class="btn btn-success">
            <input type="reset" value="Clear" class="btn btn-danger">

        </form>
        <br>
        <p><strong>The Answer is: </strong> </p>

        <div class="Answer">
            <?= htmlentities($bResult) ?>

        </div>
    </div>

    <div class="unary-calculator">
        <img class="login-image" src="img/math.png" alt="math sybol">
        <h1><strong>Unary Calculator</strong></h1>
        <form method="POST">
            <br>
            <label for="number">Enter Number:</label>
            <input type="number" name="number" class="form-control">
            <br>
            <p>Choose Operator</p>
            <select name="U-operation" class="form-control">
                <option>None</option>
                <option>Factorial</option>
                <option>Is_Prime?</option>
                <option>Square root</option>
                <option>Even/odd number?</option>
            </select>
            <br>
            <input type="submit" name="usubmit" value="Calculate" class="btn btn-success">
            <input type="reset" value="Clear" class="btn btn-danger">

        </form>
        <br>
        <p><strong>The Answer is: </strong> </p>
        <div class="Answer">
            <?= htmlentities($uResult) ?>
        </div>
    </div>
</body>

</html>