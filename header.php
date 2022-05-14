<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<title>Pechhulp Zuid-Nederland</title>
</head>
<body>
<?php session_start(); ?>
	<header>
		<div class="container" id="topheader">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <a class="navbar-brand" href="http://localhost/pechhulp/">Pechhulp Zuid-Nederland</a>
			    </div>
			    <ul class="nav navbar-nav">
			      <li class="active"><a href="http://localhost/pechhulp/">Home</a></li>
            <li><a href="reviews.php">Reviews</a></li>
            <li><a href="contact.php">Contact</a></li>

                  <?php if(isset($_SESSION['id'])){

                            if($_SESSION['role_id'] == 1){
                                echo "<li><a href='admin.php'>Dashboard</a></li>";
                            }
                            elseif($_SESSION['role_id'] == 2){
                                echo "<li><a href='garage.php'>Dashboard</a></li>";
                            }
                            else{
                                echo "<li><a href='customer.php'>Dashboard</a></li>";
                            }
                            echo "<li><a href='backend/logout.php'>Uitloggen</a></li>";
                        } 
			                  else{
                            echo "<li><a href='register.php'>Registreren</a></li>";
                            echo "<li><a href='login.php'>Inloggen</a></li>";
                        } 
                  ?>
			    </ul>
			  </div>
			</nav>	
    </div>
	</header>
    
<script>
    $(document).ready(function () {
        var location = window.location.href;
        $('#topheader .navbar-nav a').each(function(){
            if(location.indexOf(this.href)>-1) {
                $( '#topheader .navbar-nav' ).find( 'li.active' )
                 .removeClass( 'active' );
               $(this).parent().addClass('active');
            }
        });
    });
</script>