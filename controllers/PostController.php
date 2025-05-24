<?php

class PostController extends Controller
{
    private $model;

    // Constructor: checks authentication and loads the Post model
    public function __construct()
    {
        // ✅ Redirect to login if user is not authenticated
        if (!isset($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn']) {
            header("Location: index.php?url=auth/login");
            exit;
        }

        // ✅ Load the 'Post' model
        $this->model = $this->model('post');
    }

    // Show list of all posts
    public function index()
    {
        $posts = $this->model->getAll(); // ✅ Fetch all posts
        $this->view('post/index', ['posts' => $posts]); // ✅ Load the view and pass data
    }

    // Show create form and handle post creation
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = [];
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';

            // ✅ Validate inputs
            if (empty($title)) {
                $errors['title'] = "Title field is required!";
            }
            if (empty($content)) {
                $errors['content'] = "Content field is required!";
            }

            // ✅ If validation fails, reload view with errors
            if (!empty($errors)) {
                $this->view('post/create', ['errors' => $errors]);
                return;
            }

            // ✅ Create post via model
            $this->model->create([
                'title' => $title,
                'content' => $content
            ]);

            // ✅ Set success message and redirect
            $_SESSION['message'] = "Post created successfully!";
            header("Location: index.php?url=post/index");
            exit;
        }

        // ✅ Show create form
        $this->view('post/create');
    }

    // Show edit form and handle update
    public function edit($id)
    {
        $post = $this->model->getById($id); // ✅ Get post by ID

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';

            // ✅ Basic validation
            if (empty($title) || empty($content)) {
                $errors['message'] = "Title and content are required!";
                $this->view('post/edit', ['post' => $post, 'errors' => $errors]);
                return;
            }

            // ✅ Update the post
            $this->model->update($id, [
                'title' => $title,
                'content' => $content
            ]);

            $_SESSION['message'] = "Post updated successfully!";
            header("Location: index.php?url=post/index");
            exit;
        }

        // ✅ Show edit form with post data
        $this->view('post/edit', ['post' => $post]);
    }

    // Delete a post by ID
    public function delete($id)
    {
        $this->model->delete($id); // ✅ Delete the post
        $_SESSION['message'] = "Post deleted successfully!";
        header("Location: index.php?url=post/index");
        exit;
    }
}
