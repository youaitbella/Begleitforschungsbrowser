@extends('welcome')

@section('titel')
    Nutzungsbedingungen
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                </div>
                <div class="box-body">
                    Das InEK stellt die Datenauswertung der Datenlieferung gemäß §21 KHEntgG im Rahmen
                    der Begleitforschung gemäß §17b Abs. 8 KHG - Datenjahr 2014 (im Folgenden "G-DRG-Begleitforschungsbrowser"
                    genannt) für interessierte Nutzer kostenlos zur Online-Nutzung auf der Seite browser.inek.org sowie die Datengrundlage zum
                    Download zur Verfügung.<br />
                    Mit dem Download bzw. der Nutzung des G-DRG-Begleitforschungsbrowsers kommt ein
                    Nutzungsvertrag zwischen der InEK GmbH und dem Nutzer zustande. Es gelten dabei
                    die folgenden Nutzungsbedingungen:
                    <br /><br />
                    <b>I. Nutzungsumfang</b><br />
                    1. Der Nutzer ist berechtigt, die kostenlose Nutzung des G-DRG-Begleitforschungsbrowsers
                    vorzunehmen und diesen ausschließlich im Rahmen von
                    nicht-kommerziellen Forschungsaufgaben zu nutzen.<br />
                    2. Dem Nutzer ist es untersagt, Änderungen an dem G-DRG-Begleitforschungsbrowser
                    vorzunehmen, das Programm zu dekompilieren, es in andere Produkte einzubinden
                    oder in einer anderen, nicht bestimmungsmäßigen Art zu nutzen.<br />
                    3. Dem Nutzer ist es untersagt, den G-DRG-Begleitforschungsbrowser ganz oder in Teilen
                    an Dritte in körperlicher oder elektronischer Form weiterzugeben, insbesondere diese
                    an Dritte zu veräußern, zu vermarkten oder in sonstiger Weise kommerziell zu
                    nutzen.<br />
                    4. Der Nutzer stellt die InEK GmbH auf erstes Anfordern von allen Ansprüchen Dritter
                    frei, die sich daraus ergeben, dass er gegen den in Ziffer I.1-3 geregelten
                    Nutzungsumfang verstoßen hat.
                    <br /><br />
                    <b>II. Urheberrechtsschutz</b><br />
                    Unbeschadet der in Ziffer I eingeräumten Rechte verbleiben alle Rechte an dem G-DRG-Begleitforschungsbrowser bei der InEK GmbH.
                    <br /><br />
                    <b>III. Gewährleistung / Haftung</b><br />
                    1. Die InEK GmbH übernimmt keine Gewähr dafür, dass der InEK
                    Begleitforschungsbrowser in vollem Umfang fehlerfrei ist.<br />
                    2. Die InEK GmbH haftet auf Schadenersatz nach den gesetzlichen Bestimmungen für
                    Personenschäden und für Schäden nach dem Produkthaftungsgesetz.<br />
                    3. Die InEK GmbH haftet nach den gesetzlichen Bestimmungen für Schäden, die durch
                    arglistiges Verhalten verursacht wurden oder für Schäden, die durch Vorsatz oder
                    grobe Fahrlässigkeit der gesetzlichen Vertreter oder leitenden Angestellten von InEK
                    verursacht wurden.<br />
                    4. Die InEK GmbH haftet auf Schadenersatz begrenzt auf die Höhe des
                    vertragstypischen, vorhersehbaren Schadens für Schäden aus einer leicht
                    fahrlässigen Verletzung wesentlicher Vertragspflichten oder Kardinalpflichten oder für
                    Schäden, die von einfachen Erfüllungsgehilfen von InEK grob fahrlässig oder
                    vorsätzlich ohne Verletzung wesentlicher Vertragspflichten oder Kardinalpflichten
                    verursacht werden.<br />
                    5. Die InEK GmbH haftet nicht für entgangenen Gewinn, mittelbare Schäden,
                    Mangelfolgeschäden und Ansprüche Dritter.
                    <br /><br />
                    <b>IV. Anwendbares Recht</b><br />
                    Für diese Nutzungsbedingungen gilt das Recht der Bundesrepublik Deutschland.
                    <br /><br />
                    <form method="post">
                        {{ csrf_field() }}
                        <button class="btn btn-primary" type="submit" >Nutzungsbedingungen akzeptieren</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection