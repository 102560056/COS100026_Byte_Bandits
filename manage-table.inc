<?php
include("settings.php");

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
    echo '<p class="eoi-table-header eoi-center">Suburb</p>';
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
        echo '<p>',$row['suburb'],'</p>';
        echo '<p>',$row['state_code'],'</p>';
        echo '<p>',$row['post_code'],'</p>';
        echo '<p>',$row['email_address'],'</p>';
        echo '<p>',$row['phone_num'],'</p>';
        echo '<p>',$row['other_skills'],'</p>';
        echo '<p>',$row['skills'],'</p>';

        echo '<form method="post" class="eoi-status">';
        echo '    <select name="status">';
        echo '        <option value="New"',($row['status_code'] === 'New')?'selected':'','>New</option>';
        echo '        <option value="Current"',($row['status_code'] === 'Current')?'selected':'','>Current</option>';
        echo '        <option value="Final"',($row['status_code'] === 'Final')?'selected':'','>Final</option>';
        echo '    </select>';
        echo '    <button name="status-id" type="submit" value="',$row['eoi_id'],'">Update</button>';
        echo '</form>';

        echo '<form method="post" class="eoi-center">';
        echo '  <button name="delete-record" class="eoi-delete" type="submit" value="',$row['eoi_id'],'">';
        echo '      <img src="images/trash.svg">';
        echo '  </button>';
        echo '</form> ';
    }
    echo '</section>';

    mysqli_free_result($result);

    mysqli_close($conn);
};

if(isset($_POST["delete-record"]) && !empty($_POST["delete-record"]))
{
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

        $query = "DELETE FROM ".$sql_table." WHERE eoi_id =".$_POST["delete-record"];

        $result = mysqli_query($conn, $query);
        if(!$result){
            echo '<p>Successfully deleted record: ',$result,'!</p>';
        }
        else{
            echo '<p>Failiure to delete record!</p>';
        };
    };
    mysqli_close($conn);
};

if(isset($_POST["status"]) && !empty($_POST["status"]))
{
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

        $query = "UPDATE ".$sql_table." SET status_code = \"".$_POST["status"]. "\" WHERE eoi_id = ".$_POST["status-id"];

        if(mysqli_query($conn, $query)){
            echo '<p>Successfully updated record!</p>';
            echo "<meta http-equiv='refresh' content='0'>";
        }
        else{
            echo '<p>Failiure to updated record!</p>';
        };
    };
    mysqli_close($conn);
};

if(isset($_POST["delete-all"]) && !empty($_POST["delete-all"]))
{
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
        
        $query = "DELETE FROM ".$sql_table." WHERE job_ref_id = \"".$_POST["delete-all"]."\"";

        if(mysqli_query($conn, $query)){
            echo '<p>Successfully deleted records!</p>';
            echo "<meta http-equiv='refresh' content='0'>";
        }
        else{
            echo '<p>Failiure to delete records!</p>';
        };
    };
    mysqli_close($conn);
};

?>