@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-10 col-md-10">
                <h1>Edit Driver Details</h1>
            </div>
            <div class="col-sm-2 col-md-2">
                <a href="/drivers"><button type="button" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Go Back</button></a>
        </div>
    </div>
    <div class="card bg-light">

               
                {!!Form::open(['action'=>['DriversController@update', $driver->id], 'method' => 'POST', 'class'=> 'px-5 py-4' ])!!}
                <div class="row justify-content-center">
                    <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                    {!!Form::label('firstname', 'First Name')!!} 
                                    {!!Form::text('firstname', $driver->firstname, ['class'=> 'form-control', 'placeholder' => 'First Name'])!!}
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                    {!!Form::label('surname', 'Surname')!!} 
                                    {!!Form::text('surname', $driver->surname, ['class'=> 'form-control', 'placeholder' => 'Surname'])!!}
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                    {!!Form::label('username', 'Username')!!} 
                                    {!!Form::text('username', $driver->username, ['class'=> 'form-control', 'placeholder' => 'Username'])!!}
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                    {!!Form::label('contact', 'Contact')!!} 
                                    {!!Form::text('contact', $driver->contact, ['class'=> 'form-control', 'placeholder' => 'Contact'])!!}
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                    {{Form::hidden('_method', 'PUT')}}
                                    {!!Form::submit('Submit Changes', ['class'=>'btn btn-primary'])!!}

                                </div> 
                    </div>
                    <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                    {!!Form::label('status', 'Status')!!} 
                                    {!!Form::number('status', $driver->status, ['class'=> 'form-control', 'placeholder' => 'Status'])!!}
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                    {!!Form::label('password', 'Password')!!} 
                                    <br>
                                    <button type="button" class="btn btn-success">Reset Driver Password</button>
                            </div> <!-- form-group// -->
                    </div>


                       
                </div>
                    
                {!!Form::close()!!}   
                
                <div class="px-4 text-right">
                        {!!Form::open(['action' => ['DriversController@destroy', $driver->id], 'method' => 'POST', 'class' => 'form-group'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete Driver', ['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}   
                </div>
            
            </div> <!-- card.// -->
            <!--container end.//-->
    
@endsection