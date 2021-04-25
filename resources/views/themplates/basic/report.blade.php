<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ setting()->get('app_name') . ' ' .  __('global.report') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style type="text/css">
    .Portfolio {
        position: relative;
        margin: 5px;
        border: 2px solid black;
        float: left;
        width: 180px;
        transition-duration: 0.4s;
        border-radius: 5px;
        animation: winanim 0.5s ;
        -webkit-backface-visibility:visible;
        backface-visibility:visible;
        box-shadow:0 3px 5px -1px rgba(0,0,0,.2),0 5px 8px 0 rgba(0,0,0,.14),0 1px 14px 0 rgba(0,0,0,.12)
    }

    .Portfolio:hover {
        box-shadow: 0 12px 16px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
    }

    .Portfolio img {
        width: 100%;
        height: auto;
        border-radius: 5px
    }

    .desc {
        padding: 5px;
        text-align: center;
        font-size: 90%;
        background:black;
        color:{{ setting()->get('rapport_headercolor') }};
    }

        table,td {
            border: solid 1px #D8D8D8;
        }
        .center-cropped {
            object-fit: none; /* Do not scale the image */
            object-position: center; /* Center the image within the element */
            height: 250px;
            width: 250px;
        }

        td#naam{
            border: 2px solid #D8D8D8;
            background-color:#D8D8D8;
        }
        td#bevinding{
            border: 1px solid #D8D8D8;

        }

        .wrapper{
            width: 1000px;
        }

        .photo{
            width: 500px;
        }
        .center-cropped {
            object-fit: none; /* Do not scale the image */
            object-position: center; /* Center the image within the element */
            height: 500px;
            width: 500px;
        }


        div{ box-sizing: border-box; }
        .page-break {
            page-break-after: always;
        }
        /** Define the header rules **/
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
        }

        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
        }
        @page {
            margin: 0; }
        .pages {

            margin: .5in;
        }
        .first-page {
            margin: 0in;

            height: 100%;
            width: 100%;
            position:absolute;
        }
        .first-page + * {
            page-break-before: always;
        }
        .coversheet {
            background-image: url({{ public_path().'/storage/'.setting()->get('report_coversheet')  }});
            background-position: top left;
            background-repeat: no-repeat;
            background-size: 100%;
            padding: 300px 100px 10px 100px;
            width:100%;
            height:100%;
        }
     #gridview {
           text-align:center;
        }

    div.image {
        margin: 10px;
        display: inline-block;
    }

    div.image img {
        width: 100%;
        height: auto;
        border: 1px solid #ccc;
    }

    div.image img:hover {
        box-shadow: 0 5px 5px 0 rgba(0,0,0,0.32), 0 0 0 0px rgba(0,0,0,0.16);
    }

   .row {
      display: flex;
      flex-wrap: wrap;
      padding: 0 4px;
    }

    /* Create four equal columns that sits next to each other */
    .column {
      flex: 25%;
      max-width: 25%;
      padding: 0 4px;
    }

    .column img {
      margin-top: 8px;
      vertical-align: middle;
      width: 100%;
    }


    </style>
</head>
<body>
<div class="pages first-page coversheet"></div>
<div class="pages">
    <header style="alignment: center;">
        <table style="width: 800px; border: none; text-align: center; font-family: Helvetica; font-weight: bold;">
            <tr style="border: none;">
                <td width="100px" style="border: none;">
                    {{ now()->format("d M Y")}}
                </td>
                <td  style="border: none;">
                    <img width="20px"src="{{ public_path().'/storage/'.setting()->get('logo')  }}">
                    {{setting()->get('app_name')}}
                </td>
                <td  style="border: none;">
                    {{setting()->get('app_name')}} {{__('global.report')}}
                </td>
            </tr>
        </table>
    </header>
    <h2 style="color:{{ setting()->get('rapport_headercolor') }} ;text-align: center; font-family: 'IBM Plex Mono SemiBold'">Meettechnisch- & Diagnostisch onderzoek</h2>
    <table  cellspacing="3" cellpadding="4" width="700px">
        <tr>
            <td colspan="2">Rapport Nr. {{ $data->id }}</td>
            <td>Datum {{ $data->created_at->format("d-m-Y") }}</td>
        </tr>
        <tr><td color="#6E6E6E" colspan="3"><span color="#e86c00">Meettechnicus : </span>{{ $data->user->name }}</td></tr>
        <tr>
            <td bgcolor="#D8D8D8">Datum uitvoering</td>
            <td  align="left" colspan="2">{{ $data->created_at->format("d-m-Y")}}</td>
        </tr>
        <tr>
            <td bgcolor="#D8D8D8">Opdracht gever</td>
            <td align="left" colspan="2" >{{ $data->customer->first_name }} {{ $data->customer->last_name }}</td>
        </tr>
        <tr>
            <td bgcolor="#D8D8D8">Meet (Adres)</td>
            <td  colspan="2" >{{ $data->customer->adres }}</td>

        </tr>
        <tr>
            <td bgcolor="#D8D8D8">Postcode en plaatsnaam</td>
            <td colspan="2">{{ $data->customer->placename }}</td>
        </tr>
        @foreach($data->customer->detials as $contact)
            <tr>
                <td bgcolor="#D8D8D8">{{   @trans('global.detials.'.$contact->options->title.'')}}</td>
                <td colspan="2">{{ $contact->data }}</td>
            </tr>
        @endforeach
    </table>
    <div style="max-height: 400px; overflow: hidden">
        <h3>{{__('global.report.reason')}}</h3>
        <div>
            {!! $data->data !!}
        </div>
    </div>
    {{--    Schade foto's--}}
     <div class="container-fluid" style="margin-top:20px;">
            <h1 style="text-align:center;color: {{ setting()->get('rapport_headercolor') }};">Schade foto's</h1><br>
            <div class="row">

            </div><hr noshade style="margin-top:-20px;">


        </div>
    {{--    End Schade foto's--}}
    <footer>
        <hr>
        <div height="150px">
            <h3 style="text-align: center;">
                {{setting()->get('Business_email')}} | <span style="color: {{ setting()->get('rapport_headercolor') }}"> {{setting()->get('app_name')}}</span> | {{setting()->get('Business_phone')}}</h3>
        </div>
    </footer>
</div>
{{--New Pages --}}
<div class="pages">
    <header>
        <table style="width: 800px; border: none; text-align: center; font-family: Helvetica; font-weight: bold;">
            <tr style="border: none;">
                <td width="100px" style="border: none;">
                    {{ now()->format("d M Y")}}
                </td>
                <td  style="border: none;">
                    <img width="20px"src="{{ public_path().'/storage/'.setting()->get('logo')  }}">
                    {{setting()->get('app_name')}}
                </td>
                <td  style="border: none;">
                    {{setting()->get('app_name')}} {{__('global.report')}}
                </td>
            </tr>
        </table>
    </header>
    <div style="width: 700px">
        <h1 align="center" style="font-weight: bold; font-family: Helvetica">Gebruikte {{setting()->get('report_item_name')}}</h1>
        @foreach($data->rows as $row)
            <table cellpadding="2" style="width: 700px; border: none; background: none">

                <tr><td ><b>{{ $row->item->name }}</b></td></tr>
                <tr>
                    <td algin="left" >{!! $row->item->description !!}</td>
                </tr>
            </table>
        @endforeach
    </div>
    <footer>
        <hr>
        <div height="150px">
            <h3 style="text-align: center;">
                {{setting()->get('Business_email')}} | <span style="color: {{ setting()->get('rapport_headercolor') }}"> {{setting()->get('app_name')}}</span> | {{setting()->get('Business_phone')}}</h3>
        </div>
    </footer>
</div>

@foreach($data->rows as $row)
    <div class="pages">
        <header>
            <table style="width: 800px; border: none; text-align: center; font-family: Helvetica; font-weight: bold;">
                <tr style="border: none;">
                    <td width="100px" style="border: none;">
                        {{ now()->format("d M Y")}}
                    </td>
                    <td  style="border: none;">
                        <img width="20px"src="{{ public_path().'/storage/'.setting()->get('logo')  }}">
                        {{setting()->get('app_name')}}
                    </td>
                    <td  style="border: none;">
                        {{setting()->get('app_name')}} {{__('global.report')}}
                    </td>
                </tr>
            </table>
        </header>
        <h2>Uitleg voor de gebruikte {{setting()->get('report_item_name')}}</h2>
        <table cellpadding="2" style="width: 700px; border: none; background: none">
            <tr><td><b>{{ $row->item->name }}</b></td></tr>
            <tr>
                <td algin="left" >  {!! $row->data !!}</td>
            </tr>
        </table>

         <div class="container-fluid" style="margin-top:20px;">
            <h1 style="text-align:center;color: {{ setting()->get('rapport_headercolor') }};">Schade foto's</h1><br>
            <div class="row">
            </div><hr noshade style="margin-top:-20px;">
            <div class="container">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active">
                       @foreach(\App\Helper::GetImagesForPdf($row->images) as $image)

                           @if( $loop->index%3 == 0)
                            </div>
                            <div class="tab-pane fade show active">
                            @endif
                           <div class="Portfolio"><a href="{{ $image['full'] }}"><img class="card-img" src="{{storage_path('app/library/thumbnails')}}/{{ $image['thumb'] }}" alt="{{$image['alt']}}"></a><div class="desc">{{$image['alt']}}</div></div>
                           @if($loop->last)
                            </div>
                             @endif
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

        <footer>
            <hr>
            <div height="150px">
                <h3 style="text-align: center;">
                    {{setting()->get('Business_email')}} | <span style="color: {{ setting()->get('rapport_headercolor') }}"> {{setting()->get('app_name')}}</span> | {{setting()->get('Business_phone')}}</h3>
            </div>
        </footer>
    </div>
@endforeach

<div class="pages">
    <header>
        <table style="width: 800px; border: none; text-align: center; font-family: Helvetica; font-weight: bold;">
            <tr style="border: none;">
                <td width="100px" style="border: none;">
                    {{ now()->format("d M Y")}}
                </td>
                <td  style="border: none;">
                    <img width="20px"src="{{ public_path().'/storage/'.setting()->get('logo')  }}">
                    {{setting()->get('app_name')}}
                </td>
                <td  style="border: none;">
                    {{setting()->get('app_name')}} {{__('global.report')}}
                </td>
            </tr>
        </table>
    </header>
    <div>
        <h2>Ons advies,</h2>
        {!! $data->advice !!}
        <div style="bottom: 20px;">
            <h4>Bedankt voor het gebruik maken  van onze services<br>
                Vriendelijke groet, <br>
                <span style="color: {{ setting()->get('rapport_headercolor') }}"> {{setting()->get('app_name')}}</span>
            </h4>
        </div>

    </div>
    <footer>
        <hr>
        <div height="150px">
            <h3 style="text-align: center;">
                {{setting()->get('Business_email')}} | <span style="color: {{ setting()->get('rapport_headercolor') }}"> {{setting()->get('app_name')}}</span> | {{setting()->get('Business_phone')}}</h3>
        </div>
    </footer>
</div>
</body>
</html>

