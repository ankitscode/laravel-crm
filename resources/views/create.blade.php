<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @include('layout.header.header');
</head>

<body>
    <div id="layout-wrapper">
        @include('layout.navbar')
        @include('layout.sidebar')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card body">
                                    <div class="container">
                                        <div class="d-flex justify-content-between align-item-center my-5">
                                            <div class="h2">Create</div>
                                            <a href="" class="btn btn-primary btn-lg">Back</a>
                                        </div>
                                        <form action="{{route('profile.data')}}" method="post">
                                            @csrf
                                            <div class="py-3">
                                                <label for="" class="from-label">Profile</label>
                                                <input type="file" class="form-control" name="image" accept="image/*">
                                            </div>
                                            <div class="py-3">
                                                <label for="" class="from-label">Name</label>
                                                <input type="text" class="form-control" name="name">
                                                <span class="text-danger">
                                                    @error('name')
                                                    {{$message}}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="py-3">
                                                <label for="" class="from-label">Email</label>
                                                <input type="text" class="form-control" name="email">
                                                <span class="text-danger">
                                                    @error('eamil')
                                                    {{$message}}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="py-3">
                                                <label for="" class="from-label">Phone Number</label>
                                                <input type="number" class="form-control" name="phone">
                                                <span class="text-danger">
                                                    @error('number')
                                                    {{$message}}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <label class="form-label" for="password-input">Password</label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror pe-5" name="password" placeholder="Enter password" id="password-input">
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="py-3">
                                                <button type="submit" class="btn btn-primary mb-2">Add</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>