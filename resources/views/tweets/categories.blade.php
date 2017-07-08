@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <categories categoryid={{$categoryId}} categoryname={{$categoryName}}></categories>
            
         

            
        </div>
        <div class="col-md-4">
            @include('layouts.sidebar')
        </div>
        
    </div>
</div>
@endsection