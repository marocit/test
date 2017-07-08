@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <links></links>
        
            <div class="page-header">
                <h3>All Links</h3>
            </div>
            @forelse ($links as $link)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if( $link ? $link->cover : '' )
                        
                            <img src=" {{ $link->cover }} " class="img-responsive" alt="Responsive image">
                        @endif
                        
                    </div>

                    <div class="panel-body">
                        <h2><a href="{{$link->url}}">{{ $link->title }}</a></h2>
                        <p>{{ $link->description }}</p>
                        
                    </div>
                    <div class="panel-footer">
                        {{$link->url}}
                    </div>
                </div>
            @empty
                <p>No post created.</p>
            @endforelse

            
        </div>
    </div>
</div>

@endsection