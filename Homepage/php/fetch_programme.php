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
            echo '<td>' . $row['programmeID'] . '</td>';
            // Output other columns similarly...
            echo '</tr>';
        }
    } else {
        echo "<tr><td colspan='8'>0 results</td></tr>";
    }
    $conn->close();
    













// Performing SQL query to fetch data from the student table with status "enable"
// $sql = "SELECT * FROM programme";
// $result = $conn->query($sql);

// Checking if there are rows returned
// if ($result->num_rows > 0) {
//     // Output data of each row
//     while ($row = $result->fetch_assoc()) {
//         echo '<tr>';
//         echo '<td>' . $row['programmeID'] . '</td>';
//         echo '<td><img src="/images/Posters/' . $row['programmePoster'] . '" alt="">' . $row['programmeName'] . '</td>';
//         echo '<td>' . $row['programmeStartDate'] . '</td>';
//         echo '<td>' . $row['programmeEndDate'] . '</td>';
//         echo '<td>' . $row['programmeTime'] . '</td>';
//         echo '<td><strong>' . $row['capacity'] . '</strong></td>';
//         echo '<td><a class="popup-btn" href="#">Details</a></td>';
//         echo '<td><a class="popup-btn" href="#">Details</a></td>';
//         echo '</tr>';
        // echo "<tr>";
        // echo "<td>" . $row["ID"] . "</td>";
        // echo "<td>" . $row["fullName"] . "</td>";
        // echo "<td>" . $row["email"] . "</td>";
        // echo "<td>" . $row["phoneNumber"] . "</td>";
        // echo "<td>" . $row["programCode"] . "</td>";
        // echo "<td>" . $row["semester"] . "</td>";
        // echo "<td>" . $row["college"] . "</td>";
        // echo "<td>" . $row["roomNumber"] . "</td>";
        // echo "<td>
        //         <button onclick='openEditPopup(" . $row["ID"] . ", \"roomNumber\")'>Edit Room</button>
        //         <button onclick='openEditPopup(" . $row["ID"] . ", \"college\")'>Edit College</button>
        //         <button onclick='confirmDelete(" . $row["ID"] . ")'>Delete</button>
        //       </td>";
        // echo "</tr>";
//     }
// } else {
//     echo "0 results";
// }


// Database connection and data retrieval
//$servername = "localhost";
//$username = "your_username";
// $password = "your_password";
// $dbname = "cosaportal";

// $conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// $sql = "SELECT * FROM programme"; // Replace 'programme' with your table name
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         echo '<tr>';
//         echo '<td>' . $row['programmeID'] . '</td>';
//         echo '<td><img src="/images/Posters/' . $row['programmePoster'] . '" alt="">' . $row['programmeName'] . '</td>';
//         echo '<td>' . $row['programmeStartDate'] . '</td>';
//         echo '<td>' . $row['programmeEndDate'] . '</td>';
//         echo '<td>' . $row['programmeTime'] . '</td>';
//         echo '<td><strong>' . $row['capacity'] . '</strong></td>';
//         echo '<td><a class="popup-btn" href="#">Details</a></td>';
//         echo '<td><a class="popup-btn" href="#">Details</a></td>';
//         echo '</tr>';
//     }
// } else {
//     echo "0 results";
// }
// $conn->close();
?> 
