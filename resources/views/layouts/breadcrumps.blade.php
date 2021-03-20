   <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2"> @foreach ($breadcrumbs as $breadcrumb) @if($loop->last) {{ __('breadcrumbs.'. $breadcrumb->title) }} @endif  @endforeach</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                           @if (count($breadcrumbs))
                                   @foreach ($breadcrumbs as $breadcrumb)
                                        @if ($breadcrumb->url && !$loop->last)
                                               <li class="breadcrumb-item" href="{{ $breadcrumb->url }}">{{ __('breadcrumbs.'. $breadcrumb->title) }}</li>
                                               @else
                                               <li class="breadcrumb-item active" aria-current="page">{{ __('breadcrumbs.'. $breadcrumb->title) }}</li>
                                            @endif
                               @endforeach
                        @endif
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->
