<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Arial, sans-serif";
            background-color: #f1f5f9;
        }

        /* Header Styles */
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
            top: 50px;
        }

        .admin-name {
            font-size: 16px;
            color: #666;
            font: 1em sans-serif;
        }

        .logo {
            width: 100px;
            margin: 10px;
        }

        /* Main Content Styles */
        .main-content {
            margin-top: 15px; /* Adjust this value to move the content down */
            padding: 2rem 1.5rem;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        /* Card Styles */
        .card {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 10px;
            width: calc(25% - 20px); /* Adjust card width based on screen size */
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .card-icon {
            font-size: 40px;
            color: #00cc00;
        }

        .card-value {
            font-size: 24px;
            color: #333;
        }
        a{
            text-decoration:none;
        }
        /* Footer Styles */
        .footer {
            background-color: #18c718;
            color: #fff;
            text-align: center;
            padding: 20px;
            font-size: 16px;
        }

        /* Media Query for Phones */
        @media (max-width: 768px) {
            .main-content {
                margin-top: 20px; /* Adjust this value for better phone view */
            }

            .card {
                width: calc(50% - 20px); /* Adjust card width for phone view */
            }
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <div class="header">
        <img src="aniyi.jpg" alt="Admin Logo" class="logo">
        <div class="admin-name">ANIYIKAYE HOUSING REALTORS</div>
        <div class="admin-title">ADMIN DASHBOARD</div>
    </div>

    <!-- Main Content Section -->
    <div class="main-content">
        <!-- Dashboard Cards -->
     
        <div class="card">
        <a href="viewmessage.php">
            <div class="card-icon">&#128232;</div>
            <div class="card-title">Messages</div>
            <div class="card-value">10</div>
            </a>
        </div>
       

        <div class="card">
            <a href="Retrieve Market Tab.php">
            <div class="card-icon">&#x270d;</div>
            <div class="card-title">Update Market</div>
            </a>
        </div>
        <div class="card">
            <a href="Upload Market.php">
            <div class="card-icon">&#9730;</div>
            <div class="card-title">Upload Market</div>
            <div class="card-value">30</div>
            </a>
        </div>

        <div class="card">
            <a href="Market Retrieve all.php">
            <div class="card-icon">&#9863;</div>
            <div class="card-title">View Market</div>
            </a>
        </div>

        <div class="card">
            <a href="Upload Project.php">
            <div class="card-icon">&#9730;</div>
            <div class="card-title">Upload Project</div>
            <div class="card-value">32</div>
            </a>
        </div>

        <div class="card">
            <a href="Retrieve Project Tab.php">
            <div class="card-icon">&#x270d;</div>
            <div class="card-title">Update Project</div>
            </a>
        </div>

        <div class="card">
            <a href="Project Retrieve all.php">
            <div class="card-icon">&#9863;</div>
            <div class="card-title">View Project</div>
            </a>
        </div>

        <div class="card">
            <a href="logout.php">
            <div class="card-icon">&#128108;</div>
            <div class="card-title">Log Out</div>
            </a>
        </div>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        &copy; 2023 Owtab Properties Limited. All Rights Reserved.<br>
        Developed By: <a href="tel:+234 906 744 6728">AA. Tech</a>
    </div>
</body>
</html>

