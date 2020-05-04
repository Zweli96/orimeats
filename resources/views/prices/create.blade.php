@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-10 col-md-10">
                <h1>New Product</h1>
            </div>
            <div class="col-sm-2 col-md-2">
                <a href="/products"><button type="button" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Go Back</button></a>
        </div>
    </div>
    <div class="card bg-light">

               
                {!!Form::open(['action'=>'ProductsController@store', 'method' => 'POST', 'class'=> 'px-5 py-4', 'enctype'=>'multipart/form-data'])!!}
                <div class="row justify-content-center">
                    <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                    {!!Form::label('name', 'Product Name')!!} 
                                    {!!Form::text('name', '', ['class'=> 'form-control', 'placeholder' => 'Product Name'])!!}
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                    {!!Form::submit('Submit', ['class'=>'btn btn-primary'])!!}
                            </div> 
                    </div>
                    <div class="col-md-6 col-sm-6">
                            <div class="form-group-no-space"> {!!Form::label('image', 'Select Product Image')!!}</div>
                            <div class="form-group custom-file">
                                {{Form::file('image',['class'=>'custom-file-input', 'id'=>'inputGroupFile02'])}}
                                <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                            </div> <!-- form-group// -->
                    </div>
                       
                </div>
                    
                {!!Form::close()!!}                                                             
            
            </div> <!-- card.// -->
            <!--container end.//-->
            
    
@endsection

