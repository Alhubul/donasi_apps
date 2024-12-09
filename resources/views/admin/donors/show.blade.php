<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title', 'Donor Detail - Dashboard')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('admin/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('admin/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  @include('partials.header')

  <!-- ======= Sidebar ======= -->
  @include('partials.sidebar')

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Donor Details</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.donors.index') }}">Donors</a></li>
          <li class="breadcrumb-item active">Donor Details</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Donor Information</h5>

              <!-- Donor Details -->
              <div class="mb-3">
                <strong>Name:</strong>
                <p>{{ $donor['name'] }}</p>
              </div>

              <div class="mb-3">
                <strong>Email:</strong>
                <p>{{ $donor['email'] }}</p>
              </div>

              <div class="mb-3">
                <strong>Phone Number:</strong>
                <p>{{ $donor['phone_number'] }}</p>
              </div>

              <div class="mb-3">
                <strong>Address:</strong>
                <p>{{ $donor['address'] }}</p>
              </div>

              <div class="d-flex justify-content-between">
                <a href="{{ route('admin.donors.index') }}" class="btn btn-secondary">Back to List</a>
                <a href="{{ route('admin.donors.edit', $donor['id']) }}" class="btn btn-primary">Edit Donor</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End Main -->

  <!-- ======= Footer ======= -->
  @include('partials.footer')

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
