<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('name', 'Name :') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
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
                {!! Form::label('logo', 'Logo :') !!}
                <div class="input-group">
                    <div class="custom-file">
                        {!! Form::file('logo', ['class' => 'custom-file-input']) !!}
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('website', 'Website :') !!}
                {!! Form::text('website', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
</div>

<div class="card-footer clearfix">
    <div class="row">
        <div class="col-lg-6">
            <button type="submit" class="btn btn-primary">{{ $formAction }}</button>
            <a href="{{ route('admin.company.index') }}" type="reset" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</div>
