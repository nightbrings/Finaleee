<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weekly Appointment Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        form {
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        input[type="date"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            padding: 8px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        .message {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    
    
    <div class="container">

        <h1>Appointment Report</h1>
        <div class="text-center">
        <a href="admin_dashboard.php" class="btn btn-success">Back to Dashboard</a>

</div>

        
        <form method="post">
            <label for="from_date">From:</label>
            <input type="date" id="from_date" name="from_date" required>
            <label for="to_date">To:</label>
            <input type="date" id="to_date" name="to_date" required>
            <input type="submit" name="submit" value="Generate Report">
        </form>

        <?php
        // Database connection settings
        $host = 'localhost'; 
        $dbname = 'my_db'; 
        $username = 'root'; 
        $password = ''; 

        try {
            // Create a new PDO instance
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            
            // Set PDO to throw exceptions on error
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            // Display an error message if connection fails
            echo "<div class='message'>Connection failed: " . $e->getMessage() . "</div>";
            exit();
        }

        // Function to fetch and display weekly report
        function fetchWeeklyReport($conn, $from_date, $to_date) {
            // Prepare SQL statement to fetch appointments for the given date range
            $sql = "SELECT * FROM appointments WHERE appointment_time BETWEEN ? AND ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$from_date, $to_date]);

            // Initialize report variable
            $report = '';

            // Check if there are appointments for the given date range
            if ($stmt->rowCount() > 0) {
                $report .= "<table>";
                $report .= "<tr><th>ID</th><th>Owner Name</th><th>Pet Name</th><th>Appointment Type</th><th>Appointment Time</th><th>Contact Info</th><th>Status</th></tr>";
                
                // Output data of each appointment
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $report .= "<tr><td>".$row["id"]."</td><td>".$row["owner_name"]."</td><td>".$row["pet_name"]."</td><td>".$row["appointment_type"]."</td><td>".$row["appointment_time"]."</td><td>".$row["contact_info"]."</td><td>".$row["status"]."</td></tr>";
                }
                
                $report .= "</table>";
            } else {
                $report .= "<div class='message'>No appointments scheduled for the selected date range.</div>";
            }

            return $report;
        }

        // Check if form is submitted
        if(isset($_POST['submit'])) {
            // Get selected dates from form
            $from_date = $_POST['from_date'];
            $to_date = $_POST['to_date'];

            // Ensure both dates are provided
            if(!empty($from_date) && !empty($to_date)) {
                // Fetch and display weekly report
                $weeklyReport = fetchWeeklyReport($conn, $from_date, $to_date);
            } else {
                // Show error message if dates are not provided
                $weeklyReport = "<div class='message'>Please select both 'From' and 'To' dates.</div>";
            }
        } else {
            // By default, show report for current week
            $from_date = date("Y-m-d");
            $to_date = date("Y-m-d");

            // Fetch and display weekly report for current week
            $weeklyReport = fetchWeeklyReport($conn, $from_date, $to_date);
        }

        // Close database connection
        $conn = null;
        ?>

        <?php echo $weeklyReport; ?>
    </div>
</body>
</html>
