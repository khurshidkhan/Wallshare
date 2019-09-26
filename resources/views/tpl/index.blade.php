@extends('frontend_master')

@section('content')
<div class="container">
        <h2>Insert Good Quality Images</h2>
        <p>The perfect image you deserve!</p>
        {!! Form::open(array('url' => '/upload', 'files' => true)) !!}
          <div class="form-group">
            <label for="usr">Title:</label>
            {!! Form::text('title', '', ['placeholder' => 'Please insert your titile here!', 'class'=>'form-control']) !!}
          </div>
          <div class="form-group ">
            <label for="pwd">Password:</label>
            {!! Form::file('image' , ['class'=>'form-control col-md-3']) !!}
          </div>
            {!! Form::submit('save', ['name' => 'send', 'class' => 'btn btn-success']) !!}
          {!! Form::close() !!}
      </div>
@endsection