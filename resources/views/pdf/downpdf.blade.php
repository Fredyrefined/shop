<!-- bill.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bill</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>
    <div class="row">
        <div class="col">
            <h1>Accounts</h1>
            <h6>all accounts details</h6>
        </div>
        <div class="col text-right">
            {{-- <img src="https://www.refined.co.in/wp-content/themes/refined/images/logo.png" alt=" Refined IT Solutions, Refined Marketing Pvt Ltd " width="230" height="80"><br> --}}
            <h1>Address</h1>
            <!-- Close the h1 tag before including the h6 elements -->
            <h6>kidayil konathu veedu papermill road<br>
            thuruvickal p.o<br>
            Trivandrum</h6>
        </div>
    </div>
    
    <table>
        <thead>
            <tr>
                <th><b>S.No</b></th>
                <th><b>Date</b></th>
                <th><b>Description</b></th>
                <th><b>Amount</b></th>
                <th><b>Fees</b></th>
                <th><b>Total</b></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @php $slNo = 1; @endphp
                <td>{{ $slNo++}}</td>
                <td>{{ $pdfs->date }}</td>
                <td>{{ $pdfs->description }}</td>
                <td>{{ $pdfs->amount }}</td>
                <td>{{ $pdfs->fees }}</td>
                <td>{{ $pdfs->total }}</td>
                
            </tr>
        </tbody>
    </table>
</body>
</html>
