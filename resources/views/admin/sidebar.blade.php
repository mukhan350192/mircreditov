<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Menu</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        #sidebar-content {
            background-color: black;
            padding: 20px;
            height: 100vh;
            width: 200px;
        }
        #content {
            padding: 20px;
            background-color: white;
        }
    </style>
</head>
<body>
<!-- Sidebar -->
<div id="sidebar">
    <ul class="nav flex-column" id="sidebar-content">
        <li class="nav-item">
            <a class="nav-link active" href="#">
                <i class="fa fa-dashboard mr-2"></i>Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa fa-user mr-2"></i>Users
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa fa-shopping-cart mr-2"></i>Products
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa fa-cogs mr-2"></i>Settings
            </a>
        </li>
    </ul>
</div>

<!-- Main Content -->
<div id="content">
    <h1>Page Title</h1>
    <p>This is the main content area.</p>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
