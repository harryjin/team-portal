@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.realPc.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.real-pcs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="login">{{ trans('cruds.realPc.fields.login') }}</label>
                <input class="form-control {{ $errors->has('login') ? 'is-invalid' : '' }}" type="text" name="login" id="login" value="{{ old('login', '') }}" required>
                @if($errors->has('login'))
                    <span class="text-danger">{{ $errors->first('login') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.realPc.fields.login_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.realPc.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.realPc.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection