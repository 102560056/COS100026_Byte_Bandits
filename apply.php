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
        session_start();
        include_once("header.inc"); 
        require_once ("settings.php"); // connection info
        ColorHeader('apply');

        // Create Connection, check if connection is successful, otherwise stop running the code
        $conn = @mysqli_connect($host,
        $user,
        $pwd,
        $sql_db) or die("<p>Unable to connect to the database server.</p>"
        . "<p>Error code " . mysqli_connect_errno()
        . ": " . mysqli_connect_error() . "</p>");

        $query = "SELECT table_type 
        FROM information_schema.tables 
        WHERE table_schema = '$sql_db' 
        AND table_name = 'Skills'";

        $result = mysqli_query($conn, $query);

        if ($result->num_rows === 0) { // If we don't have a skills table yet, create one
            echo "No Skills table! Creating one now...\n";

            $query = "CREATE TABLE Skills (
                skill_name VARCHAR(10) NOT NULL,
                PRIMARY KEY (skill_name)
                );";

            $result = mysqli_query($conn, $query);
            if ($result) echo "Skills table successfully created!"; else echo ("Unable to create Skills table! errnum: " . mysqli_errno($conn) . "error: " . mysqli_error($conn));

            $query = "INSERT INTO Skills (skill_name) VALUES ('PHP'), ('HTML'), ('C#'), ('Javascript'), ('CSS');";
            $result = mysqli_query($conn, $query);
            if ($result) echo "Skills table filled with deafult values!"; else echo ("Unable to enter default values! errnum: " . mysqli_errno($conn) . "error: " . mysqli_error($conn));
        }

    ?>

    <main class="apply-main">
        <form action="processEOI.php" method="post" novalidate="novalidate"> <!-- remove novalidate for final verison -->
    
            <fieldset>
                <!-- Job reference number, exactly 5 alphanumeric characters  -->
                <label for="job_refrence" class="apply-bold">Job reference number:</label>
                <select name="job_refrence" id="job_refrence" required>
                    <option value="" selected disabled>Select</option>
                    <option value="DAT40">DAT40</option>
                    <option value="SOF23">SOF23</option>
                </select>
 
            </fieldset>

            <!-- First name, max 20 alpha characters -->
            <fieldset>
                <label for="first_name" class="apply-bold">First name:</label>
                <input type="text" name="first_name" id="first_name" placeholder="First name"
                    pattern="^([a-zA-Z]|[0-9]){1,20}" maxlength="20" required>
            </fieldset>


            <!-- Last name, max 20 alpha characters -->
            <fieldset>
                <label for="last_name" class="apply-bold">Last name:</label>
                <input type="text" name="last_name" id="last_name" placeholder="Last name"
                    pattern="^([a-zA-Z]|[0-9]){1,20}" maxlength="20" required>
            </fieldset>


            <!-- Date of birth, dd/mm/yyyy  -->
            <fieldset>
                <label for="dob" class="apply-bold">Date of birth:</label>
                <input type="date" name="dob" id="dob" required>
            </fieldset>

            <!-- Gender,  radio inputs grouped  using a fieldset and legend  -->
            <fieldset class="apply-gender">
                <legend class="apply-bold">Gender:</legend>

                <table>
                    <tr>
                        <td>
                            <input type="radio" name="gender" id="male" value="male" required>
                            <label for="male">Male</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" name="gender" id="female" value="female" required>
                            <label for="female">Female</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" name="gender" id="other" value="other" required>
                            <label for="other">Other</label>
                        </td>
                    </tr>
                </table>
            </fieldset>

            <!-- Street Address,  max 40 characters -->
            <fieldset>
                <label for="street_address" class="apply-bold">Street address:</label>
                <input type="text" name="street_address" id="street_address" placeholder="Street address" maxlength="40"
                    required>
            </fieldset>

            <!-- Suburb/Town,  max 40 characters -->
            <fieldset>
                <label for="suburb" class="apply-bold">Suburb/Town:</label>
                <input type="text" name="suburb" id="suburb" placeholder="Suburb/Town" maxlength="40"
                    required>
            </fieldset>

            <!-- State,  drop down selection from 
        VIC,NSW,QLD,NT,WA,SA,TAS,ACT -->
            <fieldset>
                <label for="state" class="apply-bold">State:</label>
                <select name="state" id="state" required>
                    <option value="" selected disabled>Select</option>
                    <option value="VIC">VIC</option>
                    <option value="NSW">NSW</option>
                    <option value="QLD">QLD</option>
                    <option value="NT">NT</option>
                    <option value="WA">WA</option>
                    <option value="SA">SA</option>
                    <option value="TAS">TAS</option>
                    <option value="ACT">ACT</option>
                </select>
            </fieldset>

            <!-- Postcode, exactly 4 digits  -->
            <fieldset>
                <label for="post_code" class="apply-bold">Postcode:</label>
                <input type="number" name="post_code" id="post_code" maxlength="4" pattern="\d{4,4}" required>
            </fieldset>

            <!-- Email address, validate format  -->
            <fieldset>
                <label for="email" class="apply-bold">Email address:</label>
                <input type="email" name="email" id="email" required>
            </fieldset>

            <!-- Phone number,  8 to 12 digits, or spaces  -->
            <fieldset>
                <label for="phone" class="apply-bold">Phone number:</label>
                <input type="tel" name="phone" id="phone" pattern="^[0-9\h]{8,12}$" minlength="8" maxlength="12"
                    required>
            </fieldset>

            <!-- Skill list (The last item in list should read �Other skills...�), checkbox inputs 
        Other skills,  textarea  -->
            <fieldset class="apply-skills">
                <label class="apply-bold">Skills List</label>
                <?php
                    // Get each skills element in the Skills table from the database, and insert a checkbox option for each of them.

                    $query = "SELECT skill_name FROM Skills";

                    $result = @mysqli_query($conn, $query)
                        or die ("<p>Something wrong with database query.</p>" 
                    . "<p>Error code " . mysqli_errno($conn)
                    . ": " . mysqli_error($conn) . "</p>");

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<label class=\"apply-skill\"><input type=\"checkbox\" name=\"skill[]\" value=\"" , 
                        $row["skill_name"] , "\" id=\"" , 
                        $row["skill_name"] , "\">" , 
                        $row["skill_name"] , "</label>\n\t\t\t\t";
                    }

                    mysqli_free_result($result);
                ?>

                <label class="apply-other-label"><input type="checkbox" name="skill_other" value="other" id="other"
                        checked>Other
                    Skills</label>
                <textarea name="skills_description" id="skills_description" class="apply-other-input"
                    style="resize: none;"></textarea>
            </fieldset>

            <fieldset class="apply-full-width apply-submit">
                <input type="submit" name = "submit" value="Apply">
            </fieldset>
        </form>
    </main>

    <?php
        include_once("footer.inc");
    ?>
</body>

</html>