<?php

class Job
{

    function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function ApplyJob($job_id, $email, $reason)
    {
        $sql = "INSERT INTO applications (job_id, email, reason) VALUES ('$job_id', '$email', '$reason') ";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            exit;
            return false;
        }
    }

    public function GetSingleJob($var)
    {

        $sql2 = "SELECT * FROM `jobs` WHERE `id`='" . $var . "' ";

        $results2 = $this->conn->query($sql2);
        if ($results2->num_rows < 1) {
            $posts = [];
        } else {
            $posts = mysqli_fetch_assoc($results2);
        }
        return $posts;
    }

    public function GetCompanyJobs($var)
    {
        // get
        $sql2 = "SELECT * FROM `jobs` WHERE `user_id`='" . $var . "' ";

        $results2 = $this->conn->query($sql2);
        if ($results2->num_rows < 1) {
            $posts = [];
        } else {
            $posts = $results2->fetch_all(MYSQLI_ASSOC);
        }
        return $posts;
    }
}
