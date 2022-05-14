<?php require ('header.php'); ?>

<section class="container">
    <h2>Registreren als nieuwe klant!</h2>
    <h6>Heb jij al een account? <a href="login.php">Click here</a> om in te login</h6>
    <form action="backend/registerController.php" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <input class="btn" type="submit" value="Registeer">
    </form>
</section>

<?php require ('footer.php'); ?>