@extends('layouts.master')
@section('content')
<div class="card border-light">
  <div class="card-header bg-light">
      <strong>Create New Staff</strong>
      <div class="float-right">
        <a href="{{ route('staffs.index') }}" class="btn btn-primary btn-sm"> <i class="icon icon-eye"></i> View Staffs </a>
        <a href="{{ URL::current() }}" class="btn btn-info btn-sm"> <i class="icon icon-refresh"></i> Refresh </a>
      </div>
  </div>
    <div class="card-body">
      @include('components.notifications')
      {{ Form::open(['method'=>'post','action'=>'StaffController@store'])}}
      <div class="form-group">
        {{ Form::label('name','Full Name') }}
        {{ Form::text('name','',['class'=>'form-control']) }}
      </div>
      <div class="form-group">
        {{ Form::label('gender','Select gender') }}
        {{ Form::select('gender', ['M'=>'Male', 'F'=> 'Female'], 'M', ['class'=>'form-control']) }}
      </div>
      <div class="form-group">
        {{ Form::label('phone','Phone Number') }}
        {{ Form::text('phone','',['class'=>'form-control']) }}
      </div>
      <div class="form-group">
        {{ Form::label('email','Email Address') }}
        {{ Form::email('email','',['class'=>'form-control']) }}
      </div>
      <div class="form-group">
        {{ Form::label('address','Address') }}
        {{ Form::text('address','',['class'=>'form-control']) }}
      </div>
      <div class="form-group">
        {{ Form::label('health_facility','Select Health Facility') }}
        {{ Form::select('health_facility', $healthFacilities, Null, ['class'=>'form-control','placeholder'=> 'Select health facility']) }}
      </div>

      <div class="form-group">
        {{ Form::submit('Submit',['class' => 'btn btn-primary btn-sm']) }}
      </div>
      {{ Form::close() }}

    </div>
  </div>
@endsection
