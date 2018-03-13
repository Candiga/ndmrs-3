@extends('layouts.master')

@section('title', 'NDRMS - All Orders')

@section('content')

        <div class="card">
            <div class="card-header bg-light">
                <strong>Create New Health Facility</strong>
                <div class="float-right">
                  <a href="{{ route('health_facilities.index') }}" class="btn btn-primary btn-sm"> <i class="icon icon-eye"></i> View All </a>
                  <a href="{{ URL::current() }}" class="btn btn-info btn-sm"> <i class="icon icon-refresh"></i> Refresh </a>
                </div>
            </div>

            <div class="card-body">

              @if( session('success') )
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
              @endif


              @if( session('error') )
                <div class="alert alert-danger">
                  {{ session('error') }}
                </div>
              @endif

              {{ Form::open([ 'route' => 'health_facilities.store', 'class' => 'form-horizontal']) }}
                <div class="row">
                    <div class="col-md-6">
                        {{ Form::label('name', 'Name') }}
                        {{ Form::text('name', '', ['class' => 'form-control'] ) }}

                        @if( $errors->has('name'))
                          <div class="text-danger">
                            {{ $errors->first('name') }}
                          </div>
                        @endif
                    </div>

                    <div class="col-md-6">
                        {{ Form::label('level', 'Level') }}
                        {{ Form::select('level', [
                                                  'Referral' => 'Referral',
                                                  'Hospital' => 'Hospital',
                                                  'health_center_II' => 'Health Center II',
                                                  'health_center_III' => 'Health Center III',
                                                  'health_center_IV' => 'Health Center IV',
                                                  ], null, ['class' => 'form-control', 'placeholder' => 'Select a level...']) }}

                        @if( $errors->has('level'))
                          <div class="text-danger">
                            {{ $errors->first('level') }}
                          </div>
                        @endif
                    </div>

                    <div class="col-md-6">
                      {{ Form::label('health_sub_district', 'Health Sub-District') }}
                      {{ Form::select('health_sub_district', $health_sub_districts, '', ['class' => 'form-control', 'placeholder' => 'Select a Health Sub-District...']) }}

                      @if( $errors->has('health_sub_district'))
                        <div class="text-danger">
                          {{ $errors->first('health_sub_district') }}
                        </div>
                      @endif

                    </div>

                    <div class="col-md-6">
                      {{ Form::label('phone', 'Phone') }}
                      {{ Form::text('phone', '', ['class' => 'form-control']) }}

                      @if( $errors->has('phone'))
                        <div class="text-danger">
                          {{ $errors->first('phone') }}
                        </div>
                      @endif

                    </div>
                </div>
                <div class="my-4">
                  {{ Form::submit('Create New', ['class' => 'btn btn-primary btn-sm']) }}
                </div>
              {{ Form::close() }}
            </div>
        </div>


@endsection
