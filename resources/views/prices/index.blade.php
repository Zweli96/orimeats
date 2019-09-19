@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-10 col-md-10">
            <h1>Product Prices</h1>
        </div>
        <div class="col-sm-2 col-md-2">
            <a href="/products/create"><button type="button" class="btn btn-primary"><i class="fas fa-plus nav-icon"></i> Add New Product</button></a>
        </div>        
    </div>
    <div class="card">
      <div class="card-header">
        Search For Products
      </div>
      <div class="card-body">
        <!-- Actual search box -->
        <div class="form-group has-search">
          <span class="fa fa-search form-control-feedback"></span>
          <input type="text" name="search" id="search" class="form-control" placeholder="Search Products">
        </div>
        <div class="table-responsive">
          <h3 align="center">Total Products: <span id="total_records"></span></h3>
                  <table class="table table-hover table-image">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody id="prices_search">
                                     
                  </tbody>
                </table>   
        </div>
      </div>
    </div>

   
@endsection
