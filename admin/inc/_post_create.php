
<!-- Animated -->
<div class="animated fadeIn">

    <!-- Orders -->
    <div class="orders">
        <div class="card">
            <div class="card-body d-flex justify-content-between">
                <h4 class="box-title text-black-50">Product  /<span class="font-size-12"> Create</span></h4>
                <a href="../pages/post_index.php" class="btn btn-lg bg-success btn-outline-dark">Back</a>
            </div>
            <div class="card-body">
              <form action="" method="post">
                <?php
                  if ($msg != '') {
                    echo "<div class='form-outline bg-danger m-2 rounded'><p class='text-center py-2 text-white'>".$msg."</p> </div>";
                  }
                ?>
                <div class="form-outline my-2">
                  <?php inputElementText("Product Name", "text", "name", "name", "Product Name", $name, "required"); ?>
                </div>

                <div class="form-outline my-2">
                  <?php inputElementText("Product Prize", "number", "prize", "prize", "Product Prize", $prize, "required"); ?>
                </div>

                <div class="form-outline my-2">
                    <label for="short_desc" class="form-label">Short Description</label>
                    <textarea class="form-control" name="short_desc" id="short_desc" rows="3"><?php echo $short_desc ?></textarea>
                </div>

                <div class="form-outline my-2">
                    <label for="Textarea1" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="Textarea1" rows="3"><?php echo $description ?></textarea>
                </div>

                <div class="d-flex justify-content-center py-3">
                  <?php inputElementFile("image","form-control", "img", "Choose File", "") ?>
                </div>

                <div class="d-flex justify-content-center py-3">
                  <?php btnElement("submit", "btn btn-primary", "submit", "Submit", "") ?>
                </div>
              </form>
            </div>
        </div> <!-- /.card -->
    </div>
    <!-- /.orders -->

</div>
<!-- .animated -->