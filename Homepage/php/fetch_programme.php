 <?php


    
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cosaportal";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to fetch data
    $sql = "SELECT * FROM programme";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['programmeId'] . '</td>'; 

            $fullPath = $row['posterPath'];
            $desiredPath = str_replace($_SERVER['DOCUMENT_ROOT'], '', $fullPath);
            echo '<td><img src="' . $desiredPath . '" alt="">' . $row['programmeName']. '</td>';    

            echo '<td>' . $row['programmeStartDate'] . '</td>'; 
            echo '<td>' . $row['programmeEndDate'] . '</td>'; 
            echo '<td>8 AM - 5 PM</td>';
            echo '<td><strong>' . $row['capacity'] . '</strong></td>';
            echo '<td><a class="popup-btn">Details</a></td>';
            echo '<td><a class="popup-btn">Details</a></td>';
            echo '<div class="popup-view">';
            echo '<div class="popup-card">';
            echo '<a><i class="fas fa-times close-btn"></i></a>';
            echo '<div class="product-img">';
            echo '<img src="' . $row['posterPath'] . '" alt="' . $row['programmeName'] . '">';
            echo '</div>';
            echo '<div class="info">';
            echo '<h2>' . $row['programmeName'] . '<br><span>' . $row['startDate'] . ' - ' . $row['endDate'] . '</span></h2>';
            echo '<p>' . $row['description'] . '</p>';
            echo '<a href="#" class="add-cart-btn">Update Details</a>';
            echo '<a class="add-wish">Cancel Update</a>';
            echo '</div></div></div>';
            echo '</tr>';
        }
    } else {
        echo "<tr><td colspan='8'>0 results</td></tr>";
    }
    $conn->close();
?> 


