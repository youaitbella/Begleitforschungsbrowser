@extends('welcome')

@section('titel')
    E-1b: "Wenig komplexe Leistungen": 20 niedrigst bewertete Fallgruppen (belegärztliche Versorgung), G-DRG-Version {{$year}}
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                </div>
                <div class="box-body">
                    <table id="tabelle_1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>DRG</th>
                            <th>DRG-Name</th>
                            <th class="text-right">Relativgewicht</th>
                            <th class="text-right">Fallzahl</th>
                            <th class="text-right">Anteil</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $entry => $value)
                            <tr>
                                <td>{{$value[1]}}</td>
                                <td>{{$value[2]}}</td>
                                <td data-sort="{{$value[3]}}" class="text-right">{{number_format(str_replace(',','.',$value[3]), 3, ',', '.')}}</td>
                                <td data-sort="{{$value[4]}}" class="text-right">{{number_format($value[4], 0, ',', '.')}}</td>
                                <td data-sort="{{$value[5]}}" class="text-right">{{number_format(str_replace(',','.',$value[5]) * 100, 2, ',', '.') . ' %'}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box">
                <div class="box-header">
                    Summentabelle
                </div>
                <div class="box-body">
                    <div style="max-width: 600px">
                    <table id="tabelle_1_sum" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th class="text-right">Fallzahl</th>
                            <th class="text-right">Anteil</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dataSum as $entry => $value)
                            <tr>
                                <td class="text-right">{{number_format($value[0], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[1]) * 100, 2, ',', '.') . ' %'}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                    <h5>ohne Mischfälle (Versorgung in Hauptabteilung und belegärztlicher Versorgung)</h5>
                    <h5>Spalte "Anteil": Bezogen auf Gesamt-Fallzahl bei Versorgung in Belegabteilung</h5>
                    <h5>ohne 1-Belegungstag-DRGs</h5>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function () {
            $('#tabelle_1').DataTable({
                'paging': false,
                'lengthChange': false,
                'searching': true,
                'ordering': true,
                'info': false,
                'autoWidth': true,
                'aaSorting': [],
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