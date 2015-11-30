
			<?php 
				foreach ($result as $info) {
					echo '<p>Username: ' . $info['username'] . '</p>';
					echo '<p>Naam: ' . $info['firstname'] . ' ' . $info['lastname'] . '</p>';
					echo '<p>Adres: ' . $info['streetname'] . ' ' . $info['housenumber'] . '</p>';
					echo '<p>Zipcode: ' . $info['zipcode'] . '</p>';
					echo '<p>Geboortedag: ' . $info['birthdate'] . '</p>';
					echo '<p>Talen: ' . $info['languages'] . '</p>';
				}
			?>
		</div>
	</div>
</div>

<?php 
//include header template
require('layout/footer.php'); 
?>
