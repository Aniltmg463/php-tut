<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        #cal-display {
            box-shadow: 0px 2px 11px 4px rgba(0, 0, 0, 0.75) inset;
            width: 250px;
            margin: auto;
            text-align: right;
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

        #loading {
            display: none;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container calc-container border border-primary rounded p-4 shadow">
        <form>
            <input id="cal-display" type="text" class="form-control mt-3" readonly>
            <div class="calc-buttons mt-3">
                <button type="button" class="btn btn-light" onclick="appendValue('7')">7</button>
                <button type="button" class="btn btn-light" onclick="appendValue('8')">8</button>
                <button type="button" class="btn btn-light" onclick="appendValue('9')">9</button>
                <button type="button" class="btn btn-warning" onclick="appendValue('+')">+</button>

                <button type="button" class="btn btn-light" onclick="appendValue('4')">4</button>
                <button type="button" class="btn btn-light" onclick="appendValue('5')">5</button>
                <button type="button" class="btn btn-light" onclick="appendValue('6')">6</button>
                <button type="button" class="btn btn-warning" onclick="appendValue('-')">-</button>

                <button type="button" class="btn btn-light" onclick="appendValue('1')">1</button>
                <button type="button" class="btn btn-light" onclick="appendValue('2')">2</button>
                <button type="button" class="btn btn-light" onclick="appendValue('3')">3</button>
                <button type="button" class="btn btn-warning" onclick="appendValue('*')">*</button>

                <button type="button" class="btn btn-danger" onclick="clearDisplay()">C</button>
                <button type="button" class="btn btn-light" onclick="appendValue('0')">0</button>
                <button id="performOperation" type="button" class="btn btn-success">=</button>
                <button type="button" class="btn btn-warning" onclick="appendValue('/')">/</button>
            </div>
            <div id="loading">
                <img src="images/loading.gif" alt="loading">
            </div>
        </form>
    </div>

    <script>
        // Append values to the display
        function appendValue(val) {
            $("#cal-display").val($("#cal-display").val() + val);
        }

        // Clear the display
        function clearDisplay() {
            $("#cal-display").val('');
        }

        // Perform the calculation
        $(document).ready(function() {
            $("#performOperation").click(function(e) {
                e.preventDefault();
                const expression = $("#cal-display").val();

                // Show loading icon
                $("#loading").show();

                $.ajax({
                    type: "POST",
                    url: "calculate.php",
                    data: {
                        expression: expression
                    },
                    success: function(response) {
                        // Hide loading icon and display result
                        $("#loading").hide();
                        $("#cal-display").val(response);
                    },
                    error: function() {
                        // Hide loading icon and show error message
                        $("#loading").hide();
                        $("#cal-display").val("Error: Something went wrong");
                    }
                });
            });
        });
    </script>
</body>

</html>