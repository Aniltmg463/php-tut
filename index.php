<?php
require_once 'config/Database.php';
require_once 'classes/Job.php';

$db = (new Database())->connect();
$job = new Job($db);

$action = $_GET['action'] ?? '';

if ($action === 'create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $job->create($_POST['title'], $_POST['company'], $_POST['location']);
    header("Location: index.php");
    exit;
} elseif ($action === 'create') {
    include 'views/create.php';
} elseif ($action === 'edit' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $job->update($_GET['id'], $_POST['title'], $_POST['company'], $_POST['location']);
    header("Location: index.php");
    exit;
} elseif ($action === 'edit') {
    $jobData = $job->getOne($_GET['id']);
    $job = $jobData;
    include 'views/edit.php';
} elseif ($action === 'delete') {
    $job->delete($_GET['id']);
    header("Location: index.php");
    exit;
} else {
    $jobs = $job->getAll();
    include 'views/index.php';
}
