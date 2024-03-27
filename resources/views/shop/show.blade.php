@extends('layout.menu')
@section('main')
  <nav class="navbar navbar-expand bg-black">
        <div class="container-fluid">
            <a class="navbar-brand text-light">Shops Details</a>
        </div>
  </nav>
  <div class="containar mt-4">
    <div class="row">
        <h5><i class="bi bi-pencil-square"></i>Shops Details</h5>
        <nav class="my-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item" >View Shops</li>
                </ol>
            </nav>
            <div class="card" >
            @foreach ($shop->images as $image)
                <img src="{{ asset($image->url) }}" style="width: 100px; height:70px; object-fit:contain" alt="shop"/>
            @endforeach

                <div class="card-body">
                <h5 class="card-title fw-bold">Shop Name: <small class="fw-semibold"><?= $shop->shop_name;?></small></h5>
                <h5 class="card-title fw-bold">Address:
                <small class="fw-semibold"><?= $shop->address;?></small>
            </h5>

                <h5 class="card-title fw-bold">Contact : <small class="fw-semibold"><?= $shop->contact;?></small></h5>

                </div>
            </div>
        </div>
    </div>
@endsection
