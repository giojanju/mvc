<?php
class Page 
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getPosts() {
        $this->db->query('
                SELECT 
                    posts.title,
                    posts.body,
                    posts.created_at,
                    users.name
                FROM posts
                JOIN users ON users.id = posts.user_id
                ORDER BY posts.created_at DESC
        ');
        $results = $this->db->resultSet();
        return $results;
    }

}