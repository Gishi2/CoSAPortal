<?php
    session_start();

    if (!isset($_SESSION['matrixId'])) {
        header("Location: /Login-system/login.html");
    }

    $userId = $_SESSION['matrixId'];

    require_once '../../config/config.php';

    if (isset($_POST['submit'])) {
        $file = $_FILES['file'];
        $title = $_POST['title'];
        $subject = $_POST['subject'];
        $condition = $_POST['condition'];
        $price = $_POST['price'];
        $description = $_POST['description'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    // $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileNamePath = '/Book/images/' . $fileName;
                    $fileDestination = $_SERVER['DOCUMENT_ROOT'] . '/Book/images/' .$fileName;
                    move_uploaded_file($fileTmpName, $fileDestination);
                } else {
                    echo "Your file is too big!";
                }
            } else {
                echo "There was an error uploading your file!";
            }
        } else {
            echo "Cannot upload this type of file!";
        }

        $url_image = $fileNamePath;

        try {
            require_once "dbh.inc.php";

            $query = "INSERT INTO book (user_id , book_title, book_subject, book_desc, book_price, book_condition, url_image) VALUES
            (:userId, :title, :subject, :description, :price, :condition, :url_image);";

            $stmt = $pdo->prepare($query);

            $stmt->bindParam(":userId", $userId);
            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":subject", $subject);
            $stmt->bindParam(":description", $description);
            $stmt->bindParam(":price", $price);
            $stmt->bindParam(":condition", $condition);
            $stmt->bindParam(":url_image", $url_image);

            $stmt->execute();

            $pdo = null; $stmt = null;

            header("Location: /Book/book.php?uploadsuccessful");
            die();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }    
    } else {
        echo json_encode(['error' => 'Invalid request method']);
    }
?>