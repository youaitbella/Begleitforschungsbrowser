@extends('welcome')

@section('titel')
    C-2-2-1: Vollstationäre Versorgung in belegärztl. Versorgung nach Größenklassen (Bettenzahl)/Bundesland, Datenjahr {{$year}}
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <form action="" class="form-inline">
                        <div class="form-group">
                            <label>Bundesland </label>
                            <select name="bl" class="form-control" onchange="$(this).closest('form').submit();">
                                <option value="0" @if(request('bl') == '0') selected @endif>Alle Bundesländer</option>
                                <option value="1" @if(request('bl') == '1') selected @endif>Schleswig-Holstein</option>
                                <option value="2" @if(request('bl') == '2') selected @endif>Hamburg</option>
                                <option value="3" @if(request('bl') == '3') selected @endif>Niedersachsen</option>
                                <option value="4" @if(request('bl') == '4') selected @endif>Bremen</option>
                                <option value="5" @if(request('bl') == '5') selected @endif>Nordrhein-Westfalen</option>
                                <option value="6" @if(request('bl') == '6') selected @endif>Hessen</option>
                                <option value="7" @if(request('bl') == '7') selected @endif>Rheinland-Pfalz</option>
                                <option value="8" @if(request('bl') == '8') selected @endif>Baden-Württenberg</option>
                                <option value="9" @if(request('bl') == '9') selected @endif>Bayern</option>
                                <option value="10" @if(request('bl') == '10') selected @endif>Saarland</option>
                                <option value="11" @if(request('bl') == '11') selected @endif>Berlin</option>
                                <option value="12" @if(request('bl') == '12') selected @endif>Brandenburg</option>
                                <option value="13" @if(request('bl') == '13') selected @endif>Mecklenburg-Vorpommern</option>
                                <option value="14" @if(request('bl') == '14') selected @endif>Sachsen</option>
                                <option value="15" @if(request('bl') == '15') selected @endif>Sachsen-Anhalt</option>
                                <option value="16" @if(request('bl') == '16') selected @endif>Thüringen</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="box-body">
                    <div style="max-width: 800px">
                    <table id="tabelle_1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Bettenstufe</th>
                            <th class="text-right">Anzahl KH</th>
                            <th class="text-right">mittl. Fallzahl KH</th>
                            <th class="text-right">mittl. Vwd. KH</th>
                            <th class="text-right">mittl. CMI. KH</th>
                            <th class="text-right">Ant. Stundenfälle</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $entry => $value)
                            <tr>
                                <td>{{$value[2]}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[3]), 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[4]), 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[5]), 1, ',', '.')}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[6]), 3, ',', '.')}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[7]) * 100, 2, ',', '.') . ' %'}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-header">
                    Summentabelle
                </div>
                <div class="box-body">
                    <div style="max-width: 800px">
                    <table id="tabelle_1_sum" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th class="text-right">Anzahl KH</th>
                            <th class="text-right">mittl. Fallzahl KH</th>
                            <th class="text-right">mittl. Vwd. KH</th>
                            <th class="text-right">mittl. CMI. KH</th>
                            <th class="text-right">Ant. Stundenfälle</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dataSum as $entry => $value)
                            <tr>
                                <td class="text-right">{{number_format($value[2], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[3]), 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[4]), 1, ',', '.')}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[5]), 3, ',', '.')}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[6]) * 100, 2, ',', '.') . ' %'}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                    <h5>Stundenfälle: Fälle mit identischem Aufnahme- und Entlassungsdatum</h5>
                    <h5>ohne Mischfälle (Versorgung in Hauptabteilung und belegärztlicher Versorgung)</h5>
                    <h5>ohne zusätzliche Prüfung auf Umsetzung der Regelungen zur Fallzusammenführung</h5>
                    <h5>Spalten mittl. Vwd. KH und mittl. CMI KH: jeweils ungewichtete arithmetische Mittelwerte</h5>
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
                'ordering': false,
                'info': false,
                'autoWidth': true,
                'scrollX': true,
                "language": {
                    "sEmptyTable": "Keine Daten in der Tabelle vorhanden",
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