<?php
    if (isset($_POST['submit'])) {
        $file = $_FILES['file'];
        $name = $_POST['name'];
        $stock = $_POST['stock'];
        $size_S = isset($_POST['size_S']) ? 'S' : '';
        $size_M = isset($_POST['size_M']) ? 'M' : '';
        $size_L = isset($_POST['size_L']) ? 'L' : '';
        $size_XL = isset($_POST['size_XL']) ? 'XL' : '';
        $price = $_POST['price'];
        $description = $_POST['description'];

        $sizes = implode(',', array_filter([$size_S, $size_M, $size_L, $size_XL]));

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

        try {
            require_once "merchandisedb.inc.php";

            $query = "INSERT INTO merchandise (name, description, size, price, stock, image_url) VALUES
            (:name, :description, :sizes, :price, :stock, :url_image);";

            $stmt = $pdo->prepare($query);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":description", $description);
            $stmt->bindParam(":sizes", $sizes);
            $stmt->bindParam(":price", $price);
            $stmt->bindParam(":stock", $stock);
            $stmt->bindParam(":url_image", $url_image);

            $stmt->execute();

            $pdo = null; $stmt = null;

            header("Location: /Merchandise/includes/merchandise.get.inc.php?uploadsuccessful");
            die();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }    
    } else {
        echo json_encode(['error' => 'Invalid request method']);
    }
?>