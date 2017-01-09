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
		<link href="css/main.css?v1" rel="stylesheet">
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
		<div id="wrap">
		  <div id="main" class="clear-top">
				<!-- Modal -->
				<div class="modal fade" id="add-score-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Load skill set</h4>
				      </div>
				      <div class="modal-body">
				        <form class="form-horizontal" id="load-skillset" method="POST" action="">
							<div class="form-group">
								<label for="skillsets" class="col-sm-2 control-label">Skill set</label>
								<div class="col-sm-10">
									<select class="form-control" name="skillsets" id="skillsets">
									</select>
								</div>
							</div>
				        </form>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        <button type="button" class="btn btn-primary" id="load">Load</button>
				      </div>
				    </div>
				  </div>
				</div>
		
				<div class="modal fade" id="saved" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content saved-modal">
		  		      <div class="modal-header">
		  		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  		        <h4 class="modal-title" id="myModalLabel">Success!</h4>
		  		      </div>
				      <div class="modal-body">
				        <div class="alert alert-success" role="alert">Score saved successfully!</div>
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
				        <li><a href="index.php">Create skill set</a></li>
				        <li class="active"><a href="scores.php">Enter scores <span class="sr-only">(current)</span></a></li>
						<li><a href="generate.php">Generate report</a></li>
				      </ul>
		     
				    </div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>
		
				<div class="jumbotron container-fluid">
					<div class="container">
						<h1 class="skillset">Score entry</h1>
						<p>
							<!-- Button trigger modal -->
							<button type="button" id="load" class="btn btn-default" data-toggle="modal" data-target="#add-score-modal">
							  Load skill set
							</button>
						</p>
					</div>
				</div>
		
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h3></h3>
							<div class="alert alert-info" role="alert">Load skill set.</div>
							<form id="score-form" class="custom-hidden">
							  <div class="form-group">
							    <label for="student[name]">Name of student</label>
							    <input type="text" class="form-control" name="student[name]" id="student-name" placeholder="Name" required>
							  </div>
							  <div class="custom-hidden" id="skillset-value"></div>
					  
							  <div class="form-group" id="score-form-buttons">
							      <button type="submit" id="save" class="btn btn-primary">Save report</button>
							  </div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<footer>
			<div class="container">
				<p class="pull-left">Skill visualization</p>
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
		<script src="js/jquery.serializeJSON.js?v2"></script>
		<script src="js/scores.js?v1"></script>
		
	</body>
  
</html>