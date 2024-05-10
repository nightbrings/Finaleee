<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Schedule</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://png.pngtree.com/thumb_back/fh260/back_our/20190621/ourmid/pngtree-cute-orange-pet-shop-promotion-banner-image_194564.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../dashboard.php"><i class="bi bi-arrow-left-square h3"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container my-4 mt-4">
    <header class="d-flex justify-content-between my-4">
        <h1>List of Schedule</h1>
    </header>
    
    <!-- Form to accept owner's name input -->
    <form method="POST" action="">
        <div class="form-group">
            <label for="owner_name">Enter Owner Name:</label>
            <input type="text" class="form-control" id="owner_name" name="owner_name" placeholder="Owner Name">
        </div>
        <button type="submit" class="btn btn-dark" name="submit">Submit</button>
    </form>
    
    <div class="table-responsive mt-4">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Owner Name</th>
                    <th>Pet Name</th>
                    <th>Appointment Type</th>
                    <th>Appointment Time</th>
                    <th>Status</th>
                    <th>Reason for Cancellation</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('db_connection.php');
                
                // Check if the cancel button is clicked
                if(isset($_POST['cancel'])) {
                    $appointment_id = $_POST['appointment_id'];
                    $cancellation_reason = $_POST['cancellation_reason'];

                    try {
                        // Update the appointment status and store the cancellation reason
                        $sqlUpdate = "UPDATE appointments SET status = 'Canceled', cancellation_reason = :cancellation_reason WHERE id = :appointment_id";
                        $stmt = $conn->prepare($sqlUpdate);
                        $stmt->bindParam(':cancellation_reason', $cancellation_reason);
                        $stmt->bindParam(':appointment_id', $appointment_id);
                        $stmt->execute();

                        // Redirect back to the same page after cancellation
                        header("Location: {$_SERVER['PHP_SELF']}");
                        exit();
                    } catch(PDOException $e) {
                        // Display an error message if update fails
                        echo "Update failed: " . $e->getMessage();
                    }
                }
                
                // Fetch confirmed appointments
                if(isset($_POST['submit'])) {
                    $owner_name = $_POST['owner_name'];
                    try {
                        // Prepare the SQL statement
                        $sqlSelect = "SELECT * FROM appointments WHERE owner_name = :owner_name AND status = 'Confirmed'"; 

                        // Prepare the SQL statement
                        $stmt = $conn->prepare($sqlSelect);
                        $stmt->bindParam(':owner_name', $owner_name);

                        // Execute the SQL statement
                        $stmt->execute();

                        if ($stmt->rowCount() > 0) {
                            // Fetch and display appointment data
                            while($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <tr>
                                    <td><?php echo $data['id']; ?></td>
                                    <td><?php echo $data['owner_name']; ?></td>
                                    <td><?php echo $data['pet_name']; ?></td>
                                    <td><?php echo $data['appointment_type']; ?></td>
                                    <td><?php echo $data['appointment_time']; ?></td>
                                    <td><?php echo $data['status']; ?></td>
                                    <td><?php echo isset($data['cancellation_reason']) ? $data['cancellation_reason'] : ''; ?></td> <!-- Display cancellation reason -->
                                    <td>
                                        <form method="POST" action="">
                                            <input type="hidden" name="appointment_id" value="<?php echo $data['id']; ?>">
                                            <div class="form-group">
                                                <textarea class="form-control" name="cancellation_reason" placeholder="Cancellation Reason" required></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-danger" name="cancel">Cancel</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo '<tr><td colspan="8">No appointments found for this owner.</td></tr>';
                        }
                    } catch(PDOException $e) {
                        // Display an error message if query fails
                        echo "Query failed: " . $e->getMessage();
                    }
                } else {
                    echo '<tr><td colspan="8">Please enter an owner name above.</td></tr>';
                }

                // Close the database connection
                $conn = null;
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS (optional, if needed) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
