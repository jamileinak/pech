<?php require ('header.php'); ?>

<section class="container">
    <h2>Inloggen!</h2>
    <h6>Heb jij nog geen account? <a href="register.php">Click here</a> om een account te maken!</h6>

    <form action="backend/loginController.php" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <input class="btn" type="submit" value="Inloggen">
    </form>
</section>

<?php require ('footer.php'); ?>