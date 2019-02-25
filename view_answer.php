<?php include "includes/view_answer_header.php" ?>
<body >
<header>
<?php include "includes/homepage_navbar.php" ?>	  

<?php
    session_start();
$user_id=$_SESSION['user_id'];
     if(isset($_POST['sub']))
	 {
		 if(isset($_POST['answer']))
		 {
		 $data=['content'=>$_POST['answer'],
		         'date'=>date('d-m-y'),
				 'author'=>$user_id,
				 'likes'=>'0',
				 'follows'=>'0',
		       ];
			   
		$a=$database->getReference('cms/post')->getChild($_GET['ans_id'])->getChild('answer')->push($data);
		$database->getReference('cms/user')->getChild($user_id)->getChild('question_answered')->push($a->getKey());
	     }
	 }

 ?>








	  
	  
 <div class="container main">
	<div class="row">
<div class="col-sm-12">
  <?php 
  $ansid=$_GET['ans_id'];
     $value=$database->getReference('cms/post')->getChild($ansid)->getValue();
		 if($value!=null)
		 {
		$title=$value['title'];
		$category=$value['post_category'];
		$author=$database->getReference('cms/user')->getChild($value['author_id'])->getChild('name')->getValue();
		
		//$status=$value['status'];
		$content=$value['content'];
		$author_image=$database->getReference('cms/user')->getChild($value['author_id'])->getChild('image')->getValue();
		$date=$value['date'];
  ?>
    <div class="col-sm-12 block">
     <div class="row">
	   <div class="image col-sm-2 col-xs-6  "><img src="images_cms/<?php echo $author_image;?>" class="img-circle img-resize img-thumbnail"></img><br></div>
	   <div class="indicator col-sm-2 col-sm-push-8  "><span class="hov category"><?php echo $category;?></span><div style="min-height:2.5px"></div><span class="hov"><?php echo $date;?></span><div style="min-height:2.5px"></div><span class="hov">By <?php echo $author;?></span></div>
	   <div class="question col-sm-8  col-sm-pull-2 hov "><h2><i class="fas fa-thumbtack"></i><?php echo $title; ?></h2></div>
	 </div>
	 <div class="row">
	    <div class="row">
		    <div class="col-sm-2 offset"></div>
			<!--inline styling below-->
			<div class="col-sm-10 desciption"><p style="padding:0 15px; color:#848282;"><?php echo $content;?> ...</p></div>
		</div>
		<div class="row status-row">
		<div class="col-sm-2 offset hidden-xs"></div>
		    <div class="col-sm-10 status">
			  <div class="row">
			<i class="fas fa-pen-nib col-sm-2 col-xs-4" style="color:#7676fb"><a  href="#write">Answer</a></i>
			<i class="far fa-thumbs-up col-sm-2 col-xs-4">Like</i>
			<i class="far fa-bookmark icon-4x col-sm-2 hidden-xs"> Follow</i>
			<i class="far fa-user col-sm-2 hidden-xs"> Request</i>
			
			<i class="dropdown col-sm-2 col-xs-4">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
           <ul class="dropdown-menu" >
            <li><a href="#">Report Question</a></li>
            <li><a href="#">Downvote Answer</a></li>
            <li><a href="#">Hide</a></li>
            <li role="separator" class="divider"></li>
			<li><a href="#">No Answer</a></li>
			<li><a href="#" class="hidden-sm hidden-md hidden-lg">No Answer</a></li>
          </ul>
        </i>

		       </div>
			</div>
		</div>
	 </div>
</div>
	 <?php }?>
	 
	 <form method="POST" class="form-group" id="write">
     <textarea rows="5"  cols="20" class="form-control" name="answer" placeholder="Write Your own Answer Here!!!">
    </textarea>
    <input type="submit" name="sub" class="form-control" value="Contribute" style="background-color:#9c9ab3 ;color:white"></input>
    </form>
	 
	 
	  <?php 
	 
	 $arr=$database->getReference('cms/post')->getChild($_GET['ans_id'])->getChild('answer')->getValue();
	 if($arr!=NULL)
	 {
	  foreach($arr as $key=>$value)
	  {
		  $content=$value['content'];
		  $author=$database->getReference('cms/user')->getChild($value['author'])->getValue();
		  //echo $author['name'];
		  $author_image=$author['image'];
	 
	 
	 ?>
	 
	 <div class="col-sm-12 block">
	 
	
	 
     <div class="row">
	   <div class="image col-sm-2 col-xs-6  "><img src="images/<?php echo $author_image?>" class="img-circle img-resize img-thumbnail"></img><br></div>
	   <div class="indicator col-sm-2 col-xs-6 hidden-sm hidden-md hidden-lg"><span class="hov category">Analytics</span><div style="min-height:2.5px"></div><span class="hov">12-Oct-2018</span><div style="min-height:2.5px"></div><span class="hov">By Lisa hayden</span></div>
	  <!-- <div class="question col-sm-8   hov "><h2><i class="fas fa-thumbtack"></i>  How do i make most out of MS in Bussiness Analytics ?</h2></div>-->
	   <div class="col-sm-10 description"><p><?php echo $content ;?></p></div>
	 </div>
	 <div class="row">
	    
		<div class="row status-row">
		<div class="col-sm-2 offset hidden-xs"></div>
		    <div class="col-sm-10 status">
			  <div class="row">
			<i class="far fa-thumbs-up col-sm-2 col-xs-4">Like</i>
			<i class="far fa-bookmark icon-4x col-sm-2 col-xs-4"> Follow</i>
			<i class="col-sm-2 hidden-xs"> </i>
		    <i class="col-sm-2 hidden-xs"> </i>
			<i class="dropdown col-sm-2">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
           <ul class="dropdown-menu" >
            <li><a href="#">Report Question</a></li>
            <li><a href="#">Downvote Answer</a></li>
            <li><a href="#">Hide</a></li>
            <li role="separator" class="divider"></li>
			<li><a href="#">No Answer</a></li>
			<li><a href="#" class="hidden-sm hidden-md hidden-lg">No Answer</a></li>
          </ul>
        </i>
	
             	</div>
			</div>
		</div>
	 </div>	 
</div>
<?php }}?>	 
<br>
</div>

<?php //include "includes/homepage_sidebar.php";?>
<script src='jquery.js'></script>
<script src='bootstrap/js/bootstrap.js'></script>
</body>
</html>