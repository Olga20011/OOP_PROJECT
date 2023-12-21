<?php 
require_once 'C:\Folder\htdocs\Joblister\lib\Templates.php';
include_once ('C:\Folder\htdocs\Joblister\lib\config\init.php');
include_once('lib' . DIRECTORY_SEPARATOR . 'job.php');
?>

<?php 
$job = new Job;
$template = new Template('./lib/templates/frontpage.php');

$template->title = 'Latest Jobs';

$template->jobs = $job->getAllJobs();

echo $template;

?>


