@extends('layouts.master')

@section('title', 'NDRMS - All Orders')

@section('content')

      <div class="card">
        <div class="card-header bg-light">
            <strong>Referral Health Facilities ({{ count($referrals) }})</strong>
            <div class="float-right">
              <a href="{{ route('health_facilities.create') }}" class="btn btn-primary btn-sm"> <i class="icon icon-plus"></i> Create New </a>
              <a href="{{ URL::current() }}" class="btn btn-info btn-sm"> <i class="icon icon-refresh"></i> Refresh </a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>District</th>
                        <th>HSD</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($referrals as $key => $referral)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td class="text-nowrap">{{ $referral->name }}</td>
                            <td>{{ $referral->level }}</td>
                            <td>{{ $referral->health_sub_district }}</td>
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
