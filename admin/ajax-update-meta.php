<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>

    <?php
    // checking for page
     $page=$_POST['page'];
     require "dbconn.php";
     $sql="SELECT * FROM seo where page='$page'";
     $result=mysqli_query($link, $sql);
     $row=mysqli_fetch_array($result);
     ?>

            <h3 align="center" class="mt-4">Website Meta tags</h3>

            <!-- title   -->
            <div class="row mt-4" align="left">
              <label for="title">Title</label>
              <textarea id="title" name="title" class="form-control" rows="1" cols="10"><?php print($row['title']) ?></textarea>
            </div>

            <!-- description -->
            <div class="row mt-4" align="left">
              <label for="m_description">Meta Description</label>
              <textarea id="m_description" name="m_description" class="form-control" rows="1" cols="10"><?php print($row['m_description']) ?></textarea>
            </div>

            <!-- keywords -->
            <div class="row mt-4" align="left">
              <label for="m_keywords">Meta Keywords</label>
              <textarea id="m_keywords" name="m_keywords" class="form-control" rows="1" cols="10"><?php print($row['m_keywords']) ?></textarea>
            </div>

            <!-- robots -->
            <div class="row mt-4" align="left">
              <label for="robots">Robots</label>
              <select class="form-control" id="robots" name="robots">
                <option value="<?php print($row['robots']) ?>" selected><?php print($row['robots']) ?></option>
                <option value="nofollow,noindex">No Follow , No Index</option>
                <option value="follow,noindex">Follow , No Index</option>
                <option value="nofollow,index">No Follow , Index</option>
                <option value="follow,index">Follow , Index</option>
              </select>
            </div>

            <h3 align="center" class="mt-4">OG Tags</h3>

            <!-- og title -->
            <div class="row mt-4">
              <label for="og_title" align="left">OG Title</label>
              <textarea id="og_title" name="og_title" class="form-control" rows="1" cols="10"><?php print($row['og_title']) ?></textarea>
            </div>

            <!-- og description -->
            <div class="row mt-4">
              <label for="og_description" align="left">OG Description</label>
              <textarea id="og_description" name="og_description" class="form-control" rows="1" cols="10"><?php print($row['og_description']) ?></textarea>
            </div>

            <!-- og image -->
            <div class="row mt-4">
              <label for="og_image" align="left">OG Image</label>
              <textarea id="og_image" name="og_image" class="form-control" rows="1" cols="10"><?php print($row['og_image']) ?></textarea>
            </div>

            <!-- og type -->
            <div class="row mt-4">
              <label for="og_type" align="left">OG Type</label>
              <select class="form-control" id="og_type" name="og_type">
                <option value="<?php print($row['og_type']) ?>" selected><?php print($row['og_type']) ?></option>
                <option value="website">Website</option>
                <option value="article">Article</option>
              </select>
            </div>

            <!-- update button -->
            <div class="col-1 col-lg-1 m-auto">
              <input type="submit" class="btn btn-primary mt-4" name="submit">
            </div>

<?php endif; ?>
