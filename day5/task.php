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
                <span class="input-group-text" id="basic-addon1">Task</span>
            </div>
            <button type="button" class="btn btn-primary" onclick="addTaskElement()">Add More</button>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    function addTaskElement() {
        const taskInputBox = $("#inputRef").clone();
        taskInputBox.find("input").val(""); // clear input
        $("#taskForm").append(taskInputBox);
    }
    </script>

</body>

</html>