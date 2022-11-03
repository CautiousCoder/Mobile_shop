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
                include_once('../inc/_dashboard_content.php');
            ?>
        </main>
        <!-- /.content -->
        <div class="clearfix"></div>

<?php 
    include_once('bottom_section.php');
?>