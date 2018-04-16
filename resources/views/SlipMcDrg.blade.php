@extends('welcome')

@section('titel')
    C-2-1-3: Vollstationäre Fälle in belegärztl. Versorgung, nach DRG, G-DRG-Version {{$year}}, Datenjahr {{$year}}
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
                            <th class="text-right">Anz. Fälle</th>
                            <th class="text-right">mittlere Vwd.</th>
                            <th class="text-right">Stdabw. Vwd.</th>
                            <th class="text-right">Anz. Kurzlg.</th>
                            <th class="text-right">Anz. Langlg.</th>
                            <th class="text-right">Ant. Kurzlg.</th>
                            <th class="text-right">Ant. Langlg.</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $entry => $value)
                            <tr>
                                <td>{{$value[1]}}</td>
                                <td>{{$value[2]}}</td>
                                <td class="text-right">{{number_format($value[3], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[4]), 2, ',', '.')}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[5]), 2, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[6], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[7]), 2, ',', '.')}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[8]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[9]) * 100, 2, ',', '.') . ' %'}}</td>
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
                            <th class="text-right">Anz. Fälle</th>
                            <th class="text-right">mittlere Vwd.</th>
                            <th class="text-right">Stdabw. Vwd.</th>
                            <th class="text-right">Anz. Kurzlg.</th>
                            <th class="text-right">Anz. Langlg.</th>
                            <th class="text-right">Ant. Kurzlg.</th>
                            <th class="text-right">Ant. Langlg.</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dataSum as $entry => $value)
                            <tr>
                                <td class="text-right">{{number_format($value[0], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[1]), 2, ',', '.')}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[2]), 2, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[3], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[5], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[4]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[6]) * 100, 2, ',', '.') . ' %'}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <h5>Kurzlieger = Alle unterhalb der unteren Grenzverweildauer entlassenen / verlegten Fälle</h5>
                    <h5>Langlieger = Alle oberhalb der oberen Grenzverweildauer entlassenen / verlegten Fälle</h5>
                    <h5>ohne Mischfälle (Versorgung in Hauptabteilung und belegärztlicher Versorgung)</h5>
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
                'scrollX': true,
                'autoWidth': true,
                "pageLength": 10,
                "lengthMenu": [5, 10, 25, 50, 100],
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
            $('#tabelle_1_sum').DataTable({
                'paging': false,
                'lengthChange': false,
                'searching': false,
                'ordering': false,
                'info': false,
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