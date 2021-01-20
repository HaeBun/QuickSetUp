<?php
$servername = "localhost";
$username = "QuickSetUp";
$password = "qui20210101!";
$dbname = "quicksetup";

$program_name = $_POST["name"];
$download_link = $_POST["download_link"];
$conn = new mysqli($servername, $username, $password, $dbname);
$con = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo $program_name;

$sql = "SELECT download_count FROM program_info WHERE name_eng='$program_name'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$row["download_count"] = $row["download_count"]+1;

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "UPDATE program_info SET download_count='". $row["download_count"] ."' WHERE name_eng like '$program_name'";
$result = mysqli_query($conn, $sql);

mysqli_close($con);

?>
<script>
    location.href = "index.php";
</script>