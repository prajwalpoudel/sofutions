@extends('adminlte::page')

@section('content')
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-header">
                <h3 class="card-title">Company Table</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.company.create') }}" class="btn btn-primary btn-block">
                        <i class="fa fa-plus"></i> Create
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 10px">S.N</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Logo</th>
                        <th>Website</th>
                        <th style="width: 40px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($companies as $key => $company)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->logo }}</td>
                            <td>{{ $company->website }}</td>
                            <td>@include('admin.general.action', ['params' => ['route' => 'admin.company', 'id' => $company->id]])</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer clearfix">
                {{ $companies->links() }}
            </div>
        </div>
    </div>
@stop
