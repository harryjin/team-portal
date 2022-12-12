@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.skype.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.skypes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.skype.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.skype.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.skype.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.skype.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="liveid">{{ trans('cruds.skype.fields.liveid') }}</label>
                <input class="form-control {{ $errors->has('liveid') ? 'is-invalid' : '' }}" type="text" name="liveid" id="liveid" value="{{ old('liveid', '') }}" required>
                @if($errors->has('liveid'))
                    <span class="text-danger">{{ $errors->first('liveid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.skype.fields.liveid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.skype.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.skype.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.skype.fields.note') }}</label>
                <textarea class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note" id="note">{{ old('note') }}</textarea>
                @if($errors->has('note'))
                    <span class="text-danger">{{ $errors->first('note') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.skype.fields.note_helper') }}</span>
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