<?php

// Abstract class and inheritance example for Blogging
abstract class Blogging_User
{
    // Abstract method: must be implemented in the child class
    abstract public function post($title, $content);

    // Concrete method with logic
    public function profile($name)
    {
        echo "Welcome to $name's blog profile.<br>";
    }
}

// Child class implementing the abstract method
class Blogger extends Blogging_User
{
    public function post($title, $content)
    {
        echo "<strong>Title:</strong> $title<br>";
        echo "<strong>Content:</strong> $content<br><hr>";
    }
}

// Create object
$blogger = new Blogger();

// Call methods
$blogger->profile("Anil Tamang");
$blogger->post("Learning PHP", "PHP is fun and useful for server-side development.");
$blogger->post("Why Blog?", "Blogging helps express thoughts and connect with readers.");
