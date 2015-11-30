<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 

//define page title
$title = 'Members Page';

//include header template
require('layout/header.php');

$currentUser = $_SESSION['username'];

$fetchInfo = $db->prepare('Select * FROM members WHERE username = "'.$currentUser.'"');
$fetchInfo->execute();
$result = $fetchInfo->fetchAll();

?>
<div id="olifant">
        <img src="img/olifant.png" width="200px">
    </div>
    <p id="nav">
    <a href='?page=profile'>Profile</a> |
	<a href='?page=edit'>Edit</a> |
	<a href="?page=tourpage">Tour</a> |
	<?php foreach ($result as $url) {if($url['admin'] == 'Yes'){echo '<a href="?page=adminpage">Admin</a> |'; }}?>
	<a href="logout.php">Logout</a></p>
<div id="blok">
<div id="login">
		



<?php
$page = isset($_GET['page'])?$_GET['page']: ""; 

switch ($page) {
	case 'tourpage':
		include('layout/tourpage.php');
	break;
	case 'edit':
		include('layout/editpage.php');
	break;
	case 'profile':	
		include('layout/memberpage.php');
	break;
	case 'adminpage':
		include('admin.php');
	break;
	default:
		include('layout/memberpage.php');
	break;
}	
//include('views/footer.php');


?>
</div>
</div>