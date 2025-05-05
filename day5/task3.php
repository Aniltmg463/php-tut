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
            <div class="input-group mb-3 inputRef">
                <input type="text" class="form-control" name="task[]" placeholder="Enter Task">
                <span class="input-group-text task-label" style="cursor: pointer;">Task</span>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add event delegation for dynamic elements
        document.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('task-label')) {
                addTaskElement();
            }
        });

        function addTaskElement() {
            // Clone the first input group
            const firstInputGroup = document.querySelector('.inputRef');
            const clonedInputGroup = firstInputGroup.cloneNode(true);

            // Clear the input value
            const input = clonedInputGroup.querySelector('input');
            input.value = '';

            // Append the cloned group to the form
            document.getElementById('taskForm').appendChild(clonedInputGroup);
        }
    });
    </script>

    <?php
    if (isset($_GET) && !empty($_GET)) {
        echo '<pre>';
        var_dump($_GET);
        echo '</pre>';
    }
    ?>

</body>

</html>