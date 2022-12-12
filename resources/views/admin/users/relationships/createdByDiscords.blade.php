<div class="m-3">
    @can('discord_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.discords.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.discord.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.discord.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-createdByDiscords">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.discord.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.discord.fields.email') }}
                            </th>
                            <th>
                                {{ trans('cruds.discord.fields.note') }}
                            </th>
                            <th>
                                {{ trans('cruds.discord.fields.created_by') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($discords as $key => $discord)
                            <tr data-entry-id="{{ $discord->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $discord->id ?? '' }}
                                </td>
                                <td>
                                    {{ $discord->email ?? '' }}
                                </td>
                                <td>
                                    {{ $discord->note ?? '' }}
                                </td>
                                <td>
                                    {{ $discord->created_by->name ?? '' }}
                                </td>
                                <td>
                                    @can('discord_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.discords.show', $discord->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('discord_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.discords.edit', $discord->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('discord_delete')
                                        <form action="{{ route('admin.discords.destroy', $discord->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('discord_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.discords.massDestroy') }}",
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
  let table = $('.datatable-createdByDiscords:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection