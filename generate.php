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
		<div class="modal fade" id="load-student-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Load student score</h4>
		      </div>
		      <div class="modal-body">
		        <form class="form-horizontal" id="load-skillset" method="POST" action="">
					<div class="form-group">
						<label for="student" class="col-sm-4 control-label">Student name</label>
						<div class="col-sm-8">
							<select class="form-control" name="student" id="student">
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
		        <li><a href="scores.php">Enter scores</a></li>
				<li class="active"><a href="generate.php">Generate report <span class="sr-only">(current)</span></a></li>
		      </ul>
		     
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		
		<div class="jumbotron container-fluid">
			<div class="container">
				<h1 class="student-name">Student</h1>
				<h2 class="skillset">Skill set</h2>
				<p>
					<!-- Button trigger modal -->
					<button type="button" id="load" class="btn btn-default" data-toggle="modal" data-target="#load-student-modal">
					  Load student scores
					</button>
				</p>
			</div>
		</div>
		
		<div class="container">
			<div class="row">
				<div class="col-md-6" id="line-graph">
					<h3 class="raw-data">Line graph</h3>
					<div class="alert alert-info" role="alert">Load scores to generate graphs</div>
				</div>
				<div class="col-md-6" id="radar-chart">
					<h3>Radar chart</h3>
					<div class="alert alert-info" role="alert">Load scores to generate graphs</div>
					<div class="alert alert-warning radar-not-shown" role="alert">You need at least 3 skills to generate a radar chart.</div>
					<div class="skillsPieChart" data-values='{"jQuery": 4.5,"CSS/CSS3": 3.0,"Html5":3.0,"Python":4.0,"Node.js":4.0}' data-width="300" data-height="300" data-red="0" data-green="128" data-blue="255">
						<div class="chartCanvasWrap">
							
						</div>
					</div>
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
		<script src="js/generate.js?v1"></script>
		
	</body>
  
</html>