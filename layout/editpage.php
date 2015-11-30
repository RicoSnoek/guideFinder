<?php 
	foreach ($result as $info) {
		echo '<form method="post">';
		echo '<p>Voornaam:<input type="text" name="firstname" value="' . $info['firstname'] . '"></p>';		
		echo '<p>Achternaam:<input type="text" name="lastname" value="' . $info['lastname'] . '"></p>';				
		echo '<p>Straatnaam:<input type="text" name="streetname"   value="' . $info['streetname'] . '"></p>';
		echo '<p>Huisnummer:<input type="text" name="housenumber" value="' . $info['housenumber'] . '"></p>';
		echo '<p>Zipcode:<input type="text" name="zipcode" value="' . $info['zipcode'] . '"></p>';
		echo '<p>Geboortedag:<input type="text" name="birthdate" value="' . $info['birthdate'] . '"></p>';
		echo '<p>Talen:<input type="text" name="languages" value="' . $info['languages'] . '"></p>';
		echo '<input type="submit" name="saveProfile" value="Save">';
		echo '</form>';
	}
?>

<?php 
if (isset($_POST['saveProfile'])){
	foreach ($result as $chr) {

	$dbAllowed = $chr['allowed'];
	$chFirstname = $_POST['firstname'];
	$chLastname = $_POST['lastname'];
	$chStreetname = $_POST['streetname'];
	$chHousenumber = $_POST['housenumber'];
	$chZipcode = $_POST['zipcode'];
	$chBirthdate = $_POST['birthdate'];
	$chLanguages = $_POST['languages'];


	if(!$chFirstname == '' && !$chLastname == '' && !$chStreetname == '' && !$chHousenumber == '' && !$chZipcode == '' && !chBirthdate == '' && !chLanguages == ''){
		if($dbAllowed == "accepted"){
			$stmt = $db->prepare('UPDATE members SET firstname="'.$chFirstname.'", lastname="'.$chLastname.'", streetname="'.$chStreetname.'", housenumber="'.$chHousenumber.'", zipcode="'.$chZipcode.'", birthdate="'.$chBirthdate.'", languages="'.$chLanguages.'" WHERE username="'.$currentUser.'"');
		} else {					
			$stmt = $db->prepare('UPDATE members SET allowed="pending", firstname="'.$chFirstname.'", lastname="'.$chLastname.'", streetname="'.$chStreetname.'", housenumber="'.$chHousenumber.'", zipcode="'.$chZipcode.'", birthdate="'.$chBirthdate.'", languages="'.$chLanguages.'" WHERE username="'.$currentUser.'"');	
		}
	} else {
			$stmt = $db->prepare('UPDATE members SET firstname="'.$chFirstname.'", lastname="'.$chLastname.'", streetname="'.$chStreetname.'", housenumber="'.$chHousenumber.'", zipcode="'.$chZipcode.'", birthdate="'.$chBirthdate.'", languages="'.$chLanguages.'" WHERE username="'.$currentUser.'"');
	}

	$stmt->execute();
	header('Location: profile.php?page=edit');
}
}
?>