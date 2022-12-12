@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <td>
                            @foreach($user->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#created_by_emails" role="tab" data-toggle="tab">
                {{ trans('cruds.email.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#created_by_real_pcs" role="tab" data-toggle="tab">
                {{ trans('cruds.realPc.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#created_by_remote_pcs" role="tab" data-toggle="tab">
                {{ trans('cruds.remotePc.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#created_by_skypes" role="tab" data-toggle="tab">
                {{ trans('cruds.skype.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#created_by_discords" role="tab" data-toggle="tab">
                {{ trans('cruds.discord.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="created_by_emails">
            @includeIf('admin.users.relationships.createdByEmails', ['emails' => $user->createdByEmails])
        </div>
        <div class="tab-pane" role="tabpanel" id="created_by_real_pcs">
            @includeIf('admin.users.relationships.createdByRealPcs', ['realPcs' => $user->createdByRealPcs])
        </div>
        <div class="tab-pane" role="tabpanel" id="created_by_remote_pcs">
            @includeIf('admin.users.relationships.createdByRemotePcs', ['remotePcs' => $user->createdByRemotePcs])
        </div>
        <div class="tab-pane" role="tabpanel" id="created_by_skypes">
            @includeIf('admin.users.relationships.createdBySkypes', ['skypes' => $user->createdBySkypes])
        </div>
        <div class="tab-pane" role="tabpanel" id="created_by_discords">
            @includeIf('admin.users.relationships.createdByDiscords', ['discords' => $user->createdByDiscords])
        </div>
    </div>
</div>

@endsection