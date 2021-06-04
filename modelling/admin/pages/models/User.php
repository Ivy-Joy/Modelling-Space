<?php 

class User 
{
    function __construct($conn)
    {
        $this->conn = $conn;
    }
    // get all users 
    public function GetUsers()
    {
        // get all users query
        $sql2 = "SELECT * FROM `users` ";

        $results2 = $this->conn->query($sql2);
        if ($results2->num_rows < 1) {
            $posts = [];
        } else {
            $posts = $results2->fetch_all(MYSQLI_ASSOC);
        }
        return $posts;
    }

    // get single user
        public function GetFilteredUsers($criteria, $value, $user_type =null)
    {
        // get all users query
        $sql2 = "SELECT * FROM `users` WHERE `$criteria`='".$value."' AND `user_type`='".$user_type."' ";

        $results2 = $this->conn->query($sql2);
        if ($results2->num_rows < 1) {
            $posts = [];
        } else {
            $posts = $results2->fetch_all(MYSQLI_ASSOC);
        }
        return $posts;
    }
    
}
