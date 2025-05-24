<?php

// The User model extends the base Model class to use the database connection
class User extends Model
{
    /**
     * Register a new user
     * @param array $data User data: name, email, phoneNumber, password
     * @return bool True if registration is successful
     */
    public function register($data)
    {
        // Hash the password before saving to the database
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // Prepare the SQL statement to prevent SQL injection
        $stmt = $this->db->prepare("INSERT INTO users (name, email, phone_number, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $data['name'], $data['email'], $data['phoneNumber'], $data['password']);

        // Execute the statement and return the result (true or false)
        return $stmt->execute();
    }

    /**
     * Find a user by their email address
     * @param string $email
     * @return array|null User data or null if not found
     */
    public function findByEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        // Return the result as an associative array
        return $stmt->get_result()->fetch_assoc();
    }

    /**
     * Authenticate a user by checking email and password
     * @param string $email
     * @param string $password
     * @return array|false User data if authenticated, false otherwise
     */
    public function authenticate($email, $password)
    {
        // Find the user by email
        $user = $this->findByEmail($email);

        // If user exists and password matches (using password_verify)
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        // Authentication failed
        return false;
    }
}
