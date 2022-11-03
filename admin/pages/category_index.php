<?php
    //basic element functions
    include_once('../database/DBcontroller.php');
    include_once('../php/element.php');

    //php functions
    include_once('../php/functions.php');

    $con = DBconnection();
    if (isset($_GET['type']) && $_GET['type']!='') {
        if ($_GET['type'] == 'status') {
            $operation = $_GET['operation'];
            $id = $_GET['id'];
            
            if ($operation == "deactive") {
                $status = 0;
            } else {
                $status = 1;
            }
            $update_status = "update categories set status='$status' where id=$id";
            mysqli_query($GLOBALS['con'], $update_status);
        }
        elseif ($_GET['type'] == 'delete') {
            $id = $_GET['id'];
            $delete_sql = "delete from categories where id=$id";
            mysqli_query($GLOBALS['con'], $delete_sql);
        }
    }
    
    // Find to database 
    $sql = "SELECT * FROM categories;
    ";

    $result = mysqli_query($con, $sql);
?>

<?php 
    include_once('top_section.php');
?>
<body>
    <!-- left sidebar -->
    <?php 
        include_once('../inc/_sidebar.php');
    ?>
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- left sidebar -->
        <?php 
            include_once('../inc/_navbar.php');
        ?>
        <!-- Content -->
        <main class="content">
            <!-- main content -->
            <?php 
                include_once('../inc/_category_index.php');
            ?>
        </main>
        <!-- /.content -->
        <div class="clearfix"></div>

<?php 
    include_once('bottom_section.php');
?>