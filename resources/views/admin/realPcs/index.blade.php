@extends('layouts.admin')
@section('content')
@can('real_pc_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.real-pcs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.realPc.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.realPc.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-RealPc">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.realPc.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.realPc.fields.login') }}
                        </th>
                        <th>
                            {{ trans('cruds.realPc.fields.password') }}
                        </th>
                        <th>
                            {{ trans('cruds.realPc.fields.created_by') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($realPcs as $key => $realPc)
                        <tr data-entry-id="{{ $realPc->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $realPc->id ?? '' }}
                            </td>
                            <td>
                                {{ $realPc->login ?? '' }}
                            </td>
                            <td>
                                <div class="input-group input-group-sm">
                                    <input type="password" class="form-control no-border" readonly value="{{ $realPc->password ?? '' }}">
                                    <span class="input-group-append">
                                        <button type="button" class="btn btn-info btn-flat pass-trigger">Show</button>
                                    </span>
                                </div>
                            </td>
                            <td>
                                {{ $realPc->created_by->name ?? '' }}
                            </td>
                            <td>
                                @can('real_pc_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.real-pcs.show', $realPc->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('real_pc_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.real-pcs.edit', $realPc->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('real_pc_delete')
                                    <form action="{{ route('admin.real-pcs.destroy', $realPc->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('real_pc_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.real-pcs.massDestroy') }}",
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
    pageLength: 25,
  });
  let table = $('.datatable-RealPc:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  $('.pass-trigger').click(function() {
    if ($(this).parent().prev().attr("type")=="password"){
        $(this).parent().prev().attr("type", "text");
        $(this).html("Hide");
    } else {
        $(this).parent().prev().attr("type", "password");
        $(this).html("Show");        
    }
  });
})

</script>
@endsection