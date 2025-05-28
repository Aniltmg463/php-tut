<?php
require_once 'config/Database.php';
require_once 'classes/Job.php';

$db = new Database();
$conn = $db->connect();
// $db = (new Database())->connect(); //in single line
$job = new Job($conn);

/* echo '<pre>';
print_r($job);
echo '</pre>';
die;
 */

$action = $_GET['action'] ?? '';
$method = $_SERVER['REQUEST_METHOD'];

switch ($action) {
    case 'create':
        if ($method === 'POST') {
            $job->create($_POST['title'], $_POST['company'], $_POST['location']);
            header("Location: index.php");
            exit;
        } else {
            include 'views/create.php';
        }
        break;

    case 'edit':
        if ($method === 'POST') {
            $job->update($_GET['id'], $_POST['title'], $_POST['company'], $_POST['location']);
            header("Location: index.php");
            exit;
        } else {
            $jobData = $job->getOne($_GET['id']);
            $job = $jobData;
            include 'views/edit.php';
        }
        break;

    case 'delete':
        $job->delete($_GET['id']);
        header("Location: index.php");
        exit;
        break;

    default:
        $jobs = $job->getAll();
        include 'views/index.php';
        break;
}
