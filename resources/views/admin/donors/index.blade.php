<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title', 'Dashboard - NiceAdmin')</title>
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

  <!-- Include DataTables CSS -->
  <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  @include('partials.header')

  <!-- ======= Sidebar ======= -->
  @include('partials.sidebar')

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Donors</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Donors</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Donor List</h5>
              <!-- Add Create Button -->
              <a href="{{ route('admin.donors.create') }}" class="btn btn-primary mb-3">Create New Donor</a>
              <!-- DataTables -->
              <table id="donorsTable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($donors as $donor)
                  <tr>
                    <td>{{ $donor['id'] }}</td>
                    <td>{{ $donor['name'] }}</td>
                    <td>{{ $donor['email'] }}</td>
                    <td>
                      <a href="{{ route('admin.donors.edit', $donor['id']) }}" class="btn btn-primary btn-sm">Edit</a>
                      <form action="{{ route('admin.donors.destroy', $donor['id']) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
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

  <!-- Include jQuery and DataTables JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

  <script>
    $(document).ready(function() {
      // Initialize DataTable
      $('#donorsTable').DataTable({
        "processing": true,  // To show processing message while fetching data
        "serverSide": false, // As we already have the data on the client side
        "paging": true,      // Enable pagination
        "lengthChange": false, // Disable the number of rows selection
        "searching": true,   // Enable search bar
        "ordering": true,    // Enable sorting
        "info": true         // Show number of records
      });
    });
  </script>

</body>

</html>
