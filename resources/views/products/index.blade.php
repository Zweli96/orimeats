@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-10 col-md-10">
            <h1>Products</h1>
        </div>
        <div class="col-sm-2 col-md-2">
            <a href="/products/create"><button type="button" class="btn btn-primary"><i class="fas fa-plus nav-icon"></i> Add New Product</button></a>
        </div>        
    </div>

    @if (count($products) > 0)
    <div class="table-image-container">
        <div class="row">
          <div class="col-12">
              <table class="table table-hover table-image">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td class="w-25">
                                <img src="/storage/img/product_images/{{$product->image}}" class="img-fluid img-thumbnail img-max" alt="Sheep">
                            </td>
                            <td>{{$product->name}}</td>
                          <td>
                            <a href="#"><i class="fas fa-eye text-primary"></i></a>
                          <a href="/products/{{$product->id}}/edit"><i class="fas fa-edit" btn-primary></i></a>
                            {!!Form::open(['action' => ['ProductsController@destroy',  $product->id], 'method' => 'POST', 'class'=>'form-no-space'])!!}
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
          </div>
        </div>
      </div>
    @else
        No Meat In The Fridge
    @endif
@endsection