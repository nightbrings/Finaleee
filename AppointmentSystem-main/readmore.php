<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="/assets/petshop.png">
  <title>Grooming Appointments</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f2f2f2;
      font-family: Arial, sans-serif;
      padding: 50px;
    }
    .container {
      background-color: #ffffff;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .modal-content {
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-center mb-4">Grooming Appointments</h1>
    <p class="lead text-center mb-4">Schedule grooming sessions for pets, including baths, haircuts, nail trims, and ear cleaning.</p>
    <!-- Button trigger modal -->
    <div class="d-grid gap-2 col-6 mx-auto">
      <button type="button" class="btn btn-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#groomingModal">
        Read More
    </div>
    <div class="container mt-5">
  <div class="d-grid justify-content-center">
    <a href="index.php" class="btn btn-secondary btn-lg">
      Back
    </a>
  </div>
</div>


    <!-- Modal -->
    <div class="modal fade" id="groomingModal" tabindex="-1" aria-labelledby="groomingModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="groomingModalLabel">Grooming Appointments</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Grooming appointments involve various services to maintain the hygiene and appearance of pets. Here's what they typically include:</p>
            <ul>
              <li><strong>Baths:</strong> Cleaning the pet's coat with water and shampoo to remove dirt and odors.</li>
              <li><strong>Haircuts:</strong> Trimming or styling the pet's fur to keep it tidy and manageable.</li>
              <li><strong>Nail Trims:</strong> Clipping the pet's nails to prevent overgrowth and discomfort.</li>
              <li><strong>Ear Cleaning:</strong> Removing dirt and debris from the pet's ears to prevent infections.</li>
            </ul>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
