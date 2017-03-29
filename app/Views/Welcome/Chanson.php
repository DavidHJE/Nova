<div class="page-header">
    <h1>{{ $title }}</h1>
</div>

<?php
	foreach($all as $c){
		echo $c->nom . " uploadé par " . $c->utilisateur->username . "<a href='#' class='listen' data-file='$c->fichier'>Listen</a>";
	}
?>


<script type="text/javascript">
	$(document).ready(function() {
		$('a.listen').on('click',function(e) {
		e.preventDefault();
		var audio = $("#player");
		var file = $(this).attr('data-file');
		console.log(file);
		audio[0].src = file;
		audio[0].play();
	});
	});
</script>
<!--<p>{{ $chansons[0]->nom }}</p>-->

<form method="post" action="creechanson" enctype="multipart/form-data">
  Nom: <input type="text" name="nom"><br>
  style :<input type="text" name="style">
  file :<input type="file" name="chanson">
  <input type="submit" value="Add">
</form>

<?php
	if ($playlists != false) {
		echo "<h4>Playlist</h4>";
		foreach($playlists as $p){
			echo "$p->nom<br />";
		}
		echo "<form action='playlist/cree' method='post'>";
		echo "<input type='text' name='playlist' placeholder='Nouvelle playlist' />";
		echo "<input type='submit' name='ok' value='ok' />";
		echo "</form>";
	}
?>