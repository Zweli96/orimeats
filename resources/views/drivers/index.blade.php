@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-10 col-md-10">
            <h1>Drivers</h1>
        </div>
        <div class="col-sm-2 col-md-2">
            <a href="/drivers/create"><button type="button" class="btn btn-primary"><i class="fas fa-plus nav-icon"></i> New Driver</button></a>
        </div>        
    </div>

    @if (count($drivers) > 0)
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Username</th>
                <th scope="col">Reg Date</th>
                <th scope="col">Contact</th>
                <th scope="col">Actions</th>

            </tr>
        </thead>
        <tbody>
        @foreach ($drivers as $driver)
                <tr>
                    <th scope="row">{{$driver->id}}</th>
                    <td>{{$driver->firstname}}</td>
                    <td>{{$driver->surname}}</td>
                    <td>{{$driver->username}}</td>
                    <td>{{date("Y-m-d",strtotime($driver->regDate))}}</td>
                    <td>{{$driver->contact}}</td>
                    <td>
                        <a href="/drivers/{{$driver->id}}"><i class="fas fa-eye text-primary"></i></a>
                        <a href="/drivers/{{$driver->id}}/edit"><i class="fas fa-edit" btn-primary></i></a>
                        {!!Form::open(['action' => ['DriversController@destroy', $driver->id], 'method' => 'POST', 'class'=>'form-no-space'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        <button type="submit" id="completed-task" class="fabutton">
                                <i class="fas fa-trash-alt text-danger"></i>
                        </button>
                        {!!Form::close()!!}&nbsp
                        
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table> 
        {{$drivers->links()}}
    @else
         <h3>There Are Currently No Drivers</h3>
    @endif
@endsection