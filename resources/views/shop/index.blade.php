@extends('styles.master')

@section('title')

@endsection

@section('content')

 @foreach($products->chunk(3) as $product)
 <div class="row mb-2 mt-2">
     @foreach($product as $data)
      <div class="col-sm-6 col-md-4">
        <div class="card">
        <div class="thumbnail">
        <img src=" {{$data->imagePath}} " class="img-fluid img-thumbnail" alt="...">
        <div class="caption">
         <h3> {{$data->title}} </h3>
         <p> {{$data->description}} </p>
        </div>
        <div> 
          <div ><p class="price"> {{$data->price}} </p> </div>
          <a href="" class="btn btn-success mr-1" role="button">Add To Cart</a> 
        </div>
        </div>
        </div>
      </div>
     @endforeach
 </div>
 @endforeach


@endsection