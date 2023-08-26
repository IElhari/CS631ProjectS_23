<?php include 'inc/header.php'; ?>

<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['login_user'])) {
    // Redirect user to login page if not logged in
    header("Location: existingmember.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get class_id from the form submission
    if (isset($_POST['class_id'])) {
        $class_id = $_POST['class_id'];

        // Check if there are available seats for the class
        $available_seats = getAvailableSeats($class_id, $conn);

        if ($available_seats > 0) {
            // Insert registration record
            $user_id = $_SESSION['login_user']; // Assuming you store user ID in the session


            $insert_query = "INSERT INTO registers (m_number, class_number) VALUES ('$user_id', '$class_id')";

            if (mysqli_query($conn, $insert_query)) {
                // Registration successful
                header("Location: classes.php"); // Redirect back to classes page
                exit();
            } else {
                // Error occurred during registration
                echo "Registration failed. Please try again.";
            }
        } else {
            // No available seats
            echo "No available seats for this class.";
        }
    }
} else {
    // Invalid request method
    echo "Invalid request.";
}

function getAvailableSeats($class_id, $conn)
{
    $class_query = "SELECT max_occupancy FROM exerciseclass WHERE class_number = '$class_id'";
    $class_result = mysqli_query($conn, $class_query);

    if ($class_result) {
        $class_row = mysqli_fetch_assoc($class_result);
        $max_occupancy = $class_row['max_occupancy'];

        // Count the number of registered participants for the class
        $registered_count = getRegisteredCount($class_id, $conn);

        // Calculate available seats
        $available_seats = $max_occupancy - $registered_count;
        return $available_seats;
    } else {
        // Handle query error
        return 0;
    }
}




function getRegisteredCount($class_id, $conn)
{
    $sql = "SELECT COUNT(*) as count FROM registers WHERE class_number = '$class_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['count'];
}

// Close database connection if necessary
mysqli_close($conn);
