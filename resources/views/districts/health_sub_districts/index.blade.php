@extends('layouts.master')

@section('title', 'NDRMS - All Orders')

@section('content')

      <div class="card border-light">
        <div class="card-header bg-light">
            <strong>HEALTH SUB DISTRICTS IN UGANDA ({{ count($health_sub_districts) }})</strong>
            <div class="float-right">
              <a href="{{ route('health_sub_districts.create') }}" class="btn btn-primary btn-sm"> <i class="icon icon-plus"></i> Create New</a>
              <a href="{{ URL::current() }}" class="btn btn-warning btn-sm"> <i class="icon icon-refresh"></i> Refresh</a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Health Facilities</th>
                        <th>Population</th>
                        <th>District</th>
                        <th>Region</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($health_sub_districts as $key => $health_sub_district)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td class="text-nowrap">{{ $health_sub_district->name }}</td>
                            <td>{{count ($health_sub_district->healthFacilities)}}</td>
                            <td>{{ number_format($health_sub_district->population) }}</td>
                            <td>{{ $health_sub_district->district->name or 'Not Found' }}</td>
                            <td>{{ $health_sub_district->district->region->name or 'Not Found' }}</td>
                            <td>
                              <a href="#" class="btn btn-success btn-sm"> View </a>
                              <a href="#" class="btn btn-primary btn-sm"> Edit</a>
                              <a href="#" class="btn btn-danger btn-sm"> Delete</a>
                            </td>
                        </tr>
                      @endforeach

                      @unless($health_sub_districts)
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
