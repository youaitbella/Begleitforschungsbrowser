@extends('welcome')

@section('titel')
    D-1c: Teilstationäre Fälle, nach Hauptdiagnosen (Kategorie - 3-Steller), ICD-10-GM Version {{$year}}, Datenjahr {{$year}}
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                </div>
                <div class="box-body">
                    <div style="max-width: 1000px">
                    <table id="tabelle_1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Kategorie</th>
                            <th>Kategoriename</th>
                            <th class="text-right">Anzahl KH</th>
                            <th class="text-right">Fallzahl</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $entry => $value)
                            <tr>
                                <td>{{$value[1]}}</td>
                                <td>{{$value[2]}}</td>
                                <td class="text-right">{{number_format($value[3], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[4], 0, ',', '.')}}</td>
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
                    <div style="max-width: 600px">
                    <table id="tabelle_1_sum" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th class="text-right">Anzahl KH</th>
                            <th class="text-right">Anzahl Fälle</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dataSum as $entry => $value)
                            <tr>
                                <td class="text-right">{{number_format($value[0], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[1], 0, ',', '.')}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                    <h5>Die Übermittlungsverpflichtung macht keine eindeutige Vorgabe, daher kann in der Datenerhebung</h5>
                    <h5>(je nach Softwaresystem) ein teilstationärer Datensatz für alle Behandlungen in einem Quartal oder aber</h5>
                    <h5>für jede einzelne Behandlung stehen.</h5>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function () {
            $('#tabelle_1').DataTable({
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': false,
                'autoWidth': true,
                "pageLength": 10,
                "lengthMenu": [5, 10, 25, 50, 100],
                'scrollX': true,
                "language": {
                    "sEmptyTable": "Keine Daten in der Tabelle vorhanden",
                    "sLoadingRecords": "Wird geladen...",
                    "sProcessing": "Bitte warten...",
                    "sLengthMenu":   	"_MENU_ Einträge anzeigen",
                    "sSearch": "Suchen",
                "sZeroRecords": "Keine Einträge vorhanden.","oPaginate": {
                    "sFirst":       "Erste",
                    "sPrevious":    "Zurück",
                    "sNext":        "Nächste",
                    "sLast":        "Letzte"
                },
                "oAria": {
                    "sSortAscending": ": aktivieren, um Spalte aufsteigend zu sortieren",
                    "sSortDescending": ": aktivieren, um Spalte absteigend zu sortieren"
                },
                select: {
                    rows: {
                        _: '%d Zeilen ausgewählt',
                        0: 'Zum Auswählen auf eine Zeile klicken',
                        1: '1 Zeile ausgewählt'
                    }
                }
                }
            })
        })
    </script>
@endsection