<?php
session_start();
include "connection.php";
if(isset($_SESSION['user_id']))
{
   $user_id=$_SESSION['user_id'];
   $info=$database->getReference('cms/user')->getChild($user_id)->getValue();
    if(isset($info['about']))
        $about=$info['about'];
    else
        $about="  --  ";
    if(isset($info['hobbies']))
        $hobbies=$info['hobbies'];
    else
        $hobbies="  --  ";
    $email=$info['email'];
    $fname=$info['name'];
    $lname=$info['name'];
    $image=$database->getReference('cms/user')->getChild($user_id)->getChild('image')->getValue();
    $pass=$database->getReference('cms/user')->getChild($user_id)->getChild('password')->getValue();
    
}
if(isset($_POST['submit'])){
    
$about = $_POST["about"];
$fname = $_POST["fname"];
//$lname = $_POST["lname"];
$hobbies = $_POST["hobbies"]; 
$email = $_POST["email"];
$pass=$_POST["password"];
$r_pass=$_POST["rpassword"];
$post_image=$_FILES['image']['name'];
		$post_image_temp=$_FILES['image']['tmp_name'];
if(strcmp($pass,$r_pass)==0)
{
    $database->getReference('cms/user')->getChild($user_id)->getChild('password')->set($pass);
}
    else
    {
        echo "<script>alert('Password did not match');<script>";
    }
    
  $database->getReference('cms/user')->getChild($user_id)->getChild('about')->set($about);
  $database->getReference('cms/user')->getChild($user_id)->getChild('hobbies')->set($hobbies);
  $database->getReference('cms/user')->getChild($user_id)->getChild('password')->set($pass);
  $database->getReference('cms/user')->getChild($user_id)->getChild('email')->set($email);
 $database->getReference('cms/user')->getChild($user_id)->getChild('name')->set($fname);
    
    
}

?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Codeply preview</title>
  <base target="_self">
  <meta name="description" content="Example user profile form and information editing form for Bootstrap 4. This snippet has tabs to separate other profile info such as messages or notifications. Sidebar with profile image." />
  <meta name="google" value="notranslate">
  <link rel="shortcut icon" href="/images/cp_ico.png">

  
  <!--stylesheets / link tags loaded here-->



  <!--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" />-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  


</head>
<body >
  
  
  <div class="container">
    <div class="row my-2">
        <div class="userpic">
          <div class="img-responsive text-center">
            <img src="images/<?php echo $image;?>" class="mx-auto img-fluid img-circle d-block" alt="avatar">
            <h6 class="mt-2">Upload a different photo</h6>
            <div class='form-group'>
            <label class="custom-file">
               <span class="custom-file-control">Choose file</span>
                <input type="file" id="file" class="form-control">
                
            </label>
            </div>
        </div>
        </div>      

        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#messages" data-toggle="tab" class="nav-link">Messages</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
                </li>
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3"><?php echo $fname;?></h5>
                    <!--<h5 class="mb-3">User Profile</h5>-->
                    <div class="row">
                        <div class="col-md-6">
                            <h6>About</h6>
                            <p><?php 
                                echo $about;
                            ?></p>
                          <h6>Hobbies</h6>
                            <p>
                                <?php echo $hobbies;
                                ?>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6>Recent badges</h6>
                            <a href="#" class="badge badge-dark badge-pill">html5</a>
                            <a href="#" class="badge badge-dark badge-pill">react</a>
                            <a href="#" class="badge badge-dark badge-pill">codeply</a>
                            <a href="#" class="badge badge-dark badge-pill">angularjs</a>
                            <a href="#" class="badge badge-dark badge-pill">css3</a>
                            <a href="#" class="badge badge-dark badge-pill">jquery</a>
                            <a href="#" class="badge badge-dark badge-pill">bootstrap</a>
                            <a href="#" class="badge badge-dark badge-pill">responsive-design</a>
                            <hr>
                            <span class="badge badge-primary"><i class="fa fa-user"></i> 900 Followers</span>
                            <span class="badge badge-success"><i class="fa fa-cog"></i> 43 Forks</span>
                            <span class="badge badge-danger"><i class="fa fa-eye"></i> 245 Views</span>
                        </div>
                        <div class="col-md-12">
                            <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span> Recent Activity</h5>
                            <table class="table table-sm table-hover table-striped">
                                <tbody>                                    
                                    <tr>
                                        <td>
                                            <strong>Abby</strong> joined ACME Project Team in <strong>`Collaboration`</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Gary</strong> deleted My Board1 in <strong>`Discussions`</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Kensington</strong> deleted MyBoard3 in <strong>`Discussions`</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>John</strong> deleted My Board1 in <strong>`Discussions`</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Skell</strong> deleted his post Look at Why this is.. in <strong>`Discussions`</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/row-->
                </div>
                <div class="tab-pane" id="messages">
                    <div class="alert alert-info alert-dismissable">
                        <a class="panel-close close" data-dismiss="alert">×</a> This is an <strong>.alert</strong>. Use this to show important messages to the user.
                    </div>
                    <table class="table table-hover table-striped">
                        <tbody>                                    
                            <tr>
                                <td>
                                   <span class="float-right font-weight-bold">3 hrs ago</span> Here is your a link to the latest summary report from the..
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <span class="float-right font-weight-bold">Yesterday</span> There has been a request on your account since that was..
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <span class="float-right font-weight-bold">9/10</span> Porttitor vitae ultrices quis, dapibus id dolor. Morbi venenatis lacinia rhoncus. 
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <span class="float-right font-weight-bold">9/4</span> Vestibulum tincidunt ullamcorper eros eget luctus. 
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <span class="float-right font-weight-bold">9/4</span> Maxamillion ais the fix for tibulum tincidunt ullamcorper eros. 
                                </td>
                            </tr>
                        </tbody> 
                    </table>
                </div>
                
                
                
                
                
                
                <div class="tab-pane" id="edit">   
                    <form role="form" method="POST">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Name</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="<?php echo $fname; ?>" name="fname" >
                            </div>
                        </div>
                     
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="email" value="<?php echo $email; ?>" name='email'>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">about</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="<?php echo $about; ?>" name='about'>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">hobbies</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="<?php echo $hobbies; ?>"name='hobbies'>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Password</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" value="<?php echo $pass;?>" name='password'>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" value="<?php echo $pass; ?>" name='rpassword'>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="reset" class="btn btn-secondary" value="Cancel">
                                <input type="submit" class="btn btn-primary" value="Save Changes" name="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
  
  <script>
    // sandbox disable popups
    if (window.self !== window.top && window.name!="view1") {;
      window.alert = function(){/*disable alert*/};
      window.confirm = function(){/*disable confirm*/};
      window.prompt = function(){/*disable prompt*/};
      window.open = function(){/*disable open*/};
    }
    
    // prevent href=# click jump
    document.addEventListener("DOMContentLoaded", function() {
      var links = document.getElementsByTagName("A");
      for(var i=0; i < links.length; i++) {
        if(links[i].href.indexOf('#')!=-1) {
          links[i].addEventListener("click", function(e) {
          console.debug("prevent href=# click");
              if (this.hash) {
                if (this.hash=="#") {
                  e.preventDefault();
                  return false;
                }
                else {
                  /*
                  var el = document.getElementById(this.hash.replace(/#/, ""));
                  if (el) {
                    el.scrollIntoView(true);
                  }
                  */
                }
              }
              return false;
          })
        }
      }
    }, false);
  </script>
    <style type="text/css">
    
.userpic img {
  float: none;
  margin: 0 auto;
  width: 50%;
  height: 50%;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}

    
    </style>
  
  <!--scripts loaded here-->
  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
  
  
  
  <script>
  
  </script>

</body>
</html>

