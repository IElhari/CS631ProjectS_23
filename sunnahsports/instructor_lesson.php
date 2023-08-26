<?php include 'inc/header.php'; ?>

<?php
//Instructors to view upcoming classes they are teaching
session_start();

if (isset($_SESSION['login_user']) && $_SESSION['type'] == 'instructor') {
?>
    <h2>You class schedule</h2>

    <div class="class-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thread>
                    <tr>
                        <th>Class name</th>
                        <th>Duration (min)</th>
                        <th>Date</th>
                        <th>Start time</th>
                        <th>Building</th>
                        <th>Room</th>
                        <th>Instructor</th>
                    </tr>
                </thread>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM exerciseclass EC
                        JOIN exercise E ON EC.exercise_number = E.exercise_number
                        JOIN instructor I ON I.instructor_number = EC.instructor_number
                        WHERE I.SSN = '" . $_SESSION['SSN'] . "'";
                    $result = mysqli_query($conn, $sql);
                    //$exerciseclass = mysqli_fetch_all($result, MYSQLI_ASSOC);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $class_id = $row['class_number'];
                    ?>
                            <tr>
                                <td><?= $row['exercise_name']; ?></td>
                                <td><?= $row['duration']; ?></td>
                                <td><?= $row['date']; ?></td>
                                <td><?= $row['start_time']; ?></td>
                                <td><?= $row['building']; ?></td>
                                <td><?= $row['room_number']; ?></td>
                                <td><?= $row['instructor_name']; ?></td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="9"> You're not teaching any classes.</td>
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
    echo "<p class='text-center'>You need to <a href='instructor.php'>log in</a> to view this content.</p>";
}
?>

<?php include 'inc/footer.php'; ?>