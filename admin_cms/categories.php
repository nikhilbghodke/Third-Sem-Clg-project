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
                        
                            <div class="col-xs-6">
							
							
							
							<?php 
							//Post content here 
							  $reference=$database->getReference('cms/categories');
							  if(isset($_POST['sub']))
							  {
								  if(isset($_POST['title']))
								  {
									  //$name=$reference->getChild(1);
									  
									 $data=['name'=>$_POST['title']];
									 $reference->push($data);
								  }
								  else
								  {
									  echo "Please enter the data before sumitting!!";
								  }
							  }
						   
							?>
							
							
							
							
							
							
							
							
							
							
							
							<form action="" method="post">
							    <div class="form-group">
							      
								  <input type="text" class="form-control" placeholder="Add new category" name="title">
								</div> 
							    <div clas="form-group">
								  <input type="submit" class="btn btn-primary" value="Add New category" name="sub">
								
							    </div>
							</form>
							<br>
							<?php 
							if(isset($_GET['edit']))
							{
								include "includes/edit_categories.php";
							}
							?>
							</div>
							<div class="col-xs-6">
 							    <table class="table table-striped">
								<thead>
								   <tr>
								    <th>Id </th>
								    <th>Category</th>
								   </tr>
								</thead>
								<tbody>
								<?php 
								//Find all categories
								$arr=$database->getReference('cms/categories')->getvalue();
								foreach($arr as $key =>$value)
								{ 
								if($value!=null)
								{
								?>
								   <tr>
								    <th><?php echo"{$key}";?></th>
								    <th><?php echo"{$value['name']}";?></th>
								    <th><?php echo"<a href='categories.php?delete={$key}'>Delete</a>";?></th>
								    <th><?php echo"<a href='categories.php?edit={$key}'>Edit</a>";?></th>
								   </tr>
								   
								<?php }}?>
								<?php 
								   if(isset($_GET['delete']))
								   {
									   $reference->getChild($_GET['delete'])->remove();
									   header("Location:categories.php");
								   }
								?>
								</tbody>
 							    </table>
                            </div>
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