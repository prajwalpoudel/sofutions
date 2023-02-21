@extends('adminlte::page')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create Company</h3>
            </div>

            {!! Form::model(null, ['route' => ['admin.company.store'], 'method' => 'post', 'class' => '', 'id' => 'company-form', 'files' => true]) !!}
            @include('admin.company.form', ['formAction' => 'Save'])
            {!! Form::close() !!}
        </div>
    </div>
@stop
