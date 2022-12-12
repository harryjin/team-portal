@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.skype.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.skypes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.skype.fields.id') }}
                        </th>
                        <td>
                            {{ $skype->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.skype.fields.email') }}
                        </th>
                        <td>
                            {{ $skype->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.skype.fields.password') }}
                        </th>
                        <td>
                            ********
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.skype.fields.liveid') }}
                        </th>
                        <td>
                            {{ $skype->liveid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.skype.fields.phone') }}
                        </th>
                        <td>
                            {{ $skype->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.skype.fields.note') }}
                        </th>
                        <td>
                            {{ $skype->note }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.skypes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection