<?php
session_start();
include 'config/db_connection.php';

if(!isset($_GET['id'])){
    header("Location: properties.php");
    exit();
}

$id = $_GET['id'];
$query = "SELECT * FROM properties WHERE id='$id'";
$result = mysqli_query($conn, $query);
$property = mysqli_fetch_assoc($result);

if(!$property){
    header("Location: properties.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $property['title']; ?> - Hira Rentals</title>
    <style>
        body{
            font-family: Arial;
            background: #f5f5f5;
            margin: 0;
        }
        .navbar{
            background: #fff;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
        }
        .navbar h2{
            color: #E8622A;
            margin: 0;
        }
        .logout{
            background: #E8622A;
            color: #fff;
            padding: 8px 15px;
            border-radius: 6px;
            text-decoration: none;
        }
        .container{
            padding: 30px;
            max-width: 800px;
            margin: 0 auto;
        }
        .property-card{
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            border: 1px solid #ddd;
        }
        .property-card h1{
            color: #333;
            margin-top: 0;
        }
        .price{
            color: #E8622A;
            font-size: 28px;
            font-weight: bold;
        }
        .status-available{
            background: #d4edda;
            color: #155724;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
        }
        .status-occupied{
            background: #f8d7da;
            color: #721c24;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
        }
        .info{
            margin: 20px 0;
            line-height: 2;
        }
        .btn{
            display: inline-block;
            padding: 12px 25px;
            background: #E8622A;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            margin-right: 10px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        .btn-outline{
            background: #fff;
            color: #E8622A;
            border: 1px solid #E8622A;
        }
        .back{
            color: #E8622A;
            text-decoration: none;
            margin-bottom: 20px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h2>Hira Rentals</h2>
        <div>
            <a href="dashboard.php">Dashboard</a>
            &nbsp;&nbsp;
            <a href="logout.php" class="logout">Logout</a>
        </div>
    </div>

    <div class="container">
        <a href="properties.php" class="back">
            ← Back to Properties
        </a>

        <div class="property-card">
            <h1><?php echo $property['title']; ?></h1>

            <span class="status-<?php echo $property['status']; ?>">
                <?php echo ucfirst($property['status']); ?>
            </span>

            <div class="info">
                <p>📍 <b>Location:</b> <?php echo $property['location']; ?></p>
                <p>💰 <b>Price:</b> 
                    <span class="price">
                        PKR <?php echo number_format($property['price']); ?>/mo
                    </span>
                </p>
                <p>📅 <b>Listed On:</b> 
                    <?php echo date('d M Y', 
                        strtotime($property['created_at'])); ?>
                </p>
            </div>

            <?php if(isset($_SESSION['role']) && 
                $_SESSION['role'] == 'tenant' && 
                $property['status'] == 'available'): ?>
            <a href="bookings.php" class="btn">
                Book Now
            </a>
            <?php endif; ?>

            <a href="properties.php" class="btn btn-outline">
                Back
            </a>
        </div>
    </div>
</body>
</html>