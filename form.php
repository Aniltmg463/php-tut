<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    #cal-display {
        box-shadow: 0px 2px 11px 4px rgba(0, 0, 0, 0.75) inset;
        -webkit-box-shadow: 0px 2px 11px 4px rgba(0, 0, 0, 0.75) inset;
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

    #cal-display {
        width: 250px;
        margin: auto;
    }

    #
    </style>
</head>

<body>
    <div class="container calc-container border border-primary rounded p-4 shadow">
        <input id="cal-display" type="text" class="form-control mt-3" aria-label="Calculator display">
        <div class="calc-buttons mt-3">
            <button class="btn btn-light" onclick="appendToDisplay('7')">7</button>
            <button class="btn btn-light" onclick="appendToDisplay('8')">8</button>
            <button class="btn btn-light" onclick="appendToDisplay('9')">9</button>
            <button class="btn btn-danger" onclick="clearDisplay()">C</button>

            <button class="btn btn-light" onclick="appendToDisplay('4')">4</button>
            <button class="btn btn-light" onclick="appendToDisplay('5')">5</button>
            <button class="btn btn-light" onclick="appendToDisplay('6')">6</button>
            <button class="btn btn-light" onclick="appendToDisplay('+')">+</button>

            <button class="btn btn-light" onclick="appendToDisplay('1')">1</button>
            <button class="btn btn-light" onclick="appendToDisplay('2')">2</button>
            <button class="btn btn-light" onclick="appendToDisplay('3')">3</button>
            <button class="btn btn-light" onclick="appendToDisplay('-')">-</button>

            <button class="btn btn-light" onclick="appendToDisplay('0')">0</button>
            <button class="btn btn-light" onclick="appendToDisplay('.')">.</button>
            <button class="btn btn-success" onclick="calculateResult()">=</button>
            <button class="btn btn-light" onclick="appendToDisplay('*')">*</button>
        </div>
    </div>

    <script>
    function appendToDisplay(value) {
        document.getElementById("cal-display").value += value;
    }

    function clearDisplay() {
        document.getElementById("cal-display").value = '';
    }

    function calculateResult() {
        try {
            document.getElementById("cal-display").value = eval(document.getElementById("cal-display").value);
        } catch (e) {
            document.getElementById("cal-display").value = 'Error';
        }
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>