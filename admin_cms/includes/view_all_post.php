<table class="table table-bordered table-striped">
                    <tr>
					    <th>Id</th>
					    <th>Author</th>
					    <th>Title</th>
					    <th>Category</th>
					    <th>Image</th>
					    
					    
					    <th>Date</th>
                    </tr>
					<?php 
					
					$arr=$database->getReference('cms/post')->getValue();
					foreach($arr as $key=>$value)
					{
					  if($value!=null)
					  {
						  //echo "<td>{$key}<td>";
					  
					
						  
					?>
					<tr>
					    <td><?php echo $key; ?></td>
					    <td><?php echo $database->getReference('cms/user')->getChild($value['author_id'])->getChild('name')->getValue(); ?></td>
					    <td><?php echo $value['title'];?></td>
					    <td><?php echo $database->getReference('cms/categories')->getChild($value['post_category'])->getChild('name')->getValue(); ?></td>
					    
					    <td><img src="../images/<?php echo $database->getReference('cms/user')->getChild($value['author_id'])->getChild('image')->getValue();?>"></img></td>
					    
					    <td><?php echo $value['date'];?></td>
						
						<td><?php  echo "<a href='posts.php?source=edit_post&p_id={$key}'>Edit</a>";?></td>
						<td><?php  echo "<a href='posts.php?delete={$key}'>Delete</a>";?></td>
                    </tr>
					<?php }}?> 
					</table>
					<?php 
					if(isset($_GET['delete']))
					{
						$database->getReference('cms/post')->getChild($_GET['delete'])->remove();
						header("location:posts.php");
					}
					?>