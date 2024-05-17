@extends('layout.layout')
@section('content')
<style>
    .img-icon-size{
        width: 100px;
        height: 80px;
        font-size: 10px;
        object-fit: cover; 
    }
    .cb {
            margin-bottom: 0px !important;
        }
</style>
    <div class="row">
        <div class="col-12">
            <div class="card cb">
                <div class="card body cb">
                    <div class="container">
                        <div class="d-flex justify-content-between align-item-center my-5">
                            <div class="h2">View</div>
                            <a href="{{ route('web.userIndex') }}" class="btn btn-primary btn-lg">Back</a>
                        </div>
                        <form action="{{ route('profile.view', ['id' => $users->id]) }}" method="get"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="py-3">
                                <label for="image" class="form-label">Profile</label>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('storage/'.$users->image) }}" alt="Profile Image" class="img-thumbnail img-icon-size me-3">
                                </div>
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
