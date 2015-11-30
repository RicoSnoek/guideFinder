<?php 

$fetchTourInfo = $db->prepare('Select * FROM tourlist WHERE username = "'.$currentUser.'"');
$fetchTourInfo->execute();
$tourResult = $fetchTourInfo->fetchAll();


foreach($tourResult as $tr){
	echo '<ul id="tourlist">'.
		 '<li><p>'. $tr['tourname'] .' - ' . $tr['tourlocation'] . '</p></li>'.
		 '<li><p>' . $tr['tourdesc'] . '</p></li>'.
		 '<li><p>Created by: '. $tr['username'] .' | Meetup place: ' . $tr['tourmeetup'] . ' | Approval: '.$tr['approved'].'</p></li>'.
		 '</ul><br>';	

}

?>