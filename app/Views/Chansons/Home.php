<div class="page-header">
    <h1><?php echo $title; ?></h1>
</div>

<div id="lesmusic">
	<?php
		include 'LesChansons.php';
	?>
</div>
<!--	LE FORMULAIRE CREE CHANSONS	 -->
<form id="formzik" enctype="multipart/form-data" method="post" action="creechanson">
  Nom: <input type="text" name="nom" id="zikname"><br>
  Style : <input type="text" name="style">
  File : <input type="file" name="chanson">
  <input type="submit" value="Add" id="addzik">
</form>


<script type='text/javascript'>
	/*$(document).ready(function () {
		$("#formzik").submit(function(e) {
			alert('ok');
			e.preventDefault();
			$.ajax({
				type: "post", // Le type de ma requete
				url: "creechanson", // L url vers laquelle la requete sera envoyee
				data: {
					nom: $('#zikname').val()
		  		}, 
				success: function(data, textStatus, jqXHR) {
					$("#lesmusic").html(data);
		  		},
				error: function(jqXHR, textStatus, errorThrown) {
		    		// Une erreur sest produite lors de la requete
				},
				cache: false,
				contentType: false,
				processData: false
			});
			return false;
		});
	});*/
</script>


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