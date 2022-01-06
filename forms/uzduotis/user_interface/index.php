<html>
    <head><title>Mano tinklapis</title></head>
<body>
        <h2>Prisijungti</h2>
        <form>
            <input type="email" name="email" placeholder="john@email.com">
            <input type="password" name="password" placeholder="*********">
            <input type="submit" value="Prisijungti">

        </form>
            <form action="registration.php" method="post"> 
            <input type="text" name="first_name">
            <input type="text" name="last_name">
            <input type="email" name="email"><br>
            <input type="password" name="password1" placeholder="*********">
            <input type="password" name="password2" placeholder="*********">
            <input type="checkbox" name="agree_terms" id="agree_terms">
            <label for="agree_terms">Sutinku su registracijos taisyklemis.</label><br>
            <input type="submit" value="Registruotis">
        </form>
</body>
</html>

