<?php include 'menu.php';?>
<!--	LE FORMULAIRE CREE CHANSONS	 -->
<form id="formzik" enctype="multipart/form-data" method="post" action="/creechanson">
  Nom: <input type="text" name="nom" id="zikname"><br>
  Style : <input type="text" name="style">
  File : <input type="file" name="chanson">
  <input type="submit" value="Add" id="addzik">
</form>


<!-- <script type='text/javascript'>
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
</script> -->