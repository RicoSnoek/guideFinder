<?php 

$fetchGuideInfo = $db->prepare('Select * FROM members WHERE allowed = "pending"');
$fetchGuideInfo->execute();
$guideInfo = $fetchGuideInfo->fetchAll();

$fetchTourInfo = $db->prepare('Select * FROM tourlist WHERE approved = "pending"');
$fetchTourInfo->execute();
$tourResult = $fetchTourInfo->fetchAll();


foreach($guideInfo as $tr){
	echo '<ul id="useraccept"><form method="post">'.
		 '<li><p>'. $tr['firstname'] .' ' . $tr['lastname'] . '</p></li>'.
		 '<li><p>' . $tr['streetname'] . ' ' .  $tr['housenumber'] . '</p></li>'.
		 '<li><p>' . $tr['zipcode'] . '</p></li>'.
		 '<li><p>'. $tr['birthdate'].'</p></li>'.
		 '<li><p>'. $tr['languages'].'</p></li>'.
		 '<li><p>Username: '. $tr['username'] .'</p></li>'.
		 '<li><input class="subButtons" type="submit" name="accept'. $tr['memberID'] .'" value="Accept"></li>'.
		 '<li><input class="subButtons" type="submit" name="decline'. $tr['memberID'] .'" value="Decline"></li>'.
		 '</form></ul>';	

		 $acceptId = 'accept'.$tr['memberID'];
		 $declineId = 'decline'.$tr['memberID'];


	if (isset($_POST[$acceptId])){
		$stmt = $db->prepare('UPDATE members SET allowed="accepted"');
		$stmt->execute();
		header('Location: profile.php?page=adminpage');	

	}
	if (isset($_POST[$declineId])){
		$stmt = $db->prepare('UPDATE members SET allowed="decline"');
		$stmt->execute();
		header('Location: profile.php?page=adminpage');	

	}
}
foreach($tourResult as $ta){
	echo '<ul id="touraccept"><form method="post">'.
		 '<li><p>'. $ta['tourname'] .'</p></li>'.
		 '<li><p>' . $ta['tourtime'] . ' ' .  $ta['tourduration'] . '</p></li>'.
		 '<li><p>' . $ta['tourdesc'] . '</p></li>'.
		 '<li><p>Username: '. $ta['username'] .'</p></li>'.
		 '<li><input class="subButtons" type="submit" name="accept'. $ta['id'] .'" value="Accept"></li>'.
		 '<li><input class="subButtons" type="submit" name="decline'. $ta['id'] .'" value="Decline"></li>'.
		 '</form></ul>';	

		 $tourAcceptId = 'accept'.$ta['id'];
		 $tourDeclineId = 'decline'.$ta['id'];


	if (isset($_POST[$tourAcceptId])){
		$stmt = $db->prepare('UPDATE tourlist  SET approved="accepted" WHERE id='.$ta['id'].'');
		$stmt->execute();
		header('Location: profile.php?page=adminpage');	

	}
	if (isset($_POST[$tourDeclineId])){
		$stmt = $db->prepare('UPDATE tourlist SET approved="declined" WHERE id='.$ta['id'].'');
		$stmt->execute();
		header('Location: profile.php?page=adminpage');	

	}
}
?>