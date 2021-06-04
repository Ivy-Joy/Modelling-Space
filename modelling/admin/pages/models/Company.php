<?php 

class Company 
{

    function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function GetSingleCompany($var)
    {
        
        $sql2 = "SELECT * FROM `companies` WHERE `id`='" . $var. "' ";

        $results2 = $this->conn->query($sql2);
        if ($results2->num_rows < 1) {
            $posts = [];
        } else {
            $posts = mysqli_fetch_assoc($results2);
        }
        return $posts;
    }

    public function GetCompanies()
    {
        // get
        $sql2 = "SELECT * FROM `users` WHERE `user_type`='company' ";

        $results2 = $this->conn->query($sql2);
        if ($results2->num_rows < 1) {
            $posts = [];
        } else {
            $posts = $results2->fetch_all(MYSQLI_ASSOC);
        }
        return $posts;
    }
    
}
