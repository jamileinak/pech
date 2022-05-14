<?php require ('header.php');
require('backend/connection.php'); ?>

<?php 
$sql = "SELECT users.username, reviews.rating, reviews.review_content as comment FROM users
INNER JOIN reviews
ON users.id = reviews.user_id";
$query = $db->query($sql);
$users = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<section class="container">
    <h1>Reviews</h1>

    <table class="table">
        <thead>
            <tr>
            <th>Name</th>
            <th>Rate</th>
            <th>Comment</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($users as $user): ?>
            <tr>
            <td><?= $user['username'] ?></td>
            <td><?= $user['rating'] ?></td>
            <td><?= $user['comment'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>


<?php require ('footer.php'); ?>