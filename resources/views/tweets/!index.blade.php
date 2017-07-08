@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <div class="box">
        <link></link>
            <div class="box-body">
            
              {!! Form::open(['method' => 'post', 'route' => 'create-tweet', 'files' =>true]) !!}
                <div class="form-group {{ $errors->has('tweet') ? 'has-error': '' }}">
                            {!! Form::label('Tweet') !!}
                            {!! Form::text('body', null, ['class' => 'form-control']) !!}

                            @if($errors->has('body'))
                                <span class="help-block">{{ $errors->first('body') }}</span>
                            @endif
                </div>
                {!! Form::submit('Create new tweet', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
            </div>
        </div>
            <div class="page-header">
                <h3>All Tweets</h3>
            </div>
            @forelse ($tweets as $tweet)
                <div class="panel panel-default">
                    <div class="panel-heading">
                    
                        
                    </div>

                    <div class="panel-body">
                        <p>{{ $tweet->body }}</p>
                    </div>
                    
                </div>
            @empty
                <p>No Tweets created.</p>
            @endforelse

            
        </div>
    </div>
</div>
@endsection