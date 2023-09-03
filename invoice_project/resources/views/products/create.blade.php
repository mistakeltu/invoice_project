{{-- CREATE PRODUCT FORM --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Create Product</h1>
                </div>
                <div class="card-body">
                    <form action={{route('products-store')}} method="post">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="mb-3">
                                        <label class="form-label">Product name</label>
                                        <input type="text" class="form-control" placeholder="product name"
                                            name="name">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Product price</label>
                                        <input type="text" class="form-control" placeholder="product price" name="price">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Product description</label>
                                    <textarea class="form-control" rows="3" placeholder="description" name="description"></textarea>
                                  </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-outline-primary">Create Product</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection