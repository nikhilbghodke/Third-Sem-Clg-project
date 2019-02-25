<?php include "includes/homepage_header.php" ?>
<?php 
    session_start();
$user_id=$_SESSION['user_id'];

?>
<body >
<header>
<?php include "includes/homepage_navbar.php" ?>	  
	  
	  <?php 
	  
	  if(isset($_POST['sub']))
	  {
		  if(isset($_POST['title'])&&isset($_POST['content']))
		  {
			  $title=$_POST['title'];
			  $content=$_POST['content'];
			  $date=date('d-m-y');
			  $post_category=$_POST['cat'];
			  //echo $post_category;
			  if(isset($_POST['annon']))
				  $author_id=unknown;
			  else
				  $author_id=$user_id;
			  $data=['title'=>$title,'content'=>$content,'date'=>$date,'post_category'=>$post_category,
			  
			  'author_id'=>$author_id,];
			  $a=$database->getReference('cms/post')->push($data);
              $database->getReference('cms/user')->getChild($user_id)->getChild('question_asked')->push($a->getKey());
			 $database->getReference('cms/categories')->getChild($post_category)->getChild('questions_asked')->push($a->getKey());
              header("location:index1.php");
		  }
		  
		  else
		  {
			  echo "<script>alert('Please fill all the fiels');";
		  }
	  }
	  
	  
	  ?>
	  
	  
	  
	  
 <div class="container main">
	<div class="row" >
<div class="col-sm-9">
<div class="col-sm-12 block" >

	 <div class="row" class="form-group" style="padding:10px;">
	 <center><u><h2>Ask Questions</h2></u></center>
	 <br>
	     <form method="POST">
		      <label >Title</label>
		 <input type="text" name="title" class="form-control">
		 <label>Description</label>
		    <textarea row='20' cols='10' class="form-control" name="content">
			
			</textarea>
			<br>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="true" name='annon'>
                      Annonymous (Author Name will not be disclosed)
               </label>
            </div>
			<br>
			<div class="checkbox">
			<u><h4>Categories</h4></u>
			<?php 
			$arr=$database->getReference('cms/categories')->getValue();
			foreach($arr as $key =>$value )
			{
				$name=$value['name'];
				
			?>
			
               <label class="col-xs-4">
                  <input type="radio" value=<?php echo $key;?> name='cat'>
                      <?php echo $name; ?>
               </label>
			<?php }?>
            </div>
			<br>
			
			<div class="col-xs-12">
			<center><input type='submit' class="btn btn-default" name='sub'></center>
			</div>
		 </form>
	 </div>
</div> 
  
</div>

<?php include "includes/homepage_sidebar.php";?>
<script src='jquery.js'></script>
<script src='bootstrap/js/bootstrap.js'></script>
</body>
</html>