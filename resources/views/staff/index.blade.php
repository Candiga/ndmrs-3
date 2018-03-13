@extends('layouts.master')

@section('title', 'NDRMS - All Orders')

@section('content')

      <div class="card border-light">
        <div class="card-header bg-light">
            <strong>STAFFS IN UGANDA ({{ count($staffs) }})</strong>
            <div class="float-right">
              <a href="{{ route('staffs.create') }}" class="btn btn-primary btn-sm"> <i class="icon icon-plus"></i> Create New </a>
              <a href="{{ URL::current() }}" class="btn btn-info btn-sm"> <i class="icon icon-refresh"></i> Refresh </a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr class="text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Health Facility</th>
                        <th>Level</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th class="text-nowrap" colspan="3" >Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($staffs as $key => $staff)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td class="text-nowrap"> <strong>{{ $staff->name }}</strong> </td>
                            <td>{{ $staff->healthFacility->name }}</td>
                            <td>{{ $staff->healthFacility->level }}</td>
                            <td>{{ $staff->phone }}</td>
                            <td>{{ $staff->email }}</td>
                            <td class="text-nowrap">
                              <a href="#" class="btn btn-success btn-sm"><i class="fa fa-align-center"></i> &nbsp;  View </a>
                            </td>
                            <td>

                              <form class="" action="{{action('StaffController@destroy', $staff->id)}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i> &nbsp;Delete</button>
                              </form>

                              <!-- <a href="#" class="btn btn-danger btn-sm"> Delete</a> -->
                            </td>
                        </tr>
                      @endforeach

                      @unless($staffs)
                        <tr>
                          <td colspan="5"> <h3 class="text-danger">No staffs have been Recorded</h3> </td>
                        </tr>
                      @endunless
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
