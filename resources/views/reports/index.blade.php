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

    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Rapporten</h3>
                <a href="{{route('rapport.create')}}"  class="btn btn-success">
              Nieuw rapport
                </a>
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
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Naam: activate to sort column ascending">Klant</th>
                                           <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Plaatsnaam: activate to sort column ascending">Plaatsnaam</th>
                                        <th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Report status: activate to sort column ascending">Status</th>
                                        <th style="width: 15%;" class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="aangemaakt: activate to sort column ascending">aangemaakt op</th>
                                         <th style="width: 15%;" class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Created by: activate to sort column ascending">aangemaakt door</th>
                                        <th style="width: 15%;" class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Actie: Voer een bepaalde actie uit">Actie</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($reports as $report)
                                        <tr role="row" class="odd">
                                            <td class="text-center sorting_1" style="width: 10px;">{{ $report->id }}</td>
                                            <td class="font-w600 w-25">{{ $report->customer->first_name }} {{ $report->customer->last_name }}</td>
                                            <td class="font-w600 ">{{ $report->customer->placename }} {{ $report->customer->adres }}</td>
                                            <td class="d-none d-sm-table-cell">
                                                @if($report->status == "1")
                                                    <span class="badge badge-info">{{__('global.created')}}</span>
                                                @elseif($report->status == "2")
                                                    <span class="badge badge-success">{{__('global.Sended')}}</span>
                                                @elseif($report->status == "3")
                                                    <span class="badge badge-success">{{__('global.Readed')}}</span>
                                                @endif

                                            </td>
                                            <td>
                                                <em class="text-muted">{{ \Carbon\Carbon::createFromTimeString($report->created_at)->locale('nl')->diffForHumans() }}</em>
                                            </td>
                                            <td>
                                                {{ dd($report->user()) }}
                                            </td>
                                            <td>
                                                <div class="btn btn-group">
                                                    <a href="{{ route('rapport.edit', $report->id) }}" class="btn btn-info">Bewerk</a>
                                                    <form action="{{ route('rapport.destroy', $report->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
