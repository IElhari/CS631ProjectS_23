<?php include 'inc/header.php';

//Initialize session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 

    $email = ($_POST['email']);
    $SSN = ($_POST['SSN']);

    $sql = "SELECT * FROM employee E WHERE E.SSN = '$SSN' AND E.email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);


    // If result matched $myusername and $mypassword, table row must be 1 row

    if ($count == 1 && $row['position'] == 'manager') {
        //session_register("myusername");
        $_SESSION['loggedin'] = true;
        $_SESSION['login_user'] = $email;
        $_SESSION['SSN'] = $SSN;
        $_SESSION['type'] = 'manager';

        header("location: manager_page.php");
    } else {
        $error = "Your Login Name or Password is invalid";
    }
} ?>

<h2 class="text-center">Sunnah Sports Manager Log In</h2>

<form class="text-center" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="SSN">SSN:</label>
    <input type="SSN" id="SSN" name="SSN" required>

    <input name="submit" type="submit" value="Submit">
</form>

<?php include 'inc/footer.php'; ?>