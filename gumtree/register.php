<?php include 'parts/header.php' ?>
                <form action="submituser.php" method="post">
                    <input type="text" name="name" placeholder="Name"><br>
                    <input type="text" name="last_name" placeholder="Last Name"><br>
                    <input type="email" name="email" placeholder="emailas@email.com"><br>
                    <input type="password" name="pass1" placeholder="*********"><br>
                    <input type="password" name="pass2" placeholder="*********"><br>
                    <input type="tel" name="phone" placeholder="+370xxxxxxx"><br>
                    <select name="city">
                        <option>Vilnius</option>
                        <option>Kaunas</option>
                        <option>Klaipeda</option>
                    </select><br>
                    <input type="submit" value="create" name="CreateUser">
                </form>
<?php include 'parts/footer.php' ?>