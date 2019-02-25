  
<?php 
	if(isset($_POST['edit_post']))
	{
		//$post_image=$_FILES['image']['name'];
		//$post_image_temp=$_FILES['image']['tmp_name'];
		$title=$_POST['title'];
		$category=$_POST['post_category'];
		$author=$_POST['author'];
		$status=$_POST['post_status'];
		$content=$_POST['post_content'];
		
		$data=['title'=>$title,
		        'status'=>$status,
				'post_category'=>$category,
				'author'=>$author,
				'content'=>$content,
				'date'=>date("d-m-y"),
				'tag'=>$_POST['tags'],
			  ];
	    $new_key=$_GET['p_id'];
		$database->getReference("cms/post")->getChild($new_key)->set($data);
		//move_uploaded_file($post_image_temp,"../images_cms/steve");
	}
	$ref=$database->getReference('cms/post');
	if($_GET['source']=='edit_post')
	{
		$id=$_GET['p_id'];
		//echo $id;
		$child=$ref->getChild($id)->getValue();	
        //print_r($child);		
	}
?>




<form action ="" method="post" enctype="multipart/form-data">
    <div class="form-group">
	<label>Title</label>
	    <input type="text" class="form-control" name="title" placeholder="title" value="<?php echo $child['title'];?>">
	</div>
	<div class="form-group">
	<label>Author</label>
	    <input type="text" class="form-control" name="author" placeholder="author" value="<?php echo $child['author'];?>">
	</div>
	<div class="form-group">
	    <label>Status</label>
	    <input type="text" class="form-control" name="post_status" placeholder="status" value="<?php echo $child['status'];?>">
	</div>
	<div class="form-group">
	    <label>Tags</label>
	    <input type="text" class="form-control" name="tags" placeholder="tags" value="<?php echo $child['tag'];?>">
	</div>
    <div class="form-group">
	<label>Category</label>
	 <select name="post_category" id="post_category">
	 <?php 
	 $arr=$database->getReference('cms/categories')->getValue();
	 foreach($arr as $key=>$value)
	   echo "<option value='{$value}'>{$value}</option>";
	?>
	 </select>
	</div>
	<div class="form-group">
	<label >Image</label>
	<br>
	    <img src="../images_cms/<?php echo $child['image'];?>" width=200>
	</div>
	<div class="form-group">
	<label>TextArea</label>
	    <textarea class="form-control" name="post_content" id ="" cols="30" rows="10"><?php echo $child['content'];?></textarea>
	</div>
	<div class="form-group">
	    <input type="submit" class="btn btn-primary" name="edit_post" value="Publish">
	</div>
</form>