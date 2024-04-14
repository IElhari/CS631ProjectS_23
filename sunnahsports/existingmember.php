<?php
include 'inc/header.php';
//Initialize session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 

    $email = ($_POST['email']);
    $membershipnumber = ($_POST['membershipnumber']);

    $sql = "SELECT M_name FROM member WHERE email = '$email' and M_number = '$membershipnumber'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if ($count == 1) {
        //session_register("myusername");
        $_SESSION['loggedin'] = true;
        $_SESSION['login_user'] = $membershipnumber;
        $_SESSION['type'] = 'member';

        header("location: classes.php");
    } else {
        $error = "Your Login Name or Password is invalid";
    }
}

?>

<h2 class="text-center">Sunnah Sports Existing Member Form</h2>

<form class="text-center" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="membershipnumber">Membership Number:</label>
    <input type="text" id="membershipnumber" name="membershipnumber" required>

    <input name="submit" type="submit" value="Log in">
</form>

<?php include 'inc/footer.php'; ?>