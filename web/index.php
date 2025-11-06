<!DOCTYPE html>
<html lang="en">
   <?php
        include_once '../View/Partials/head.php';
        include_once '../Lib/helpers.php';
   ?>
    <body class="sb-nav-fixed">
        <?php include_once '../View/Partials/menu_1.php'; ?>
        <div id="layoutSidenav">
           <?php include_once '../View/Partials/menu_2.php'; ?>
            <div id="layoutSidenav_content">
                <main>
                   <?php
                   if(isset($_GET['module'])){
                        resolve();
                   }
                   else{
                    include_once '../View/Partials/dashboard.php';
                   }
                   ?>
                </main>
                <?php include_once '../View/Partials/footer.php'; ?>
            </div>
        </div>
       
    </body>
</html>
