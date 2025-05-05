<!-- index.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Task Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <div class="container mx-auto my-5">
        <form action="" method="GET" id="taskForm">
            <div class="input-group mb-3 inputRef">
                <input type="text" class="form-control" name="task[]" placeholder="Enter Task">
                <span class="input-group-text task-label" onclick="add()">Task</span>
            </div>

        </form>
    </div>

    <button type="submit" class="btn btn-success mx-5" form="taskForm">Submit</button>

    <script>
    function add() {
        const form1 =
            `<div class="input-group mb-3 inputRef">
                    <input type="text" class="form-control" name="task[]" placeholder="Enter Task">
                    <span class="input-group-text task-label" style="cursor: pointer; " onclick="add()">Task</span>
            </div>`;

        $('#taskForm').append(form1); // Append the cloned input to the form
    }
    </script>

    <?php
    if (isset($_GET)) {
        echo '<pre>';
        var_dump($_GET);
        echo '</pre>';
    }
    ?>

</body>

</html>