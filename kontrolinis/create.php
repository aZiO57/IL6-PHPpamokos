<?php include 'parts/header.php'; ?>
<form action="submitForm.php" method="post">
    <input type="text" name="name" placeholder="Name"><br>
    <input type="text" name="surname" placeholder="Surname"><br>
    <input type="email" name="email" placeholder="Email"><br>
    <input type="text" name="phone" placeholder="Phone 370***********"><br>
    <input type="text" name="subject" placeholder="Subject"><br>
    <textarea name="message" placeholder="Your text here..."></textarea><br>
    <select name="category">
        <option value="About product">About product</option>
        <option value="Regarding warranty">Regarding warranty</option>
        <option value="Other">Other</option>
    </select><br>

    <input type="submit" value="Submit form" name="create">
</form>
<?php include 'parts/footer.php'; ?>