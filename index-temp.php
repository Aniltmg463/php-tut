<?php

$allOperation = [
    "add" => "+",
    "sub" => "-",
    "mul" => "*",
    "div" => "/",
];

if($_POST){
    $firstNumber = $_POST["numberOne"];
    $secondNumber = $_POST["numberTwo"];
    $operation = $_POST["operation"];
    $result = 0;
    switch ($operation) {
        case 'add':
            $result = $firstNumber + $secondNumber;
            break;
        case 'sub':
            $result = $firstNumber - $secondNumber;
            break;
        case 'mul':
            $result = $firstNumber * $secondNumber;
        break;
        case 'div':
            $result = $firstNumber / $secondNumber;
        break;
        default:
            $result = 0;
            break;
    }
}

?>
<!DOCTYPE html>
<lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP Internship</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <link href="./assets/style.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
        </script>
    </head>

    <body>
        <div id="my-form">
            <h1>Basic Calculator</h1>
            <hr>
            <form method="post" action="#">
                <input placeholder="Enter first number" value="<?php echo $firstNumber ?>" class="inputItem"
                    name="numberOne" type="text" />
                <input placeholder="Enter second number" value="<?php echo $secondNumber ?>" class="inputItem"
                    name="numberTwo" type="text" />
                <label>Select Operation:</label>
                <select name="operation">
                    <option value="add">Addition</option>
                    <option value="sub">Substraction</option>
                    <option value="div">Division</option>
                    <option value="mul">Multiplication</option>
                </select>
                <div>
                    <input id="submitbutton" type="submit" value="Perform Operation" />
                </div>

                <div style="margin-top:30px;">
                    <?php echo (isset($_POST['operation'])) ? $firstNumber." ". $allOperation[$operation] . " ".$secondNumber ." = ". $result : ""
                     ?>
                </div>
            </form>
        </div>
    </body>


    </html>