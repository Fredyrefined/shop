@extends('layout.menu')
@section('main')
<div class="container mt-6">
    <nav class="my-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/menu  ">Home</a></li>
            <li class="breadcrumb-item">pdf view</li>
        </ol>
    </nav>
    <div class="container mt-5">
        <div class="col-md-12 table-responsive mt-3">
            <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Fees</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                    @php $slNo = 1; @endphp
                    @foreach($pdfs as $pdf)
         
                    <tr>
                        <td>{{ $slNo++ }}</td>
                        <td>{{ $pdf->date }}</td>                                             
                        <td>{{ $pdf->description }}</td>
                        <td>{{ $pdf->amount }}</td>
                        <td>{{ $pdf->fees }}</td>
                        <td>
                            <a href="/downloadpdf/{{ $pdf->id }}" class="btn btn-info btn-sm">Download</a>
                        </td>
                    </tr>

                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
