<?php include 'inc/header.php'; ?>

<?php
session_start();

// Check if user is logged in
if (isset($_SESSION['login_user']) && $_SESSION['type'] == 'member') {
    // User is logged in, display page content
?>
    <h2>Class Schedule</h2>

    <div class="class-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Class name</th>
                        <th>Duration (min)</th>
                        <th>Date</th>
                        <th>Start time</th>
                        <th>Building</th>
                        <th>Room</th>
                        <th>Instructor</th>
                        <th>Register</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = 'SELECT * FROM exerciseclass EC, exercise E, instructor I WHERE EC.exercise_number = E.exercise_number AND I.instructor_number = EC.instructor_number';
                    $result = mysqli_query($conn, $sql);
                    //$exerciseclass = mysqli_fetch_all($result, MYSQLI_ASSOC);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $class_id = $row['class_number'];
                            $available_seats = $row['max_occupancy'] - getRegisteredCount($class_id, $conn);
                    ?>
                            <tr>
                                <td><?= $row['exercise_name']; ?></td>
                                <td><?= $row['duration']; ?></td>
                                <td><?= $row['date']; ?></td>
                                <td><?= $row['start_time']; ?></td>
                                <td><?= $row['building']; ?></td>
                                <td><?= $row['room_number']; ?></td>
                                <td><?= $row['instructor_name']; ?></td>
                                <td><?= $available_seats; ?></td>
                                <td>
                                    <?php if ($available_seats > 0) { ?>
                                        <form method="post" action="register.php">
                                            <input type="hidden" name="class_id" value="<?= $class_id; ?>">
                                            <input type="submit" value="Register">
                                        </form>
                                    <?php } else { ?>
                                        No seats available
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="9"> No classes available</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

<?php
} else {
    // User is not logged in, show login and registration links
    echo "<p class='text-center'>You need to <a href='existingmember.php'>log in</a> or <a href='newmember.php'>register</a> to view this content.</p>";
}

function getRegisteredCount($classId, $conn)
{
    $sql = "SELECT COUNT(*) as count FROM registers WHERE class_number = $classId";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['count'];
}
?>

<?php include 'inc/footer.php'; ?>