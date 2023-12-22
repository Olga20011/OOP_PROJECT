<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once('database.php')?>

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
        $result = $this->db->resultSet();

        return $result;


    }
    // Get categories
    
    public function getCategories(){
        $this->db->query("SELECT * FROM categories");
        // Assign Result Set
        $results= $this->db->resultSet();

        return $results;
    }

    // Get by Category
    public function getByCategory($category){
        $this->db->query("SELECT jobs.*, categories.name AS cname 
                    FROM jobs
                    INNER JOIN categories 
                    ON jobs.category_id = categories.id
                    WHERE jobs.category_id = $category
                    ORDER BY post_date DESC");
        $result = $this->db->resultSet();

        return $result;

    }
    

}

?>