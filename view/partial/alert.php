<?php
if (isset($_SESSION['alert'])) {
    $alertType = $_SESSION['alert']['type'] === 'success' ? 'alert-success' : 'alert-danger';
    echo '<div class="alert ' . $alertType . ' alert-dismissible fade show" role="alert">';
    echo '<p class="mb-0">' . htmlspecialchars($_SESSION['alert']['message']) . '</p>';
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
    echo '</div>';
}