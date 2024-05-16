@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card body">
                    <div class="container">
                        <div class="d-flex justify-content-between align-item-center my-5">
                            <div class="h2">Update</div>
                            <a href="{{ route('web.userIndex') }}" class="btn btn-primary btn-lg">Back</a>
                        </div>
                        <form action="{{ route('profile.update', ['id' => $crmm->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="py-3">
                                <label for="" class="from-label">Profile</label>
                                <input type="file" class="form-control" name="image" accept="image/*">
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
                            <div class="py-3">
                                <label for="" class="from-label">Thumbnail</label>
                                <input type="file" class="form-control" name="thumbnail_name" accept="image/*">
                            </div>
                            <div class="py-3">
                                <label for="" class="from-label">Created_by</label>
                                <input type="text" class="form-control" name="created_by" accept="">
                            </div>
                            <div class="py-3">
                                <label for="" class="from-label">updated_by</label>
                                <input type="text" class="form-control" name="updated_by" accept="">
                            </div>
                            <div class="py-3">
                                <label for="" class="from-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $crmm->name }}">
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="py-3">
                                <label for="" class="from-label">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ $crmm->email }}">
                                <span class="text-danger">
                                    @error('eamil')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="py-3">
                                <label for="" class="from-label">Phone Number</label>
                                <input type="number" class="form-control" name="phone_number"
                                    value="{{ $crmm->phone_number }}">
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
