<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login failed</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h1>You need to login</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam est repellendus tempora aut! 
            Ut suscipit libero velit, molestiae cupiditate distinctio quos corporis veniam! 
            Repellat omnis sapiente laboriosam suscipit, commodi animi.</p>

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Error!</strong> {{ session('error') }}
            </div>
        @endif
    </div>

</body>
</html>
