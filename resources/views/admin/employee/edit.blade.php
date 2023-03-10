@extends('adminlte::page')
<style>
    .error-feedback {
        display: block;
        width: 100%;
        margin-top: 0.25rem;
        font-size: 80%;
        color: #dc3545;
    }
</style>
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Employee</h3>
            </div>

            {!! Form::model($employee, ['route' => ['admin.employee.update', $employee->id], 'method' => 'put', 'class' => '', 'id' => 'employee-form', 'files' => true]) !!}
            @include('admin.employee.form', ['formAction' => 'Update'])
            {!! Form::close() !!}
        </div>
    </div>
@stop
