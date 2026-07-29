<?php
include('config/db_connection.php');
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Bookings - Hira Property</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 20px;">

    <a href="dashboard.php" style="display: inline-block; margin-bottom: 20px; padding: 8px 15px; background-color: #34495e; color: white; text-decoration: none; border-radius: 4px; font-weight: bold; font-size: 14px;">
        ← Back to Dashboard
    </a>

    <h2>Your Property Bookings</h2>
    <p>Welcome to your booking management page.</p>
    
    <table border="1" cellpadding="10" 
           style="border-collapse: collapse; width: 100%; margin-top: 20px;">
        <tr style="background-color: #f2f2f2;">
            <th>Booking ID</th>
            <th>Property Name</th>
            <th>Status</th>
        </tr>
        <tr>
            <td>#B001</td>
            <td>Hira Luxury Apartment 1</td>
            <td>
                <span style="color: green; font-weight: bold;">Active</span>
            </td>
        </tr>
    </table>

</body>
</html>