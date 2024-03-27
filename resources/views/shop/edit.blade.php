@extends('layout.menu')
@section('main')
    <nav class="navbar navbar-expand bg-black">
        <div class="container-fluid">
            <a class="navbar-brand text-light"> Edit Shops</a>
        </div>
    </nav>
        <div class="container mt-5">
        <div class="row">
              <h5><i class="bi bi-plus-square-fill"></i> Edit Shops</h5><hr/>
            <nav class="my-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item" >Edit Shops</li>
                </ol>
            </nav>
            <div class="col-md-6">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form action="/updateshop/{{ $shop->id }}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="name" class="form-label">Shop</label>
                        <input type="text" name="shop_name" id="shop_name" class="form-control" value="<?= $shop->shop_name;?>"/>

                    </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="contact" class="form-label">Contact</label>
                            <input type="contact" name="contact" id="contact" class="form-control" value="<?= $shop->contact;?>"/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" id="address" class="form-control" value="<?= $shop->address;?>"/>
                        </div>
                    </div>
                    <div class="row mb-3">
                    <div class="col-md-6">
                    <label for="Status">Status</label>
                    <select class="form-control" id="categoryStatus" name="status">
                        <option value="1"
                            {{ $shop->status == 1 ? 'selected' : '' }}>
                            Live
                        </option>
                        <option value="0"
                            {{ $shop->status == 0 ? 'selected' : '' }}>
                            Block
                        </option>
                    </select>
                    </div>
                    </div>
                    <div class="row mb-3">
                   <div class="col-md-12">
                        <label for="image" class="form-label">Shop Images</label>

                            <input type="file" name="image[]" id="image" class="form-control"  multiple>

                    </div>

                    </div>
                    <div class="mb-3">
                    <button type="submit" class="btn btn-dark">Add Product</button>
                    </div>
                </form>
             </div>
          </div>

        </div>
@endsection
