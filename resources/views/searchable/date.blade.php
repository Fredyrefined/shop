{{-- @extends('layout.menu')
@section('main')
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-3">
				<div class='input-group date' id='datetimepicker2'>
					<input type='text' class="form-control" />
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			</div>
		</div>
	</div>

    <div class="col-md-4">
        <div class="panel">
            <div class="panel-heading">
                <b>MODE</b>
            </div>
        </div>
    </div>
	
	<script>
		    $(function() {
            // Get current date
            var currentDate = new Date();

            $('#datetimepicker2').datetimepicker({
                format: 'DD/MM/YYYY hh:mm A',
                minDate: currentDate, // Set minimum date to current date
				keepOpen:true
            });

            // Bind click event to input field to open date picker
            $('#datetimepicker2 input').on('click', function() {
                $('#datetimepicker2').datetimepicker('show');
            });
        });
	</script>
	
	

@endsection --}}

 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date Picker Example</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Include Bootstrap Datetimepicker CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
</head>
<body>
	<br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-3">
                <div class='input-group date' id='datetimepicker2'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Include Bootstrap Datetimepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script>
       $(function() {
            // Get current date
            var currentDate = new Date();

            $('#datetimepicker2').datetimepicker({
                format: 'DD/MM/YYYY hh:mm A',
                minDate: currentDate, // Set minimum date to current date
				keepOpen:true
            });

            // Bind click event to input field to open date picker
            $('#datetimepicker2 input').on('click', function() {
                $('#datetimepicker2').datetimepicker('show');
            });
        });
    </script>
</body>
</html> 
