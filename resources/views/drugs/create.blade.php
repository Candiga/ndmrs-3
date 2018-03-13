@extends('layouts.master')
@section('content')

<div class="card">
    <div class="card-header bg-light">
        <strong>Create New Drug</strong>
        <div class="float-right">
          <a href="{{ route('drugs.index') }}" class="btn btn-primary btn-sm"> <i class="icon icon-eye"></i> View All </a>
          <a href="{{ URL::current() }}" class="btn btn-info btn-sm"> <i class="icon icon-refresh"></i> Refresh </a>
        </div>
    </div>

    <div class="card-body">
      @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>

      @endif
      <form class="" action="{{ route( 'drugs.store' ) }}" method="post">
          {{ csrf_field() }}
        <div class="row">

            <div class="col-md-6">

                <label>Drug Name</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Drug Name" name="drug_name">
                    <!-- @if ($errors->has('drug_name'))
                      <strong class="text-danger">
                        {{ $errors->first('drug_name') }}
                      </strong>
                    @endif -->
                </div>
                <div>
                  @if ($errors->has('drug_name'))
                    <strong class="text-danger">
                      {{ $errors->first('drug_name') }}
                    </strong>
                  @endif
                </div>
                <label>Dosage Form</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Dosage Form" name="dosage_form">
                    <!-- @if ($errors->has('dosage_form'))
                      <strong class="text-danger">
                        {{ $errors->first('dosage_form') }}
                      </strong>
                    @endif -->
                </div>
                <div>
                  @if ($errors->has('dosage_form'))
                    <strong class="text-danger">
                      {{ $errors->first('dosage_form') }}
                    </strong>
                  @endif
                </div>
                <label>Level Of Care</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Level Of Care" name="level_of_care">
                </div>
                <div>
                  @if ($errors->has('level_of_care'))
                    <strong class="text-danger">
                      {{ $errors->first('level_of_care') }}
                    </strong>
                  @endif
                </div>
                <label>Strength</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Strength" aria-describedby="basic-addon2" name="strength">
                </div>
                <div>
                  @if ($errors->has('strength'))
                    <strong class="text-danger">
                      {{ $errors->first('strength') }}
                    </strong>
                  @endif
                </div>
            </div>

            <div class="col-md-6">
                <label>Unit Of Issue</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Unit Of Issue" name="unit_of_issue">
                </div>
                <div>
                  @if ($errors->has('unit_of_issue'))
                    <strong class="text-danger">
                      {{ $errors->first('unit_of_issue') }}
                    </strong>
                  @endif
                </div>
                <label>Package Size</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Package Size" aria-describedby="sizing-addon2" name="package_size">
                </div>
                <div>
                  @if ($errors->has('package_size'))
                    <strong class="text-danger">
                      {{ $errors->first('package_size') }}
                    </strong>
                  @endif
                </div>
                <label>Cost Per Unit</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cost Per Unit" aria-describedby="sizing-addon1" name="cost_per_unit">
                </div>
                <div>
                  @if ($errors->has('cost_per_unit'))
                    <strong class="text-danger">
                      {{ $errors->first('cost_per_unit') }}
                    </strong>
                  @endif
                </div>
            </div>

        </div>
        <div>
          <button class="btn btn-success">Create New</button>
        </div>
        </form>


      </div>
  </div>
@endsection
