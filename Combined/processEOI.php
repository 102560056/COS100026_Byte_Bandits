<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
<?php
    include_once("header.inc"); 
    require_once ("settings.php"); // connection info

    function sanitise_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $conn = @mysqli_connect($host,
        $user,
        $pwd,
        $sql_db
    );
    // Checks if connection is successful
    if (!$conn) {
        echo "<p>Database connection failure</p>"; // Displays an error message
    } else {


        // Upon successful connection
    
        $skills_desc = "";
        if (isset ($_POST["job_refrence"])) $job_refrence = $_POST["job_refrence"];
        if (isset ($_POST["first_name"])) $first_name = $_POST["first_name"];
        if (isset ($_POST["last_name"])) $last_name = $_POST["last_name"];
        if (isset ($_POST["dob"])) $dob = $_POST["dob"];

        if (isset ($_POST["gender"])) $gender = $_POST["gender"];
        else $gender = "";

        if (isset ($_POST["street_address"])) $street_address = $_POST["street_address"];
        if (isset ($_POST["suburb"])) $suburb = $_POST["suburb"];

        if (isset ($_POST["state"])) $state = $_POST["state"];
        else $state = "";

        if (isset ($_POST["post_code"])) $post_code = $_POST["post_code"];
        if (isset ($_POST["email"])) $email = $_POST["email"];
        if (isset ($_POST["phone"])) $phone = $_POST["phone"];

        if (isset ($_POST["skill"])) $skills = $_POST["skill"];
        else $skills = [];
        
        if (isset ($_POST["skill_other"])) {
            $skill_other = $_POST["skill_other"];
            if (isset ($_POST["skills_description"])) $skills_desc = $_POST["skills_description"];
            else $skills_desc = "";
        }
        else $skill_other = "";

        $job_refrence = sanitise_input($job_refrence);
        $first_name = sanitise_input($first_name);
        $last_name = sanitise_input($last_name);
        $dob = sanitise_input($dob);
        $gender = sanitise_input($gender);
        $street_address = sanitise_input($street_address);
        $suburb = sanitise_input($suburb);
        $state = sanitise_input($state);
        $post_code = sanitise_input($post_code);
        $email = sanitise_input($email);
        $phone = sanitise_input($phone);

        foreach ($skills as $skill) {
            $skill = sanitise_input($skill);
        }



        // Input validation
        $errMsg = "";

        // Validate job ref number
        if ($job_refrence == "") {
            $errMsg .= "<p>You must enter a job reference number.</p>";
        }
        else if (strlen($job_refrence) != 5) {
            $errMsg .= "<p>First name must be 5 characters</p>";
        }

        // Validate first name
        if ($first_name == "") {
            $errMsg .= "<p>You must enter your first name.</p>";
        }
        else if (strlen($first_name) > 20) {
            $errMsg .= "<p>First name must be at most 20 characters</p>";
        }
        else if (!preg_match("/^[a-zA-z]*$/", $first_name)) {
            $errMsg .= "<p>Only alphabet letters allowed in your first name.</p>";
        }

        // Validate last name
        if ($last_name == "") {
            $errMsg .= "<p>You must enter your last name.</p>";
        }
        else if (strlen($last_name) > 20) {
            $errMsg .= "<p>Last name must be at most 20 characters</p>";
        }
        else if (!preg_match("/^[a-zA-z]*$/", $last_name)) {
            $errMsg .= "<p>Only alphabet letters allowed in your last name.</p>";
        }

        // Validate date of birth
        if ($dob == "") {
            $errMsg .= "<p>You must enter your age.</p>";
        }
        else {
            $age = date_diff(date_create($dob), date_create(date("Y-m-d")))->format('%y');
            if ($age < 15 || $age > 80) $errMsg .= "<p>Age must be a nuumber between 10 and 10,000.</p>";
        }

        // Validate gender
        if ($gender == "") {
            $errMsg .= "<p>You must select a gender.</p>";
        }

        // Validate street_address
        if ($street_address == "") {
            $errMsg .= "<p>You must enter a street address.</p>";
        }
        else if (strlen($street_address) > 40) {
            $errMsg .= "<p>Address cannot be longer than 40 characters</p>";
        }

        // Validate suburb
        if ($suburb == "") {
            $errMsg .= "<p>You must enter a suburb or town.</p>";
        }
        else if (strlen($suburb) > 40) {
            $errMsg .= "<p>Address cannot be longer than 40 characters</p>";
        }

        // Validate State
        $valid_states = [
            'VIC',
            'NSW',
            'QLD',
            'NT',
            'WA',
            'SA',
            'TAS',
            'ACT'
        ];

        if (!in_array($state, $valid_states)) {
            $errMsg .= "<p>You must select a state.</p>";
        }

        // Validate post_code
        if ($post_code == "") {
            $errMsg .= "<p>You must enter a postcode.</p>";
        }
        else if (strlen($post_code) != 4) {
            $errMsg .= "<p>Post code must be four digits</p>";
        }
        // MATCH POSTCODE TO STATE VALIDATION HERE


        // Validate email
        if ($email == "") {
            $errMsg .= "<p>You must enter an email address.</p>";
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errMsg .= "<p>You must enter a valid email address.</p>";
        }

        // Validate phone
        if ($phone == "") {
            $errMsg .= "<p>You must enter a phone number.</p>";
        }
        else if (!preg_match("/^[\d| ]{8,12}$/", $phone)) {
            $errMsg .= "<p>You must enter a valid phone number.</p>";
        }

        // Validate other skills
        if ($skill_other != "") {
            if ($skills_desc == "") {
                $errMsg .= "<p>You selected 'other skills' and didn't write anything in the field.</p>";
            }
        }

        // If anything didn't validate, echo the error message
        if($errMsg != ""){
            echo $errMsg;
        }
        else { // everything valid!

            // Check if EOI table exists
            $query = "SELECT table_type 
                FROM information_schema.tables 
                WHERE table_schema = '$sql_db' 
                AND table_name = 'Eois'";
    
            $result = mysqli_query($conn, $query);

            if ($result->num_rows === 0) { // If we don't have an EOIs table yet, create one
                echo "No EOIS table! Creating one now...\n";

                $query = "CREATE TABLE Eois (
                    eoi_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
                    job_ref_id CHAR(5) NOT NULL,
                    first_name VARCHAR(20) NOT NULL,
                    last_name VARCHAR(20) NOT NULL,
                    dob DATE NOT NULL,
                    gender ENUM('Female', 'Male', 'Other') NOT NULL,
                    street_address VARCHAR(40) NOT NULL,
                    suburb VARCHAR(40) NOT NULL,
                    state_code ENUM('VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT') NOT NULL,
                    post_code CHAR(4) NOT NULL,
                    email_address VARCHAR(30) NOT NULL,
                    phone_num VARCHAR(12) NOT NULL,
                    other_skills TEXT,
                    status_code ENUM('New', 'Current', 'Final') NOT NULL,
                    PRIMARY KEY(eoi_id)
                    );";

                $result = mysqli_query($conn, $query);
                if ($result) echo "EOI table successfully created!"; else echo "Unable to create EOI table!";
            }

            $query = "SELECT table_type 
            FROM information_schema.tables 
            WHERE table_schema = '$sql_db' 
            AND table_name = 'Eoi_Skills'";

            $result = mysqli_query($conn, $query);

            if ($result->num_rows === 0) { // If we don't have an EOIs table yet, create one
                echo "No Junction table! Creating one now...\n";

                $query = "CREATE TABLE Eoi_Skills (
                    eoi_id INT UNSIGNED NOT NULL,
                    skill_name VARCHAR(10) NOT NULL,
                    PRIMARY KEY (eoi_id, skill_name),
                    FOREIGN KEY (eoi_id) REFERENCES Eois(eoi_id) ON DELETE CASCADE,
                    FOREIGN KEY(skill_name) REFERENCES Skills(skill_name) ON DELETE CASCADE
                    );";

                $result = mysqli_query($conn, $query);
                if ($result) echo "Junction table successfully created!"; else echo "Unable to create Junction table!";
            }

            // Add new record into the EOI table
            $query = "INSERT INTO Eois (
                job_ref_id, 
                first_name, 
                last_name, 
                dob, 
                gender, 
                street_address,
                suburb, 
                state_code, 
                post_code, 
                email_address, 
                phone_num, 
                status_code
                ) 
                VALUES (
                '$job_refrence', 
                '$first_name', 
                '$last_name', 
                '$dob', 
                '$gender', 
                '$street_address', 
                '$suburb',
                '$state', 
                '$post_code', 
                '$email', 
                '$phone', 
                'New'
                );";

              mysqli_query($conn, $query);

            $new_id = mysqli_insert_id($conn);

            // Add other skills if applicable
            if ($skill_other != "") {
                $query = "UPDATE Eois
                    SET other_skills = '$skill_other' 
                    WHERE eoi_id = $new_id;";

                    mysqli_query($conn, $query);
            }
            
            // Add new records into the junction table
            if (count($skills) != 0) {
                foreach ($skills as $skill) {
                    $query = "INSERT INTO Eoi_Skills (
                        eoi_id,
                        skill_name
                        )
                        VALUES (
                        $new_id,
                        '$skill'
                        );";

                    mysqli_query($conn, $query);
                }
            }

            if ($result != 1 || $result != 0) mysqli_free_result($result);

        }

        // close the database connection
        mysqli_close($conn);
    } // if successful database connection
?>
</body>
</html>
    