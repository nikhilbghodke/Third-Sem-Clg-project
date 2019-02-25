                      <form action="" method="post">
							    <div class="form-group">
								  <input type="text" class="form-control" placeholder="Add new category" name="title" value="<?php 
                                if(isset($_GET['edit']))
								{
									$i=$reference->getChild($_GET['edit'])->getValue();
									echo $i;
								}
								  ?>">
								
								</div> 
							    <div clas="form-group">
								  <input type="submit" class="btn btn-primary" value="Update" name="edit_cat">
								
							    </div>
							</form>
					<?php 
					if(isset($_POST['edit_cat']))
					{
						$reference->getChild($_GET['edit'])->set($_POST['title']);
					}
					?>