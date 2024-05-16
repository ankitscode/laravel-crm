@extends('layout.layout')
@section('content')
<style>
    .cb{
        margin-bottom: 0px !important;
    }
    .table{
        table-layout: fixed
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="card cb">
            <div class="card body cb">
                <table class="table table-striped table-hover mb-0 ">
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
                        @if(isset($users) && count($users) > 0)
                            @foreach($users as $user)
                            <tr>
                                <td style="width: 10%;">{{$rowID++}}</td>
                                <td> <img src="{{ asset('storage/'.$user->image)}}" width="40px" height="40px" /></td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone_number}}</td>
                                <td style="width: 20%;">
                                    <a href="{{route('profile.edit',$user->id)}}" class="btn btn-info btn-sm">Edit</a>
                                    <a href="{{route('profile.view',$user->id)}}" class="btn btn-light btn-sm" >view</a>
                                    <a href="{{route('profile.delete',$user->id)}}"onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-danger btn-sm">Delete</a>
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
@endsection