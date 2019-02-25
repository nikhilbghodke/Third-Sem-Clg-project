 <?php 
include "../connection.php";
include "includes/header.php";
ob_start();
?>


<body>

    <div id="wrapper">

        <!-- Navigation -->
            <?php include "includes/navabr.php"; ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include "includes/sidebar.php"; ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Admin
                            <small>Nikhil</small>
                        </h1>
                    <?php 
					    if(isset($_GET['source']))
						{
							$source=$_GET['source'];
						}
						else
						{
							$source='';
						}
						switch($source)
						{
							case 'add_post';
							include "includes/add_post.php";
							break;
							case 'edit_post';
							include "includes/edit_post.php";
							break;
							default;
							include "includes/view_all_post.php";
							break;
						}
						
					?>					
                            
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
   <?php include "includes/footer.php";?>