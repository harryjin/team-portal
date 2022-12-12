@extends('layouts.admin')
@section('content')
@can('remote_pc_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.remote-pcs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.remotePc.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.remotePc.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-RemotePc">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.remotePc.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.remotePc.fields.type') }}
                        </th>
                        <th>
                            {{ trans('cruds.remotePc.fields.rid') }}
                        </th>
                        <th>
                            {{ trans('cruds.remotePc.fields.login') }}
                        </th>
                        <th>
                            {{ trans('cruds.remotePc.fields.note') }}
                        </th>
                        <th>
                            {{ trans('cruds.remotePc.fields.created_by') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($remotePcs as $key => $remotePc)
                        <tr data-entry-id="{{ $remotePc->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $remotePc->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\RemotePc::TYPE_SELECT[$remotePc->type] ?? '' }}
                            </td>
                            <td>
                                {{ $remotePc->rid ?? '' }}
                            </td>
                            <td>
                                {{ $remotePc->login ?? '' }}
                            </td>
                            <td>
                                {{ $remotePc->note ?? '' }}
                            </td>
                            <td>
                                {{ $remotePc->created_by->name ?? '' }}
                            </td>
                            <td>
                                @can('remote_pc_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.remote-pcs.show', $remotePc->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('remote_pc_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.remote-pcs.edit', $remotePc->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('remote_pc_delete')
                                    <form action="{{ route('admin.remote-pcs.destroy', $remotePc->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('remote_pc_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.remote-pcs.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 50,
  });
  let table = $('.datatable-RemotePc:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection