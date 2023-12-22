<?php 
require_once 'C:\Folder\htdocs\Joblister\lib\Templates.php';
include_once ('C:\Folder\htdocs\Joblister\lib\config\init.php');
include_once('lib' . DIRECTORY_SEPARATOR . 'job.php');
?>

<?php 
$job = new Job;

$template = new Template('./lib/templates/frontpage.php');

$category = isset($_GET['category']) ? $_GET['category'] : null;

if($category){
    $template->jobs = $job->getByCategory($category);


}else{
    $template->title = 'Latest Jobs';
    $template->jobs = $job->getAllJobs();

}

$template ->categories = $job->getCategories();

echo $template;

?>


