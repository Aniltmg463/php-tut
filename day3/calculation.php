<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AJAX Calculator</title>
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
        <form>
            <input id="cal-display" type="text" class="form-control mt-3" name="input" value="" readonly>
            <div class="calc-buttons mt-3">
                <button onclick="itemClick('7')" type="button" class="btn btn-light">7</button>
                <button onclick="itemClick('8')" type="button" class="btn btn-light">8</button>
                <button onclick="itemClick('9')" type="button" class="btn btn-light">9</button>
                <button onclick="itemClick('+')" type="button" class="btn btn-warning">+</button>

                <button onclick="itemClick('4')" type="button" class="btn btn-light">4</button>
                <button onclick="itemClick('5')" type="button" class="btn btn-light">5</button>
                <button onclick="itemClick('6')" type="button" class="btn btn-light">6</button>
                <button onclick="itemClick('-')" type="button" class="btn btn-warning">-</button>

                <button onclick="itemClick('1')" type="button" class="btn btn-light">1</button>
                <button onclick="itemClick('2')" type="button" class="btn btn-light">2</button>
                <button onclick="itemClick('3')" type="button" class="btn btn-light">3</button>
                <button onclick="itemClick('*')" type="button" class="btn btn-warning">*</button>

                <button onclick="clearDisplay()" type="button" class="btn btn-danger">C</button>
                <button onclick="itemClick('0')" type="button" class="btn btn-light">0</button>
                <button onclick="calculate()" type="button" class="btn btn-success">=</button>
                <button onclick="itemClick('/')" type="button" class="btn btn-warning">/</button>
            </div>
        </form>
    </div>

    <script>
        function itemClick(value) {
            document.getElementById('cal-display').value += value;
        }

        function clearDisplay() {
            document.getElementById('cal-display').value = '';
        }

        function calculate() {
            const expression = document.getElementById('cal-display').value;

            const xhr = new XMLHttpRequest();
            xhr.open("POST", "calculate.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhr.onload = function() {
                document.getElementById('cal-display').value = this.responseText;
            };

            xhr.send("expression=" + encodeURIComponent(expression));
        }
    </script>
</body>

</html>