<?php include 'inc/header.php'; ?>

<?php

session_start();

if (isset($_SESSION['login_user']) && $_SESSION['type'] == 'manager') {

    //Getting class numbers
    $classname = "SELECT * FROM exercise";
    $result_class = mysqli_query($conn, $classname);
    $exerciser_number = array();
    while ($row_number = mysqli_fetch_assoc($result_class)) {
        $exerciser_number[] = $row_number;
    }

    //Getting building number & room number
    $room = "SELECT * FROM room";
    $result_building = mysqli_query($conn, $room);
    $br_number = array();
    while ($row_brnumber = mysqli_fetch_assoc($result_building)) {
        $br_number[] = $row_brnumber;
    }

    //Getting instructor number
    $instructor_number = "SELECT * FROM instructor";
    $result_instructor = mysqli_query($conn, $instructor_number);
    $i_number = array();
    while ($row_inumber = mysqli_fetch_assoc($result_instructor)) {
        $i_number[] = $row_inumber;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $e_number = ($_POST['classname']);
        $duration = ($_POST['duration']);
        $date = ($_POST['date']);
        $start_time = ($_POST['time']);
        $building = ($_POST['building']);
        $room_number = ($_POST['room_number']);
        $instructor_number = ($_POST['instructor_number']);
        $max_occupancy = ($_POST['max_occupancy']);

        $add_class = "INSERT INTO exerciseclass (exercise_number, duration, date, start_time, building, room_number, instructor_number, max_occupancy)
                        VALUES ('$e_number' , '$duration', '$date', '$start_time', '$building', '$room_number', '$instructor_number', '$max_occupancy')";
        if (mysqli_query($conn, $add_class)) {
            echo "Class successfully added";
        } else {
            echo "Error" . mysqli_error($conn);
        }
    } else {
        echo "Check your code";
    }
} ?>

<h2 class="text-center">Add a new class</h2>

<form class="text-center" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <!--Class Name -->
    <div class="mb-3">
        <label>Class Name:</label>
        <select id="classname" name="classname">
            <?php foreach ($exerciser_number as $enum) : ?>
                <option value="<?php echo $enum['exercise_number']; ?>"><?php echo $enum['exercise_name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <!--Duration -->
    <div class="mb-3">
        <label>Duration:</label>
        <input name="duration" type="number">
    </div>
    <!--Date -->
    <div class="mb-3">
        <label>Date:</label>
        <input type="date" name="date" pattern="\d{4}-\d{2}-\d{2}" placeholder="yyyy-mm-dd">
    </div>
    <!--Start Time -->
    <div class="mb-3">
        <label>Start Time:</label>
        <input type="time" name="time">
    </div>
    <!--Building -->
    <div class="mb-3">
        <label>Building:</label>
        <select id="building" name="building">
            <?php foreach ($br_number as $bnum) : ?>
                <option value="<?php echo $bnum['building']; ?>"><?php echo $bnum['building']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <!--ROOM -->
    <div class="mb-3">
        <label>Room:</label>
        <select id="room_number" name="room_number">
            <?php foreach ($br_number as $rnum) : ?>
                <option value="<?php echo $rnum['room_number']; ?>"><?php echo $rnum['room_number']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <!--Instructor -->
    <div class="mb-3">
        <label>Instructor:</label>
        <select id="instructor_number" name="instructor_number">
            <?php foreach ($i_number as $inum) : ?>
                <option value="<?php echo $inum['instructor_number']; ?>"><?php echo $inum['instructor_name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Max Occupancy -->
    <div class="mb-3">
        <label>Max Occupancy:</label>
        <input type="number" name="max_occupancy">
    </div>
    <div class="mb-3">
        <input name="submit" type="submit" value="Submit">
    </div>

</form>