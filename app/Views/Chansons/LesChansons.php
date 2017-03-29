<?php
	foreach($all as $c){
		echo $c->nom . " uploadé par " . $c->utilisateur->username . " <a href='#' class='listen' data-file='$c->fichier'>Listen</a><br />";
	}
?>

<script type="text/javascript">
	$(document).ready(function() {
		//function pour play music
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