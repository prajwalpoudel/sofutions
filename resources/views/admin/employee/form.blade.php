<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('first_name', 'First name :') !!}
                {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('last_name', 'Last name :') !!}
                {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('company_id', 'Company :') !!}
                {!!  Form::select('company_id', $companies, null, ['class' => 'form-control select2', 'placeholder' => 'Select Company']); !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('email', 'Email :') !!}
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('phone', 'Phone :') !!}
                {!! Form::text('phone', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
</div>

<div class="card-footer clearfix">
    <div class="row">
        <div class="col-lg-6">
            <button type="submit" class="btn btn-primary">{{ $formAction }}</button>
            <a href="{{ route('admin.employee.index') }}" type="reset" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</div>
