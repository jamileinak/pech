<?php require ('header.php'); ?>

<section class="container">
    <h2>Meer informatie nodig? Contact us!</h2>

    <form action="backend/contactController.php" method="POST">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" name="subject" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea type="text" name="message" rows="6" class="form-control"></textarea>
        </div>
        <input class="btn" type="submit" value="Send">
    </form>
</section>

<?php require ('footer.php'); ?>