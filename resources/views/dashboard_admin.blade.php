<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Dashboard</title>
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
        @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{ session('success') }}
        </div>
        @elseif (session('error'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Error!</strong> {{ session('error') }}
        </div>
        @endif
    </div>

    <div class="container">
        <h2>Admin Dashboard</h2>

        {{-- Logout Button --}}
        <form method="POST" action="{{ route('logout') }}" style="float: right;margin-top: -50px;">
            @csrf
            <button type="submit" class="btn btn-danger">
                Logout
            </button>
        </form>
    </div>

    <div class="container">
        @if(Auth::check() && Auth::user()->role === 'admin')
        <p>Welcome Admin, {{ Auth::user()->name }} ({{ Auth::user()->email }})</p>
        @endif
    </div>

    <div class="container mt-4">
        <h4 class="mb-3">User Management</h4>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Email Verified</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @forelse($allusers as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->role) }}</td>
                    <td>
                        @if($user->email_verified_at)
                        <span class="badge bg-success">Yes</span>
                        @else
                        <span class="badge bg-danger">No</span>
                        @endif
                    </td>
                    <td>{{ $user->created_at->format('Y-m-d') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No users found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>


    <div class="container mt-4">
        <h4 class="mb-3">Product Management</h4>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Created By</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @forelse($allproducts as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <!-- <td>{{ $product->created_by }}</td> -->
                    <td>{{ $product->creator ? $product->creator->name : 'Unknown' }}</td>
                    <td>{{ \Carbon\Carbon::parse($product->created_at)->format('Y-m-d H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($product->updated_at)->format('Y-m-d H:i') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No products found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>


</body>

</html>