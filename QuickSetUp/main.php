<?php
$servername = "localhost";
$username = "QuickSetUp";
$password = "qui20210101!";
$dbname = "quicksetup";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>

<div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
    <center><h1 class="display-4">Quick Set Up</h1>
    <br>
    <!--<p class="lead my-3">뭐 적어놓을 지 몰라서 그냥 공백</p>-->
        <form class="d-flex" method="get" action="">
            <input type="text" name="search" class="form-control me-2" autofocus>
            <button class="btn btn-outline-success" type="submit">🔎</button>
        </form>
    </center>
</div>

<?php
if(empty($_REQUEST["search"])) {
    $sql = "SELECT * FROM program_info WHERE verification='1' ORDER BY download_count DESC";
}
else {
    $search=$_REQUEST["search"];
    $sql = "SELECT * FROM program_info WHERE verification='1' AND name_eng LIKE '%$search%' OR name_kor LIKE '%$search%' ORDER BY download_count DESC";
}
?>

<?php
    $count = 0;
    $result = $conn->query($sql);
    echo '<div class="row mb-2">';
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $download_count = $sql[$count+1];
            echo '  <div class="col-md-3">';
            echo '      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative" onclick="download_count_up(\''. $row["name_eng"].'\', \''. $row["download_link"]. '\')" onmouseover="document.getElementById('.($count+1).').style.opacity='.(0.5).'" onmouseout="document.getElementById('.($count+1).').style.opacity='.(1.0).'">';
            echo '          <div class="col-auto d-none d-lg-block">';
            echo '              <img id="'.($count+1).'" class="i" src="../image/' . $row["image_link"] . '" width="150" height="200">';
            echo '              <svg class="bd-placeholder-img" width="150" height="200" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder:Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>';
            echo '          </div>';
            echo '          <div class="col p-3 d-flex flex-column position-static">';
            echo '              <strong class="d-inline-block mb-3 text-primary">'.$row["program_tag"].'</strong>';
            echo '              <h5 class="mb-0">'. $row["name_kor"] .'</h5>';
            echo '              <br>';
            echo '              <a href="' . $row["download_link"] . '"target="_blank" class="stretched-link">'. $row["name_eng"] .'</a>';
            echo '          </div>';
            echo '      </div>';
            echo '  </div>';
            $count++;
            
            if($count%4==0) {
                echo '</div>';
                echo '<div class="row mb-2">';
            }
        }
    } else { echo "0 results"; }
    echo '</div>';
    $conn->close();
?>

<form name="clicked_program">
    <input type="hidden" name="name"/>
    <input type="hidden" name="download_link"/>
</form>

<script>
    function download_count_up(name_eng, download_link) {
        var f = document.clicked_program;
        f.name.value = name_eng;
        f.download_link.value = download_link;
        f.action="download_increase.php";
        f.method="post";
        f.submit();
    };
</script>