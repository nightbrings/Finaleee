<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="/assets/petshop.png">
  <title>Quality Service</title>
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
    <h1 class="text-center mb-4">Quality Service</h1>
    <p class="lead text-center mb-4">We are committed to providing the highest quality service for your pets.</p>
    <!-- Button trigger modal -->
    <div class="d-grid gap-2 col-6 mx-auto">
      <button type="button" class="btn btn-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#qualityServiceModal">
        Read More
      </button>
    </div>
    <div class="container mt-5">
      <div class="d-grid justify-content-center">
        <a href="index.php" class="btn btn-secondary btn-lg">
          Back
        </a>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="qualityServiceModal" tabindex="-1" aria-labelledby="qualityServiceModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="qualityServiceModalLabel">Quality Service</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Our commitment to quality service includes:</p>
            <ul>
              <li><strong>Experienced Staff:</strong> Our team consists of experienced professionals who are passionate about animal care.</li>
              <li><strong>Attention to Detail:</strong> We pay attention to every detail to ensure your pet receives the best possible care.</li>
              <li><strong>State-of-the-Art Facilities:</strong> Our facilities are equipped with the latest technology to provide a comfortable and safe environment for your pets.</li>
              <li><strong>Personalized Care:</strong> We understand that every pet is unique, so we provide personalized care tailored to their individual needs.</li>
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