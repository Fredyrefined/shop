@extends('layout.menu')
@section('main')
<div class="container mt-6">
    <nav class="my-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item">Live Shops</li>
        </ol>
    </nav>
    <div class="container mt-5">
        <div class="col-md-12 table-responsive mt-3">
            <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Shop Images</th>
                        <th>Shop Name</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php $slNo = 1; @endphp
                    @foreach($shops as $shop)
                    @if ($shop->status == 1)
                    <tr>
                        <td>{{ $slNo++ }}</td>
                        <td>
                            @foreach ($shop->images as $image)
                                <img src="{{ asset($image->url) }}" style="width: 100px; height:70px; object-fit:contain" alt="shop"/>
                            @endforeach
                        </td>
                        <td>{{ $shop->shop_name }}</td>
                        <td>{{ $shop->contact }}</td>
                        <td>{{ $shop->address }}</td>
                        <td>
                            @if ($shop->status == 1)
                            <div class="btn btn-warning">Live</div>
                            @else
                            <div class="btn btn-danger">Block</div>
                            @endif
                        </td>
                    </tr>

                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
