@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.remotePc.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.remote-pcs.update", [$remotePc->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.remotePc.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type" required>
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\RemotePc::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', $remotePc->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.remotePc.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="rid">{{ trans('cruds.remotePc.fields.rid') }}</label>
                <input class="form-control {{ $errors->has('rid') ? 'is-invalid' : '' }}" type="text" name="rid" id="rid" value="{{ old('rid', $remotePc->rid) }}" required>
                @if($errors->has('rid'))
                    <span class="text-danger">{{ $errors->first('rid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.remotePc.fields.rid_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="rpassword">{{ trans('cruds.remotePc.fields.rpassword') }}</label>
                <input class="form-control {{ $errors->has('rpassword') ? 'is-invalid' : '' }}" type="password" name="rpassword" id="rpassword">
                @if($errors->has('rpassword'))
                    <span class="text-danger">{{ $errors->first('rpassword') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.remotePc.fields.rpassword_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="login">{{ trans('cruds.remotePc.fields.login') }}</label>
                <input class="form-control {{ $errors->has('login') ? 'is-invalid' : '' }}" type="text" name="login" id="login" value="{{ old('login', $remotePc->login) }}">
                @if($errors->has('login'))
                    <span class="text-danger">{{ $errors->first('login') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.remotePc.fields.login_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lpassword">{{ trans('cruds.remotePc.fields.lpassword') }}</label>
                <input class="form-control {{ $errors->has('lpassword') ? 'is-invalid' : '' }}" type="password" name="lpassword" id="lpassword">
                @if($errors->has('lpassword'))
                    <span class="text-danger">{{ $errors->first('lpassword') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.remotePc.fields.lpassword_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.remotePc.fields.note') }}</label>
                <textarea class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note" id="note">{{ old('note', $remotePc->note) }}</textarea>
                @if($errors->has('note'))
                    <span class="text-danger">{{ $errors->first('note') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.remotePc.fields.note_helper') }}</span>
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