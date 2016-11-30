<?php

	$articles = file_get_contents('data/articles.json');
	$articles_array = json_decode($articles, true); 

	$events = file_get_contents('data/events.json');
	$events_array = json_decode($events, true); 
?>

<!doctype html>
<html>
<head>
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
    <link type="text/css" rel="stylesheet" href="css/website.css">
</head>
<body>
<div class="interview-navbar">
  <nav class="navbar navbar-custom navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <a href="/" class="navbar-brand"><img src="images/interview_logo.png"></a>
        </a>
      </div>
    </div>
  </nav>
</div>

<div class="container">
    <div class="row" id="main-section">
		    <div class="col-md-8" id="articles_control">
		    	<header class="header-control" id="articles-header">
			    	<h3 class="white-text">Articles</h3>
		    	</header>
			    <?php
			    foreach($articles_array as $art_key => $art_value)
				{
					$title = $art_value["title"];
					$url = $art_value["url"];
					$date = $art_value["date"];
					$author = $art_value["author"];
					$content = $art_value["content"];
					$image = $art_value["image"];
					$category = $art_value["category"];
					if ($art_key % 2 == 0){
						?>
						<div class="row">
						<?php
					}
					?>
					<div class="col-md-6">
			    		<div class="panel-articles">
						    <div class="panel-heading"><h4><?php echo $title; ?></h4></div>
						    <div class="panel-image">
						    <a href="/"><img style="width:100%;" src=<?php echo $image; ?>></a>
						    </div>
						    <div class="panel-body"><p><?php echo $content; ?></p></div>
						</div>
			    	</div>

				<?php
				if ($art_key % 2 == 1){
						?>
						</div>
						<?php
					}
				}
		    	?>
		    </div>
		    <div class="col-md-4" id="events_control">
			    <header class="header-control">
			    	<h3>Events</h3>
		    	</header>
		    	<?php

			    foreach($events_array as $event_key => $event_value)
				{
					$event_title = $event_value["title"];
					$event_location = $event_value["location"];
					$event_date = $event_value["date"];
					$event_time = $event_value["time"];
					$event_url = $event_value["url"];
					?>
					<div class="row">
						<div class="col-md-12">
				    		<div class="panel-events">
							    <div class="panel-body">
								    <h4 class="event-text"><?php echo $event_title; ?></h4>
								    <p><span class="bold">Location: </span><?php echo $event_location; ?></p>
								    <p><span class="bold">Date: </span><?php echo $event_date; ?></p>
							    </div>
							</div>
				    	</div>
			    	</div>
				<?php
				}
		    	?>
		    	<div id="map-container"></div>
		    </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/map.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFwHkAG8ecXpHCPLqgEilWM9q917skt70&callback=initMap">
</script>
</body>
</html>