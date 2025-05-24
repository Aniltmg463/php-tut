<?php

// The Post class extends the base Model class, so it gets access to the database connection ($this->db)
class Post extends Model
{
    /**
     * Fetch all posts from the database
     * @return array All posts as an associative array
     */
    public function getAll()
    {
        $query = "SELECT * FROM posts";
        $result = $this->db->query($query);

        // Convert the result set into an array of associative arrays
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Get a single post by its ID
     * @param int $id The ID of the post
     * @return array|null Post data or null if not found
     */
    public function getById($id)
    {
        // Use prepared statements to prevent SQL injection
        $stmt = $this->db->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->bind_param("i", $id); // "i" means integer
        $stmt->execute();

        // Fetch a single row
        return $stmt->get_result()->fetch_assoc();
    }

    /**
     * Create a new post
     * @param array $data Associative array with 'title' and 'content'
     * @return bool Whether the insertion was successful
     */
    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
        $stmt->bind_param("ss", $data['title'], $data['content']); // "ss" = two strings
        return $stmt->execute(); // Returns true on success
    }

    /**
     * Update an existing post
     * @param int $id The ID of the post to update
     * @param array $data Associative array with 'title' and 'content'
     * @return bool Whether the update was successful
     */
    public function update($id, $data)
    {
        $stmt = $this->db->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");
        $stmt->bind_param("ssi", $data['title'], $data['content'], $id); // "ssi" = 2 strings and 1 integer
        return $stmt->execute();
    }

    /**
     * Delete a post by ID
     * @param int $id The ID of the post to delete
     * @return bool Whether the deletion was successful
     */
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM posts WHERE id = ?");
        $stmt->bind_param("i", $id); // "i" = integer
        return $stmt->execute();
    }
}
