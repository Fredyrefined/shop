@extends('layout.menu')
@section('main')

    <nav class="navbar navbar-expand bg-black">
        <div class="container-fluid">
            <a class="navbar-brand text-light">Shops List</a>
        </div>
    </nav>
    <div style="position: absolute; right: 350px; top: 8px;">

        <a href="{{ route('switch.modes') }}" class="btn btn-light"><i class="bi bi-moon-stars-fill"></i>  Dark</a>
        {{-- <button onclick="myFunction()" class="btn btn-light"><i class="bi bi-moon-stars-fill"></i>  Dark</button> --}}
   </div>
   

   <div style="position: absolute; right: 155px; top: 8px;">
       <ul>     
         <a id="live" href="/live" class="btn btn-warning"><i class="bi bi-0-circle"></i> Live Shops</a>    
       </ul>
   </div>
        <div style="position: absolute; right: 10px; top: 8px;">
             <a id="block" href="/block" class="btn btn-danger"><i class="bi bi-ban"></i> Block Shops</a>
        </div>

        <div id="container-fluid">

    <div class="container mt-5">
        <div class="row">
            <div class="d-flex justify-content-between">
                <h5><i class="bi bi-journal-richtext"></i>Total Shops</h5>
                <a href="/addshop" class="btn btn-primary"><i class="bi bi-plus-circle"> </i>Add New Shops</a>
            </div>
            @if(session('success'))
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                   <strong> {{ session('success') }}</strong>
                </div>
            </div>
            @endif
            <div class="searchable">
                <input type="text" placeholder="search " onkeyup="filterFunction(this,event)">
                <ul>
                    <li>Algeria</li>
                    <li>Bulgaria</li>
                    <li>Canada</li>
                    <li>Egypt</li>
                    <li>Fiji</li>
                    <li>India</li>
                    <li>Japan</li>
                    <li>Iran</li>
                    <li>Lao</li>
                    <li>Africa</li>
                    <li>Micronesia</li>
                    <li>Nicaragua</li>
                    <li>Senegal</li>
                    <li>Tajikistan</li>
                    <li>Yemen</li>
                </ul>
            </div>
                <div class="col-md-20 table-responsive mt-3">
                <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Shop Images</th>
                            <th>Shop Name</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @php $slNo = 1; @endphp
                            @foreach($shop as $item)
                                <tr>
                                    <td>{{ $slNo++ }}</td>
                                    <td>
                                        @foreach ($item->images as $image)
                                            <img src="{{ asset($image->url) }}" style="width: 100px; height:70px; object-fit:contain" alt="shop"/>
                                        @endforeach
                                    </td>
                                    <td>{{ $item->shop_name }}</td>
                                    <td>{{ $item->contact }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>
                                        @if ($item->status == 1)
                                        <div class="btn btn-warning">Live</div>
                                        @else
                                        <div class="btn btn-danger">Block</div>
                                        @endif<br><br>
                                        <a href="/downloadshop/{{ $item->id }}" class="btn btn-info btn-sm">Download</a>
                                    </td>
                                    <td>
                                        <a href="/viewshop/{{ $item->id }}" class="btn btn-secondary btn-sm"><i class="bi bi-view-list"></i></a>
                                        <a href="/editshop/{{ $item->id }}" class="btn btn-dark btn-sm"><i class="bi bi-pencil-square"></i></a>
                                        <a href="/deleteshop/{{ $item->id }}" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>

    </div>
    {{-- <div class="d-flex justify-content-center mt-4">
        {{ $shop->links() }}
    </div> --}}
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
            @if ($shop->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $shop->previousPageUrl() }}" tabindex="-1">Previous</a>
                </li>
            @endif
    
            @if ($shop->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $shop->nextPageUrl() }}">Next</a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Next</a>
                </li>
            @endif
        </ul>
    </nav>
    
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

    <script>
        $(document).ready(function() {   
            $(document).on('click', '#live, #block', function(e) {
                e.preventDefault(); // Prevent default anchor click behavior
                var href = $(this).attr('href'); 
                console.log('Clicked href:', href); 
                $.ajax({
                    url: href,
                    success: function(response) {
                        console.log('AJAX success:', response); 
                        $("#container-fluid").html(response); // Replace content of #container-fluid with response
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX error:', error); 
                    }
                });
            });
        });


        // Automatically close the alert after 2 seconds
        setTimeout(function() {
            document.querySelector('.alert').remove();
        }, 2000);

        function filterFunction(that, event) {
            let container, input, filter, li, input_val;
            container = $(that).closest(".searchable");
            input_val = container.find("input").val().toUpperCase();

            if (["ArrowDown", "ArrowUp", "Enter"].indexOf(event.key) != -1) {
                keyControl(event, container)
            } else {
                li = container.find("ul li");
                li.each(function (i, obj) {
                    if ($(this).text().toUpperCase().indexOf(input_val) > -1) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });

                container.find("ul li").removeClass("selected");
                setTimeout(function () {
                    container.find("ul li:visible").first().addClass("selected");
                }, 100)
            }
        }
    function keyControl(e, container) {
        if (e.key == "ArrowDown") {

            if (container.find("ul li").hasClass("selected")) {
                if (container.find("ul li:visible").index(container.find("ul li.selected")) + 1 < container.find("ul li:visible").length) {
                    container.find("ul li.selected").removeClass("selected").nextAll().not('[style*="display: none"]').first().addClass("selected");
                }

            } else {
                container.find("ul li:first-child").addClass("selected");
            }

        } else if (e.key == "ArrowUp") {

            if (container.find("ul li:visible").index(container.find("ul li.selected")) > 0) {
                container.find("ul li.selected").removeClass("selected").prevAll().not('[style*="display: none"]').first().addClass("selected");
            }
        } else if (e.key == "Enter") {
            container.find("input").val(container.find("ul li.selected").text()).blur();
            onSelect(container.find("ul li.selected").text())
        }

        container.find("ul li.selected")[0].scrollIntoView({
            behavior: "smooth",
        });
    }

    function onSelect(val) {
        // alert(val)
    }

    $(".searchable input").focus(function () {
        $(this).closest(".searchable").find("ul").show();
        $(this).closest(".searchable").find("ul li").show();
    });
    $(".searchable input").blur(function () {
        let that = this;
        setTimeout(function () {
            $(that).closest(".searchable").find("ul").hide();
        }, 300);
    });

    $(document).on('click', '.searchable ul li', function () {
        $(this).closest(".searchable").find("input").val($(this).text()).blur();
        onSelect($(this).text())
    });

    $(".searchable ul li").hover(function () {
        $(this).closest(".searchable").find("ul li.selected").removeClass("selected");
        $(this).addClass("selected");
    });

    </script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap.min.js"></script>
    <script>

    </script>
@endsection
