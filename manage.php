<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Managment</title>
</head>
<body>
    <?php
        include_once "header.inc";
        ColorHeader('management');
    ?>

    <main class="manage-main">
        <p>Delete All Job Refrences</p>
        <section class="manage-search-bars">
            <form action="">
                <input type="text">
                <button type="submit">
                    <img src="images/trash.svg" alt="">
                </button>
            </form>

            <form action="">
                <input type="text">
                <button type="submit">
                    <img src="images/search.svg" alt="">
                </button>
            </form>
        </section>


        <?php
            include_once "settings.php";
            $conn = @mysqli_connect
            (
                $host, $user, $pwd, $sql_db
            );
            if(!$conn){
                echo "<p>Database Connection Failiure!</p>";
            }
            else
            {
                $sql_table = "Eois";
    
                $query = "SELECT Eois.*, GROUP_CONCAT(Eoi_Skills.skill_name) AS skills FROM Eois LEFT JOIN Eoi_Skills ON Eois.eoi_id = Eoi_Skills.eoi_id GROUP BY Eois.eoi_id;";
    
                $result = mysqli_query($conn, $query);

                // Table Header
                echo '<section class="eoi-table">';
                echo '<p class="eoi-table-header eoi-center">Job #</p>';
                echo '<p class="eoi-table-header eoi-center">First name</p>';
                echo '<p class="eoi-table-header eoi-center">Last name</p>';
                echo '<p class="eoi-table-header eoi-center">Date of Birp</p>';
                echo '<p class="eoi-table-header eoi-center">Gender</p>';
                echo '<p class="eoi-table-header eoi-center">Street Address</p>';
                echo '<p class="eoi-table-header eoi-center">State</p>';
                echo '<p class="eoi-table-header eoi-center">Post Code</p>';
                echo '<p class="eoi-table-header eoi-center">Email</p>';
                echo '<p class="eoi-table-header eoi-center">Phone Number</p>';
                echo '<p class="eoi-table-header eoi-center">Skills</p>';
                echo '<p class="eoi-table-header eoi-center">Other Skills</p>';
                echo '<p class="eoi-table-header eoi-center">Status</p>';
                echo '<p class="eoi-table-header eoi-center">Delete</p>';
            
            
                // Table Content
                while ($row = mysqli_fetch_assoc($result))
                {
                    echo '<p>',$row['job_ref_id'],'</p>';
                    echo '<p>',$row['first_name'],'</p>';
                    echo '<p>',$row['last_name'],'</p>';
                    echo '<p>',$row['dob'],'</p>';
                    echo '<p>',$row['gender'],'</p>';
                    echo '<p>',$row['street_address'],'</p>';
                    // echo '<p>'$row['suburb']'</p>';
                    echo '<p>',$row['state_code'],'</p>';
                    echo '<p>',$row['post_code'],'</p>';
                    echo '<p>',$row['email_address'],'</p>';
                    echo '<p>',$row['phone_num'],'</p>';
                    // echo '<p>'$row['job_ref_id']'</p>';
                    echo '<p>',$row['other_skills'],'</p>';
                    echo '<p>',$row['skills'],'</p>';

                    echo '<div class="eoi-status">';
                    echo '    <select name="Status" id="Status">';
                    echo '        <option value="New"',($row['status_code'] === 'New')?'selected':'','>New</option>';
                    echo '        <option value="Current"',($row['status_code'] === 'Current')?'selected':'','>Current</option>';
                    echo '        <option value="Final"',($row['status_code'] === 'Final')?'selected':'','>Final</option>';
                    echo '    </select>';
                    echo '    <button type="submit">Update</button>';
                    echo '</div>';

                    echo '<form method="post" action="" class="eoi-center">';
                    echo '  <button name="delete-record" class="eoi-delete" type="submit" value="',$row['eoi_id'],'">';
                    echo '      <img src="images/trash.svg">';
                    echo '  </button>';
                    echo '</form> ';
                }
                echo '</section>';
            
                mysqli_free_result($result);

                mysqli_close($conn);
            }
        ?>
    </main>
</body>
</html>