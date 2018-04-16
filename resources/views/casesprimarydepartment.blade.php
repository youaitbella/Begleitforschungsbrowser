@extends('welcome')

@section('titel')
    C-1-2-2: Fallzahl (vollstat.) in Hauptabteilungen nach Anlass/Grund der Aufnahme, Entlassung, Verlegung, Datenjahr {{$year}}
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                </div>
                <div class="box-body">
                    <div style="max-width: 600px">
                    <table id="tabelle_1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Aufnahmeanlass</th>
                            <th class="text-right">Fallzahl</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data1 as $entry => $value)
                            <tr>
                                <td>{{$value[2]}}</td>
                                <td class="text-right">{{number_format($value[3], 0, ',', '.')}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-header">

                </div>
                <div class="box-body">
                    <div style="max-width: 800px">
                    <table id="tabelle_2" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Entlassungsgrund</th>
                            <th class="text-right">Fallzahl</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data2 as $entry => $value)
                            <tr>
                                <td>{{$value[2]}}</td>
                                <td class="text-right">{{number_format($value[3], 0, ',', '.')}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                    <h5>E: Aufnahmeanlass Einweisung</h5>
                    <h5>Z: Aufnahmeanlass Zahnarzt</h5>
                    <h5>01: Entlassungs-/Verlegungsgrund Behandlung regulär beendet</h5>
                    <h5>03: Entlassungs-/Verlegungsgrund Behandlung aus sonstigen Gründen beendet</h5>
                    <h5>04: Entlassungs-/Verlegungsgrund Behandlung gegen ärztlichen Rat beendet</h5>
                    <h5>02: Entlassungs-/Verlegungsgrund Behandlung regulär beendet, nachstationäre Behandlung vorgesehen</h5>
                    <h5>14: Entlassungs-/Verlegungsgrund Behandlung aus sonstigen Gründen beendet, nachstationäre Behandlung vorgesehen</h5>
                    <h5>15: Entlassungs-/Verlegungsgrund Behandlung gegen ärztlichen Rat beendet, nachstationäre Behandlung vorgesehen</h5>
                    <h5>099: Entlassungs-/Verlegungsgrund Entlassung in eine Rehabilitationseinrichtung</h5>
                    <h5>109: Entlassungs-/Verlegungsgrund Entlassung in eine Pflegeeinrichtung</h5>
                    <h5>119: Entlassungs-/Verlegungsgrund Entlassung in ein Hospitz</h5>
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
                'aaSorting': [],
                'autoWidth': false,
                "pageLength": 10,
                "lengthMenu": [5, 10, 25, 50, 100],
                'scrollX': true,
                "language": {
                    "sEmptyTable": "Keine Daten in der Tabelle vorhanden",
                    "sLoadingRecords": "Wird geladen...",
                    "sLengthMenu":   	"_MENU_ Einträge anzeigen",
                    "sProcessing": "Bitte warten...",
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
                    }
                }
            });
            $('#tabelle_2').DataTable({
                'paging': false,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': false,
                'aaSorting': [],
                'autoWidth': false,
                'scrollX': true,
                "language": {
                    "sEmptyTable": "Keine Daten in der Tabelle vorhanden",
                    "sLoadingRecords": "Wird geladen...",
                    "sLengthMenu":   	"_MENU_ Einträge anzeigen",
                    "sProcessing": "Bitte warten...",
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
                    }
                }
            })
        })
    </script>
@endsection