@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
             <h1 class="page-title">Relationship page</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        @foreach ($products as $product)
           <div class="col-md-4 mt-5">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">{{ $product->name }}</h5>
                  <p class="card-text">{{ $product->intro }}</p>
                </div>
              </div>
           </div>
        @endforeach
    </div>
</div>
@endsection

@push('css')

<style>
    .page-title{
        padding-top:50px;
        color: red;
    }
</style>
@endpush
