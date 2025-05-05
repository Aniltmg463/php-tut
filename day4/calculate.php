<?php

function evaluateExpression($expr)
{
    $tokens = tokenize($expr);
    $rpn = toRPN($tokens);
    return evaluateRPN($rpn);
}
function tokenize($expr)
{
    $pattern = '/(\d+\.?\d*|\+|\-|\*|\/|\(|\))/';
    preg_match_all($pattern, str_replace(' ', '', $expr), $matches);
    return $matches[0];
}
function toRPN($tokens)
{
    $precedence = ['+' => 1, '-' => 1, '*' => 2, '/' => 2];
    $output = [];
    $stack = [];
    foreach ($tokens as $token) {
        if (is_numeric($token)) {
            $output[] = $token;
        } elseif (in_array($token, ['+', '-', '*', '/'])) {
            while (
                !empty($stack) &&
                end($stack) != '(' &&
                $precedence[end($stack)] >= $precedence[$token]
            ) {
                $output[] = array_pop($stack);
            }
            $stack[] = $token;
        } elseif ($token === '(') {
            $stack[] = $token;
        } elseif ($token === ')') {
            while (!empty($stack) && end($stack) !== '(') {
                $output[] = array_pop($stack);
            }
            array_pop($stack); // remove '('
        }
    }
    while (!empty($stack)) {
        $output[] = array_pop($stack);
    }
    return $output;
}
function evaluateRPN($tokens)
{
    $stack = [];
    foreach ($tokens as $token) {
        if (is_numeric($token)) {
            $stack[] = $token;
        } else {
            $b = array_pop($stack);
            $a = array_pop($stack);
            switch ($token) {
                case '+':
                    $stack[] = $a + $b;
                    break;
                case '-':
                    $stack[] = $a - $b;
                    break;
                case '*':
                    $stack[] = $a * $b;
                    break;
                case '/':
                    $stack[] = $a / $b;
                    break;
            }
        }
    }
    return $stack[0];
}




if (isset($_POST['expression'])) {
    try {
        echo evaluateExpression($_POST['expression']);
    } catch (\Throwable $th) {
        echo "Error: " . $th->getMessage();
    }
} else {
    echo "No input received";
}