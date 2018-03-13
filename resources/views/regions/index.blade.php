@extends('layouts.master')

@section('title', 'NDRMS - All Orders')

@section('content')

      <div class="card border-light">
        <div class="card-header bg-light">
            <strong>REGIONS IN UGANDA ({{ count($regions) }})</strong>
            <div class="float-right">
              <a href="{{ route('regions.create') }}" class="btn btn-primary btn-sm"> <i class="icon icon-plus"></i> Create New </a>
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
                        <th>Districts</th>
                        <th>Health Sub Districts</th>
                        <th>Health Facilities</th>
                        <th class="text-nowrap" colspan="3" >Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($regions as $key => $region)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td class="text-nowrap"> <strong>{{ $region->name }}</strong> </td>
                            <td>{{ count($region->districts) }}</td>
                            <td>{{ count($region->healthSubDistricts) }}</td>
                            <td>
                              @php
                              $totalHealthFacilities = 0;
                              @endphp
                              @foreach($region->healthSubDistricts as $healthSubDistrict)
                                @php
                                  $totalHealthFacilities += count($healthSubDistrict->healthFacilities);
                                @endphp

                              @endforeach
                              {{ $totalHealthFacilities}}
                            </td>
                            <td class="text-nowrap">
                              <a href="#" class="btn btn-success btn-sm"><i class="fa fa-align-center"></i> &nbsp;  View </a>
                            </td>
                            <td>
                              <a href="{{action('RegionController@edit',$region->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-clipboard"></i> &nbsp; Edit</a>
                            </td>
                            <td>

                              <form class="" action="{{action('RegionController@destroy', $region->id)}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i> &nbsp;Delete</button>
                              </form>

                              <!-- <a href="#" class="btn btn-danger btn-sm"> Delete</a> -->
                            </td>
                        </tr>
                      @endforeach

                      @unless($regions)
                        <tr>
                          <td colspan="5"> <h3 class="text-danger">No Regions have been Recorded</h3> </td>
                        </tr>
                      @endunless
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
