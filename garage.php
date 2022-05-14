<?php require ('header.php'); ?>
<?php require ('backend/garageCheck.php'); ?>
<?php require ('backend/connection.php'); ?>

<section class="container">
    <h1><?= $_SESSION['username'] ?></h1>
</section>
<?php 
$id = $_SESSION['id'];

$sql = "SELECT support_call.id AS support_call_id, support_call.breakdown_details, support_call.breakdown_location, support_call.status, users.username, contract_types.contract_type, contracts.vervangend_vervoer, garages.garage_name
FROM support_call
INNER JOIN contracts
ON contracts.user_id = support_call.user_id
INNER JOIN contract_types
ON contract_types.id = contracts.type_id
INNER JOIN users
ON users.id = support_call.user_id
INNER JOIN garages
ON garages.id = support_call.garage_id
WHERE garages.user_id = $id";

$query = $db->query($sql);
$pechmeldingen = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<section class="container">
    <h1>Pech meldingen!</h1>

    <table class="table">
        <thead>
            <tr>
            <th>#</th>
            <th>Gebruiker</th>
            <th>Pech Locatie</th>
            <th>Pech Beschrijving</th>
            <th>Contract</th>
            <th>Vervangend vervoer</th>
            <th>Pech status</th>
            </tr>
        </thead>
        <tbody>
		
        <?php 
		$i = 0;
		foreach($pechmeldingen as $pechmelding): 
		$i++;
        if($pechmelding['vervangend_vervoer']){
            $vervoer = 'Yes';
        }
        else{
            $vervoer = 'No';
        }
		?>
            <tr>
            <td><?= $i; ?></td>
            <td><?= $pechmelding['username'] ?></td>
            <td><?= $pechmelding['breakdown_location'] ?></td>
            <td><?= $pechmelding['breakdown_details'] ?></td>
            <td><?= $pechmelding['contract_type'] ?></td>
            <td><?= $vervoer ?></td>
            <td>
            <form action="backend/statusController.php" method="POST">
            <select class="form-select" aria-label="Default select example" name="status">
                <option value="niet in behandeling" <?php if($pechmelding['status'] == 'niet in behandeling'){echo 'selected';} ?> >niet in behandeling</option>
                <option value="onderweg" <?php if($pechmelding['status'] == 'onderweg'){echo 'selected';} ?> >onderweg</option>
                <option value="afgehandeld" <?php if($pechmelding['status'] == 'afgehandeld'){echo 'selected';} ?> >afgehandeld</option>
                <input type="hidden" name="support_call_id" value="<?= $pechmelding['support_call_id'] ?>">
                <input type="submit" name="update" value="Update">
            </select>
            </form>
            </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>

<?php require ('footer.php'); ?>