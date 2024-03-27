<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Dropdown with AJAX</title>
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" /> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/search.css') }}"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    
    <style>
     
    </style>
</head>
<body>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- Empty column to adjust layout -->
            </div>
            <div class="col-md-3" >
                <select id="dropdown" style="width: 100% ">
                    <!-- Dropdown options will be populated dynamically -->
                </select>
            </div>
        </div>
    </div>
    

    <script>
        $(document).ready(function(){
            // Initialize Select2 on the dropdown element
            $('#dropdown').select2({
                    dropdownAutoWidth : true,
                    width: 'auto'
                });

            // Function to fetch data via AJAX and populate dropdown
            function fetchData() {
                $.ajax({
                    url: '/getOptions',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data);
                        $('#dropdown').empty();
                      
                        $.each(data, function(index, item) {
                            $('#dropdown').append('<option value="' + item.value + '">' + item.label + '</option>');
                        });
                        // Update Select2 after populating options
                        $('#dropdown').select2();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data: ', error);
                    }
                });
            }

            // Fetch data when the page loads
            fetchData();
        });
    </script>
</body>
</html>
