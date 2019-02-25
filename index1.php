<?php include "includes/view_answer_header.php" ?>
<body >
<header>
<?php include "includes/homepage_navbar.php" ?>	  

<?php
$user_id=5;
session_start();
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
  $ansid=5;
     $arr=$database->getReference('cms/post')->getValue();
    foreach($arr as $key=>$value)
    {
		 if($value!=null)
		 {
		$title=$value['title'];
		$category=$database->getReference('cms/categories')->getChild($value['post_category'])->getChild('name')->getValue();
		$author=$database->getReference('cms/user')->getChild($value['author_id'])->getChild('name')->getValue();
		//$status=$value['status'];
		$content=$value['content'];
		$author_image=$database->getReference('cms/user')->getChild($value['author_id'])->getChild('image')->getValue();
		$date=$value['date'];
         
  ?>
    <div class="col-sm-12 block">
     <div class="row">
	   <div class="image col-sm-2 col-xs-6  "><img src="images/<?php echo $author_image;?>" class="img-circle img-resize img-thumbnail"></img><br></div>
	   <div class="indicator col-sm-2 col-sm-push-8  "><span class="hov category"><?php echo $category;?></span><div style="min-height:2.5px"></div><span class="hov"><?php echo $date;?></span><div style="min-height:2.5px"></div><span class="hov">By <?php echo $author;?></span></div>
        <div class="question col-sm-8  col-sm-pull-2 hov "><h2><a href="view_answer.php?ans_id=<?php echo $key ?>"><i class="fas fa-thumbtack"></i><?php echo $title; ?></h2></h2></a></div>
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
			<i class="far fa-thumbs-up col-sm-2 col-xs-4">Like</i>
			<i class="far fa-bookmark icon-4x col-sm-2 col-xs-4"> Follow</i>
			<i class="far fa-user col-sm-2 hidden-xs"> Request</i>
			<i class="fas fa-pen-nib col-sm-2 hidden-xs">Answer</i>
			
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
	 <?php }}?>
	 
	
	 
	 	 
<br>
</div>

<?php //include "includes/homepage_sidebar.php";
     

     ?>
<script src='jquery.js'></script>
<script src='bootstrap/js/bootstrap.js'></script>
</body>
</html>