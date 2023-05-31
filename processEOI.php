<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EOI Applied</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
<?php
include_once("header.inc"); 
ColorHeader('apply');
?>
<main>
<?php
 // ******** TODO LIST *********
// - style/format the error/success messages returned to the user, making them more than just plaintext on the screen

// redirect back to apply page if this wasn't a legit submission
if (isset($_POST["submit"])) {
    
    function sanitise_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

        // Create Connection, check if connection is successful, otherwise stop running the code
    $conn = @mysqli_connect($host,
        $user,
        $pwd,
        $sql_db
    ) or die("<p>Unable to connect to the database server.</p>"
    . "<p>Error code " . mysqli_connect_errno()
    . ": " . mysqli_connect_error() . "</p>");

    // Upon successful connection

    // Check all data came from a form submission
    $skills_desc = "";
    $job_refrence = "";
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

    // Sanitise all inputs
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

    // ------ Input validation ------
    $errMsg = "";

    // Validate job ref number
    $valid_refs = [
        'DAT40',
        'SOF23'
    ];
        
    if ($job_refrence == "") {
        $errMsg .= "<p class='error-msg'>You must choose a job reference ID.</p>";
    } 
    else if (!in_array($job_refrence, $valid_refs)) {
        $errMsg .= "<p class='error-msg'>You must select a valid Job reference ID.</p>";
    }

    // Validate first name
    if ($first_name == "") {
        $errMsg .= "<p class='error-msg'>You must enter your first name.</p>";
    }
    else if (strlen($first_name) > 20) {
        $errMsg .= "<p class='error-msg'>First name must be at most 20 characters</p>";
    }
    else if (!preg_match("/^[a-zA-z]*$/", $first_name)) {
        $errMsg .= "<p class='error-msg'>Only alphabet letters allowed in your first name.</p>";
    }

    // Validate last name
    if ($last_name == "") {
        $errMsg .= "<p class='error-msg'>You must enter your last name.</p>";
    }
    else if (strlen($last_name) > 20) {
        $errMsg .= "<p class='error-msg'>Last name must be at most 20 characters</p>";
    }
    else if (!preg_match("/^[a-zA-z]*$/", $last_name)) {
        $errMsg .= "<p class='error-msg'>Only alphabet letters allowed in your last name.</p>";
    }

    // Validate date of birth
    if ($dob == "") {
        $errMsg .= "<p class='error-msg'>You must enter your age.</p>";
    }
    else {
        $age = date_diff(date_create($dob), date_create(date("Y-m-d")))->format('%y');
        if ($age < 15 || $age > 80) $errMsg .= "<p class='error-msg'>Age must be a number between 15 and 80.</p>";
    }

    // Validate gender
    if ($gender == "") {
        $errMsg .= "<p class='error-msg'>You must select a gender.</p>";
    }

    // Validate street_address
    if ($street_address == "") {
        $errMsg .= "<p class='error-msg'>You must enter a street address.</p>";
    }
    else if (strlen($street_address) > 40) {
        $errMsg .= "<p class='error-msg'>Address cannot be longer than 40 characters</p>";
    }

    // Validate suburb
    if ($suburb == "") {
        $errMsg .= "<p class='error-msg'>You must enter a suburb or town.</p>";
    }
    else if (strlen($suburb) > 40) {
        $errMsg .= "<p class='error-msg'>Address cannot be longer than 40 characters</p>";
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
        $errMsg .= "<p class='error-msg'>You must select a state.</p>";
    }

    // Validate post_code
    if ($post_code == "") {
        $errMsg .= "<p class='error-msg'>You must enter a postcode.</p>";
    } else {
        $postcode_regex = '';
        switch ($state) {
            case 'VIC':
                $postcode_regex = '/^3[0-9]{3}$/';
                break;
            case 'NSW':
                $postcode_regex = '/^2[0-9]{3}$/';
                break;
            case 'QLD':
                $postcode_regex = '/^4[0-9]{3}$/';
                break;
            case 'NT':
                $postcode_regex = '/^0[0-9]{3}$/';
                break;
            case 'WA':
                $postcode_regex = '/^6[0-9]{3}$/';
                break;
            case 'SA':
                $postcode_regex = '/^5[0-9]{3}$/';
                break;
            case 'TAS':
                $postcode_regex = '/^7[0-9]{3}$/';
                break;
            case 'ACT':
                $postcode_regex = '/^2[0-9]{3}$/';
                break;
            default:
                $errMsg .= "<p class='error-msg'>Invalid state selected.</p>";
                break;
        }
        if (!($postcode_regex !== '' && preg_match($postcode_regex, $post_code) == 1)) {
            $errMsg .= "<p class='error-msg'>Invalid postcode for selected state.</p>";
        }
    }

    // Validate email
    if ($email == "") {
        $errMsg .= "<p class='error-msg'>You must enter an email address.</p>";
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errMsg .= "<p class='error-msg'>You must enter a valid email address.</p>";
    }

    // Validate phone
    if ($phone == "") {
        $errMsg .= "<p class='error-msg'>You must enter a phone number.</p>";
    }
    else if (!preg_match("/^[\d| ]{8,12}$/", $phone)) {
        $errMsg .= "<p class='error-msg'>You must enter a valid phone number.</p>";
    }

    // Validate other skills
    if ($skill_other != "") {
        if ($skills_desc == "") {
            $errMsg .= "<p class='error-msg'>You selected 'other skills' and didn't write anything in the field.</p>";
        }
    }

    // Validate that the user doesn't have a job application already for this job
    $query = "SELECT eoi_id FROM Eois WHERE first_name = '$first_name' AND last_name = '$last_name' AND email_address = '$email';";
    $result = mysqli_query($conn, $query);

    if ($result->num_rows > 0) {
        $errMsg .= "<p class='error-msg'>You have already applied for this job.</p>";
    }



    // If anything didn't validate, echo the error message and don't interact with the database
    if($errMsg != ""){
        echo "<section id='enh-title'>\n";
        echo "<h1 id='job-title'>Error!</h1>\n";
        echo "<p>Something went wrong...</p>\n";
        echo "</section>\n";
        
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

        if ($result->num_rows === 0) { // If we don't have an junctinon table yet, create one
            echo "No Junction table! Creating one now...\n";

            $query = "CREATE TABLE Eoi_Skills (
                eoi_id INT UNSIGNED NOT NULL,
                skill_name VARCHAR(10) NOT NULL,
                PRIMARY KEY (eoi_id, skill_name),
                FOREIGN KEY (eoi_id) REFERENCES Eois(eoi_id) ON DELETE CASCADE,
                FOREIGN KEY(skill_name) REFERENCES Skills(skill_name) ON DELETE CASCADE
                );";

            $result = mysqli_query($conn, $query);
            if ($result) echo "Junction table successfully created!"; else echo ("Unable to create Junction table! errnum: " . mysqli_errno($conn) . "error: " . mysqli_error($conn));
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
                SET other_skills = '$skills_desc'
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

        echo "<section id='enh-title'>\n";
        echo "<h1 id='job-title'>Application Success!</h1>\n";
        echo "<p>Successfully created new EOI, your application ID is: $new_id.</p>\n";
        echo "</section>\n";

        if ($result != true || $result != false) @mysqli_free_result($result);

    }

    // close the database connection
    mysqli_close($conn);

} else {
    header ("location: apply.php");
}
?>
</main>
</body>
</html>
    