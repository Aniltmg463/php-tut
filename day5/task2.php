<!-- index.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Task Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mx-auto my-5">
        <form action="" method="GET" id="taskForm">
            <div class="input-group mb-3" id="inputRef">
                <input type="text" class="form-control" name="task[]" placeholder="Enter Task">
                <span class="input-group-text" id="basic-addon1" style="cursor: pointer;">Task</span>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        // Click event for the "Task" label
        $('#basic-addon1').click(function() {
            addTaskElement(); // Call the function to clone the input
        });

        function addTaskElement() {
            const taskInputBox = $("#inputRef").clone(); // Clone the input group
            taskInputBox.find("input").val(""); // Clear the input value in the cloned element
            $("#taskForm").append(taskInputBox); // Append the cloned input to the form
        }
    });
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