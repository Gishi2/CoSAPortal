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
            echo '</div></div></div></div>';
            echo '</tr>';
        }
    } else {
        echo "<tr><td colspan='8'>0 results</td></tr>";
    }

    $conn->close();
?>




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
            ?>

            <tr>
                <td> <?php echo $row["programmeId"]; ?> </td> 
                <td> <img src="<?php 
                        // Assuming $row["posterPath"] contains the absolute path like "C:/xampp/htdocs/CoSAPortal/Homepage/php/uploads/WebDevelopmentBootCamp_Poster (12).png"
                        $posterPath = $row["posterPath"];
                        $basePath = "C:/xampp/htdocs/CoSAPortal"; // The server-specific part you want to remove

                        // Remove the server-specific part from the path
                        $relativePath = str_replace($basePath, '', $posterPath);

                        // Now $relativePath will contain something like "/Homepage/php/uploads/WebDevelopmentBootCamp_Poster (12).png"

                        echo $relativePath; 
                        ?>" class="product-img" alt="">Web Development Bootcamp</td> 
                <td> <?php echo date("d F Y", strtotime("23 June 2023")); ?> </td> 
                <td> <?php echo date("d F Y", strtotime("25 June 2023")); ?> </td> 
                <td>
                <?php echo $row["programmeTime"]; ?> 
                </td>
                <td> <strong> <?php echo $row["capacity"]; ?> </strong> </td>
                <td> <a class="popup-btn">Details</a></td>
                <td> <a class="popup-btn">Details</a></td>
                <div class="popup-view">
                    <div class="popup-card">
                        <a><i class="fas fa-times close-btn"></i></a>
                        <div class="product-img">
                            <img src="/images/Posters/WebDevelopmentBootCamp_Poster (12).png" alt="">
                        </div>
                        <div class="info"> 
                            <h2>Web Development Bootcamp<br><span><?php echo date("d - d F Y", strtotime("23 June 2023")); ?></span></h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <a href="#" class="add-cart-btn">Update Details</a>
                            <a class="add-wish">Cancel Update</a>
                        </div>
                    </div>
                </div>
            </tr>
    <?php
        }
    } else {
        echo "<div>No results found</div>";
    }
    $conn->close();
?>


