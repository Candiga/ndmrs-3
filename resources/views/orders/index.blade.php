@extends('layouts.master')

@section('title', 'NDRMS - All Orders')

@section('content')
<div class="card">
    <div class="card-header bg-light">
        Normal Table
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Order No.</th>
                    <th>From</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td class="text-nowrap">Calamine lotion 60ml</td>
                    <td>31589</td>
                    <td>800</td>
                    <td>5</td>
                    <td> <button type="button" name="button" class="btn btn-danger btn-sm">Pending...</button> </td>
                    <td>
                      <button class="btn btn-primary btn-sm">View</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td class="text-nowrap">Doxycycline caps</td>
                    <td>99542</td>
                    <td>750</td>
                    <td>3</td>
                    <td> <button type="button" name="button" class="btn btn-success btn-sm">Processed</button> </td>
                    <td>
                      <button class="btn btn-primary btn-sm">View</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td class="text-nowrap">Chlorpheniramine Maleate tabs 4mg</td>
                    <td>62220</td>
                    <td>1200</td>
                    <td>0</td>
                    <td> <button type="button" name="button" class="btn btn-danger btn-sm">Pending...</button> </td>
                    <td>
                      <button class="btn btn-primary btn-sm">View</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td class="text-nowrap">Diclofenac Tabs 50mg</td>
                    <td>50000</td>
                    <td>650</td>
                    <td>5</td>
                    <td> <button type="button" name="button" class="btn btn-success btn-sm">Processed</button></td>
                    <td>
                      <button class="btn btn-primary btn-sm">View</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
                <tr class="bg-danger">
                    <td>5</td>
                    <td class="text-nowrap">Paracetamol tabs 500mg</td>
                    <td>31589</td>
                    <td>400</td>
                    <td>7</td>
                    <td> <button type="button" name="button" class="btn btn-default btn-sm">Declined.</button> </td>
                    <td>
                      <button class="btn btn-primary btn-sm">View</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
