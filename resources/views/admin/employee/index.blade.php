@extends('adminlte::page')

@section('content')
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-header">
                <h3 class="card-title">Employee Table</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.employee.create') }}" class="btn btn-primary btn-block">
                        <i class="fa fa-plus"></i> Create
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                    <tr>
                        <th style="width: 10px">S.N</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Company</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th style="width: 40px">Action</th>
                    </tr>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $key => $employee)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $employee->first_name }}</td>
                            <td>{{ $employee->last_name }}</td>
                            <td>{{$employee->company->name ?? null}}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>@include('admin.general.action', ['params' => ['route' => 'admin.employee', 'id' => $employee->id]])</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer clearfix">
                {{ $employees->links() }}
            </div>
        </div>
    </div>
@stop
