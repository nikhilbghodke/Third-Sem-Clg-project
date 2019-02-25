    
	<?php 
session_start();
	if(isset($_POST['create_post']))
	{
		
		$title=$_POST['title'];
		$category=$_POST['cat'];
		$author=$_SESSION['user_id'];
		$content=$_POST['post_content'];
		$data=['title'=>$title,
				'post_category'=>$category,
				'author_id'=>$author,
				'content'=>$content,
				'date'=>date("d-m-y"),
				
			  ];
		$database->getReference("cms/post")->push($data);
	}
?>


<form action ="" method="post" enctype="multipart/form-data">
    <div class="form-group">
	    <input type="text" class="form-control" name="title" placeholder="title">
	</div>
	<div class="form-group">
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
	</div>
	<div class="form-group">
	    <textarea class="form-control" name="post_content" id ="" cols="30" rows="10"></textarea>
	</div>
	<div class="form-group">
	    <input type="submit" class="btn btn-primary" name="create_post" value="Publish">
	</div>
</form>