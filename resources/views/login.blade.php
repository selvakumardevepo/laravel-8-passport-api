<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .mt-5 {
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Error!</strong> {{ session('error') }}
        </div>
        @elseif (session('success'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{ session('success') }}
        </div>
        @endif
    </div>
    <div class="container">
        <h2>Login</h2>
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" id="togglePassword">
                            Show
                        </button>
                    </span>
                </div>
            </div>

            <script>
                $(document).ready(function() {
                    $("#togglePassword").on("click", function() {
                        let input = $("#pwd");
                        let type = input.attr("type") === "password" ? "text" : "password";
                        input.attr("type", type);

                        // Toggle button text
                        $(this).text(type === "password" ? "Show" : "Hide");
                    });
                });
            </script>

            <div class="checkbox">
                <label><input type="checkbox" name="remember"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>

    </div>

</body>

</html>