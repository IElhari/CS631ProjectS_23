<?php include 'inc/header.php'; ?>

<?php
$name = $email = $address = '';
$nameErr = $emailErr = $addressErr = '';


//form submit

if (isset($_POST['submit'])) {

    $type = $_POST['type'];
    //validate name
    if (empty($_POST['name'])) {
        $nameErr = 'Name is required';
    } else {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
    //validate email
    if (empty($_POST['email'])) {
        $emailErr = 'Email is required';
    } else {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    }
    //validate address
    if (empty($_POST['address'])) {
        $addressErr = 'Address is required';
    } else {
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($nameErr) && empty($emailErr) && empty($addressErr)) {
        //Add to database

        $sql = "INSERT INTO member (M_name, email, M_address, type) VALUES ('$name', '$email', '$address', '$type')";
        if (mysqli_query($conn, $sql)) {
            //success
            $m_number = $conn->insert_id;
            header('Location: welcome.php?m_number=$m_number&name=$name');
        } else {
            echo 'Error' . mysqli_error($conn);
        }
    }
}

?>

<h2 class="text-center">Sunnah Sports Sign Up Form</h2>

<form class="lead text-center" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div class="mb-3">
        <label class="form-label" for="name">Name:</label>
        <input type="text" id="name" name="name" required>
    </div>

    <div class="mb-3">
        <label class="form-label" for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>

    <div class="mb-3">
        <label class="form-label" for="address">Address:</label>
        <textarea id="address" name="address" rows="4" required></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label" for="type">Membership Type:</label>
        <select id="type" name="type">
            <option value="Tier1">1 class per week</option>
            <option value="Tier2">2 classes per week</option>
            <option value="Tier3">3 classes per week</option>
            <option value="Tier4">4 classes per week</option>
        </select>
    </div>
    <input name="submit" type="submit" value="submit">
</form>


<?php include 'inc/footer.php'; ?>