@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-10 col-md-10">
            <h1>Sales Managers</h1>
        </div>
        <div class="col-sm-2 col-md-2">
            <a href="/salesmanagers/create"><button type="button" class="btn btn-primary"><i class="fas fa-plus nav-icon"></i> New Sales Manager</button></a>
        </div>        
    </div>

    @if (count($salesmanagers) > 0)
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
        @foreach ($salesmanagers as $salesmanager)
                <tr>
                    <th scope="row">{{$salesmanager->id}}</th>
                    <td>{{$salesmanager->firstname}}</td>
                    <td>{{$salesmanager->surname}}</td>
                    <td>{{$salesmanager->username}}</td>
                    <td>{{date("Y-m-d",strtotime($salesmanager->regDate))}}</td>
                    <td>{{$salesmanager->contact}}</td>
                    <td>
                        <a href="/salesmanagers/{{$salesmanager->id}}"><i class="fas fa-eye text-primary"></i></a>
                        <a href="/salesmanagers/{{$salesmanager->id}}/edit"><i class="fas fa-edit" btn-primary></i></a>
                        {!!Form::open(['action' => ['SalesManagersController@destroy', $salesmanager->id], 'method' => 'POST', 'class'=>'form-no-space'])!!}
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
        {{$salesmanagers->links()}}
    @else
         <h3>There Are Currently No Sales Managers</h3>
    @endif
@endsection