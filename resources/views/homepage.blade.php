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
        <p>Employee Management</p>
        <a href="{{route("employee.index")}}">Directory</a>
        <a href="{{route("employee.create")}}">Add directory</a>
        <a href="#">About</a>
    </div>

    <div id="main">
        <div class="container">
            <div class="menu-icon" onclick="toggleNav(this)">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>

            <a href="{{route("homepage")}}" class="header-title">Welcome, {{ Auth::user()->name }}</a>

            <div class="header">
                <a href="{{route("logout")}}" >
                    <input type="button" class="logout-button" value="Logout"/>
                </a>
            </div>
            
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