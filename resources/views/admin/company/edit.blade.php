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
                <h3 class="card-title">Edit Company</h3>
            </div>

            {!! Form::model($company, ['route' => ['admin.company.update', $company->id], 'method' => 'put', 'class' => '', 'id' => 'company-form', 'files' => true]) !!}
            @include('admin.company.form', ['formAction' => 'Update'])
            {!! Form::close() !!}
        </div>
    </div>
@stop
