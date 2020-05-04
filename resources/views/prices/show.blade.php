@extends('layouts.master')
@section('content')
    <h1 >Driver Details</h1>
    <div class="row justify-content-center">
        <div class="card col-sm-4 col-md-4 ">
            
            <table class="table table-sm table-fit">
                    <tr>
                        <th>ID:</th>
                        <td>{{$driver->id}}</td>
                    </tr>
                    <tr>
                        <th>Firstname:</th>
                        <td>{{$driver->firstname}}</td>
                    </tr>
                    <tr>
                            <th>Surname:</th>
                            <td>{{$driver->surname}}</td>
                        </tr>
                        <tr>
                            <th>Username:</th>
                            <td>{{$driver->username}}</td>
                    </tr>
                    <tr>
                            <th>Contact:</th>
                            <td>{{$driver->contact}}</td>
                        </tr>
                        <tr>
                            <th>Reg Date:</th>
                            <td>{{$driver->regDate}}</td>
                    </tr>
                    <tr>
                            <th>Status:</th>
                            <td>{{$driver->status}}</td>
                    </tr>
            </table>
            <div class="py-1 px-1 text-center" >
                <div class="row justify-content-center">
                    
                        <button type="button" class="btn btn-primary">Edit</button>&nbsp
                        {!!Form::open(['action' => ['DriversController@destroy', $driver->id], 'method' => 'POST'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}&nbsp
                        <button type="button" class="btn btn-success">Reset Password</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection