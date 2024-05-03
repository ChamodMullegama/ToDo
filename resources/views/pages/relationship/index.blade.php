@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
             <h1 class="page-title">Relationship page</h1>
        </div>
    </div>
    {{-- 1 to 1 --}}
    {{-- <div class="row justify-content-center">
        @foreach ($products as $product)
           <div class="col-md-4 mt-5">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">{{ $product->name }}</h5>
                  <p class="card-text">{{ $product->intro }}</p>

                  <div class="row">
                    <div class="col-md-12">
                        <div class="card category-box">
                            <div class="card-body">
                                <h4>{{ $product->category->name }}</h4>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
           </div>
        @endforeach
    </div> --}}

    {{-- 1 to many --}}
    {{-- <div class="row justify-content-center">
        @foreach ($categories as $category)
           <div class="col-md-6 mt-5">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">{{ $category->name }}</h5>
                  <div class="row">
                    @foreach ($category->products as $product)
                    <div class="col-md-6 mt-3">
                        <div class="card category-box">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->intro }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
           </div>
        @endforeach
    </div> --}}

   {{-- many to many  product --}}
   {{-- <div class="row justify-content-center">
    @foreach ($products as $product)
       <div class="col-md-6 mt-5">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{ $product->name }}</h5>
              <p class="card-text">{{ $product->intro }}</p>

              <div class="row">
                @foreach ($product->categories as $category)
                <div class="col-md-6">
                    <div class="card category-box">
                        <div class="card-body">
                             <h4>{{ $category->name }}</h4>
                        </div>
                    </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
       </div>
    @endforeach
</div> --}}

   {{-- many to many  category --}}
 {{-- <div class="row justify-content-center">
        @foreach ($categories as $category)
           <div class="col-md-6 mt-5">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">{{ $category->name }}</h5>
                  <div class="row">
                    @foreach ($category->products as $product)
                    <div class="col-md-6 mt-3">
                        <div class="card category-box">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->intro }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
           </div>
        @endforeach
    </div> --}}


    {{-- rewiew --}}
{{-- <div class="row justify-content-center">
    @foreach ($products as $product)
       <div class="col-md-6 mt-5">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{ $product->name }}</h5>
              <p class="card-text">{{ $product->intro }}</p>

              <div class="row">
                @foreach ($product->reviews as $review)
                <div class="col-md-6">
                    <div class="card category-box">
                        <div class="card-body">
                             <h4>{{ $review->comment }}</h4>
                        </div>
                    </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
       </div>
    @endforeach
</div> --}}

 <div class="row justify-content-center">
        @foreach ($categories as $category)
           <div class="col-md-6 mt-5">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">{{ $category->name }}</h5>
                  <div class="row">
                    @foreach ($category->reviews as $review)
                    <div class="col-md-6 mt-3">
                        <div class="card category-box">
                            <div class="card-body">
                                <h4 class="card-title">Product : {{ $review->product->name }}</h4>
                                <p class="card-title">{{ $review->comment }}</p>

                            </div>
                        </div>
                    </div>
                    @endforeach
                  </div>
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
    .category-box{

        background-color: wheat;
    }
</style>
@endpush
