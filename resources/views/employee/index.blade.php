<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset("/style/style-home.css")}}">
    <title>Document</title>
</head>
<body>
    <div id="sidenav" class="nav">
        <p>PT. ChipiChapa</p>

        <div class="link-a">
            
            <a href="{{route("logout")}}" class="logout-nav"mvalue="Logout">Logout</a>
            
        </div>
    </div>

    <div id="main">
        <div class="container">
            <div class="menu-icon" onclick="toggleNav(this)">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>

            <a href="{{route("employee.index")}}" class="header-title">Welcome, {{ Auth::user()->name }}</a>
            
        </div>

        

        <div class="sub-header">
            <h2 >Employee List</h2>
            <a href="{{ route('employee.create') }}" class="add-button">&#43 New Employee</a>
        </div>
        

        <div class="employee-list">
            @foreach($employees as $employee)
                <div class="employee-data">
                    <ul class="card-content">
                        <h2 class="card-header">{{ $employee->name }}</h2>
                        <li>Age: {{ $employee->age }}</li>

                        <div class="sel">
                            <a href="{{ route('employee.show',$employee->slug)}}" class="show-btn">Show</a>
                            <div class="vertical-line"></div>
                            <a href="{{ route('employee.edit', $employee->slug) }}" class="edit-btn">Edit</a>
                            <div class="vertical-line"></div>
                            <form action="{{ route('employee.delete', $employee->slug)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="del-btn">Delete</button>
                            </form>
                        </div>
                        
                    </ul>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function toggleNav(x) {
            var sidenav = document.getElementById("sidenav");
            if (sidenav.style.width === "250px") {
                x.classList.toggle("change")
                sidenav.style.width = "0";
                document.getElementById("main").style.marginLeft = "0";
            } else {
                x.classList.toggle("change");
                sidenav.style.width = "250px";
                document.getElementById("main").style.marginLeft = "250px";
            }
        }
    </script>
    
    
</body>
</html>
