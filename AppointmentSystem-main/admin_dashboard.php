<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Appointment List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <style>
        table td,
        table th {
            vertical-align: middle;
            padding: 20px !important;
        }

        thead {
            background-color: black;
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Admin List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create_appointment.php">Add New Appointment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admininquries.php">Inquiries</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dailyreport.php">Appointment Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        <?php
        session_start();

        if (!isset($_SESSION['user_email'])) {
            header('Location: login.php');  // Redirect to login page if not logged in
            exit();
        }
        echo "<div class='alert alert-primary'> Hi Welcome, " . $_SESSION['user_email'] . "</div>";

        ?>
        <h1 class="mb-4">Appointment List</h1>
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Owner Name</th>
                            <th>Pet Name</th>
                            <th>Appointment Type</th>
                            <th>Appointment Time</th>
                            <th>Contact Info</th>
                            <th>Status</th>
                            <th>Reason for Cancellation</th> <!-- New column -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('connect.php');
                        try {
                            // Prepare the SQL statement
                            $sqlSelect = "SELECT * FROM appointments WHERE status != 'Inactive'";

                            // Execute the SQL statement
                            $result = $conn->query($sqlSelect);

                            if ($result->rowCount() > 0) {
                                // Fetch and display appointment data
                                while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $data['id']; ?></td>
                                        <td><?php echo $data['owner_name']; ?></td>
                                        <td><?php echo $data['pet_name']; ?></td>
                                        <td><?php echo $data['appointment_type']; ?></td>
                                        <td><?php echo $data['appointment_time']; ?></td>
                                        <td><?php echo $data['contact_info']; ?></td>
                                        <td><?php echo $data['status']; ?></td>
                                        <td><?php echo isset($data['cancellation_reason']) ? $data['cancellation_reason'] : ''; ?></td> <!-- Display cancellation reason -->
                                        <td>
                                            <a href="edit_appointment.php?id=<?php echo $data['id']; ?>" class="btn btn-success">Edit</a>
                                            <a href="delete_appointment.php?id=<?php echo $data['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to inactive this account?');">Inactive</a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo '<tr><td colspan="9">No active appointments found.</td></tr>';
                            }
                        } catch (PDOException $e) {
                            // Display an error message if query fails
                            echo "Query failed: " . $e->getMessage();
                        }

                        // Close the database connection (optional as PDO automatically closes the connection when the script ends)
                        $conn = null;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
