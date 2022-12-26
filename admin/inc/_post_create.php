
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
              <form action="" method="post" enctype="multipart/form-data">
                <?php
                  if ($msg != '') {
                    echo "<div class='form-outline bg-danger m-2 rounded'><p class='text-center py-2 text-white'>".$msg."</p> </div>";
                  }
                ?>
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-outline my-2">
                      <?php inputElementText("Product Name", "text", "name", "name", "Product Name", $name, "required"); ?>
                    </div>
                    <div class="form-outline my-2">
                      <label for="short_desc" class="form-label">Short Description</label>
                      <textarea class="form-control" name="short_desc" id="short_desc" rows="3"><?php echo $short_desc ?></textarea>
                    </div>
                    <div class="form-outline my-2">
                        <label for="Textarea1" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="Textarea1" rows="3"><?php echo $description ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-3" style="background-color: #eeffef;">
                    <div class="form-outline my-2">
                      <?php inputElementText("Product Prize", "number", "prize", "prize", "Product Prize", $prize, ""); ?>
                    </div>
                    <div class="form-outline my-2">
                      <?php inputElementText("Product MRP Prize", "number", "mrp", "mrp", "Product MRP Prize", $mrp, ""); ?>
                    </div>
                    <div class="form-outline my-2">
                      <?php inputElementText("Product Qauntity", "number", "qyt", "qyt", "No. of Products", $qyt, ""); ?>
                    </div>
                    <div class="d-flex justify-content-center py-3">
                      <?php inputElementFile("image","form-control", "img", "Choose File", "") ?>
                    </div>
                    <div class="form-outline my-2">
                      <?php inputElementText("Meta Title", "text", "meta_title", "meta_title", "Meta Title", $meta_title, ""); ?>
                    </div>
                    <div class="form-outline my-2">
                      <?php inputElementText("Meta Key", "text", "meta_key", "meta_key", "Meta Key", $meta_key, ""); ?>
                    </div>
                    <div class="form-outline my-2">
                        <label for="meta_desc" class="form-label">Meta Description</label>
                        <textarea class="form-control" name="meta_desc" id="meta_desc" rows="3"><?php echo $meta_desc ?></textarea>
                    </div>
                  </div>
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