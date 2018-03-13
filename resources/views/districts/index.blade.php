@extends('layouts.master')

@section('title', 'NDRMS - All Orders')

@section('content')

      <div class="card border-light">
        <div class="card-header bg-light">
            <strong>DSTRICTS IN UGANDA ({{ count($districts) }})</strong>
            <div class="float-right">
              <a href="{{ route('districts.create') }}" class="btn btn-primary btn-sm"> <i class="icon icon-plus"></i> Add New </a>
              <a href="{{ URL::current() }}" class="btn btn-info btn-sm"> <i class="icon icon-refresh"></i> Refresh </a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr class="text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Health Facilities</th>
                        <th>Health Sub-Districts</th>
                        <th>Region</th>
                        <th colspan="3">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($districts as $key => $district)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td class="text-nowrap">{{ $district->name }}</td>
                            <td>{{count($district->healthFacilities)}}</td>
                            <td>{{count ($district->healthSubDistricts) }}</td>
                            <td> <strong class="badge badge-info rounded">{{ $district->region->name or 'Not Found'}}</strong> </td>
                            <td>
                              <a href="#" class="btn btn-success btn-sm"> View </a>
                            </td>
                            <td>
                              <a href="#" class="btn btn-primary btn-sm"> Edit</a>
                            </td>
                            <td>
                            <form class="" action="{{action('DistrictController@destroy', $district->id)}}" method="post">
                              {{csrf_field()}}
                              <input type="hidden" name="_method" value="DELETE">
                              <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i> &nbsp;Delete</button>
                            </form>
                          </td>
                        </tr>
                      @endforeach

                      @unless($districts)
                        <tr>
                          <td colspan="5"> <h3 class="text-danger">No districts have been Recorded</h3> </td>
                        </tr>
                      @endunless
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
