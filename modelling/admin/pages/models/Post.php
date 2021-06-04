<?php

class Post
{
    function __construct($conn) {
        $this->conn = $conn;
      }

    public function GetSinglePost($var)
    {
        // get model posts
        $sql2 = "SELECT * FROM `posts` WHERE `id`='" . $var. "' ";

        $results2 = $this->conn->query($sql2);
        if ($results2->num_rows < 1) {
            $posts = [];
        } else {
            $posts = mysqli_fetch_assoc($results2);
        }
        return $posts;
    }

    public function GetUserPost( $var)
    {
        // get model posts
        $sql2 = "SELECT * FROM `posts` WHERE `user_id`='" . $var. "' ";

        $results2 = $this->conn->query($sql2);
        if ($results2->num_rows < 1) {
            $posts = [];
        } else {
            $posts = $results2->fetch_all(MYSQLI_ASSOC);
        }
        return $posts;
    }
      public function GetUserPosts( $var)
    {
        // get model posts
        $sql2 = "SELECT * FROM `posts` WHERE `user_id`='" . $var. "' ";

        $results2 = $this->conn->query($sql2);
        if ($results2->num_rows < 1) {
            $posts = [];
        } else {
            $posts = $results2->fetch_all(MYSQLI_ASSOC);
        }
        return $posts;
    }

    public function GetPosts()
    {
        // get model posts
        $sql2 = "SELECT * FROM `posts` WHERE";

        $results2 = $this->conn->query($sql2);
        if ($results2->num_rows < 1) {
            $posts = [];
        } else {
            $posts = $results2->fetch_all(MYSQLI_ASSOC);
        }
        return $posts;
    }
    
}
