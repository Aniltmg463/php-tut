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
        <form action="" method="POST" id="taskForm">
            <div class="input-group mb-3 inputRef">
                <input type="text" class="form-control" name="task[]" placeholder="Enter Task">
                <span class="input-group-text task-label" onclick="add()">Task</span>
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
            <button type="submit" name="clear" value="1" class="btn btn-danger ms-2">Clear Tasks</button>
        </form>
    </div>

    <script>
    function add() {
        const form1 =
            `<div class="input-group mb-3 inputRef">
                    <input type="text" class="form-control" name="task[]" placeholder="Enter Task">
                    <span class="input-group-text task-label" style="cursor: pointer;" onclick="add()">Task</span>
                </div>`;
        $('#taskForm').append(form1);
    }
    </script>

    <?php
    session_start();

    // Clear session if requested
    if (isset($_POST['clear']) && $_POST['clear'] == 1) {
        unset($_SESSION['taskinfo']);
    }

    // Add new tasks
    if (isset($_POST['task']) && is_array($_POST['task']) && !isset($_POST['clear'])) {
        if (!isset($_SESSION['taskinfo'])) {
            $_SESSION['taskinfo'] = [];
        }

        $newTasks = array_filter($_POST['task'], fn($t) => trim($t) !== '');
        $_SESSION['taskinfo'] = array_merge($_SESSION['taskinfo'], $newTasks);
    }

    // Display tasks
    function printTask(): void
    {
        echo "<div class='container'>";
        echo "<h5 class='text-center'>All Tasks</h5><ul class='list-group'>";

        if (!empty($_SESSION['taskinfo'])) {
            foreach ($_SESSION['taskinfo'] as $eachtask) {
                echo "<li class='list-group-item'>" . htmlspecialchars($eachtask) . "</li>";
            }
        } else {
            echo "<li class='list-group-item text-muted'>No tasks found.</li>";
        }

        echo "</ul></div>";
    }

    printTask();
    ?>
</body>

</html>