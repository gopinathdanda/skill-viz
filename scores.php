<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="Gopinath Danda">

		<title>
  		  	Skill visualization
		</title>

		<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/main.css?v2" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Raleway:800,100|Roboto' rel='stylesheet' type='text/css'>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!-- Favicons -->
		<!--<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<link rel="icon" href="/favicon.ico">-->
		
	</head>
	
	<body>
		
		<!-- Modal -->
		<div class="modal fade" id="change-skillset-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Change skill set name</h4>
		      </div>
		      <div class="modal-body">
		        <form id="change-skillset" method="POST" action="">
					<div class="form-group">
						<label for="skillset-name">Skill set name</label>
						<input type="text" class="form-control" name="skillset-name" id="skillset-name" placeholder="Skill set" required/>
					</div>
		        </form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary" id="skillset-update">Update skill set name</button>
		      </div>
		    </div>
		  </div>
		</div>
		
		<div class="modal fade" id="saved" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content"style="color:#5cb85c;text-align:center;font-weight:bold">
		      <div class="modal-body">
		        Skill set saved successfully!
		      </div>
		    </div>
		  </div>
		</div>
		
		<nav class="navbar navbar-default container-fluid">
		  <div class="container">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
			  <a class="navbar-brand" href="#">SKILL-VIZ</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li><a href="index.php">Create skill set form</a></li>
		        <li class="active"><a href="scores.php">Enter scores <span class="sr-only">(current)</span></a></li>
		      </ul>
		     
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		
		<div class="jumbotron container-fluid">
			<div class="container">
				<h1 class="skillset">Enter scores</h1>
				<p>
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#change-skillset-modal">
					  Load skill set
					</button>
				</p>
			</div>
		</div>
		
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3>Default skill set</h3>
					<p>Load skill set and save data or generate report.</p>
					<form>
					  <div class="form-group">
					    <label for="student-name" class="sr-only">Name of student</label>
					    <input type="text" class="form-control" id="student-name" placeholder="Name of the student" required>
					  </div>
					  
					  <h4>Section 1</h4>
					  <div class="row">
					  	<div class="form-group col-sm-2">
					    	<label for="score-1" class="sr-only">Score 1</label>
							<div class="input-group">
						      <input type="text" class="form-control" id="score-1" placeholder="Score">
						      <div class="input-group-addon">out of 10</div>
						    </div>
					 	 </div>
						 <div class="col-sm-10">
						 	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac consequat tellus. Proin eu nunc quam. Maecenas fringilla orci eu luctus faucibus. Duis quis dictum nisl.</p>
					 	</div>
					  </div>
					  
					  
					  <h4>Section 2</h4>
					  <div class="row">
					  	<div class="form-group col-sm-2">
					    	<label for="score-2" class="sr-only">Score 2</label>
							<div class="input-group">
						      <input type="text" class="form-control" id="score-2" placeholder="Score">
						      <div class="input-group-addon">out of 20</div>
						    </div>
					 	 </div>
						 <div class="col-sm-10">
						 	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac consequat tellus. Proin eu nunc quam. Maecenas fringilla orci eu luctus faucibus. Duis quis dictum nisl.</p>
					 	</div>
					  </div>
					  
					  
					  <div class="form-group">
					      <button type="submit" id="save" class="btn btn-primary">Save report</button>
						  <button type="submit" id="generate" class="btn btn-primary">Generate report</button>
					  </div>
					</form>
				</div>
			</div>
		</div>
		
		<footer>
			<div class="container">
				<p class="pull-left">Another small project</p>
				<p class="pull-right">Created by gdanda</p>
				<p class="clearfix"></p>
			</div>
		</footer>
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>-->
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery-radar-plus.js"></script>
		<script src="js/jquery.serializeJSON.js?v2"></script>
		<script src="js/main.js?v3"></script>
		
	</body>
  
</html>