
<!-- Animated -->
<div class="animated fadeIn">

    <!-- Orders -->
    <div class="orders">
        <div class="card">
            <div class="card-body d-flex justify-content-between">
                <h4 class="box-title text-black-50">Product Category  /<span class="font-size-12"> Create</span></h4>
                <a href="../pages/category_index.php" class="btn btn-lg bg-success btn-outline-dark">Back</a>
            </div>
            <div class="card-body">
              <form action="" method="post">
                <?php
                  if ($msg != '') {
                    echo "<div class='form-outline bg-danger m-2 rounded'><p class='text-center py-2 text-white'>".$msg."</p> </div>";
                  }
                ?>
                <div class="form-outline my-2">
                  <?php inputElementText("Category Name", "text", "name", "name", "Category Name", $cat_name, "required"); ?>
                </div>

                <div class="form-outline my-2">
                    <label for="Textarea1" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="Textarea1" rows="3"><?php echo $cat_desc ?></textarea>
                </div>

                <div class="d-flex justify-content-center py-3">
                  <?php btnElement("submit", "btn btn-success btn-lg text-body", "submit", "Submit", ""); ?>
                </div>
              </form>
            </div>
        </div> <!-- /.card -->
    </div>
    <!-- /.orders -->

</div>
<!-- .animated -->