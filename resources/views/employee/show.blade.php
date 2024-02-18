<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset("/style/style-show.css")}}">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <div class="menu-icon" onclick="toggleNav(this)">
            <div class="line1"></div>
            <div class="line2"></div>
        </div>
        <a href="{{route("employee.index")}}" class="header-title">{{ $employee->name }}'s Data</a>
    </div>

    <div class="change">
        <a href="{{ route('employee.edit', $employee->slug) }}" class="edit-btn">Edit</a>
        <div class="vertical-line"></div>
        <form action="{{ route('employee.delete', $employee->slug)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="del-btn">Delete</button>
        </form>
    </div>
    
    <div class="employee-data">
        <h2 class="card-header">Name: {{ $employee->name }}</h2>
        <ul class="card-content">
            <li>Age: {{ $employee->age }}</li>
            <li>Address: {{ $employee->address }}</li>
            <li>Phone: {{ $employee->phone }}</li>
        </ul>
    </div>
    
    <script>
        function getRandomPastelColor() {
            const h = Math.floor(Math.random() * 360);
            const s = Math.floor(Math.random() * 41) + 50; 
            const l = Math.floor(Math.random() * 51) + 50;
            return `hsl(${h}deg, ${s}%, ${l}%)`;
        }

        const element = document.querySelector('.employee-data');
        element.style.backgroundColor = getRandomPastelColor();
    </script>

    <script>
        function toggleNav(x) {
            window.location.href = "{{ route('employee.index') }}";
        }
    </script>
</body>
</html>