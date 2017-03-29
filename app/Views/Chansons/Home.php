<div class="page-header">
    <h1><?php echo $title; ?></h1>
</div>

<?php
	/*foreach($all as $c){
		echo $c->nom . " uploadé par " . $c->utilisateur->username . " <a href='#' class='listen' data-file='$c->fichier'>Listen</a><br />";
	}*/

	include 'LesChansons.php';
?>
<!--	LE FORMULAIRE CREE CHANSONS	 method="post" action="creechanson"-->
<form enctype="multipart/form-data">
  Nom: <input type="text" name="nom"><br>
  Style : <input type="text" name="style">
  File : <input type="file" name="chanson">
  <input type="submit" value="Add" id="addzik">
</form>


<script type='text/javascript'>
	/*$(document).ready(function () {
		$("#addzik").click(function() {
			alert('ok');
			$.ajax({
				type: "post", // Le type de ma requete
				url: "creechanson", // L url vers laquelle la requete sera envoyee
				data: {
		    			nom: "Gilles", // Les donnees à envoyer
		       			mdp: "aud123",        // format json
		  		}, 
				success: function(data, textStatus, jqXHR) {
					$("#aremplir").html(data);
		  		},
				error: function(jqXHR, textStatus, errorThrown) {
		    		// Une erreur sest produite lors de la requete
				}
			});
			return false;
		});
	});*/
</script>


<!--	LE FORMULAIRE CREE PlAYLISTS  action='playlist/cree' method='post' 	-->

<?php
	if ($playlists != false) {
		echo "<h4>Playlist</h4>";
		include 'Playlist.php';
		?>

	<form>
		<input type='text' name='playlist' placeholder='Nouvelle playlist' />
		<input type='submit' name='ok' value='ok' id="addplaylist"/>
	</form>

<?php
	}
?>

<script type="text/javascript">
	$(document).ready(function () {
		$("#addplaylist").click(function(e) {
			alert('ok');
			e.preventDefault();
			$.ajax({
				type: "post", // Le type de ma requete
			  	url: "playlist/cree", // L url vers laquelle la requete sera envoyee
				data: {
    				login: "Gilles", // Les donnees à envoyer
       				mdp: "aud123",        // format json
  				}, 
				success: function(data, textStatus, jqXHR) {
					$("#aremplir").html(data);
  				},
				error: function(jqXHR, textStatus, errorThrown) {
    				// Une erreur sest produite lors de la requete
				}
			});
			return false;
		});
	});
</script> 