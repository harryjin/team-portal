@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.realPc.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.real-pcs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.realPc.fields.id') }}
                        </th>
                        <td>
                            {{ $realPc->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realPc.fields.login') }}
                        </th>
                        <td>
                            {{ $realPc->login }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realPc.fields.password') }}
                        </th>
                        <td>
                            ********
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.real-pcs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection