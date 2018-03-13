 @extends('layouts.master')
@section('content')
<div class="card">
                        <div class="card-header bg-light">
                            <strong>Drugs ({{ count( $drugs ) }})</strong>
                            <div class="float-right">
                              <a href="{{ route('drugs.create') }}" class="btn btn-primary btn-sm"> <i class="icon icon-plus"></i> Create New </a>
                              <a href="{{ URL::current() }}" class="btn btn-info btn-sm"> <i class="icon icon-refresh"></i> Refresh </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Dosage Form</th>
                                        <th>Level of care</th>
                                        <th>Strength</th>
                                        <th>Unit of Issue</th>
                                        <th>Cost Per Unit(Ushs)</th>
                                        <th>Package Size</th>
                                        <th colspan="3">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($drugs as $key => $drug)
                                      <tr>
                                          <td>{{ ++$key }}</td>
                                          <td class="text-nowrap">{{ $drug->id  }}</td>
                                          <td class="text-wrap">{{ $drug->name  }}</td>
                                          <td class="text-nowrap">{{ $drug->dosage_form }}</td>
                                          <td class="text-nowrap">{{ $drug->level_of_care }}</td>
                                          <td class="text-nowrap">{{ $drug->strength }}</td>
                                          <td class="text-nowrap">{{ $drug->unit_of_issue }}</td>
                                          <td class="text-nowrap">{{ $drug->cost_per_unit }}</td>
                                          <td class="text-nowrap">{{ $drug->package_size }}</td>
                                          <td class="text-nowrap">
                                            <a href="#" class="btn btn-success btn-sm"> View </a>
                                          </td>
                                          <td>
                                            <a href="#" class="btn btn-primary btn-sm"> Edit</a>
                                          </td>
                                          <td>
                                            <form class="" action="{{action('DrugController@destroy', $drug->id)}}" method="post">
                                              {{csrf_field()}}
                                              <input type="hidden" name="_method" value="DELETE">
                                              <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i> &nbsp;Delete</button>
                                            </form>
                                          </td>
                                          </td>
                                      </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
@endsection
