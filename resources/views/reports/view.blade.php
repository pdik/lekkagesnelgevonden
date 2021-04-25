<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ setting()->get('app_name') . ' ' .  __('global.report') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style type="text/css">

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
            background-image: url({{ url('/storage/'.setting()->get('report_coversheet'))  }});
            background-position: top left;
            background-repeat: no-repeat;
            background-size: 100%;
            padding: 300px 100px 10px 100px;
            width:100%;
            height:100%;
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
            {!! \App\Http\Controllers\ReportController::ChangeImageForPDF($data->data) !!}
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
                        <td algin="left" >{!! html_entity_decode($row->item->description) !!}</td>
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
<div class="page-break"></div>
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
           <table cellpadding="2" style="width: 700px; border: none; background: none">

            <tr><td ><b>{{ $row->item->name }}</b></td></tr>
                    <tr>
                        <td algin="left" >  {!! \App\Http\Controllers\ReportController::ChangeImageForPDF($row->data) !!}</td>
                    </tr>
            </table>
            <footer>
            <hr>
                <div height="150px">
               <h3 style="text-align: center;">
               {{setting()->get('Business_email')}} | <span style="color: {{ setting()->get('rapport_headercolor') }}"> {{setting()->get('app_name')}}</span> | {{setting()->get('Business_phone')}}</h3>
               </div>
            </footer>
       </div>
   @endforeach
<div class="page-break"></div>
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
                 {!! \App\Http\Controllers\ReportController::ChangeImageForPDF($data->advice) !!}

               <h3>Bedankt voor het gebruik maken  van onze services<br>
               Vriendelijke groet, <br>
               <span style="color: {{ setting()->get('rapport_headercolor') }}"> {{setting()->get('app_name')}}</span>
               </h3>
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

