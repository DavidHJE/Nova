<div class="page-header">
    <h1><?php echo $title; ?></h1>
</div>

<?php include 'menu.php';?>

<div id="lesmusic">
	<?php include 'LesChansons.php'; ?>
</div>


<!--	LE FORMULAIRE CREE PlAYLISTS	-->
<?php
	if ($playlists != false) {
		echo "<div id='playlists'> <h3>Playlist</h3>";
		include 'Playlist.php';
?>
</div>

	<form id='formpl' method='post' action='/playlist/cree'>
		<input type='text' name='playlist' id='plname' placeholder='Nouvelle playlist' />
		<input type='submit' name='ok' value='ok' id="addplaylist"/>
	</form>
<?php
	}
?>

<script type="text/javascript">
	$(document).ready(function () {
		$("#formpl").submit(function(e) {
			e.preventDefault();
			$.ajax({
				type: "post", // Le type de ma requete
			  	url: "playlist/cree", // L url vers laquelle la requete sera envoyee
				data: {
    				 playlist: $('#plname').val()      // format json
  				}, 
				success: function(data, textStatus, jqXHR) {
					$("#playlists").html(data);
  				},
				error: function(jqXHR, textStatus, errorThrown) {
    				// Une erreur sest produite lors de la requete
				}
			});
			return false;
		});
	});
</script> 