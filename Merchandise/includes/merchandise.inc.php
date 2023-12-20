<?php
    if (isset($_POST['submit'])) {
        $file = $_FILES['file'];
        $name = $_POST['name'];
        $stock = $_POST['stock'];
        $sizes = explode(',', $_POST['size']);
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
        $allowedSizes = ['S', 'M', 'L', 'XL'];

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = 'CoSAPortal/Merchandise/images/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    // header("Location: /Merchandise/merchandise.html?uploadsuccessful");
                } else {
                    echo "Your file is too big!";
                }
            } else {
                echo "There was an error uploading your file!";
            }
        } else {
            echo "Cannot upload this type of file!";
        }

        foreach ($sizes as $size) {
            if (!is_array($size, $allowedSizes)) {
                echo "Invalid size value!";
                exit();
            }
        }

        $url_image = $fileNameNew;

        try {
            require_once "merchandisedb.inc.php";

            // var_dump($name, $description, $size, $price, $stock, $url_image);

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

            header("Location: /Merchandise/merchandise.html?uploadsuccessful");
            die();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }    
    } else {
        echo json_encode(['error' => 'Invalid request method']);
    }
?>