<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Kabupaten Sleman</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="home1.html">Home</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Peta <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="cek.html">COVID-19</a></li>
                    <li><a href="home.html">Jumlah Penduduk</a></li>
                </ul>
                <li><a href="dbase.html">Input Database Sleman</a></li>
                <li><a href="tampildbse.php">Hasil Database</a></li>
            </ul>
        </div>
    </nav>


<body>
<script>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "latihan";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT * FROM penduduk";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $lat = $row["lattitude"];
                $long = $row["longitude"];
                $info = $row["kecamatan"];
                echo "L.marker([$lat, $long]).addTo(map).bindPopup('$info');";
            } 
        }
        else {
            echo "0 results";
        }
            $conn->close();
    ?>
</script>
<?php
// Sesuaikan dengan setting MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "latihan";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM penduduk";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<table border='1px'><tr>
<th>kecamatan</th>
<th>longitude</th>
<th>lattitude</th>
<th>luas</th>
<th>jumlah_penduduk</th>";

// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>".$row["kecamatan"]."</td><td>".
    $row["longitude"]."</td><td>".
    $row["lattitude"]."</td><td>".
    $row["luas"]."</td><td align='right'>".
    $row["jumlah_penduduk"]."</td></tr>";
}
echo "</table>";
} else {
echo "0 results";
}
$conn->close();
?>
</body>
