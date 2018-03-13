@extends('layouts.master')

@section('title', 'NDRMS - All Orders')

@section('content')

      <div class="card border-info">
        <div class="card-header bg-light">
            <strong>Health Facilities ({{ count($health_facilities) }})</strong>
            <div class="float-right">
              <a href="{{ route('health_facilities.create') }}" class="btn btn-primary btn-sm"> <i class="icon icon-plus"></i> Create New </a>
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
                        <th>Level</th>
                        <th>Phone</th>
                        <th>HSD</th>
                        <th>District</th>
                        <th>Region</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($health_facilities as $key => $health_facility)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td class="text-nowrap">{{ $health_facility->name }}</td>
                            <td> <strong>{{ $health_facility->level }}</strong> </td>
                            <td>{{ $health_facility->phone }}</td>
                            <td>{{ $health_facility->healthSubDistrict['name'] or 'Not Found' }}</td>
                            <td>{{ $health_facility->healthSubDistrict->district->name or 'Not Found' }}</td>
                            <td>{{ $health_facility->healthSubDistrict->district->region->name or 'Not Found' }}</td>
                            <td>
                              <a href="#" class="btn btn-success btn-sm"> View </a>
                              <a href="#" class="btn btn-primary btn-sm"> Edit</a>
                              <a href="#" class="btn btn-danger btn-sm"> Delete</a>
                            </td>
                        </tr>
                      @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
