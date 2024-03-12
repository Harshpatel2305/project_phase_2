    <?php
    session_start();

    // Include database connection
    include("includes/db.php");
    include("includes/main_2.php");
    // Include header
    include("includes/header_2.php");

    // Check if user is logged in
    if (!isset($_SESSION['customer_email'])) {
        // Redirect user to login page or display an error message
        header("Location: login.php");
        exit(); // Stop further execution
    }

    // Fetch user details from the database
    $user_email = $_SESSION['customer_email'];

    // Prepare and execute SQL query to retrieve user details
    $sql = "SELECT * FROM customers WHERE customer_email = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $user_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch user details
        $row = $result->fetch_assoc();
        $username = $row['customer_name'];
        $email = $row['customer_email'];
        $address = $row['customer_address'];
        $city = $row['customer_city'];
        $mobile_number = $row['customer_contact'];
    } else {
        // Handle the case when no user found
        $username = "N/A";
        $email = "N/A";
        $address = "N/A";
        $city = "N/A";
        $mobile_number = "N/A";
    }

    $stmt->close();
    $con->close();
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>User Profile</title>
        <!-- Add any CSS styles here -->
        <style>
            /* CSS styles */
            /* Global styles */

    .container {
        max-width: 600px;
        margin: 0 auto;
        margin-top: 5rem;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .profile-details {
        margin-bottom: 20px;
    }

    .field {
        margin-bottom: 10px;
    }

    .field label {
        font-weight: bold;
        display: inline-block;
        width: 120px;
    }

    .field span {
        color: #888;
    }

    /* Profile details styles */
    .profile-details h2 {
        color: #333;
        margin-bottom: 20px;
    }

    .profile-details .field {
        overflow: hidden;
    }

    .profile-details .field label {
        float: left;
    }

    .profile-details .field span {
        float: right;
    }

    /* Edit button styles */
    .edit-button {
        background-color: #28a745;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .edit-button:hover {
        background-color: #218838;
    }

    /* Logout button styles */
    .logout-button {
        background-color: #dc3545;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .logout-button:hover {
        background-color: #c82333;
    }

        </style>
    </head>
    <body>
    <section class="heading">
            <h1>profile</h1>
            <p> <a href="home.html">home</a> >> profile </p>
        </section>

        <div class="container">
            <div class="profile-details">
                <h2>User Profile</h2>
                <div class="field">
                    <label>Username:</label> <?php echo $username; ?>
                </div>
                <div class="field">
                    <label>Email:</label> <?php echo $email; ?>
                </div>
                <div class="field">
                    <label>Address:</label> <?php echo $address; ?>
                </div>
                <div class="field">
                    <label>City:</label> <?php echo $city; ?>
                </div>
                <div class="field">
                    <label>Mobile Number:</label> <?php echo $mobile_number; ?>
                </div>
            </div>
        </div>
    </body>
    </html>
