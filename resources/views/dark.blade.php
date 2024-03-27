<!-- resources/views/cookies/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Include custom CSS for dark and light themes -->
    @if(session('theme') == 'dark')
        <link rel="stylesheet" href="{{ asset('css/dark-theme.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('css/light-theme.css') }}">
    @endif
</head>
<body>
    <!-- Theme switch button -->
    <div class="container mt-3">
      <a href="{{ route('switch.modes') }}" class="btn btn-dark">  <i class="bi bi-moon-stars-fill"></i>   Dark</a>
    </div>

    <!-- Cookies list -->
    <div class="container mt-3">
        <h1>WELCOME</h1>
        <div class="col-md-12 table-responsive mt-3">
            <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th> Name</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Status</th>
                        
                    </tr>
                </thead>
                <tbody>       
                    <tr>
                        <td>1</td>
                        <td>varum</td>
                        <td>9876545676</td>
                        <td>10-/chennai</td>
                        <td><div class="btn btn-info">Available</div></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
