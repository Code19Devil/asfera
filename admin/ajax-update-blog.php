<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>

  <?php if(isset($_POST['id'])): ?>

    <?php
    // checking for page
     $id=$_POST['id'];
     require "dbconn.php";
     $sql="SELECT id,slug,title,description,keywords FROM blog where id='$id'";
     $result=mysqli_query($link, $sql);
     $row=mysqli_fetch_array($result);
     ?>
            <div class="row mt-4" align="left">
              <label for="slug">Slug</label>
              <textarea id="slug" name="slug" class="form-control" rows="1" cols="10" readonly><?php print($row['slug']) ?></textarea>
            </div>

            <div class="row mt-4" align="left">
              <label for="title">Title</label>
              <textarea id="title" name="title" class="form-control" rows="1" cols="10"><?php print($row['title']) ?></textarea>
            </div>

            <!-- description -->
            <div class="row mt-4" align="left">
              <label for="description">Description</label>
              <textarea id="description" name="description" class="form-control" rows="1" cols="10"><?php print($row['description']) ?></textarea>
            </div>

            <!-- keywords -->
            <div class="row mt-4" align="left">
              <label for="keywords">Keywords</label>
              <textarea id="keywords" name="keywords" class="form-control" rows="1" cols="10"><?php print($row['keywords']) ?></textarea>
            </div>

            <!-- update button -->
            <div class="col-1 col-lg-1 m-auto">
              <input type="submit" class="btn btn-primary mt-4" name="submit" value="Update-Blog">
            </div>


<?php elseif(isset($_POST['sbid'])): ?>

  <?php
  // checking for page
   $id=$_POST['sbid'];
   require "dbconn.php";
   $sql="SELECT id,title,description FROM sub_blog where blog_id='$id'";
   $result=mysqli_query($link, $sql);
   while($row=mysqli_fetch_array($result)):
   ?>

        <form action="update-blog" method="post">
          <!-- blog id -->
          <div class="row mt-4" align="left">
            <label for="b_id">Blog ID</label>
            <textarea id="b_id" name="b_id" class="form-control" rows="1" cols="10" readonly><?php print($row['id']) ?></textarea>
          </div>

          <!-- title -->
          <div class="row mt-4" align="left">
            <label for="b_title">Title</label>
            <textarea id="b_title" name="b_title" class="form-control" rows="1" cols="10"><?php print($row['title']) ?></textarea>
          </div>

          <!-- description -->
          <div class="row mt-4" align="left">
            <label for="b_description">Description</label>
            <textarea id="b_description" name="b_description" class="form-control" rows="1" cols="10"><?php print($row['description']) ?></textarea>
          </div>

          <!-- update button -->
          <div class="col-1 col-lg-1 m-auto">
            <input type="submit" class="btn btn-primary mt-4" name="submit" value="Update-Sub-Blog">
          </div>

        </form>

  <?php endwhile; ?>

<?php endif; ?>


<?php endif; ?>
