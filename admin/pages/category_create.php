<?php
    //basic element functions
    include_once('../database/DBcontroller.php');
    include_once('../php/element.php');

    //php functions
    include_once('../php/functions.php');

    $con = DBconnection();
    // create database 
    $sql = "CREATE TABLE IF NOT EXISTS categories(
        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL UNIQUE,
        description VARCHAR(1000) DEFAULT NULL,
        status VARCHAR(3)DEFAULT NULL
        );
    ";

    mysqli_query($GLOBALS['con'], $sql);
    
    $cat_name = '';
    $cat_desc = '';
    $msg = '';
    $res_id = '';
    if (isset($_GET['type'])  || $_GET['type']) {
        $id = $_GET['id'];
        $res = mysqli_query($GLOBALS['con'], "select * from categories where id=$id");
        $check = mysqli_num_rows($res);
        if($check>0){
            $row = mysqli_fetch_assoc($res);
            $res_id = $row['id'];
            $cat_name = $row['name'];
            $cat_desc = $row['description'];
        } else {
            header('locatiion:category_index.php');
        }
    }
    //echo $con;
    if(isset($_POST['submit'])){
        $name = textBoxValue($GLOBALS['con'], 'name');
        $description = textBoxValue($GLOBALS['con'], 'description');

        $result = mysqli_query($GLOBALS['con'], "select * from categories where name='$name'");
        $check = mysqli_num_rows($result);
        if ($check>0) {
            if (isset($_GET['id']) && $_GET['id']!='') {
                if ($id == $res_id) {
                } else {
                    $msg = "Already Exists Category.";
                }
            } else {
                $msg = "Already Exists this Category.";
            }
        }
        if ($msg == '') {
            if (isset($_GET['id']) && $_GET['id']!='') {
                $update_status = "update categories set name='$name', description='$description' where id='$res_id'";
                mysqli_query($GLOBALS['con'], $update_status);
                notification("bg-success p-3 mb-0 text-center", "Category Updated Successfully.");
                header('location:../pages/category_index.php');
            } else {
                if (mysqli_query($GLOBALS['con'], "INSERT INTO categories(name, description, status) VALUES('$name', '$description', 1)")) {
                    notification("bg-success p-3 mb-0 text-center", "Category Created Successfully.");
                    header('location:../pages/category_index.php');
                } else {
                    notification("bg-danger p-3 mb-0 text-center", "Category Created Failled.");
                }
            }
        }
    }

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
                include_once('../inc/_category_create.php');
            ?>
        </main>
        <!-- /.content -->
        <div class="clearfix"></div>

<?php 
    include_once('bottom_section.php');
?>