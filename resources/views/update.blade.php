@extends('layout.layout')
@section('content')
<style>
    .img-icon-size{
        width: 50px;
        height: 50px;
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
                            <div class="h2">Update</div>
                            <a href="{{ route('web.userIndex') }}" class="btn btn-primary btn-lg">Back</a>
                        </div>
                        <form action="{{ route('profile.update', ['id' => $user->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="py-3">
                                <label for="image" class="form-label">Profile</label>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('storage/'.$user->image) }}" alt="Profile Image" class="img-thumbnail img-icon-size me-3">
                                    <input type="file" class="form-control" name="image" accept="image/*">
                                </div>
                            </div>
                            
                            {{-- <div class="py-3">
                                <label for="" class="from-label">Type</label> --}}
                                <input type="text" class="form-control" name="type" accept="" hidden>
                            {{-- </div> --}}
                            {{-- <div class="py-3">
                                <label for="" class="from-label">File_size</label> --}}
                                <input type="int" class="form-control" name="file_size" accept="" hidden>
                            {{-- </div> --}}
                            {{-- <div class="py-3">
                                <label for="" class="from-label">Name</label>
                                <input type="text" class="form-control" name="name" value="">
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div> --}}
                            {{-- <div class="py-3">
                                <label for="" class="from-label">Thumbnail</label> --}}
                                <input type="file" class="form-control" name="thumbnail_name" accept="image/*" hidden>
                            {{-- </div> --}}
                            <div class="py-3">
                                <label for="" class="from-label">Created By</label>
                                <input type="text" class="form-control" name="created_by" accept="">
                            </div>
                            <div class="py-3">
                                <label for="" class="from-label">Updated By</label>
                                <input type="text" class="form-control" name="updated_by" accept="">
                            </div>
                            <div class="py-3">
                                <label for="" class="from-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="py-3">
                                <label for="" class="from-label">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                                <span class="text-danger">
                                    @error('eamil')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="py-3">
                                <label for="" class="from-label">Phone Number</label>
                                <input type="number" class="form-control" name="phone_number"
                                    value="{{ $user->phone_number }}">
                                <span class="text-danger">
                                    @error('number')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <div class="py-3">
                                    <button type="submit" class="btn btn-primary mb-2">Update</button>
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
