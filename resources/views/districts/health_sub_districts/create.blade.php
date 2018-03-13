@extends('layouts.master')

@section('title', 'NDRMS - Create New Health Sub District')

@section('content')

        <div class="card">
            <div class="card-header bg-light">
                <strong>Create New Health Sub-District</strong>
                <div class="float-right">
                  <a href="{{ route('health_sub_districts.index') }}" class="btn btn-primary btn-sm"> <i class="icon icon-eye"></i> View All</a>
                  <a href="{{ URL::current() }}" class="btn btn-primary btn-sm"> <i class="icon icon-refresh"></i> Refresh</a>
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

              {{ Form::open([ 'route' => 'health_sub_districts.store', 'class' => 'form-horizontal']) }}
                <div class="row">
                    <div class="col-md-4">
                        {{ Form::label('name', 'Name') }}
                        {{ Form::text('name', '', ['class' => 'form-control'] ) }}

                        @if( $errors->has('name'))
                          <div class="text-danger">
                            {{ $errors->first('name') }}
                          </div>
                        @endif
                    </div>

                    <div class="col-md-4">
                        {{ Form::label('district', 'District') }}
                        {{ Form::select('district', $districts, null, ['class' => 'form-control', 'placeholder' => 'Select a District...']) }}

                        @if( $errors->has('district'))
                          <div class="text-danger">
                            {{ $errors->first('district') }}
                          </div>
                        @endif
                    </div>

                    <div class="col-md-4">
                        {{ Form::label('population', 'Population') }}
                        {{ Form::number('population', '', ['class' => 'form-control'] ) }}

                        @if( $errors->has('population'))
                          <div class="text-danger">
                            {{ $errors->first('population') }}
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
