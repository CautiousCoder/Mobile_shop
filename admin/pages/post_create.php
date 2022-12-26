<?php
    //basic element functions
    include_once('../database/DBcontroller.php');
    include_once('../php/element.php');

    //php functions
    include_once('../php/functions.php');

    $con = DBconnection();
    // create database 
    $sql = "CREATE TABLE IF NOT EXISTS products(
        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL UNIQUE,
        slug VARCHAR(120) DEFAULT NULL,
        short_desc VARCHAR(500) DEFAULT NULL,
        description LONGTEXT DEFAULT NULL,
        prize FLOAT(10,2) DEFAULT 0,
        mrp FLOAT(10,2) DEFAULT 0,
        qyt INT(6) DEFAULT 0,
        img VARCHAR(100) DEFAULT NULL,
        status VARCHAR(3)DEFAULT NULL,
        meta_desc VARCHAR(200) DEFAULT NULL,
        meta_key VARCHAR(50) DEFAULT NULL,
        meta_title VARCHAR(100) DEFAULT NULL
        );
    ";

    mysqli_query($GLOBALS['con'], $sql);
    
    $name = '';
    $pro_desc = '';
    $msg = '';
    $pro_id = '';
    $img_name = '';
    $tmp_name = '';
    
    if (isset($_GET['type'])  || $_GET['type']) {
        $id = $_GET['id'];
        $res = mysqli_query($GLOBALS['con'], "select * from products where id=$id");
        $check = mysqli_num_rows($res);
        if($check>0){
            $row = mysqli_fetch_assoc($res);
            $pro_id = $row['id'];
            $name = $row['name'];
            $prize = $row['prize'];
            $short_desc = $row['short_desc'];
            $description = $row['description'];
        } else {
            header('locatiion:post_index.php');
        }
    }
    //echo $con;
    if(isset($_POST['submit'])){
        $name = textBoxValue($GLOBALS['con'], 'name');
        $slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/','-',$name));
        $short_desc = textBoxValue($GLOBALS['con'], 'short_desc');
        $meta_desc = textBoxValue($GLOBALS['con'], 'meta_desc');
        $meta_key = textBoxValue($GLOBALS['con'], 'meta_key');
        $meta_title = textBoxValue($GLOBALS['con'], 'meta_title');
        $prize = textBoxValue($GLOBALS['con'], 'prize');
        $mrp = textBoxValue($GLOBALS['con'], 'mrp');
        $qyt = textBoxValue($GLOBALS['con'], 'qyt');
        $description = textBoxValue($GLOBALS['con'], 'description');
        if(isset($_FILES['img'])){
            $img_name = $_FILES['img']['name'];
            $tmp_name = $_FILES['img']['tmp_name'];
            $img_up = "../../assets/storage/".$img_name;
            
        }

        $result = mysqli_query($GLOBALS['con'], "select * from products where name='$name'");
        $check = mysqli_num_rows($result);
        if ($check>0) {
            if (isset($_GET['id']) && $_GET['id']!='') {
                if ($id == $pro_id) {
                } else {
                    $msg = "Already Exists Product.";
                }
            } else {
                $msg = "Already Exists Product.";
            }
        }else {
            $msg = '';
        }
        if ($msg == '') {
            if (isset($_GET['id']) && $_GET['id']!='') {
                $update_status = "update products set name='$name', slug='$slug', short_desc='$short_desc', meta_desc='$meta_desc', meta_key='$meta_key', meta_title='$meta_title', prize='$prize', mrp='$mrp', qyt='$qyt', description='$description' where id='$pro_id'";
                mysqli_query($GLOBALS['con'], $update_status);
                notification("bg-success p-3 mb-0 text-center", "Product Updated Successfully.");
                header('location:../pages/post_index.php');
            } else {
                if (mysqli_query($GLOBALS['con'], "INSERT INTO products(name, slug, short_desc, meta_desc, meta_key, meta_title, prize, mrp, qyt, img, description, status) VALUES('$name', '$slug', '$short_desc', '$meta_desc', '$meta_key', '$meta_title', '$prize', '$mrp', '$qyt', '$img_name', '$description', 1)")) {
                    move_uploaded_file($tmp_name,$img_up);
                    notification("bg-success p-3 mb-0 text-center", "Product Created Successfully.");
                    header('location:../pages/post_index.php');
                } else {
                    notification("bg-danger p-3 mb-0 text-center", "Product Created Failled.");
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
                include_once('../inc/_post_create.php');
            ?>
        </main>
        <!-- /.content -->
        <div class="clearfix"></div>

<?php 
    include_once('bottom_section.php');
?>