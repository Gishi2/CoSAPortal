<?php
    session_start();

    if (isset($_GET['id'])) {
        $bookId = $_GET['id'];
    }

    if (isset($_POST['submit'])) {
        $file = $_FILES['file'];
        $title = $_POST['title'];
        $subject = $_POST['subject'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $condition = isset($_POST['condition']) ? $_POST['condition'] : '';

        $newImageUploaded = !empty($_FILES['file']['name']);

        if ($newImageUploaded) {
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
                        $fileNamePath = '/Merchandise/images/' . $fileName;
                        $fileDestination = $_SERVER['DOCUMENT_ROOT'] . '/Merchandise/images/' .$fileName;
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
        } else {
            try {
                require_once "dbh.inc.php";

                $query = "SELECT url_image FROM book WHERE book_id = $bookId";
                $stmt = $pdo->prepare($query);
                $stmt->execute();

                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                $url_image = $result['url_image'];

            } catch (PDOException $e) {
                die("Query failed: " . $e->getMessage());
            }
        }
    
        try {
            require_once "dbh.inc.php";

            $query = "UPDATE book SET book_title = :title, book_subject = :subject, book_price = :price, 
            book_desc = :description, book_condition = :condition";

            if ($newImageUploaded) {
                $query .= ", url_image = :url_image";
            }

            $query .= " WHERE book_id = $bookId";

            $stmt = $pdo->prepare($query);

            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":subject", $subject);
            $stmt->bindParam(":price", $price);
            $stmt->bindParam(":description", $description);
            $stmt->bindParam(":condition", $condition);

            $stmt->execute();

            $pdo = null; $stmt = null;
            if ($_SESSION['userType'] === 'committeeMember' || $_SESSION['userType'] === 'admin') {
                header("Location: /Book/book-list.php?updatesuccessful");
            } else if ($_SESSION['userType'] === 'normalUser') {
                header("Location: /Book/book-list-user.php?updatesuccessful");
            }
            
            die();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }    
    } else {
        echo json_encode(['error' => 'Invalid request method']);
    }
?>