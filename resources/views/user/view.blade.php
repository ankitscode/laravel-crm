@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card vg">
                <div class="card body vg">
                    <div class="container">
                        <div class="d-flex justify-content-between align-item-center my-5">
                            <div class="h2">View</div>
                            <a href="{{ route('web.userIndex') }}" class="btn btn-primary btn-lg">Back</a>
                        </div>
                        <form action="{{ route('profile.view', ['id' => $users->id]) }}" method="get"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="py-3">
                                <label for="image" class="from-label">Profile</label>
                                <input type="file" class="form-control" name="image" accept="image/*" readonly>
                            </div>
                            <div class="py-3">
                                <label for="" class="from-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $users->name }}"
                                    readonly>
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="py-3">
                                <label for="" class="from-label">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ $users->email }}"
                                    readonly>
                                <span class="text-danger">
                                    @error('eamil')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="py-3">
                                <label for="phone_number" class="from-label">Phone Number</label>
                                <input type="number" class="form-control"
                                    name="phone_number"value="{{ $users->phone_number }}" readonly>
                                <span class="text-danger">
                                    @error('number')
                                        {{ $message }}
                                    @enderror
                                </span>
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
@endsection
