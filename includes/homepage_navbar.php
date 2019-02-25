<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" style="padding-top:25px;min-height:100px;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="images/logo.png" width="150" style="position:relative;top:-15px;"></img></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav ">
        <li><a href="index1.php"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a></li>
        <li><a href="ask_question.php"><i class="far fa-question-circle"></i> Ask Question</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-lightbulb"></i> Answer <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index1.php">Recent Questions</a></li>
            <li><a href="index1.php">Most Responses</a></li>
            <li><a href="index1.php">Most Voted</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="index1.php">Most Visit</a></li>
            <li role="separator" class="divider"></li>
			<li><a href="index1.php">No Answer</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left hidden">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search Question">
        </div>
        <button type="submit" class="btn btn-default navbar-btn"><i class="fas fa-search"></i></button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="user.php"><i class="fas fa-user-tie"></i> User</a></li>
        <li><a href="#"><i class="fas fa-trophy"></i> Badges</a></li>
        <li><a href="in.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>