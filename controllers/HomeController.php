<?php
// controllers/HomeController.php
class HomeController extends Controller
{
    public function index()
    {
        $this->view('home', ['message' => 'Welcome to the MVC framework!']);
    }
}