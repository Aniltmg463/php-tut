<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link href="./assets/style.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
    </script>
    <script src="./assets/js/jquery-3.7.1.min.js"></script>
</head>

<body>
</body>

<div class="container mx-auto my-5">
    <form action="#" method="post" id="taskForm">
        <div id="onlyTaskInput">
            <div class="input-group my-3">
                <input type="text" name="task[]" class="form-control" placeholder="New task"
                    aria-describedby="basic-addon1">
                <span class="input-group-text" id="basic-addon1" onclick="addTaskElement()">+</span>
            </div>
        </div>
        <button>Add Tasks</button>
    </form>
</div>
</body>
<script>
function addTaskElement() {
    const formElement = document.getElementById('taskForm');
    document.getElementById("onlyTaskInput").insertAdjacentHTML('beforeend', `<div class="input-group my-3">
                <input type="text" name="task[]" class="form-control" placeholder="New task"
                    aria-describedby="basic-addon1">
            </div>`);
}
</script>

<?php
session_start();

var_dump(unserialize($_COOKIE['visitproduct']));
//Function Declaration
function printTask(Array $inputTask): void
{
    $output = "";
    $output = "<ul>";
    if(count($inputTask) > 0){
        $_SESSION['taskInfo'] = $inputTask;
        foreach ($inputTask as $key => $eachTask) {
            $output .= "<li>$eachTask</li>";
        }
    }else{
        $output .= '<li>Information retrieve form session</li>';
        foreach ($_SESSION['taskInfo'] as $key => $oneByOne) {
            $output .= "<li>$oneByOne</li>";
        }
    }

    $output .= "</ul>";

    echo $output;
}

printTask($_POST['task']??[]);

?>

</html>