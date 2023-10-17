<?php

if (isset($_POST['submit'])) {
    try {
        // Establish a database connection
        $con = new PDO("mysql:host=localhost;dbname=aniyi_db", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Get form data
        $property = $_POST['property'];
        $price = $_POST['price'];
        $location = $_POST['location'];
        $beds = $_POST['beds'];
        $bath = $_POST['bath'];

        // Check if the images are in the allowed format and size
        $allowedImageTypes = ['image/jpeg', 'image/jpg', 'image/png'];
        $allowedFileSize = 5000000; // 5MB

        $errors = [];

        function checkImage($image, $type, $size)
        {
            global $allowedImageTypes, $allowedFileSize, $errors;
            if (!in_array($type, $allowedImageTypes)) {
                $errors[] = "Invalid image type for $image. Only JPEG, JPG, and PNG images are allowed.";
            }
            if ($size > $allowedFileSize) {
                $errors[] = "The $image size should be less than 5MB.";
            }
        }

        // Function to move uploaded file and check image
        function moveAndCheckImage($imageKey)
        {
            global $errors;
            $imageName = $_FILES[$imageKey]['name'];
            $imageSize = $_FILES[$imageKey]['size'];
            $imageType = $_FILES[$imageKey]['type'];
            $tempName = $_FILES[$imageKey]['tmp_name'];

            checkImage($imageKey, $imageType, $imageSize);

            $uploadPath = "Upload/" . $imageName;
            move_uploaded_file($tempName, $uploadPath);

            return $uploadPath;
        }

        // Get image paths
        $img1 = moveAndCheckImage('img1');
        $img2 = moveAndCheckImage('img2');
        $img3 = moveAndCheckImage('img3');

        // Check if any errors occurred during image validation
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo "<script>alert('$error');</script>";
            }
        } else {
            // Check if the file already exists in the database
            $stmt = $con->prepare("SELECT * FROM properties WHERE img1 = ? or img2 = ? or img3 = ?");
            $stmt->execute([$img1, $img2, $img3]);

            if ($stmt->rowCount() > 0) {
                echo '<script>alert("File Already Exists");</script>';
            } else {
                // Insert data into the database
                $stmt = $con->prepare("INSERT INTO properties (property_type, price, location, beds, bath, img1, img2, img3) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

                $stmt->execute([$property, $price, $location, $beds, $bath, $img1, $img2, $img3]);

                echo "<script>alert('Saved');</script>";
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Properties - ANIYIKAYE HOUSING REALTORS</title>
    <link rel="shortcut icon" href="aniyi.jpg" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #fff;
            text-align: center;
            padding: 20px 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
            bottom: 40px;
        }

        .admin-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            position: relative;
            top: 60px;
        }

        .admin-name {
            font-size: 20px;
            color: #666;
            position: relative;
            bottom: -1px;
        
        }

        .logo {
            width: 100px;
            margin: 10px;
            position: relative;
            bottom: 3px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
            position: relative;
            bottom: 20px;
        }
        
        .admin-product form {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .admin-product form h3 {
            color: #333;
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }
        
        .admin-product form p {
            font-size: 1.2rem;
            margin-top: 1rem;
            color: #666;
        }
        
        .admin-product form input[type="text"],
        .admin-product form textarea {
            width: 100%;
            padding: 1rem;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-top: 0.5rem;
            background-color: #f9f9f9;
        }
        
        .admin-product form textarea {
            resize: vertical;
            min-height: 100px;
        }
        
        .admin-product form input[type="file"] {
            display: none;
        }
        
        .admin-product form label {
            background-color: #333;
            color: white;
            padding: 0.75rem 1rem;
            cursor: pointer;
            border-radius: 4px;
            display: inline-block;
            margin-top: 0.5rem;
        }
        
        .admin-product form .btn {
            background-color: #4CAF50;
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            margin-top: 1rem;
        }
        
        .admin-product form .btn:hover {
            background-color: #45a049;
        }
        
        .footer {
            background-color: rgb(24,199,24);
            color: white;
            text-align: center;
            padding: 1rem;
            margin-top: 2rem;
        }
        .file-label {
    background-color: #333;
    color: white;
    padding: 0.75rem 1rem;
    cursor: pointer;
    border-radius: 4px;
    display: inline-block;
    margin-top: 0.5rem;
}

/* Additional styling as needed */

    </style>
</head>
<body>
  <!-- Header Section -->
  <div class="header">
        <img src="aniyi.jpg" alt="Admin Logo" class="logo">
        <div class="admin-name">ANIYIKAYE HOUSING REALTORS</div>
        <div class="admin-title">Add Properties</div>
    </div>
    <div class="container">
        <div class="admin-product">
            <form action="uploadproperties.php" method="post" enctype="multipart/form-data">
                <p>Name/Market</p>
                <input type="text" placeholder="Property" name="property" require>
                <p>Price</p>
                <input type="text" placeholder="price" name="price">
                <p>Location</p>
                <input type="text" placeholder="location" name="location">
                <p>Bedroom</p>
                <input type="text" placeholder="beds" name="beds">
                <p>Bathrooms</p>
                <input type="text" placeholder="bath" name="bath">

               
                <input type="file" name="img1" id="img1">
<label for="img1" class="file-label">Choose Image 1</label>

<input type="file" name="img2" id="img2">
<label for="img2" class="file-label">Choose Image 2</label>

<input type="file" name="img3" id="img3">
<label for="img3" class="file-label">Choose Image 3</label> <br> <br>

               

                <button type="submit" value="submit" name="submit" class="btn">Submit</button>
            </form>
        </div>
    </div>
    <footer class="footer">
        <p>© 2023 ANIYIKAYE HOUSING REALTORS. All Rights Reserved.</p>
        <p>Developed By: AA. Tech</p>
    </footer>
</body>
</html>
