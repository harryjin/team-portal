@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.remotePc.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.remote-pcs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.remotePc.fields.id') }}
                        </th>
                        <td>
                            {{ $remotePc->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.remotePc.fields.rid') }}
                        </th>
                        <td>
                            {{ $remotePc->rid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.remotePc.fields.rpassword') }}
                        </th>
                        <td>
                            ********
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.remotePc.fields.login') }}
                        </th>
                        <td>
                            {{ $remotePc->login }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.remotePc.fields.lpassword') }}
                        </th>
                        <td>
                            ********
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.remotePc.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\RemotePc::TYPE_SELECT[$remotePc->type] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.remote-pcs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection