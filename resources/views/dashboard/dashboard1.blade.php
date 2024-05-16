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
                                    <table class="table table-striped table-hover ">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sr.no</th>
                                                <th scope="col">Profile</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Phone number</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $rowID=1;
                                            @endphp
                                            @if (count($users) > 0)
                                                @foreach($users as $user)
                                                <tr>
                                                    <td style="width: 10%;">{{$rowID++}}</td>
                                                    <td>{{$user->image}}</td>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->phone}}</td>
                                                    <td style="width: 20%;">
                                                        <a href="{{route('profile.create')}}" class="btn btn-success btn-sm">Create</a>
                                                        <a href="{{route('profile.edit',$user->id)}}" class="btn btn-info btn-sm">Edit</a>
                                                        <a href="" class="btn btn-light btn-sm">view</a>
                                                        <a href="{{route('profile.delete',$user->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @else
<h2>
    No data found
</h2>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
            </div>
        </div>
    </div>
    <script src="{{url('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{url('assets/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{url('assets/libs/feather-icons/feather.min.js')}}"></script>
    <script src="{{url('assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
    <script src="{{url('assets/js/plugins.js')}}"></script>

    <!-- apexcharts -->
    <script src="{{url('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

    <!-- Dashboard init -->
    <script src="{{url('assets/js/pages/dashboard-crm.init.js')}}"></script>

    <!-- App js -->
    <script src="{{url('assets/js/app.js')}}"></script>
</body>

</html>