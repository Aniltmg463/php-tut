<?php

// Interface, class, constructor, and method implementation example using Blogging
interface Blogging
{
    public function writePost($title, $content);
}

class Blogger implements Blogging
{
    public $name;
    public $email;

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function writePost($title, $content)
    {
        echo "<h3>Blog by: $this->name ($this->email)</h3>";
        echo "<strong>Title:</strong> $title<br/>";
        echo "<strong>Content:</strong> $content<br/><hr/>";
    }
}

// Creating Blogger objects
$author1 = new Blogger("Anil Tamang", "anil@example.com");
$author1->writePost("The Power of PHP", "PHP is a powerful scripting language for web development.");

$author2 = new Blogger("Sam Rai", "sam@example.com");
$author2->writePost("Why Blogging Matters", "Blogging helps share knowledge and build your personal brand.");
