@extends('welcome')

@section('titel')
    C-2-2-3: Häufigkeit von Operationen (4-Steller nach OPS Prozedurengruppe 5) bei belegärztl. Versorgung - OPS Version {{$year}}, Datenjahr {{$year}}
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
                            <th>4-Steller Name</th>
                            <th class="text-right">Anz. Nennungen</th>
                            <th class="text-right">Anz. Krankenhäuser</th>
                            <th class="text-right">Nenn. pro KH</th>
                            <th class="text-right">Ant. KH Top 10%</th>
                            <th class="text-right">Ant. KH Top 20%</th>
                            <th class="text-right">Ant. KH Top 30%</th>
                            <th class="text-right">Ant. KH Top 40%</th>
                            <th class="text-right">Ant. KH Top 50%</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $entry => $value)
                            <tr>
                                <td>{{$value[1]}}</td>
                                <td>{{$value[2]}}</td>
                                <td class="text-right">{{number_format($value[3], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format($value[4], 0, ',', '.')}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[5]), 2, ',', '.')}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[6]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[7]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[8]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[9]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td class="text-right">{{number_format(str_replace(',','.',$value[10]) * 100, 2, ',', '.') . ' %'}}</td>
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
                    }
                }
            })
        })
    </script>
@endsection