<?php require ('header.php');
require ('backend/customerCheck.php');
require ('backend/connection.php'); ?>



<section class="container">
    <h1>Welkome op je dashboard <?= $_SESSION['username'] ?> !</h1>
</section>

<?php 

$sql = "SELECT * FROM contracts WHERE user_id = :user_id";
$query = $db->prepare($sql);
$query->execute([
':user_id'      => $_SESSION['id']
]);
$contractExist = $query->rowCount();
$id = $_SESSION['id'];
if ($contractExist) { 
?>
<section class="container">
    <h2>Pech melden!</h2>
    <form action="backend/pechController.php" method="POST">
        <div class="form-group">
            <?php 
            $sql = "SELECT garages.id, garages.garage_name FROM garages";
            $query = $db->query($sql);
            $garages = $query->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <label for="type_id">Kies Garage</label>
            <select class="form-select" aria-label="Default select example" name="garage">
            <?php 
                foreach($garages as $garage): 
            ?>
            <option value="<?= $garage['id'] ?>" selected><?= $garage['garage_name'] ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="number_plate">Pech Beschrijving</label>
            <textarea name="breakdown_details" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="start_date">Pech Locatie</label>
            <input type="text" name="breakdown_location" class="form-control"> 
        </div>
        <input class="btn" type="submit" value="Pech melden">
    </form>
</section>



<?php
$sql = "SELECT users.username, contract_types.contract_type, contracts.number_plate, contracts.start_date, contracts.end_date, contracts.vervangend_vervoer 
FROM contracts
INNER JOIN users
ON contracts.user_id = users.id
INNER JOIN contract_types
ON contract_types.id = contracts.type_id
WHERE contracts.user_id = $id";

$query = $db->query($sql);
$contracts = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<section class="container">
    <h1>Your contracts!</h1>

    <table class="table">
        <thead>
            <tr>
            <th>#</th>
            <th>Username</th>
            <th>Contract type</th>
            <th>Number plate</th>
            <th>Start date</th>
            <th>End date</th>
            <th>Auto replace</th>
            </tr>
        </thead>
        <tbody>
		
        <?php 
		$i = 0;
		foreach($contracts as $contract): 
		$i++;
		?>
            <tr>
            <td><?= $i; ?></td>
            <td><?= $contract['username'] ?></td>
            <td><?= $contract['contract_type'] ?></td>
            <td><?= $contract['number_plate'] ?></td>
            <td><?= $contract['start_date'] ?></td>
            <td><?= $contract['end_date'] ?></td>
            <td><?= $contract['vervangend_vervoer'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>
<section class="container">
    <h2>Pakket aanschaffen!</h2>
    <form action="backend/buyingController.php" method="POST">
        <div class="form-group">
            <label for="type_id">Pakket</label>
            <select class="form-select" aria-label="Default select example" name="packet">
            <option value="1" selected>Basispakket</option>
            <option value="2">Middelpakket</option>
            <option value="3">Luxepakket</option>
            </select>
        </div>
        <div class="form-group">
            <label for="number_plate">Kenteken</label>
            <input type="text" name="number_plate" class="form-control">
        </div>
        <div class="form-group">
            <label for="start_date">Begin Datum</label>
            <input type="date" name="start_date" class="form-control" onchange="myDateFunction()" id="startDate">
        </div>
        <div class="form-group">
            <label for="end_date">Eind Datum</label>
            <input type="date" name="end_date" class="form-control" id="endDate" readonly>
        </div>
        <div class="form-group">
            <label for="vervangend_vervoer">Vervangend vervoer</label>
            <select class="form-select" aria-label="Default select example" name="vervangend_vervoer">
            <option value="0" selected>No</option>
            <option value="1">Yes</option>
            </select>
        </div>
        <input class="btn" type="submit" value="Koop">
    </form>
</section>
<?php 
}
else{ ?>
    <section class="packages container">
        <h5>U hebt nog geen pakket aangeschaft, kies maar een pakket!</h5>
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
	</section>
    <section class="container">
    <h2>Pakket aanschaffen!</h2>
    <form action="backend/buyingController.php" method="POST">
        <div class="form-group">
            <label for="type_id">Pakket</label>
            <select class="form-select" aria-label="Default select example" name="packet">
            <option value="1" selected>Basispakket</option>
            <option value="2">Middelpakket</option>
            <option value="3">Luxepakket</option>
            </select>
        </div>
        <div class="form-group">
            <label for="number_plate">Kenteken</label>
            <input type="text" name="number_plate" class="form-control">
        </div>
        <div class="form-group">
            <label for="start_date">Begin Datum</label>
            <input type="date" name="start_date" class="form-control" onchange="myDateFunction()" id="startDate">
        </div>
        <div class="form-group">
            <label for="end_date">Eind Datum</label>
            <input type="date" name="end_date" class="form-control" id="endDate" readonly>
        </div>
        <div class="form-group">
            <label for="vervangend_vervoer">Vervangend vervoer</label>
            <select class="form-select" aria-label="Default select example" name="vervangend_vervoer">
            <option value="0" selected>No</option>
            <option value="1">Yes</option>
            </select>
        </div>
        <input class="btn" type="submit" value="Koop">
    </form>
</section>

<?php } ?>
<script>
function myDateFunction() {
    var startDate = document.getElementById("startDate").value;
    var d = new Date(startDate);
    d.setFullYear(d.getFullYear() +1);
    document.getElementById("endDate").valueAsDate = d; 
}
</script>
<?php require ('footer.php'); ?>


    