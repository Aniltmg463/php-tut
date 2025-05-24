<?php

class AuthController extends Controller
{
    private $model;

    // Constructor to initialize the User model
    public function __construct()
    {
        // Load the User model
        $this->model = $this->model('User');
    }

    // Login functionality
    public function login()
    {
        // Check if form was submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            // Authenticate user using model
            $user = $this->model->authenticate($email, $password);

            if ($user !== false) {
                // Store user data in session if authentication is successful
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'phoneNumber' => $user['phone_number'],
                ];
                $_SESSION['isLoggedIn'] = true;

                // Redirect to the post index page after login
                header("Location: index.php?url=post/index");
                exit;
            } else {
                // Set error message for incorrect credentials
                $errors['email'] = "Invalid credentials!";
                $this->view('auth/login', ['errors' => $errors]);
                return;
            }
        }

        // Show login view for GET requests
        $this->view('auth/login');
    }

    // User registration functionality
    public function register()
    {
        // Check if form was submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = [];

            // Get form data
            $data['name'] = $_POST['name'] ?? '';
            $data['email'] = $_POST['email'] ?? '';
            $data['phoneNumber'] = $_POST['phone_number'] ?? '';
            $data['username'] = $_POST['username'] ?? '';
            $data['password'] = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirm_password'] ?? '';

            // Validate name
            if (empty($data['name'])) {
                $errors['name'] = "Name is required!";
            }

            // Validate email
            if (empty($data['email'])) {
                $errors['email'] = "Email is required!";
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Invalid email format!";
            } else {
                // Check if email already exists
                if ($this->model->findByEmail($data['email'])) {
                    $errors['email'] = "Email already exists!";
                }
            }

            // Validate username
            if (empty($data['username'])) {
                $errors['username'] = "Username is required!";
            } else {
                // Assuming usernames are unique, check for existing username
                if ($this->model->findByEmail($data['username'])) {
                    $errors['username'] = "Username already exists!";
                }
            }

            // Validate password
            if (empty($data['password'])) {
                $errors['password'] = "Password is required!";
            } elseif ($data['password'] !== $confirmPassword) {
                $errors['password'] = "Passwords do not match!";
            }

            // If there are validation errors, show the registration form again with errors
            if (!empty($errors)) {
                $this->view('auth/register', ['errors' => $errors]);
                return;
            }

            // Attempt to register the user
            if ($this->model->register($data)) {
                // Set success message in session
                $_SESSION['message'] = 'Registration successful! You can now log in.';

                // Redirect to login page
                header("Location: index.php?url=auth/login");
                exit;
            } else {
                // Registration failed (e.g., DB error)
                $errors['message'] = "Registration failed!";
                $this->view('auth/register', ['errors' => $errors]);
                return;
            }
        }

        // Show registration form for GET requests
        $this->view('auth/register');
    }

    // Logout the user
    public function logout()
    {
        // Destroy session to log out the user
        session_destroy();

        // Redirect to login page
        header("Location: index.php?url=auth/login");
        exit;
    }
}
