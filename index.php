<?php
session_start();
if(isset($_SESSION['isLoggedIn']))
{
if ($_SESSION['isLoggedIn']) 
{
    header("location: homepage.php");
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
     <style>
        body {
            background: url('https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDF8fGxpYnJhcnl8ZW58MHx8fHwxNjc1NTQ5NTkw&ixlib=rb-4.0.3&q=80&w=1920') 
            no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
        }

        .card {
            background: rgba(255, 255, 255, 0.7); /* Semi-transparan putih */
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px); /* Efek blur latar belakang */
        }

        .form-label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
}
</style>

</head>

<body>
    <div class="row w-100 h-100">
        <div class="container d-flex justify-content-center align-items-center vh-100">
            <div class="card shadow p-4">
                <h3 class="text-center mb-4">Login</h3>
                <form action="aksi_login.php" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-3 ">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>