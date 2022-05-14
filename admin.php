<?php require ('header.php'); ?>
<?php require ('backend/adminCheck.php'); ?>
<?php require ('backend/connection.php'); ?>

<section class="container">
    <h1>Admin Dashboard</h1>
</section>

<section class="container">
   <div class="row">
   <?php

$sql = "SELECT garages.garage_name, COUNT(support_call.garage_id) AS total
FROM garages
INNER JOIN support_call
ON support_call.garage_id = garages.id
WHERE support_call.status LIKE '%afgehandeld%'
GROUP BY support_call.garage_id";

$query = $db->query($sql);
$calls = $query->fetchAll(PDO::FETCH_ASSOC);

?>
    <div class="col-md-6">
            <h4>Afgehandeld pechmeldinging!</h4>
            <table class="table">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Garage Name</th>
                    <th>Afgehandeld</th>
                    </tr>
                </thead>
                <tbody>
                
                <?php 
                $i = 0;
                foreach($calls as $call): 
                $i++;
                ?>
                    <tr>
                    <td><?= $i; ?></td>
                    <td><?= $call['garage_name'] ?></td>
                    <td><?= $call['total'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
<?php

$sql = "SELECT COUNT(support_call.status) AS total
FROM support_call";

$query = $db->query($sql);
$calls = $query->fetch(PDO::FETCH_OBJ);

$sql2 = "SELECT COUNT(support_call.status) AS procent
FROM support_call
WHERE support_call.status = 'afgehandeld'";

$query2 = $db->query($sql2);
$afgehandeld = $query2->fetch(PDO::FETCH_OBJ);
$afgehandeld2 = $afgehandeld->procent;
$calls2 = $calls->total;
$procent = $afgehandeld2 / $calls2 *100;
?>
        <div class="col-md-6">
            <h4>Afgehandeld pechmeldinging!</h4>
            <table class="table">
                <thead>
                    <tr>
                    <th>Afgehandeld</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><?= $procent ?>%</td>
                    </tr>
                </tbody>
            </table>
        </div>
<?php

$sql = "SELECT COUNT(reviews.rating) AS total_reviews, SUM(reviews.rating) AS total_rates
FROM reviews";

$query = $db->query($sql);
$reviews = $query->fetch(PDO::FETCH_OBJ);
$total_reviews = $reviews->total_reviews;
$total_rates = $reviews->total_rates;
$average = $total_rates / $total_reviews;
?>
        <div class="col-md-6">
            <h4>Average review rate!</h4>
            <table class="table">
                <thead>
                    <tr>
                    <th>Average Rate</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><?= $average ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
   </div>
</section>

<?php require ('footer.php'); ?>