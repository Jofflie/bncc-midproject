<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset("/style/style-add.css")}}">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <a href="{{route("employee.index")}}" class="header-title">PT.ChipiChapa</a>
    </div>

    <div class="sub-title">
        <h3>New Employee Data</h3>
    </div>

    <div class="homepage">
        <div class="form-container">
            <form action="{{route("employee.store")}}" method="POST">
                @csrf
                <div class="form-control">
                    <label for="">Name: </label><br>
                    <input type="text" name="name" placeholder="Railey" required minlength="5" maxlength="20">                    
                </div>

                <div class="form-control">
                    <label for="">Age: </label><br>
                    <input type="number" name="age" placeholder="20" required min="21">
                </div>

                <div class="form-control">
                    <label for="">Employee's address: </label><br>
                    <input type="text" name="address" placeholder="Jl.Kecut 55, Jakarta Barat, Indonesia" required minlength="10" maxlength="40">
                </div>

                <div class="form-control">
                    <label for="">Phone number: </label><br>
                    <input type="text" name="phone" placeholder="08124395008" required pattern="^08[0-9]{7,10}$">
                </div>

                
                <button>Submit</button>
                

            </form>
        </div>
    </div>
</body>
</html>