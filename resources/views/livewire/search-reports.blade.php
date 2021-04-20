<div>
        <div class="form-group row items-push mb-0">
            <div class="col-sm-6 col-xl-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white">
                                            <i class="fa fa-search"></i>
                                        </span>
                    </div>
                    <input  wire:model="searchTerm" type="text" class="form-control border-left-0" id="dm-projects-search" name="dm-projects-search" placeholder="Zoek rapporten..">
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 offset-xl-6">
                <select class="custom-select" id="dm-projects-filter" name="dm-projects-filter">
                    <option value="all">All (6)</option>
                    <option value="active">Active (3)</option>
                    <option value="pending">Pending (1)</option>
                    <option value="planning">Planning (1)</option>
                    <option value="canceled">Canceled (1)</option>
                </select>
            </div>
        </div>
    <div class="row row-deck">
        @foreach ($reports as $report)
            <?php
            $data = json_decode($report->data);

            ?>
            <div class="col-md-6 col-xl-4">
                <!-- Report {{ $report->id }} -->
                <div class="block block-rounded">
                    <div class="block-header">
                        <div class="flex-fill text-muted font-size-sm font-w600">
                            <i class="fa fa-clock mr-1"></i> {{ \Carbon\Carbon::createFromTimeString($report->created_at)->toDateString() }}
                        </div>
                        <div class="block-options">
                            <div class="dropdown">
                                <button type="button" class="btn-block-option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">

                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-bell mr-1"></i> Opmerkingen
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-check-double mr-1"></i> Werkbonen
                                    </a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="be_pages_projects_edit.html">
                                        <i class="fa fa-fw fa-pencil-alt mr-1"></i> Bewerk raport
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content bg-body-light text-center">
                        <h3 class="font-size-h4 font-w700 mb-1">
                            <a href="{{route('rapport.show', $report->id)}}">{{ $report->customer->first_name }} {{ $report->customer->last_name }}</a>
                        </h3>
                        <h4 class="font-size-h6 text-muted mb-3"></h4>
                        <div class="push">
                            <span class="badge @if($report->status == "send") badge-success @else badge-secondary @endif  text-uppercase font-w700 py-2 px-3">{{ $report->status }}</span>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="row gutters-tiny">
                            <div class="col-6">
                                <a class="btn btn-block btn-alt-primary" href="{{ route('rapport.show',$report) }}">
                                    <i class="fa fa-eye mr-1 opacity-50"></i> {{__('global.view')}}
                                </a>
                            </div>
                            <div class="col-6">
                                <a class="btn btn-block btn-alt-primary" href="javascript:void(0)">
                                    <i class="fa fa-edit mr-1 opacity-50"></i> {{ __('global.downloadFile')}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Project #1 -->
            </div>
        @endforeach
            {{ $reports->links() }}
    </div>
</div>
