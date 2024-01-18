<?php
    session_start();

    if (!isset($_SESSION['matrixId'])) {
        header("Location: /Login-system/login.html");
    }

    if (isset($_GET['id'])) {
        $merchandiseId = $_GET['id'];
    }

    if (isset($_POST['submit'])) {
        $file = $_FILES['file'];
        $name = $_POST['name'];
        $stock = $_POST['stock'];
        $size_S = isset($_POST['size_S']) ? 'S' : '';
        $size_M = isset($_POST['size_M']) ? 'M' : '';
        $size_L = isset($_POST['size_L']) ? 'L' : '';
        $size_XL = isset($_POST['size_XL']) ? 'XL' : '';
        $size_NONE = isset($_POST['size_NONE']) ? 'None' : '';
        $price = $_POST['price'];
        $description = $_POST['description'];

        $sizes = implode(',', array_filter([$size_S, $size_M, $size_L, $size_XL, $size_NONE]));

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

                $query = "SELECT image_url FROM merchandise WHERE id = $merchandiseId";
                $stmt = $pdo->prepare($query);
                $stmt->execute();

                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                $url_image = $result['image_url'];

            } catch (PDOException $e) {
                die("Query failed: " . $e->getMessage());
            }
        }
    
        try {
            require_once "dbh.inc.php";

            $query = "UPDATE merchandise SET name = :name, description = :description, size = :sizes,
                        price = :price, stock = :stock";

            if ($newImageUploaded) {
                $query .= ", image_url = :url_image";
            }

            $query .= " WHERE id = $merchandiseId";

            $stmt = $pdo->prepare($query);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":description", $description);
            $stmt->bindParam(":sizes", $sizes);
            $stmt->bindParam(":price", $price);
            $stmt->bindParam(":stock", $stock);

            $stmt->execute();

            $pdo = null; $stmt = null;
            header("Location: /Merchandise/merchandise-list.php?updatesuccessful");
            die();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }    
    } else {
        echo json_encode(['error' => 'Invalid request method']);
    }
?>