<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTables Example</title>
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <style>
        /* Custom CSS for responsive table */
        .table-container {
            overflow-x: auto;
        }
        .dataTables_wrapper  {
            /* border: 1px solid #aaa; */
            border-radius: 3px;
            padding: 5px;
            background-color: transparent;
            padding: 80px;
        }
      
    </style>
</head>
<body>
    <!-- Container for responsive table -->
    <div class="table-container">
        <!-- Your HTML table goes here -->
        <table id="dataTable" class="display" style="width:100%; ">
            <thead>
                <tr>
                    
                    <th>Name</th>
                    <th>Age</th>
                    <th>City</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                      
                    <td>John Doe</td>
                    <td>30</td>
                    <td>New York</td>
                </tr>
                <tr>
                    <td>Jane Smith</td>
                    <td>25</td>
                    <td>Los Angeles</td>
                </tr>
                <tr>
                    <td>Smith</td>
                    <td>20</td>
                    <td>SAngeles</td>
                </tr>
                <tr>
                    <td>Nmith</td>
                    <td>29</td>
                    <td>Loses</td>
                </tr>
                <tr>
                    <td>ESmi</td>
                    <td>25</td>
                    <td>Los Angeles</td>
                </tr>
                <tr>
                    <td>Jeh</td>
                    <td>65</td>
                    <td>les</td>
                </tr>
                <tr>
                    <td>tho</td>
                    <td>85</td>
                    <td>Bgeles</td>
                </tr>
                <tr>
                    <td>fgh</td>
                    <td>25</td>
                    <td>Mngeles</td>
                </tr>
                <tr>
                    <td>fju</td>
                    <td>25</td>
                    <td>dbvs</td>
                </tr>
                <tr>
                    <td>DJ</td>
                    <td>20</td>
                    <td>Zaj vs</td>
                </tr>
                <tr>
                    <td>Block</td>
                    <td>11</td>
                    <td>get</td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>

    <!-- DataTables JavaScript -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <!-- Initialize DataTables -->
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</body>
</html>
