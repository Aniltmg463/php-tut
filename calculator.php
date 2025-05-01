<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
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
    <?php
    $expression = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['expression'])) {
            $expression = $_POST['expression'];

            try {
                // Allow only valid characters
                if (preg_match('/^[0-9+\-*\/.() ]+$/', $expression)) {
                    $result = eval("return $expression;");
                    $expression = $result;
                } else {
                    $expression = "Error";
                }
            } catch (Throwable $e) {
                $expression = "Error";
            }
        }
    }
    ?>

    <div class="container calc-container border border-primary rounded p-4 shadow">
        <form method="POST" id="calc-form">
            <input id="cal-display" type="text" class="form-control mt-3"
                value="<?php echo htmlspecialchars($expression); ?>" readonly>
            <input type="hidden" name="expression" id="expression-hidden"
                value="<?php echo htmlspecialchars($expression); ?>">

            <div class="calc-buttons mt-3">
                <?php
                $buttons = ['7', '8', '9', 'C', '4', '5', '6', '+', '1', '2', '3', '-', '0', '.', '=', '*'];

                foreach ($buttons as $btn) {
                    if ($btn == 'C') {
                        echo '<button type="button" class="btn btn-danger" onclick="clearDisplay()">C</button>';
                    } elseif ($btn == '=') {
                        echo '<button type="submit" class="btn btn-success">=</button>';
                    } else {
                        echo '<button type="button" class="btn btn-light" onclick="appendToExpression(\'' . $btn . '\')">' . $btn . '</button>';
                    }
                }
                ?>
            </div>
        </form>
    </div>

    <script>
        function appendToExpression(value) {
            let expressionField = document.getElementById("expression-hidden");
            let displayField = document.getElementById("cal-display");

            expressionField.value += value;
            displayField.value = expressionField.value;
        }

        function clearDisplay() {
            document.getElementById("expression-hidden").value = "";
            document.getElementById("cal-display").value = "";
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>