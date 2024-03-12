<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Left Sidebar</title>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600&display=swap");

* {
    font-family: "Poppins", sans-serif !important;
    margin: 0 !important;
    padding: 0 !important;
    box-sizing: border-box !important;
    text-decoration: none !important;
    outline: none !important;
    border: none !important;
    text-transform: capitalize !important;
    transition: all 0.2s linear !important;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f8f8f8;
}

.sidebar {
    width: 300px;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

.sidebar img {
    display: block;
    margin: auto;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-bottom: 20px;
}

.sidebar a {
    display: block;
    padding: 10px 0;
    font-size: 18px;
    color: #333;
    transition: 0.3s;
}

.sidebar a:hover {
    color: crimson;
}

.sidebar hr {
    border: 0.5px solid #eee;
    margin: 10px 0;
}

.sidebar .logout-btn {
    background-color: crimson;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s;
}

.sidebar .logout-btn:hover {
    background-color: #ff6b6b;
}

/* Additional styles for better layout */
.wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f8f8f8;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

</style>
</head>
<body>

<div class="sidebar">
    <img src="your_image_url_here.jpg" alt="Profile Picture">
    <a href="#">My Orders</a>
    <a href="#">Edit Account</a>
    <a href="#">Change Password</a>
    <a href="#">Delete Account</a>
    <a href="#">Logout</a>
</div>

</body>
</html>
