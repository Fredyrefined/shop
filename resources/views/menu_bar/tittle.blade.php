
@extends('layout.menu')
@section('main')
<style>
    /* Style the sidebar */
    .sidebar {
        height: 100%;
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #111;
        padding-top: 20px;
    }

    /* Style the links inside the sidebar */
    .sidebar a {
        padding: 10px 16px;
        text-decoration: none;
        font-size: 20px;
        color: white;
        display: block;
        transition: 0.3s;
    }

    /* Change color on hover */
    .sidebar a:hover {
        background-color: #555;
    }

    /* Style the content */
    .content {
        margin-left: 250px;
        padding: 16px;
    }
</style>
</head>
<body>

<div class="sidebar">
    
    <img src="https://www.refined.co.in/wp-content/themes/refined/images/logo.png" alt=" Refined IT Solutions, Refined Marketing Pvt Ltd " width="230" height="80"><br>
    <a href="#" class="nav-link" data-url="/home">Home</a> 
    {{-- <a href="/home">Home</a>  --}}
    <a href="#" class="nav-link" data-url="/pdf">PDF</a> 
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
</div>
    <center>
    <div class="content" id="content">
        <h1>Welcome Refined</h1><br>
        <p>This is the content area. You can add your main content here.</p>
    </div>
    </center>
<script>
    $(document).ready(function() {
        $('.nav-link').click(function(e) {
            e.preventDefault(); // Prevent default link behavior
    
            var url = $(this).data('url'); // Get the URL from the data-url attribute
            loadContent(url); // Call the loadContent function with the URL
        });
    
        function loadContent(url) {
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html',
                success: function(data) {
                    $('#content').html(data); // Update the content area with the fetched content
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching content:', error);
                }
            });
        }
    });
</script>
@endsection

