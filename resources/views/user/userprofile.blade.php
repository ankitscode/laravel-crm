@extends('layout.layout')
@section('content')
    <style>
        .cb {
            margin-bottom: 0px !important;
        }

        .img-icon-size {
            width: 100px;
            height: 80px;
            font-size: 10px;
            object-fit: cover;
        }
    </style>
    <div class="card cb">
        <div class="card body cb">
            <div class="container rounded  mt-5 mb-5">
                <div class="row">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img
                                class="rounded-circle mt-5" width="150px"
                                src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                                class="font-weight-bold">Anna</span><span
                                class="font-weight-bold">hangingpanda@mail.com</span><span> </span></div>
                    </div>
                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">User Profile</h4>
                            </div>
                            <form action="{{ route('user.profile', ['id' => $users->id]) }}" method="GET">
                                @csrf
                                <div class=" row mt-2">
                                    <label for="image" class="form-label">Profile</label>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('storage/' . $users->media->name) }}" alt="Profile Image"
                                            class="img-thumbnail img-icon-size me-3">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <label class="labels">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="name"
                                            value="{{ $users->name }}" readonly>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for="phone_number" class="phone_number">Mobile Number</label>
                                        <input type="text" class="form-control" name="phone_number" name="phone_number"
                                            placeholder="enter phone number" value="{{ $users->phone_number }}" readonly>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12"><label for="email" class="labels">Email</label>
                                        <input type="text" class="form-control" name="email" placeholder="email"
                                            value="{{ $users->email }}" readonly>
                                    </div>
                                </div>

                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
