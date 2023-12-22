<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'inc/header.php'; ?>

      <div class="jumbotron">
       <form action="index.php" method="GET" >
          <select name="category" class="form-control" id="">
            <option value="0">Choose Category</option>
            <?php foreach($categories as $category): ?>
                <option value="<?php echo $category['id']; ?>" ><?php echo 
                $category['name']; ?></option>
              <?php endforeach;?>
          </select>
          <br>
          <input type="submit" class="btn btn-lg btn-success" value="FIND" >
       </form>
      <div/>

      <?php foreach ($jobs as $job): ?>
    <div class="row marketing">
        <div class="col-lg-10">
                <h4><?php echo $job['job_title']; ?></h4>
                <p><?php echo $job['description']; ?></p>
            
        </div>
        <div class="col-md-2">
            <a class="btn btn-secondary" href="#">View</a>
        </div>
    </div>
<?php endforeach; ?>



<?php include'inc/footer.php';?>

