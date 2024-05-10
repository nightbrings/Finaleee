<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="/assets/petshop.png">
  <title>Boarding Reservations</title>
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
    <h1 class="text-center mb-4">Boarding Reservations</h1>
    <p class="lead text-center mb-4">Reserve accommodations for pets needing overnight boarding or daycare services.</p>
    <!-- Button trigger modal -->
    <div class="d-grid gap-2 col-6 mx-auto">
      <button type="button" class="btn btn-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#boardingModal">
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
    <div class="modal fade" id="boardingModal" tabindex="-1" aria-labelledby="boardingModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="boardingModalLabel">Boarding Reservations</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Boarding reservations allow you to reserve accommodations for your pets, including overnight stays and daycare services. Here's what our boarding services typically include:</p>
            <ul>
              <li><strong>Accommodations:</strong> Comfortable spaces for your pets to stay, including cozy beds and play areas.</li>
              <li><strong>Feeding:</strong> Regular feeding schedules to ensure your pets are well-nourished during their stay.</li>
              <li><strong>Exercise:</strong> Daily exercise routines to keep your pets active and healthy.</li>
              <li><strong>Care:</strong> Professional staff members to provide personalized care and attention to your pets.</li>
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
