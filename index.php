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
		        <li class="active"><a href="index.php">Create skill set form <span class="sr-only">(current)</span></a></li>
		        <li><a href="scores.php">Enter scores</a></li>
		      </ul>
		     
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		
		<div class="jumbotron container-fluid">
			<div class="container">
				<h1 class="skillset">Emotional Capacity</h1>
				<p>
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#change-skillset-modal">
					  Change skill set name
					</button>
				</p>
			</div>
		</div>
		
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h3>Add skill</h3>
					<p>Input the skill name, description and the maximum score of each skill, and click submit to add the skill to the set.</p>
					<form id="add-skill" method="POST" action="">
						<div class="form-group">
							<label for="skill">Skill name</label>
							<input type="text" class="form-control" name="skill" id="skill" placeholder="Skill" required/>
						</div>
						<div class="form-group">
							<label for="skill-desc">Skill description</label>
							<input type="text" class="form-control" name="skill-desc" id="skill-desc" placeholder="Description"/>
						</div>
						<div class="form-group">
							<label for="skill-max-score">Maximum skill score</label>
							<input type="number" step="any" class="form-control" name="skill-max-score" id="skill-max-score" placeholder="Max score" required/>
						</div>
						<button id="submit-skill" type="submit" name="submit" class="btn btn-primary">Add skill</button>
					</form>
				</div>
				<div class="col-md-6">
					<h3>Skill set</h3>
					<p>Delete any skill as required. When done, you can either enter the scores or save the skill set for later use.</p>
					<ul class="list-group panel" id="skillset-list">
						<li class="list-group-item emotional-self-awareness" id="emotional-self-awareness">
							<h4>Emotional Self Awareness</h4>
							<div class="pull-left">
								<p class="skill-desc">Description of this skill for better understanding.</p>
								<p>Max score: 10</p>
							</div>
							<div class="pull-right">
								<button class="btn btn-danger skill-del" data="emotional-self-awareness">Delete skill</button>
							</div>
							<div class="clearfix"></div>
						</li>
					</ul>
					<form id="save-skill" method="POST" action="">
						<div id="hidden-group">
							<input type="hidden" name="skillset[name]" class="skillset" value="Emotional Capacity" />
							<input type="hidden" name="skillset[num]" id="field-nos" value="1" />
							<input type="hidden" class="emotional-self-awareness" name="skillset[emotional-self-awareness][name]" value="Emotional Self Awareness" />
							<input type="hidden" class="emotional-self-awareness" name="skillset[emotional-self-awareness][desc]" value="Description of this skill for better understanding."/>
							<input type="hidden" class="emotional-self-awareness" name="skillset[emotional-self-awareness][max]" value="10"/>
						</div>
						<button type="submit" id="save" class="btn btn-primary">Save skill set</button>
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