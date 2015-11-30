<?php 
foreach ($result as $chr) {
	if($chr['allowed'] == 'accepted'){
?>
		<p><a href="?page=tourpage&tourPage=tourlist">List</a>
		<a href="?page=tourpage&tourPage=tourcreate">Create</a></p>
<?php
	$tourPage = isset($_GET['tourPage'])?$_GET['tourPage']: ""; 
		switch ($tourPage) {
		case 'tourcreate':
			include('layout/tourcreate.php');	
		break;
		case 'tourlist':	
			include('layout/tourlist.php');
		break;
		default:
			include('layout/tourlist.php');
		break;
		}
	} elseif ($chr['allowed'] == 'pending') {
		echo '<p>This account is still waiting for approval</p>';
	} else {
		echo '<p>You should complete your profile before comming here</p>';
	}
}
?>