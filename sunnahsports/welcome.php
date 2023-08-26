<?php include 'inc/header.php'; ?>
<?php

$namesql = 'SELECT * from member ORDER BY registration_date DESC LIMIT 1';
if ($resultname = mysqli_query($conn, $namesql)) {
    while ($row = mysqli_fetch_assoc($resultname)) {
        $name = $row['M_name'];
        $id = $row['M_number'];
        echo "Welcome to Sunnah Sports, $name!";
        echo "Your membership number is $id";
    }
}
?>

<a href="existingmember.php">Click here to sign in</a>

<?php include 'inc/footer.php'; ?>