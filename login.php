<?php
//include config
require_once('includes/config.php');

//check if already logged in move to home page
if( $user->is_logged_in() ){ header('Location: profile.php'); } 

//process login form if submitted
if(isset($_POST['submit'])){

	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if($user->login($username,$password)){ 
		$_SESSION['username'] = $username;
		header('Location: profile.php');
		exit;
	
	} else {
		$error[] = 'Wrong username or password or your account has not been activated.';
	}

}//end if submit

//define page title
$title = 'Login';

//include header template
require('layout/header.php'); 
?>

<div id="olifant">
        <img src="img/olifant.png" width="400px">
    </div>
	
<div id="container">

	<div class="signup">

			<form role="form" method="post" action="" autocomplete="off">
				

				<?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}

				if(isset($_GET['action'])){
					switch ($_GET['action']) {
						case 'active':
							echo "<h2 class='bg-success'>Your account is now active you may now log in.</h2>";
							break;
						case 'reset':
							echo "<h2 class='bg-success'>Please check your inbox for a reset link.</h2>";
							break;
						case 'resetAccount':
							echo "<h2 class='bg-success'>Password changed, you may now login.</h2>";
							break;
					}
				}
				?>

				<h1>Login pagina</h1>
				<p><a href='./'>Terug naar de homepagina</a></p>
				<input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1">
				<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
				<a href='reset.php'>Wachtwoord vergeten?</a>
				<input type="submit" name="submit" value="Login" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
				<div class='whysign'>
				</div>	
			</form>
		</div>
	</div>



</div>

