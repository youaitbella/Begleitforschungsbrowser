@extends('welcome')

@section('titel')
    B-3: Krankenhäuser mit Datenübermittlung nach CMI-Klassen/Größenklassen (Bettenzahl), Datenjahr {{$year}}
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <form action="" class="form-inline">
                        <div class="form-group">
                            <label>Bettenklasse </label>
                            <select name="bettenstufe" class="form-control" onchange="$(this).closest('form').submit();">
                                <option value="0" @if(request('bettenstufe') == '0') selected @endif>Alle Bettenstufen</option>
                                <option value="1" @if(request('bettenstufe') == '1') selected @endif>bis 49 Beten</option>
                                <option value="2" @if(request('bettenstufe') == '2') selected @endif>50 bis 99 Betten</option>
                                <option value="3" @if(request('bettenstufe') == '3') selected @endif>100 bis 149 Betten</option>
                                <option value="4" @if(request('bettenstufe') == '4') selected @endif>150 bis 199 Betten</option>
                                <option value="5" @if(request('bettenstufe') == '5') selected @endif>200 bis 249 Betten</option>
                                <option value="6" @if(request('bettenstufe') == '6') selected @endif>250 bis 299 Betten</option>
                                <option value="7" @if(request('bettenstufe') == '7') selected @endif>300 bis 399 Betten</option>
                                <option value="8" @if(request('bettenstufe') == '8') selected @endif>400 bis 499 Betten</option>
                                <option value="9" @if(request('bettenstufe') == '9') selected @endif>500 bis 599 Betten</option>
                                <option value="10" @if(request('bettenstufe') == '10') selected @endif>600 bis 799 Betten</option>
                                <option value="11" @if(request('bettenstufe') == '11') selected @endif>800 bis 999 Betten</option>
                                <option value="12" @if(request('bettenstufe') == '12') selected @endif>1000 Betten und mehr</option>
                                <option value="13" @if(request('bettenstufe') == '13') selected @endif>Ohne Angabe</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="box-body">
                    <div style="max-width: 600px">
                    <table id="tabelle_1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Bettenstufe</th>
                            <th class="text-right">Anzahl KH</th>
                            <th class="text-right">Anteil KH</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $entry => $value)
                            <tr>
                                <td>{{$value[1]}}</td>
                                <td class="text-right">{{$value[2]}}</td>
                                <td data-sort="{{$value[3]}}" class="text-right">{{number_format(str_replace(',','.',$value[3]) * 100, 2, ',', '.') . ' %'}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                    <h4>Anzahl KH gesamt: {{number_format($dataSum, 0, ',', '.')}}</h4>
                </br>
                    <h5>ohne zusätzliche Prüfung auf Umsetzung der Regelungen zur Fallzusammenführung</h5>
                    <h5>ohne Krankenhäuser mit Bettenzahl "ohne Angabe"</h5>
                    <h5>ohne Krankenhäuser mit nur teilstationären Fällen</h5>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function () {
            $('#tabelle_1').DataTable({
                'paging': false,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': false,
                'autoWidth': true,
                'aaSorting': [],
                'scrollX': true,
                "language": {
                    "sEmptyTable": "Keine Datenangabe",
                    "sLoadingRecords": "Wird geladen...",
                    "sProcessing": "Bitte warten...",
                    "sSearch": "Suchen",
                    "sZeroRecords": "Keine Einträge vorhanden.",
                    "oAria": {
                        "sSortAscending": ": aktivieren, um Spalte aufsteigend zu sortieren",
                        "sSortDescending": ": aktivieren, um Spalte absteigend zu sortieren"
                    },
                }
            })
        })
    </script>
@endsection