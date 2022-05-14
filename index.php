<?php require ('header.php'); 
require('backend/connection.php'); ?>

	<section class="container banner">
		<img src="img/banner.png" alt="">
	</section>
	<section class="packages container">
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Basispakket <br> <small class="text-muted">€7.00 per maand</small></th>
		      <th scope="col">Middelpakket <br> <small class="text-muted">€10.00 per maand</small></th>
		      <th scope="col">Luxepakket <br> <small class="text-muted">€15.00 per maand</small></th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <th scope="row">Auto of motor</th>
		      <td><span>&#10003;</span> </td>
		      <td><span>&#10003;</span> </td>
		      <td><span>&#10003;</span> </td>
		    </tr>
		    <tr>
		      <th scope="row">Pech in Nederland</th>
		      <td><span>&#10003;</span> </td>
		      <td><span>&#10003;</span> </td>
		      <td><span>&#10003;</span> </td>
		    </tr>
		    <tr>
		      <th scope="row">Pech in woonplaats</th>
		      <td><span>&#10060;</span></td>
		      <td><span>&#10060;</span></td>
		      <td><span>&#10003;</span> </td>
		    </tr>
		    <tr>
		      <th scope="row">Pech in buitenland</th>
		      <td><span>&#10060;</span></td>
		      <td><span>&#10003;</span> </td>
		      <td><span>&#10003;</span> </td>
		    </tr>
		    <tr>
		      <th scope="row">Noodreparatie</th>
		      <td><span>&#10003;</span> </td>
		      <td><span>&#10003;</span> </td>
		      <td><span>&#10003;</span> </td>
		    </tr>
		    <tr>
		      <th scope="row">Slepen naar garage</th>
		      <td><span>&#10003;</span> </td>
		      <td><span>&#10003;</span> </td>
		      <td><span>&#10003;</span> </td>
		    </tr>
		    <tr>
		      <th scope="row">Vervangend vervoer</th>
		      <td><span>&#10060;</span> </td>
		      <td><span>&#10003;</span> </td>
		      <td><span>&#10003;</span> </td>
		    </tr>
		  </tbody>
		</table>
		<h3><a href="register.php">Registeer jezelf om een pakket te aanschaffen!</a></h3>
		<h4>Heb jij al geregistreerd? <a href="login.php">Click here om in te loggen.</a></h4>
	</section>

<?php 
$sql = "SELECT garages.garage_name, areas.area_name FROM garages
INNER JOIN areas
ON garages.area_id = areas.id";
$query = $db->query($sql);
$garages = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<section class="container">
    <h1>Garages</h1>

    <table class="table">
        <thead>
            <tr>
            <th>Number</th>
            <th>Garage Name</th>
            <th>Garage Location</th>
            </tr>
        </thead>
        <tbody>
		
        <?php 
		$i = 0;
		foreach($garages as $garage): 
		$i++;
		?>
            <tr>
            <td><?= $i; ?></td>
            <td><?= $garage['garage_name'] ?></td>
            <td><?= $garage['area_name'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>

<?php require ('footer.php'); ?>