@extends('layout.menu')
@section('main')
        <nav class="navbar navbar-expand bg-black">
            <div class="container-fluid">
                <a class="navbar-brand text-light"></a>
            </div>
        </nav><br><br>
        <br><br><div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-6">
                        <div style="text-align: center;">
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
                        </div>
                    </div>
                </div>
               
                {{-- <div class="row mb-3">
                    <div class="col-md-8">
                        <label for="Date-Time" class="form-label">Date-Time</label>
                        <input type="text" value="2021-04-16 14:45" class="default" />
                    </div>
                </div>
            </div> --}}
           <br> <div class="row mb-6">
                <div class="col-md-4">
                    <div class='input-group date' id='datetimepicker2'>
                        <input type='text' class="form-control" />
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                      </div>
                    {{-- <input type="datetime-local" name="Date-Time" id="start_time" class="form-control" /> --}}
                </div>
            </div>      
        </div>       
 <script>
    $(function() {
    $('#datetimepicker2').datetimepicker({
        format: 'DD/MM/YYYY hh:mm A',
    });
    });
            
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



@endsection