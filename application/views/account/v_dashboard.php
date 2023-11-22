<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory System Dashboard</title>
    <!-- Add your CSS styles or link to external stylesheets here -->
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #007bff;
        color: #fff;
        padding: 1px;
        text-align: center;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    h3 {
        color: #007bff;
    }

    p {
        margin-bottom: 20px;
    }

    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 4px;
        background-color: #007bff;
    }

    .logout-link {
        color: #fff;
        text-decoration: none;
        font-weight: bold;
        background-color: #ff0000;
        margin-right: 20px;
        margin-bottom: 10px;
        /* Red color for the background */
        padding: 8px 16px;
        /* Adjust padding as needed */
        border-radius: 3px;
        /* Add rounded corners */
        margin-left: auto;
        /* Push the link to the right */
    }

    .inventory-link {
        color: #fff;
        text-decoration: none;
        font-weight: bold;
        background-color: #28a745;
        /* Green color for the background */
        margin-left: 20px;
        margin-bottom: 10px;
        padding: 8px 16px;
        border-radius: 3px;
    }

    .inventory-link:hover {
        background-color: #218838;
        /* Darker green color on hover */
    }

    /* Add more styles as needed */
    </style>
</head>

<body>
    <header>
        <h1>Inventory System Inventory</h1>
    </header>

    <div class="navbar">
        <!-- You can add additional elements to your navbar here -->
        <!-- For now, it includes only the logout link -->
        <a href="<?php echo site_url('inventory'); ?>" class="inventory-link">Inventory</a>
        <a href="<?php echo site_url('login/logout'); ?>" class="logout-link">Logout</a>
    </div>

    <div class="container">
        <h3>Welcome to the Dashboard, <?php echo ucfirst($this->session->userdata('username')); ?>!</h3>

        <p>
            Here, you can manage your inventory, track products, and perform various tasks.
        </p>

        <!-- Add more content for the inventory system as needed -->
        <div>
            <!-- Your inventory-related content goes here -->
            <!-- For example, you can display a list of products, recent transactions, etc. -->
        </div>
    </div>

    <!-- Add your JavaScript scripts or link to external scripts here -->

</body>

</html>