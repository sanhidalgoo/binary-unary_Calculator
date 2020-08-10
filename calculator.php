<?php
if (isset($_POST['submit'])) {
    $firstNumber = $_POST['f_num'];
    $secondNumber = $_POST['s_num'];
    $operator = $_POST['B-operation'];
    $bResult = "";
    switch ($operator) {
        case 'None':
            $bResult = "Please choose operation";
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
            <label for="Number">Enter Number:</label>
            <input type="number" name="num" class="form-control">
            <br>
            <p>Choose Operator</p>
            <select name="U-Operation" class="form-control">
                <option>factorial</option>
                <option>Is Prime?</option>
                <option>square root</option>
                <option>even/odd number?</option>
            </select>
            <br>
            <input type="submit" name="usubmit" value="Calculate" class="btn btn-success">
            <input type="reset" value="Clear" class="btn btn-danger">

        </form>
        <br>
        <p><strong>The Answer is: </strong> </p>
        <div class="Answer">
        </div>
    </div>
</body>

</html>