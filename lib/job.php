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
                    ORDER BY post_date DESC LIMIT 0, 30");
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

    // Get category
    public function getCategory ($category_id){
       $this->db->query("SELECT * FROM categories WHERE id = ?");
        $this->db->bind('i' , $category_id);
    


        //Assign row
        $row = $this->db->single();
        return $row;

    }
    //Get job
    public function getJob($id){
        $this->db->query("SELECT * FROM jobs WHERE id = ?");
        $this->db->bind('i', $id);
    
        //Assign row
        $row = $this->db->single();
        return $row;
    }
    
    //create job
// Inside Job class
public function create($data) {
    $this->db->query("INSERT INTO jobs(category_id, job_title, company, description, location, salary, contact_user, contact_email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind data
    $params = array(
        $data['category_id'],
        $data['job_title'],
        $data['company'],
        $data['description'],
        $data['location'],
        $data['salary'],
        $data['contact_user'],
        $data['contact_email']
    );

    $this->db->bind($params);

    // Execute
    if ($this->db->execute()) {
        return true;
    } else {
        return false;
    }
}


}


?>