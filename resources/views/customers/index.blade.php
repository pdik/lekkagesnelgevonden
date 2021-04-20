@extends('layouts.backend')

@section('js_after')
    <!-- Wizard JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/dataTables.buttons.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.print.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.html5.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.flash.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.colvis.js') }}"></script>
    <script src="{{asset('js/pages/be_tables_datatables.js')}}"></script>

@endsection
@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Klanten overzicht</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Pdik</li>
                        <li class="breadcrumb-item">Klanten</li>
                        <li class="breadcrumb-item active" aria-current="page">Overzicht</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Klanten</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option">
                        <i class="si si-settings"></i>
                    </button>
                </div>
            </div>
            <div class="block block-rounded">

                <div class="block-content block-content-full">
                    <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="DataTables_Table_2_length"></div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination dataTable no-footer" id="DataTables_Table_2" role="grid" aria-describedby="DataTables_Table_2_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="text-center sorting_asc" style="width: 80px;" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending">#</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Naam: activate to sort column ascending">Naam</th>
                                        <th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Plaatsnaam: activate to sort column ascending">Plaatsnaam</th>
                                        <th style="width: 15%;" class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="aangemaakt: activate to sort column ascending">aangemaakt op</th>
                                        <th style="width: 15%;" class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Actie: Voer een bepaalde actie uit">Actie</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                  @foreach($customers as $customer)
                                      <tr role="row" class="odd">
                                          <td class="text-center sorting_1">{{ $customer->id }}</td>
                                          <td class="font-w600">{{ $customer->first_name }} {{ $customer->last_name }}</td>

                                          <td class="d-none d-sm-table-cell">
                                              <span class="badge badge-info">{{ $customer->placename }}</span>
                                          </td>
                                          <td>
                                              <em class="text-muted">{{ \Carbon\Carbon::createFromTimeString($customer->created_at)->diffForHumans() }}</em>
                                          </td>
                                          <td>
                                            <div class="btn btn-group">
                                                <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-info">Bewerk</a>
                                                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            </div>
                                          </td>
                                      </tr>
                                  @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
