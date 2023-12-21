<?php 
include_once('lib/database.php')?>

<?php 
class Job{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Get all jobs

    public function getAllJobs(){
        $this->db->query("SELECT jobs.*, categories.name AS cname 
                    FROM jobs
                    INNER JOIN categories 
                    ON jobs.category_id = categories.id
                    ORDER BY post_date DESC");
        // Assign Result Set
        $result = $this->db->resultSet();

        return $result;

    }

}

?>