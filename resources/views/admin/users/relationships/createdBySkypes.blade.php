<div class="m-3">
    @can('skype_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.skypes.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.skype.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.skype.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-createdBySkypes">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.skype.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.skype.fields.email') }}
                            </th>
                            <th>
                                {{ trans('cruds.skype.fields.liveid') }}
                            </th>
                            <th>
                                {{ trans('cruds.skype.fields.phone') }}
                            </th>
                            <th>
                                {{ trans('cruds.skype.fields.note') }}
                            </th>
                            <th>
                                {{ trans('cruds.skype.fields.created_by') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($skypes as $key => $skype)
                            <tr data-entry-id="{{ $skype->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $skype->id ?? '' }}
                                </td>
                                <td>
                                    {{ $skype->email ?? '' }}
                                </td>
                                <td>
                                    {{ $skype->liveid ?? '' }}
                                </td>
                                <td>
                                    {{ $skype->phone ?? '' }}
                                </td>
                                <td>
                                    {{ $skype->note ?? '' }}
                                </td>
                                <td>
                                    {{ $skype->created_by->name ?? '' }}
                                </td>
                                <td>
                                    @can('skype_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.skypes.show', $skype->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('skype_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.skypes.edit', $skype->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('skype_delete')
                                        <form action="{{ route('admin.skypes.destroy', $skype->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('skype_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.skypes.massDestroy') }}",
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
  let table = $('.datatable-createdBySkypes:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection