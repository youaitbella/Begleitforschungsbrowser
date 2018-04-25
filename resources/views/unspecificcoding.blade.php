@extends('welcome')

@section('titel')
    A-3: Unspezifische Kodierung, Datenjahr {{$year}}
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
                            <th>Art</th>
                            <th class="text-right">Anz. ND gesamt</th>
                            <th class="text-right">Anz. ND ges. unspez.</th>
                            <th class="text-right">Anteil ND unspez.</th>
                            <th class="text-right">Anz. Proz. gesamt</th>
                            <th class="text-right">Anz. Proz. ges. unspez.</th>
                            <th class="text-right">Anz. Proz. unspez.</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $entry => $value)
                            <tr>
                                <td>{{$value[0]}}</td>
                                <td data-sort="{{$value[1]}}" class="text-right">{{number_format($value[1], 0, ',', '.')}}</td>
                                <td data-sort="{{$value[2]}}" class="text-right">{{number_format($value[2], 0, ',', '.')}}</td>
                                <td data-sort="{{$value[3]}}" class="text-right">{{number_format(str_replace(',','.',$value[3]) * 100, 2, ',', '.') . ' %'}}</td>
                                <td data-sort="{{$value[4]}}" class="text-right">{{number_format($value[4], 0, ',', '.')}}</td>
                                <td data-sort="{{$value[5]}}" class="text-right">{{number_format($value[5], 0, ',', '.')}}</td>
                                <td data-sort="{{$value[6]}}" class="text-right">{{number_format(str_replace(',','.',$value[6]) * 100, 2, ',', '.') . ' %'}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <h5>Unspezifische Nebendiagnosen: Kodierung endet auf ".9"</h5>
                    <h5>Unspezifische Prozeduren: Kodierung endet auf "y"</h5>

                    <h5>Datenbasis: Alle angenommenen Fälle</h5>
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