<?php 
require_once 'C:\Folder\htdocs\Joblister\lib\Templates.php';
include_once ('C:\Folder\htdocs\Joblister\lib\config\init.php');
include_once('lib' . DIRECTORY_SEPARATOR . 'job.php');
?>

<?php 
$job = new Job;

$template = new Template('lib/templates/job-single.php');
 

$job_id = isset($_GET['id']) ? $_GET['id'] : null;

$template ->job= $job->getJob($job_id);

echo $template;

?>


