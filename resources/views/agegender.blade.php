@extends('welcome')

@section('titel')
    C-1-1-2: Vollstationäre Fälle in Hauptabteilungen, nach Altersklassen und Geschlecht, Datenjahr {{$year}}
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
                            <th>Altersstufe</th>
                            <th class="text-right">Anz. Fälle ges.</th>
                            <th class="text-right">Anz. Fälle W.</th>
                            <th class="text-right">Anz. Fälle M.</th>
                            <th class="text-right">Anz. Fälle U.</th>
                            <th class="text-right">Ant. Fälle W.</th>
                            <th class="text-right">Ant. Fälle M.</th>
                            <th class="text-right">Ant. Fälle U.</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $entry => $value)
                            <tr>
                                <td>{{$value[1]}}</td>
                                <td data-sort="{{$value[2]}}" class="text-right">{{number_format($value[2], 0, ',', '.')}}</td>
                                <td data-sort="{{$value[3]}}" class="text-right">{{number_format($value[3], 0, ',', '.')}}</td>
                                <td data-sort="{{$value[4]}}" class="text-right">{{number_format($value[4], 0, ',', '.')}}</td>
                                <td data-sort="{{$value[5]}}" class="text-right">{{number_format($value[5], 0, ',', '.')}}</td>
                                <td data-sort="{{$value[6]}}" class="text-right">{{number_format(str_replace(',','.',$value[6]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td data-sort="{{$value[7]}}" class="text-right">{{number_format(str_replace(',','.',$value[7]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td data-sort="{{$value[8]}}" class="text-right">{{number_format(str_replace(',','.',$value[8]) * 100, 2, ',', '.') . ' %'}}</td>
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
                    <table id="tabelle_1_sum" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Fälle</th>
                            <th>Fälle W.</th>
                            <th>Fälle M.</th>
                            <th>Fälle U.</th>
                            <th>Ant. W.</th>
                            <th>Ant. M.</th>
                            <th>Ant. U.</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dataSum as $entry => $value)
                            <tr>
                                <td class="text-right">{{number_format($value[0], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[1], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[2], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[3], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[4]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[5]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[6]) * 100, 2, ',', '.') . ' %'}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <h5>ohne Mischfälle (Versorgung in Hauptabteilung und belegärztliche Versorgung)</h5>
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
                'aaSorting': [],
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
                    },
                    select: {
                        rows: {
                            _: '%d Zeilen ausgewählt',
                            0: 'Zum Auswählen auf eine Zeile klicken',
                            1: '1 Zeile ausgewählt'
                        }
                    }
                }
            });
            $('#tabelle_1_sum').DataTable({
                'paging': false,
                'lengthChange': false,
                'searching': false,
                'ordering': false,
                'info': false,
                'autoWidth': false,
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
                    },
                    select: {
                        rows: {
                            _: '%d Zeilen ausgewählt',
                            0: 'Zum Auswählen auf eine Zeile klicken',
                            1: '1 Zeile ausgewählt'
                        }
                    }
                }
            });
        })
    </script>
@endsection