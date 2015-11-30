<?php 
	foreach ($result as $info) {
		echo '<form method="post">';
		echo '<p>Tourname:<input type="text" name="tourname"></p>';		
		echo '<p>Tourlocation:<input type="text" name="tourloc"></p>';				
		echo '<p>Tourmeetup:<input type="text" name="tourmeetup"></p>';
		echo '<p>Tourtime:<input type="text" name="tourtime"></p>';
		echo '<p>Tourduration:<input type="text" name="tourdur"></p>';
		echo '<p>Tourdescription:<input type="text" name="tourdesc"></p>';
		echo '<input type="submit" name="createTour" value="Create">';
		echo '</form>';
	}
?>

<?php 
if (isset($_POST['createTour'])){
	foreach ($result as $chr) {

	$tourName = $_POST['tourname'];
	$tourLoc = $_POST['tourloc'];
	$tourMeetup = $_POST['tourmeetup'];
	$tourTime = $_POST['tourtime'];
	$tourDur = $_POST['tourdur'];
	$tourDesc = $_POST['tourdesc'];



	$stmt = $db->prepare('INSERT INTO tourlist (username,tourname,tourdesc,tourtime,tourduration,tourlocation,tourmeetup, approved) VALUES (:username, :tourname, :tourdesc, :tourtime, :tourduration, :tourlocation, :tourmeetup, :approved)');
	$stmt->execute(array(
		':username' => $currentUser,
		':tourname' => $tourName,
		':tourdesc' => $tourDesc,
		':tourtime' => $tourTime,
		':tourduration' => $tourDur,
		':tourlocation' => $tourLoc,
		':tourmeetup' => $tourMeetup,
		':approved' => 'pending'
	));
		
	header('Location: profile.php?page=tourpage&tourPage=tourlist');
}
}
?>