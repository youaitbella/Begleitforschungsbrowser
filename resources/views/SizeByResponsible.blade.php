@extends('welcome')

@section('titel')
    B-2: Krankenhäuser mit Datenübermittlung nach Größenklassen (Fallzahl vollstat.)/Trägerschaft, Datenjahr {{$year}}
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <form action="" class="form-inline">
                        <div class="form-group">
                            <label>Träger </label>
                            <select name="traeger" class="form-control" onchange="$(this).closest('form').submit();">
                                <option value="0" @if(request('traeger') == '0') selected @endif>Alle Träger</option>
                                <option value="1" @if(request('traeger') == '1') selected @endif>Öffentliche Krankenhäuser</option>
                                <option value="2" @if(request('traeger') == '2') selected @endif>Freigenützige Krankenhäuser</option>
                                <option value="3" @if(request('traeger') == '3') selected @endif>Private Krankenhäuser</option>
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
                                <td class="text-right">{{number_format(str_replace(',','.',$value[3]) * 100, 2, ',', '.') . ' %'}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                    <h4>Anzahl KH gesamt: {{number_format($dataSum, 0, ',', '.')}}</h4>
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