<?php
if (isset($_POST['expression'])) {
    $expression = $_POST['expression'];

    // Sanitize input: Allow only numbers, operators, parentheses, and spaces
    if (preg_match('/^[0-9+\-*\/(). ]+$/', $expression)) {
        // Remove extra spaces (optional)
        $expression = str_replace(' ', '', $expression);

        // Evaluate safely using eval() but within a try-catch block
        try {
            eval("\$result = $expression;");
            echo $result;
        } catch (Throwable $e) {
            echo "Error: Invalid Expression";
        }
    } else {
        echo "Error: Invalid Input";
    }
} else {
    echo "No input received";
}
