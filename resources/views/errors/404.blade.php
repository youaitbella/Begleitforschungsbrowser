@extends('welcome')

@section('titel')
    404 Seite nicht gefunden
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                </div>
                <div class="box-body">
                    <div class="error-page">
                        <h2 class="headline text-yellow"> 404</h2>
                        <div class="error-content">
                            <h3><i class="fa fa-warning text-yellow"></i>Seite nicht gefunden</h3>
                            <p>
                               Wir konnten die angegebene Seite leider nicht finden
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection