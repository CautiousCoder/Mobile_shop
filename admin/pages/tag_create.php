<?php
    //basic element functions
    include_once('../database/DBcontroller.php');
    include_once('../php/element.php');

    //php functions
    include_once('../php/functions.php');

    $con = DBconnection();
    // create database 
    $sql = "CREATE TABLE IF NOT EXISTS tags(
        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL UNIQUE,
        description VARCHAR(1000) DEFAULT NULL,
        status VARCHAR(3)DEFAULT NULL
        );
    ";

    mysqli_query($GLOBALS['con'], $sql);
    
    $tag_name = '';
    $tag_desc = '';
    $msg = '';
    $tag_id = '';
    if (isset($_GET['type'])  || $_GET['type']) {
        $id = $_GET['id'];
        $res = mysqli_query($GLOBALS['con'], "select * from tags where id=$id");
        $check = mysqli_num_rows($res);
        if($check>0){
            $row = mysqli_fetch_assoc($res);
            $tag_id = $row['id'];
            $tag_name = $row['name'];
            $tag_desc = $row['description'];
        } else {
            header('locatiion:tag_index.php');
        }
    }
    //echo $con;
    if(isset($_POST['submit'])){
        $name = textBoxValue($GLOBALS['con'], 'name');
        $description = textBoxValue($GLOBALS['con'], 'description');

        $result = mysqli_query($GLOBALS['con'], "select * from tags where name='$name'");
        $check = mysqli_num_rows($result);
        if ($check>0) {
            if (isset($_GET['id']) && $_GET['id']!='') {
                if ($id == $tag_id) {
                } else {
                    $msg = "Already Exists Tag.";
                }
            } else {
                $msg = "Already Exists this Tag.";
            }
        }
        if ($msg == '') {
            if (isset($_GET['id']) && $_GET['id']!='') {
                $update_status = "update tags set name='$name', description='$description' where id='$tag_id'";
                mysqli_query($GLOBALS['con'], $update_status);
                notification("bg-success p-3 mb-0 text-center", "Tag Updated Successfully.");
                header('location:../pages/tag_index.php');
            } else {
                if (mysqli_query($GLOBALS['con'], "INSERT INTO tags(name, description, status) VALUES('$name', '$description', 1)")) {
                    notification("bg-success p-3 mb-0 text-center", "Tag Created Successfully.");
                    header('location:../pages/tag_index.php');
                } else {
                    notification("bg-danger p-3 mb-0 text-center", "Tag Created Failled.");
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
                include_once('../inc/_tag_create.php');
            ?>
        </main>
        <!-- /.content -->
        <div class="clearfix"></div>

<?php 
    include_once('bottom_section.php');
?>