<?php 
// main content area of admin panel
?>

<!-- Animated -->
<div class="animated fadeIn">

    <!-- Orders -->
    <div class="orders">
        <div class="card">
            <div class="card-body d-flex justify-content-between">
                <h4 class="box-title text-black-50">Product Tag /<span class="font-size-12"> Index</span></h4>
                <a href="../pages/tag_create.php" class="btn btn-lg bg-primary btn-outline-dark">Create</a>
            </div>
            <div class="card-body--">
                <div class="table-stats order-table ov-h">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th class="serial">No.</th>
                                <th>Name</th>
                                <th class="w-50">Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i = 0;
                                if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)){
                            ?>
                                <tr>
                                    <td class="serial"><?php echo ++$i; ?></td>
                                    <td>  <span class="name"><?php echo $row['name']; ?></span> </td>
                                    <td class="w-50"> <span class="product"><?php echo $row['description']; ?></span> </td>
                                    <td>
                                        <?php
                                            if ($row['status']==1) {
                                                echo "<a href='?type=status&operation=deactive&id=".$row['id']."'><span class='badge bg-success'>Active</span></a>";
                                            } else {
                                                echo "<a href='?type=status&operation=active&id=".$row['id']."'><span class='badge bg-warning'>Deactive</span></a>";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-end">
                                            <a href="../pages/Tag_create.php<?php echo '?type=edit&id='.$row['id']; ?>"><?php btnElement("edit", "btn btn-warning mr-2", "edit", "<i class='fa-solid fa-pen-to-square font-size-20 text-white'></i>", "data-bs-toggle='tooltip' data-bs-placement='bottom' title='Edit'") ?></a>
                                            <a href="<?php echo '?type=delete&id='.$row['id']; ?>"><?php btnElement("delete", "btn btn-danger", "delete", "<i class='fa-solid fa-trash font-size-20 text-white'></i>", "data-bs-toggle='tooltip' data-bs-placement='bottom' title='Delete'") ?></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                                }
                            } ?>
                        </tbody>
                    </table>
                </div> <!-- /.table-stats -->
            </div>
        </div> <!-- /.card -->
    </div>
    <!-- /.orders -->

</div>
<!-- .animated -->