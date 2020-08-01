@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.region.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Region">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.region.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.region.fields.denj') }}
                        </th>
                        <th>
                            {{ trans('cruds.region.fields.fsj') }}
                        </th>
                        <th>
                            {{ trans('cruds.region.fields.mnemonic') }}
                        </th>
                        <th>
                            {{ trans('cruds.region.fields.zona') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($regions as $key => $region)
                        <tr data-entry-id="{{ $region->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $region->id ?? '' }}
                            </td>
                            <td>
                                {{ $region->denj ?? '' }}
                            </td>
                            <td>
                                {{ $region->fsj ?? '' }}
                            </td>
                            <td>
                                {{ $region->mnemonic ?? '' }}
                            </td>
                            <td>
                                {{ $region->zona ?? '' }}
                            </td>
                            <td>
                                @can('region_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.regions.show', $region->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('region_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.regions.edit', $region->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('region_delete')
                                    <form action="{{ route('admin.regions.destroy', $region->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('region_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.regions.massDestroy') }}",
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
    pageLength: 100,
  });
  let table = $('.datatable-Region:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection