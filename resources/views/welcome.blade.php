<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="/img/inek_logo.jpg"/>
    <title>Begleitforschungsbrowser</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/dist/css/skins/skin-green-light.css">

    <!-- Pace style -->
    <link rel="stylesheet" href="/plugins/pace/pace.min.css">


    <!-- jQuery 3 -->
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- PACE -->
    <script src="/bower_components/PACE/pace.min.js"></script>

    <!-- Fixes Haeders -->
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.3/css/fixedHeader.dataTables.min.css">
    <script src="https://cdn.datatables.net/fixedheader/3.1.3/js/dataTables.fixedHeader.min.js"></script>


    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green-light sidebar-mini pace-done">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="http://g-drg.de" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">InEK</span>
            <!-- logo for regular state and mobile devices -->
            <img src="/img/inek_logo.jpg">
            <span>InEK GmbH</span>

            <!-- mini logo for sidebar mini 50x50 pixels
            <img src="/img/inek_logo.jpg">
            <span>InEK GmbH</span>-->
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Menü verkleinern</span>
            </a>
            <span style="font-size: 35px; color: #ffffff">G-DRG-Begleitforschungsbrowser</span>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar left -->
        <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header"></li>
                @foreach($menu as $dataYear)
                    <li class="treeview @if(Request::is("*/$dataYear*")) menu-open active @endif">
                        <a href="#">
                            <span>Datenjahr {{$dataYear}}</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu" @if(Request::is("*/$dataYear*")) style="display: block;" @endif>
                            <li><a href="{!! route('download.manual', ['dataYear' => $dataYear]) !!}">Download Handbuch {{$dataYear}}</a></li>
                            <!-- Datenbasis -->
                            <li class="treeview @if(Request::is("database/participation/$dataYear")) menu-open active @endif">
                                <a href="#">Datenbasis
                                    <span class="pull-right-container"><i
                                                class="fa fa-angle-left pull-right"></i></span>
                                </a>
                                <ul class="treeview-menu"
                                    @if(Request::is("database/*/$dataYear")) style="display: block;" @endif>
                                    <li @if (Request::is("*/participation/$dataYear")) class="active" @endif><a
                                                href="{!! route('database.index', ['table' => 'participation', 'dataYear' => $dataYear]) !!}">Beteiligung
                                            an der Datenübermittlung</a></li>
                                    <li @if (Request::is("*/dataquality/$dataYear")) class="active" @endif><a
                                                href="{!! route('database.index', ['table' => 'dataquality', 'dataYear' => $dataYear]) !!}">Datenqualität</a>
                                    </li>
                                    <li @if (Request::is("*/unspecificcoding/$dataYear")) class="active" @endif><a
                                                href="{!! route('database.index', ['table' => 'unspecificcoding', 'dataYear' => $dataYear]) !!}">Unspezifische
                                            Kodierung</a></li>
                                </ul>
                            </li>
                            <!-- End Datenbasis -->
                            <!-- KH-Strukturdaten -->
                            <li class="treeview @if(Request::is("structure/*/$dataYear")) menu-open active @endif">
                                <a href="#">KH-Strukturdaten
                                    <span class="pull-right-container"><i
                                                class="fa fa-angle-left pull-right"></i></span>
                                </a>
                                <ul class="treeview-menu"
                                    @if(Request::is("structure/*/$dataYear")) style="display: block;" @endif>
                                    <li @if (Request::is("*/SizeByState/$dataYear")) class="active" @endif><a
                                                href="{!! route('structur.index', ['table' => 'SizeByState', 'dataYear' => $dataYear, 'bl' => 0]) !!}">Größenklassen
                                            (Bettenanzahl) / Bundesland</a></li>
                                    <li @if (Request::is("*/SizeByResponsible/$dataYear")) class="active" @endif><a
                                                href="{!! route('structur.index', ['table' => 'SizeByResponsible', 'dataYear' => $dataYear, 'traeger' => 0]) !!}">Größenklassen
                                            (Fälle) / Trägerschaft</a></li>
                                    <li @if (Request::is("*/CmiByBedClass/$dataYear")) class="active" @endif><a
                                                href="{!! route('structur.index', ['table' => 'CmiByBedClass', 'dataYear' => $dataYear, 'bettenstufe' => 0]) !!}">CMI-Klassen
                                            / Größen (Betten)</a></li>
                                </ul>
                            </li>
                            <!-- End KH-Strukturdaten -->
                            <!-- Vollstationäre Falldaten -->
                            <li class="treeview @if(Request::is("full/*/$dataYear")) menu-open active @endif">
                                <a href="#">Vollstationäre Falldaten
                                    <span class="pull-right-container"><i
                                                class="fa fa-angle-left pull-right"></i></span>
                                </a>
                                <ul class="treeview-menu"
                                    @if(Request::is("full/*/$dataYear")) style="display: block;" @endif>
                                    <li class="treeview @if(Request::is("full/ha/*/$dataYear")) menu-open active @endif">
                                        <a href="#">Versorgung in Hauptabteilungen
                                            <span class="pull-right-container"><i
                                                        class="fa fa-angle-left pull-right"></i></span>
                                        </a>
                                        <ul class="treeview-menu"
                                            @if(Request::is("full/ha/demo/*/$dataYear")) style="display: block;" @endif>
                                    <li class="treeview @if(Request::is("full/ha/demo/*/$dataYear")) menu-open active @endif">
                                        <a href="#">Demografische und medizinische Merkmale
                                            <span class="pull-right-container"><i
                                                        class="fa fa-angle-left pull-right"></i></span>
                                        </a>
                                        <ul class="treeview-menu"
                                            @if(Request::is("full/ha/demo/*/$dataYear"))  style="display: block;" @endif>
                                    <li @if (Request::is("*/characteristicsmdcgender/$dataYear")) class="active" @endif>
                                        <a href="{!! route('full.ha.demo', ['table' => 'characteristicsmdcgender', 'dataYear' => $dataYear]) !!}">nach
                                            MDC und Geschlecht</a></li>
                                    <li @if (Request::is("*/agegender/$dataYear")) class="active" @endif><a
                                                href="{!! route('full.ha.demo', ['table' => 'agegender', 'dataYear' => $dataYear]) !!}">nach
                                            Altersklassen und Geschlecht</a></li>
                                    <li @if (Request::is("*/drg/$dataYear")) class="active" @endif><a
                                                href="{!! route('full.ha.demo', ['table' => 'drg', 'dataYear' => $dataYear]) !!}">nach
                                            DRG</a></li>
                                    <li class="treeview @if(Request::is("full/ha/demo/main/*/$dataYear")) menu-open active @endif">
                                        <a href="#">nach Hauptdiagnosen (Alterskl.)
                                            <span class="pull-right-container"><i
                                                        class="fa fa-angle-left pull-right"></i></span>
                                        </a>
                                        <ul class="treeview-menu"
                                            @if(Request::is("full/ha/demo/main/*/$dataYear"))  style="display: block;" @endif>
                                            <li @if (Request::is("*/primarydiagsprocsInpatientpdchapter/$dataYear")) class="active" @endif>
                                                <a href="{!! route('full.ha.kh.main', ['table' => 'primarydiagsprocsInpatientpdchapter', 'dataYear' => $dataYear]) !!}">Kapitel</a>
                                            </li>
                                            <li @if (Request::is("*/primarydiagsprocsInpatientpdgroup/$dataYear")) class="active" @endif>
                                                <a href="{!! route('full.ha.kh.main', ['table' => 'primarydiagsprocsInpatientpdgroup', 'dataYear' => $dataYear]) !!}">Gruppe</a>
                                            </li>
                                            <li @if (Request::is("*/primarydiagsprocsInpatientpdcat/$dataYear")) class="active" @endif>
                                                <a href="{!! route('full.ha.kh.main', ['table' => 'primarydiagsprocsInpatientpdcat', 'dataYear' => $dataYear]) !!}">Kategorie</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="treeview @if(Request::is("full/ha/demo/proc/*/$dataYear")) menu-open active @endif">
                                        <a href="#">nach Prozeduren (Alterskl.)
                                            <span class="pull-right-container"><i
                                                        class="fa fa-angle-left pull-right"></i></span>
                                        </a>
                                        <ul class="treeview-menu"
                                            @if(Request::is("full/ha/demo/proc/*/$dataYear"))  style="display: block;" @endif>
                                            <li @if (Request::is("*/primarydiagsprocsInpatientprocchapter/$dataYear")) class="active" @endif>
                                                <a href="{!! route('full.ha.kh.proc', ['table' => 'primarydiagsprocsInpatientprocchapter', 'dataYear' => $dataYear]) !!}">Kapitel</a>
                                            </li>
                                            <li @if (Request::is("*/primarydiagsprocsInpatientprocarea/$dataYear")) class="active" @endif>
                                                <a href="{!! route('full.ha.kh.proc', ['table' => 'primarydiagsprocsInpatientprocarea', 'dataYear' => $dataYear]) !!}">Bereich</a>
                                            </li>
                                            <li @if (Request::is("*/primarydiagsprocsInpatientproccode/$dataYear")) class="active" @endif>
                                                <a href="{!! route('full.ha.kh.proc', ['table' => 'primarydiagsprocsInpatientproccode', 'dataYear' => $dataYear]) !!}">4-Steller</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="treeview @if(Request::is("full/ha/kh/*/$dataYear")) menu-open active @endif">
                                <a href="#">Versorgung im Krankenhaus
                                    <span class="pull-right-container"><i
                                                class="fa fa-angle-left pull-right"></i></span>
                                </a>
                                <ul class="treeview-menu"
                                    @if(Request::is("full/ha/kh/*/$dataYear"))  style="display: block;" @endif>
                                    <li @if (Request::is("*/InfoByHospitalSize/$dataYear")) class="active" @endif><a
                                                href="{!! route('full.ha.kh', ['table' => 'InfoByHospitalSize', 'dataYear' => $dataYear, 'bl' => 0]) !!}">Fallzahl,
                                            VWD, CMI nach Größe (Betten) / Bundesland</a></li>
                                    <li @if (Request::is("*/casesprimarydepartment/$dataYear")) class="active" @endif><a
                                                href="{!! route('full.ha.kh', ['table' => 'casesprimarydepartment', 'dataYear' => $dataYear]) !!}">Aufnahmeanlass
                                            und Entlassungs-/ Verlegegrund</a></li>
                                    <li @if (Request::is("*/numoperationsprimary/$dataYear")) class="active" @endif><a
                                                href="{!! route('full.ha.kh', ['table' => 'numoperationsprimary', 'dataYear' => $dataYear]) !!}">Häufigkeit
                                            von Operationen</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview @if(Request::is("full/bv/*/$dataYear")) menu-open active @endif">
                        <a href="#">Belegärztliche Versorgung
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu"
                            @if(Request::is("full/bv/*/$dataYear")) style="display: block;" @endif>
                            <li class="treeview @if(Request::is("full/bv/demo/*/$dataYear")) menu-open active @endif">
                                <a href="#">Demografische und medizinische Merkmale
                                    <span class="pull-right-container"><i
                                                class="fa fa-angle-left pull-right"></i></span>
                                </a>
                                <ul class="treeview-menu"
                                    @if(Request::is("full/bv/demo/*/$dataYear")) style="display: block;" @endif>
                                    <li @if (Request::is("*/SlipMcCharacteristicsMdcGender/$dataYear")) class="active" @endif>
                                        <a href="{!! route('full.bv.demo', ['table' => 'SlipMcCharacteristicsMdcGender', 'dataYear' => $dataYear]) !!}">nach
                                            MDC und Geschlecht</a></li>
                                    <li @if (Request::is("*/SlipMcAgeGender/$dataYear")) class="active" @endif><a
                                                href="{!! route('full.bv.demo', ['table' => 'SlipMcAgeGender', 'dataYear' => $dataYear]) !!}">nach
                                            Altersklassen und Geschlecht</a></li>
                                    <li @if (Request::is("*/SlipMcDrg/$dataYear")) class="active" @endif><a
                                                href="{!! route('full.bv.demo', ['table' => 'SlipMcDrg', 'dataYear' => $dataYear]) !!}">nach
                                            DRG</a></li>
                                    <li class="treeview @if(Request::is("full/bv/demo/main/*/$dataYear")) menu-open active @endif">
                                        <a href="#">nach Hauptdiagnosen (Alterskl.)
                                            <span class="pull-right-container"><i
                                                        class="fa fa-angle-left pull-right"></i></span>
                                        </a>
                                        <ul class="treeview-menu"
                                            @if(Request::is("full/bv/demo/main/*/$dataYear")) style="display: block;" @endif>
                                            <li @if (Request::is("*/PrimaryDiagsProcsSlipMcPdChapter/$dataYear")) class="active" @endif>
                                                <a href="{!! route('full.bv.kh.main', ['table' => 'PrimaryDiagsProcsSlipMcPdChapter', 'dataYear' => $dataYear]) !!}">Kapitel</a>
                                            </li>
                                            <li @if (Request::is("*/PrimaryDiagsProcsSlipMcPdGroup/$dataYear")) class="active" @endif>
                                                <a href="{!! route('full.bv.kh.main', ['table' => 'PrimaryDiagsProcsSlipMcPdGroup', 'dataYear' => $dataYear]) !!}">Gruppe</a>
                                            </li>
                                            <li @if (Request::is("*/PrimaryDiagsProcsSlipMcPdCat/$dataYear")) class="active" @endif>
                                                <a href="{!! route('full.bv.kh.main', ['table' => 'PrimaryDiagsProcsSlipMcPdCat', 'dataYear' => $dataYear]) !!}">Kategorie</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="treeview @if(Request::is("full/bv/demo/proc/*/$dataYear")) menu-open active @endif">
                                        <a href="#">nach Prozeduren (Alterskl.)
                                            <span class="pull-right-container"><i
                                                        class="fa fa-angle-left pull-right"></i></span>
                                        </a>
                                        <ul class="treeview-menu"
                                            @if(Request::is("full/bv/demo/proc/*/$dataYear")) style="display: block;" @endif>
                                            <li @if (Request::is("*/PrimaryDiagsProcsSlipMcProcChapter/$dataYear")) class="active" @endif>
                                                <a href="{!! route('full.bv.kh.proc', ['table' => 'PrimaryDiagsProcsSlipMcProcChapter', 'dataYear' => $dataYear]) !!}">Kapitel</a>
                                            </li>
                                            <li @if (Request::is("*/PrimaryDiagsProcsSlipMcProcArea/$dataYear")) class="active" @endif>
                                                <a href="{!! route('full.bv.kh.proc', ['table' => 'PrimaryDiagsProcsSlipMcProcArea', 'dataYear' => $dataYear]) !!}">Bereich</a>
                                            </li>
                                            <li @if (Request::is("*/PrimaryDiagsProcsSlipMcProcCode/$dataYear")) class="active" @endif>
                                                <a href="{!! route('full.bv.kh.proc', ['table' => 'PrimaryDiagsProcsSlipMcProcCode', 'dataYear' => $dataYear]) !!}">4-Steller</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="treeview @if(Request::is("full/bv/kh/main/*/$dataYear")) menu-open active @endif">
                                <a href="#">Versorgung im Krankenhaus
                                    <span class="pull-right-container"><i
                                                class="fa fa-angle-left pull-right"></i></span>
                                </a>
                                <ul class="treeview-menu"
                                    @if(Request::is("full/bv/kh/*/$dataYear"))  style="display: block;" @endif>
                                    <li @if (Request::is("*/InfoByHospitalSize2/$dataYear")) class="active" @endif><a
                                                href="{!! route('full.bv.kh', ['table' => 'InfoByHospitalSize2', 'dataYear' => $dataYear, 'bl' => 0]) !!}">Fallzahl,
                                            VWD, CMI nach Größe (Betten) / Bundesland</a></li>
                                    <li @if (Request::is("*/CasesSlipMc/$dataYear")) class="active" @endif><a
                                                href="{!! route('full.bv.kh', ['table' => 'CasesSlipMc', 'dataYear' => $dataYear]) !!}">Aufnahmeanlass
                                            und Entlassungs-/ Verlegegrund</a></li>
                                    <li @if (Request::is("*/NumOperationsSlipMc/$dataYear")) class="active" @endif><a
                                                href="{!! route('full.bv.kh', ['table' => 'NumOperationsSlipMc', 'dataYear' => $dataYear]) !!}">Häufigkeit
                                            von Operationen</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
            </ul>
            </li>
            <!-- End Vollstationäre Falldaten -->
            <!-- Teilstationäre Falldaten -->
            <li class="treeview @if(Request::is("part/*/$dataYear")) menu-open active @endif">
                <a href="#">Teilstationäre Fälle
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu" @if(Request::is("part/*/$dataYear"))  style="display: block;" @endif>
                    <li class="treeview @if(Request::is("part/hd/*/$dataYear")) menu-open active @endif">
                        <a href="#">Hauptdiagnosen
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu"
                            @if(Request::is("part/hd/*/$dataYear"))  style="display: block;" @endif>
                            <li @if (Request::is("*/PartialInpatientPdChapter/$dataYear")) class="active" @endif><a
                                        href="{!! route('part.hd', ['table' => 'PartialInpatientPdChapter', 'dataYear' => $dataYear]) !!}">Kapitel</a>
                            </li>
                            <li @if (Request::is("*/PartialInpatientPdGroup/$dataYear")) class="active" @endif><a
                                        href="{!! route('part.hd', ['table' => 'PartialInpatientPdGroup', 'dataYear' => $dataYear]) !!}">Gruppe</a>
                            </li>
                            <li @if (Request::is("*/PartialInpatientPdCat/$dataYear")) class="active" @endif><a
                                        href="{!! route('part.hd', ['table' => 'PartialInpatientPdCat', 'dataYear' => $dataYear]) !!}">Kategorie</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview @if(Request::is("part/proc/*/$dataYear")) menu-open active @endif">
                        <a href="#">Prozeduren
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu"
                            @if(Request::is("part/proc/*/$dataYear"))  style="display: block;" @endif>
                            <li @if (Request::is("*/PartialInpatientProcChapter/$dataYear")) class="active" @endif><a
                                        href="{!! route('part.proc', ['table' => 'PartialInpatientProcChapter', 'dataYear' => $dataYear]) !!}">Kapitel</a>
                            </li>
                            <li @if (Request::is("*/PartialInpatientProcArea/$dataYear")) class="active" @endif><a
                                        href="{!! route('part.proc', ['table' => 'PartialInpatientProcArea', 'dataYear' => $dataYear]) !!}">Bereich</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <!-- End Teilstationäre Falldaten -->
            <!-- G-DRG-System -->
            <li class="treeview @if(Request::is("gdrg/*/$dataYear")) menu-open active @endif">
                <a href="#">G-DRG-System
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu" @if(Request::is("gdrg/*/$dataYear"))  style="display: block;" @endif>
                    <li class="treeview @if(Request::is("gdrg/ha/*/$dataYear")) menu-open active @endif">
                        <a href="#">Hauptabteilungen
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu"
                            @if(Request::is("gdrg/ha/*/$dataYear"))  style="display: block;" @endif>
                            <li @if (Request::is("*/SystemRatedPdLessComplex/$dataYear")) class="active" @endif><a
                                        href="{!! route('gdrg.ha', ['table' => 'SystemRatedPdLessComplex', 'dataYear' => $dataYear]) !!}">20
                                    niedrigst bewertete Fallgruppen</a></li>
                            <li @if (Request::is("*/SystemRatedPdComplex/$dataYear")) class="active" @endif><a
                                        href="{!! route('gdrg.ha', ['table' => 'SystemRatedPdComplex', 'dataYear' => $dataYear]) !!}">20
                                    höchst bewertete Fallgruppen</a></li>
                            <li @if (Request::is("*/SystemRatedPdFrequently/$dataYear")) class="active" @endif><a
                                        href="{!! route('gdrg.ha', ['table' => 'SystemRatedPdFrequently', 'dataYear' => $dataYear]) !!}">20
                                    häufigste Fallgruppen</a></li>
                        </ul>
                    </li>
                    <li class="treeview @if(Request::is("gdrg/bv/*/$dataYear")) menu-open active @endif">
                        <a href="#">belegärztliche Versorgung
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu"
                            @if(Request::is("gdrg/bv/*/$dataYear"))  style="display: block;" @endif>
                            <li @if (Request::is("*/SystemRatedSlipMcLessComplex/$dataYear")) class="active" @endif><a
                                        href="{!! route('gdrg.bv', ['table' => 'SystemRatedSlipMcLessComplex', 'dataYear' => $dataYear]) !!}">20
                                    niedrigst bewertete Fallgruppen</a></li>
                            <li @if (Request::is("*/SystemRatedSlipMcComplex/$dataYear")) class="active" @endif><a
                                        href="{!! route('gdrg.bv', ['table' => 'SystemRatedSlipMcComplex', 'dataYear' => $dataYear]) !!}">20
                                    höchst bewertete Fallgruppen</a></li>
                            <li @if (Request::is("*/SystemRatedSlipMcFrequently/$dataYear")) class="active" @endif><a
                                        href="{!! route('gdrg.bv', ['table' => 'SystemRatedSlipMcFrequently', 'dataYear' => $dataYear]) !!}">20
                                    häufigste Fallgruppen</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <!-- End G-DRG-System -->
            <!-- Download -->

            <li><a href="{!! route('download.data', ['dataYear' => $dataYear]) !!}">Download Daten {{$dataYear}}</a></li>
            <!-- End Download -->
            </ul>
            </li>
            @endforeach
            </ul>
        </section>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('titel')
                <small>@yield('titelsmall')</small>
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <h5>Version 2018.0.1</h5>
        </div>
            <h5>© InEK GmbH - Institut für das Entgeltsystem im Krankenhaus 2010 - 2018 - G-DRG-Begleitforschungsbrowser </h5>
    </footer>
</div>
<script type="text/javascript">
    // To make Pace works on Ajax calls
    $(document).ajaxStart(function () {
        Pace.restart()
    })
    $('.ajax').click(function () {
        $.ajax({
            url: '#', success: function (result) {
                $('.ajax-content').html('<hr>Ajax Request Completed !')
            }
        })
    })
</script>
</body>
</html>
