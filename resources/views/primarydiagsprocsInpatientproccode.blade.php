@extends('welcome')

@section('titel')
    C-1-1-5c: Vollstationäre Fälle in Hauptabteilungen, nach Prozeduren (Viersteller) OPS Version {{$year}} und Alter, Datenjahr {{$year}}
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
                            <th>4-Steller</th>
                            <th>Prozedur 4-Steller Name</th>
                            <th class="text-right">Nennungen</th>
                            <th class="text-right">unter 1J.</th>
                            <th class="text-right">1 bis u. 5J.</th>
                            <th class="text-right">5 bis u. 10J.</th>
                            <th class="text-right">10 bis u. 15J.</th>
                            <th class="text-right">15 bis u. 20J.</th>
                            <th class="text-right">20 bis u. 25J.</th>
                            <th class="text-right">25 bis u. 30J.</th>
                            <th class="text-right">30 bis u. 35J.</th>
                            <th class="text-right">35 bis u. 40J.</th>
                            <th class="text-right">40 bis u. 45J.</th>
                            <th class="text-right">45 bis u. 50J.</th>
                            <th class="text-right">50 bis u. 55J.</th>
                            <th class="text-right">55 bis u. 60J.</th>
                            <th class="text-right">60 bis u. 65J.</th>
                            <th class="text-right">65 bis u. 70J.</th>
                            <th class="text-right">70 bis u. 75J.</th>
                            <th class="text-right">75 bis u. 80J.</th>
                            <th class="text-right">80 bis u. 85J.</th>
                            <th class="text-right">85 bis u. 90J.</th>
                            <th class="text-right">90J. u. älter</th>
                            <th class="text-right">Ant. unt. 1J.</th>
                            <th class="text-right">Ant. 1 - 5J.</th>
                            <th class="text-right">Ant. 5 - 10J.</th>
                            <th class="text-right">Ant. 10 - 15J.</th>
                            <th class="text-right">Ant. 15 - 20J.</th>
                            <th class="text-right">Ant. 20 - 25J.</th>
                            <th class="text-right">Ant. 25 - 30J.</th>
                            <th class="text-right">Ant. 30 - 35J.</th>
                            <th class="text-right">Ant. 35 - 40J.</th>
                            <th class="text-right">Ant. 40 - 45J.</th>
                            <th class="text-right">Ant. 45 - 50J.</th>
                            <th class="text-right">Ant. 50 - 55J.</th>
                            <th class="text-right">Ant. 55 - 60J.</th>
                            <th class="text-right">Ant. 60 - 65J.</th>
                            <th class="text-right">Ant. 65 - 70J.</th>
                            <th class="text-right">Ant. 70 - 75J.</th>
                            <th class="text-right">Ant. 75 - 80J.</th>
                            <th class="text-right">Ant. 80 - 85J.</th>
                            <th class="text-right">Ant. 85 - 90J.</th>
                            <th class="text-right">Ant. 90J. +</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $entry => $value)
                            <tr>
                                <td>{{$value[2]}}</td>
                                <td>{{$value[3]}}</td>
                                <td class="text-right">{{number_format($value[4], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[7], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[8], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[9], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[10], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[11], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[12], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[13], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[14], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[15], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[16], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[17], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[18], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[19], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[20], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[21], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[22], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[23], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[24], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[25], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[26], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[27]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[28]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[29]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[30]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[31]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[32]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[33]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[34]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[35]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[36]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[37]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[38]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[39]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[40]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[41]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[42]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[43]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[44]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[45]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[46]) * 100, 2, ',', '.') . ' %'}}</td>
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
                            <th class="text-right">Gesamt Anz. Nennungen</th>
                            <th class="text-right">unter 1J.</th>
                            <th class="text-right">1 bis u. 5J.</th>
                            <th class="text-right">5 bis u. 10J.</th>
                            <th class="text-right">10 bis u. 15J.</th>
                            <th class="text-right">15 bis u. 20J.</th>
                            <th class="text-right">20 bis u. 25J.</th>
                            <th class="text-right">25 bis u. 30J.</th>
                            <th class="text-right">30 bis u. 35J.</th>
                            <th class="text-right">35 bis u. 40J.</th>
                            <th class="text-right">40 bis u. 45J.</th>
                            <th class="text-right">45 bis u. 50J.</th>
                            <th class="text-right">50 bis u. 55J.</th>
                            <th class="text-right">55 bis u. 60J.</th>
                            <th class="text-right">60 bis u. 65J.</th>
                            <th class="text-right">65 bis u. 70J.</th>
                            <th class="text-right">70 bis u. 75J.</th>
                            <th class="text-right">75 bis u. 80J.</th>
                            <th class="text-right">80 bis u. 85J.</th>
                            <th class="text-right">85 bis u. 90J.</th>
                            <th class="text-right">90J. u. älter</th>
                            <th class="text-right">Ant. unt. 1J.</th>
                            <th class="text-right">Ant. 1 - 5J.</th>
                            <th class="text-right">Ant. 5 - 10J.</th>
                            <th class="text-right">Ant. 10 - 15J.</th>
                            <th class="text-right">Ant. 15 - 20J.</th>
                            <th class="text-right">Ant. 20 - 25J.</th>
                            <th class="text-right">Ant. 25 - 30J.</th>
                            <th class="text-right">Ant. 30 - 35J.</th>
                            <th class="text-right">Ant. 35 - 40J.</th>
                            <th class="text-right">Ant. 40 - 45J.</th>
                            <th class="text-right">Ant. 45 - 50J.</th>
                            <th class="text-right">Ant. 50 - 55J.</th>
                            <th class="text-right">Ant. 55 - 60J.</th>
                            <th class="text-right">Ant. 60 - 65J.</th>
                            <th class="text-right">Ant. 65 - 70J.</th>
                            <th class="text-right">Ant. 70 - 75J.</th>
                            <th class="text-right">Ant. 75 - 80J.</th>
                            <th class="text-right">Ant. 80 - 85J.</th>
                            <th class="text-right">Ant. 85 - 90J.</th>
                            <th class="text-right">Ant. 90J. +</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dataSum as $entry => $value)
                            <tr>
                                <td class="text-right">{{number_format($value[0], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[3], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[4], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[5], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[6], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[7], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[8], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[9], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[10], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[11], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[12], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[13], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[14], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[15], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[16], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[17], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[18], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[19], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[20], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[21], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[22], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[23]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[24]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[25]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[26]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[27]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[28]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[29]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[30]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[31]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[32]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[33]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[34]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[35]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[36]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[37]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[38]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[39]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[40]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[41]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[42]) * 100, 2, ',', '.') . ' %'}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <h5>Im Durchschnitt hat ein Fall {{number_format(str_replace(',','.',$countProz), 3, ',', '.')}} Prozeduren.</h5>
                    <h5>ohne Duplikate</h5>
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