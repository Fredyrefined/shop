@extends('layout.menu')
@section('main')
    <nav class="navbar navbar-expand bg-black">
        <div class="container-fluid">
            <a class="navbar-brand text-light"> Add Shop</a>
        </div>

    </nav>
        <div class="container mt-5">
        <div class="row">
              <h5><i class="bi bi-plus-square-fill"></i> Add New Shop</h5><hr/>
            <nav class="my-3 ">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item" >Add New Shop</li>
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
                <form action="/addshopss" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="row mb-3">
                    <div class="col-md-8">
                        <label for="tittle" class="form-label">Shop Name</label>
                        <input type="text" name="shop_name" id="shop_name" class="form-control" placeholder="Enter Shop Name" />
                    </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="contact" class="form-label">Contact</label>
                            <input type="number" name="contact" id="contact" class="form-control" placeholder="Enter Contact"/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="Date-Time" class="form-label">Date-Time</label>
                            <input type="datetime-local" name="Date-Time" id="start_time" class="form-control" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="address" class="form-label">Address</label>
                            <input type="address" name="address" id="address" class="form-control" placeholder="Enter Address"/>
                        </div>
                    </div>
                    <div class="row mb-3">
                    <div class="col-md-8">
                        <label for="Status">Status</label>
                        <select type="select" class="form-control" id="Status" name="status">
                            <option value="1">Live</option>
                            <option value="0">Block</option>
                        </select>
                    </div>
                </div>
                    <div class="row mb-3">
                    <div class="col-md-8">
                        <label for="image" class="form-label">Shop Images</label>
                       <input type="file" name="image[]" id="image" multiple/>

                    </div>
                    </div>
                    <div class="mb-3">
                    <button type="submit" class="btn btn-dark">Add Shops</button>
                    </div>
                </form>
             </div>
          </div>

        </div>
        <script>
             const convertToDateTimeLocalString = (date) => {
  const year = date.getFullYear();
  const month = (date.getMonth() + 1).toString().padStart(2, "0");
  const day = date.getDate().toString().padStart(2, "0");
  const hours = date.getHours().toString().padStart(2, "0");
  const minutes = date.getMinutes().toString().padStart(2, "0");

  return `${year}-${month}-${day}T${hours}:${minutes}`;
}
const currentTime = new Date()
document.getElementById('start_time').value = convertToDateTimeLocalString(currentTime)
        </script>
@endsection
