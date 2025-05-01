<?php
// Initialize cookie values
$cookie_name1 = "num";
$cookie_name2 = "op";
$cookie_name3 = "expression";

// Initialize variables
$num = isset($_COOKIE['num']) ? $_COOKIE['num'] : "";
$op = isset($_COOKIE['op']) ? $_COOKIE['op'] : "";
$expression = isset($_COOKIE['expression']) ? $_COOKIE['expression'] : "";
$display = $expression; // Display will show the expression

// Handle number input
if (isset($_POST['num'])) {
    if ($_POST['num'] === 'c') {
        // Reset the calculator
        $expression = "";
        $display = "";
        setcookie("num", "", time() - 3600, "/");
        setcookie("op", "", time() - 3600, "/");
        setcookie("expression", "", time() - 3600, "/");
        $num = "";
        $op = "";
    } else {
        // Append the pressed number to the expression
        $expression .= $_POST['num'];
        $display = $expression;
        setcookie("expression", $expression, time() + (86400 * 30), "/");
    }
}

// Handle operator
if (isset($_POST['op']) && $expression !== "") {
    // Store the current number and operator
    $num = $expression; // Current expression is the first number
    $op = $_POST['op'];
    $expression .= $op; // Append operator to expression
    $display = $expression;
    setcookie("num", $num, time() + (86400 * 30), "/");
    setcookie("op", $op, time() + (86400 * 30), "/");
    setcookie("expression", $expression, time() + (86400 * 30), "/");
}

// Calculate the result when "=" is pressed
if (isset($_POST['equal']) && $num !== "" && $op !== "" && isset($_POST['input']) && $_POST['input'] !== "") {
    // Extract second number from the input (remove first number and operator)
    $second_num = str_replace($num . $op, "", $_POST['input']);
    $second_num = trim($second_num);

    // Validate that both inputs are numeric
    if (is_numeric($num) && is_numeric($second_num)) {
        $result = "";
        switch ($op) {
            case "+":
                $result = (float)$num + (float)$second_num;
                break;
            case "-":
                $result = (float)$num - (float)$second_num;
                break;
            case "*":
                $result = (float)$num * (float)$second_num;
                break;
            case "/":
                $result = ($second_num == 0) ? "Error: Division by zero" : (float)$num / (float)$second_num;
                break;
            default:
                $result = "Error: Invalid operator";
        }
        // Update display with the result only
        $display = $result;
        $expression = $result; // Update expression to result for next operation
        // Reset cookies after calculation
        setcookie("num", "", time() - 3600, "/");
        setcookie("op", "", time() - 3600, "/");
        setcookie("expression", $expression, time() + (86400 * 30), "/");
        $num = "";
        $op = "";
    } else {
        $display = "Error: Invalid input";
        $expression = $display;
        setcookie("expression", $expression, time() + (86400 * 30), "/");
    }
} elseif (isset($_POST['equal'])) {
    // If equal is pressed but conditions are not met, show error
    $display = "Error: Incomplete input";
    $expression = $display;
    setcookie("expression", $expression, time() + (86400 * 30), "/");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cookie-Based Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #cal-display {
            box-shadow: 0px 2px 11px 4px rgba(0, 0, 0, 0.75) inset;
            width: 250px;
            margin: auto;
        }

        .calc-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
            width: 300px;
        }

        .calc-buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }

        .calc-buttons button {
            font-size: 20px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="container calc-container border border-primary rounded p-4 shadow">
        <form method="POST">
            <input id="cal-display" type="text" class="form-control mt-3" name="input"
                value="<?php echo htmlspecialchars($display); ?>" readonly>
            <div class="calc-buttons mt-3">
                <?php
                $buttons = ['7', '8', '9', '+', '4', '5', '6', '-', '1', '2', '3', '*', 'c', '0', '=', '/'];
                foreach ($buttons as $btn) {
                    if ($btn === 'c') {
                        echo '<button type="submit" class="btn btn-danger" name="num" value="c">C</button>';
                    } elseif ($btn === '=') {
                        echo '<button type="submit" class="btn btn-success" name="equal" value="=">=</button>';
                    } elseif (in_array($btn, ['+', '-', '*', '/'])) {
                        echo '<button type="submit" class="btn btn-warning" name="op" value="' . $btn . '">' . $btn . '</button>';
                    } else {
                        echo '<button type="submit" class="btn btn-light" name="num" value="' . $btn . '">' . $btn . '</button>';
                    }
                }
                ?>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>