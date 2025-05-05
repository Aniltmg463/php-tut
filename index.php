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
        <script src="./assets/js/jquery-3.7.1.min.js"></script>
        <style>
        #cal-display {
            height: 50px;
            font-weight: 600;
            font-size: xx-large;
            background-color: #fff;
            box-shadow: 0px 0px 8px 2px rgba(0, 0, 0, 0.75) inset;
            -webkit-box-shadow: 0px 0px 8px 2px rgba(0, 0, 0, 0.75) inset;
            -moz-box-shadow: 0px 0px 8px 2px rgba(0, 0, 0, 0.75) inset;
        }

        .customBg {
            background-color: rgb(255, 255, 255);
            cursor: pointer;
            border: 1px solid rgb(199, 197, 197);
            box-shadow: 0px -2px 11px 4px rgba(0, 0, 0, 0.14) inset;
            -webkit-box-shadow: 0px -2px 11px 4px rgba(0, 0, 0, 0.14) inset;
            -moz-box-shadow: 0px -2px 11px 4px rgba(0, 0, 0, 0.14) inset;
        }

        .customBg:hover {
            background-color: #fff;
        }
        </style>
    </head>

    <body>
        <div class="container row">
            <div class="col"></div>
            <div class="col-6">
                <div class="card mt-5 shadow" style="width: 18rem;">
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <input id="cal-display" type="text" class="form-control text-end" aria-label="Username"
                                aria-describedby="basic-addon1">
                        </div>
                        <div class="row gap-2 text-center px-3 py-1">
                            <div onclick="itemClick(7)" class="col customBg rounded fs-3 p-2">7</div>
                            <div onclick="itemClick(8)" class="col customBg rounded fs-3 p-2">8</div>
                            <div onclick="itemClick(9)" class="col customBg rounded fs-3 p-2">9</div>
                            <div onclick="itemClick('+')" class="col customBg rounded fs-3 p-2">+</div>
                        </div>
                        <div class="row gap-2 text-center px-3 py-1">
                            <div onclick="itemClick(4)" class="col customBg rounded fs-3 p-2">4</div>
                            <div onclick="itemClick(5)" class="col customBg rounded fs-3 p-2">5</div>
                            <div onclick="itemClick(6)" class="col customBg rounded fs-3 p-2">6</div>
                            <div onclick="itemClick('-')" class="col customBg rounded fs-3 p-2">-</div>
                        </div>
                        <div class="row gap-2 text-center px-3 py-1">
                            <div onclick="itemClick(1)" class="col customBg rounded fs-3 p-2">1</div>
                            <div onclick="itemClick(2)" class="col customBg rounded fs-3 p-2">2</div>
                            <div onclick="itemClick(3)" class="col customBg rounded fs-3 p-2">3</div>
                            <div onclick="itemClick('*')" class="col customBg rounded fs-6 p-2 pt-3">X</div>
                        </div>
                        <div class="row gap-2 text-center px-3 py-1 pb-4">
                            <div onclick="clearInput()" class="col customBg rounded fs-3 p-2 bg-danger text-white">C
                            </div>
                            <div onclick="itemClick(0)" class="col customBg rounded fs-3 p-2">0</div>
                            <div type="submit" id="performOperation" class="col customBg rounded fs-3 p-2">=</div>
                            <div onclick="itemClick('/')" class="col customBg rounded fs-6 p-2 pt-3">/</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </body>
    <script>
    $(document).ready(function() {
        $("#performOperation").click(function(e) {
            e.preventDefault();
            var inputData = document.getElementById("cal-display").value;
            $.ajax({
                type: "POST",
                url: "calculation.php",
                data: {
                    'data': inputData
                },
                beforeSend: function() {
                    // $(".post_submitting").show().html(
                    //     "<center><img src='images/loading.gif'/></center>");
                },
                success: function(response) {
                    document.getElementById("cal-display").value = response
                },
            });
            e.preventDefault();
        });
    });

    const itemClick = (item) => {
        // alert(item);
        var input = document.getElementById("cal-display");
        const previousInput = input.value;
        if (previousInput.length = 0) {
            input.value = item;
        } else {
            input.value = previousInput + item;
        }
    }

    function clearInput() {
        document.getElementById("cal-display").value = "";
    }
    </script>

    </html>