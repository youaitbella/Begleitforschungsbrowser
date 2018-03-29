<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tableController extends Controller
{
    public function getTable(Request $request, $tableName, $dataYear)
    {
        if ($this->isDataYearValid($dataYear)) {
            switch ($tableName) {
                case 'participation':
                    $data = $this->getDataFromCSV('A_1_KH.csv', $dataYear);
                    $dataSum = $this->getDataFromCSV('A_1_sum.csv', $dataYear);
                    return view('participation', [
                        'data' => $data,
                        'dataSum' => $dataSum,
                        'year' => $dataYear
                    ]);
                    break;
                case 'dataquality':
                    $data = $this->getDataFromCSV('A_2_Datenqualitaet.csv', $dataYear);
                    return view('dataquality', [
                        'data' => $data,
                        'year' => $dataYear,
                    ]);
                    break;
                case 'unspecificcoding':
                    $data = $this->getDataFromCSV('A_3_Unspezif_Kodierung.csv', $dataYear);
                    return view('unspecificcoding', [
                        'data' => $data,
                        'year' => $dataYear
                    ]);
                    break;
                case 'characteristicsmdcgender':
                    $data = $this->getDataFromCSV('C_111_211.csv', $dataYear);
                    $filteredData = $this->filterDataByCol(0,1, $data);
                    $dataSum = $this->getDataFromCSV('C_111_sum.csv', $dataYear);
                    return view('characteristicsmdcgender', [
                        'data' => $filteredData,
                        'dataSum' => $dataSum,
                        'year' => $dataYear
                    ]);
                    break;
                case 'agegender':
                    $data = $this->getDataFromCSV('C_112_212.csv', $dataYear);
                    $filteredData = $this->filterDataByCol(0,1, $data);
                    $dataSum = $this->getDataFromCSV('C_112_sum.csv', $dataYear);
                    return view('agegender', [
                        'data' => $this->array_sort($filteredData, 9),
                        'dataSum' => $dataSum,
                        'year' => $dataYear
                    ]);
                    break;
                case 'drg':
                    $data = $this->getDataFromCSV('C_113_213.csv', $dataYear);
                    $filteredData = $this->filterDataByCol(0,1, $data);
                    $dataSum = $this->getDataFromCSV('C_113_sum.csv', $dataYear);
                    return view('drg', [
                        'data' => $filteredData,
                        'dataSum' => $dataSum,
                        'year' => $dataYear
                    ]);
                    break;
                case 'primarydiagsprocsInpatientpdchapter':
                    $data = $this->getDataFromCSV('C_1_2abc.csv', $dataYear);
                    $filteredData = $this->filterPrimaryDiagsProc(1,1, $data);
                    $dataSum = $this->getDataFromCSV('C_114_sum.csv', $dataYear);
                    return view('primarydiagsprocsInpatientpdchapter', [
                        'data' => $filteredData,
                        'dataSum' => $dataSum,
                        'year' => $dataYear
                    ]);
                    break;
                case 'primarydiagsprocsInpatientpdgroup':
                    $data = $this->getDataFromCSV('C_1_2abc.csv', $dataYear);
                    $filteredData = $this->filterPrimaryDiagsProc(2,1, $data);
                    $dataSum = $this->getDataFromCSV('C_114_sum.csv', $dataYear);
                    return view('primarydiagsprocsInpatientpdgroup', [
                        'data' => $filteredData,
                        'dataSum' => $dataSum,
                        'year' => $dataYear
                    ]);
                    break;
                case 'primarydiagsprocsInpatientpdcat':
                    $data = $this->getDataFromCSV('C_1_2abc.csv', $dataYear);
                    $filteredData = $this->filterPrimaryDiagsProc(3,1, $data);
                    $dataSum = $this->getDataFromCSV('C_114_sum.csv', $dataYear);
                    return view('primarydiagsprocsInpatientpdcat', [
                        'data' => $filteredData,
                        'dataSum' => $dataSum,
                        'year' => $dataYear
                    ]);
                    break;
                case 'primarydiagsprocsInpatientprocchapter':
                    $data = $this->getDataFromCSV('C_1_2abc.csv', $dataYear);
                    $filteredData = $this->filterPrimaryDiagsProc(1,2, $data);
                    $dataSum = $this->getDataFromCSV('C_115_sum.csv', $dataYear);
                    $dataCountProz = $this->getPercent($dataYear, 1);
                    return view('primarydiagsprocsInpatientprocchapter', [
                        'data' => $filteredData,
                        'dataSum' => $dataSum,
                        'countProz' => $dataCountProz,
                        'year' => $dataYear
                    ]);
                    break;
                case 'primarydiagsprocsInpatientprocarea':
                    $data = $this->getDataFromCSV('C_1_2abc.csv', $dataYear);
                    $filteredData = $this->filterPrimaryDiagsProc(2,2, $data);
                    $dataSum = $this->getDataFromCSV('C_115_sum.csv', $dataYear);
                    $dataCountProz = $this->getPercent($dataYear, 1);
                    return view('primarydiagsprocsInpatientprocarea', [
                        'data' => $filteredData,
                        'dataSum' => $dataSum,
                        'countProz' => $dataCountProz,
                        'year' => $dataYear
                    ]);
                    break;
                case 'primarydiagsprocsInpatientproccode':
                    $data = $this->getDataFromCSV('C_1_2abc.csv', $dataYear);
                    $filteredData = $this->filterPrimaryDiagsProc(3,2, $data);
                    $dataSum = $this->getDataFromCSV('C_115_sum.csv', $dataYear);
                    $dataCountProz = $this->getPercent($dataYear, 1);
                    return view('primarydiagsprocsInpatientproccode', [
                        'data' => $filteredData,
                        'dataSum' => $dataSum,
                        'countProz' => $dataCountProz,
                        'year' => $dataYear
                    ]);
                    break;
                case 'casesprimarydepartment':
                    $data1 = $this->getDataFromCSV('C_122_222.csv', $dataYear);
                    $filteredData1 = $this->filterDataByTwoCol(0,1,1,'A', $data1);
                    $data2 = $this->getDataFromCSV('C_122_222.csv', $dataYear);
                    $filteredData2 = $this->filterDataByTwoCol(0,1,2,'E', $data2);
                    return view('casesprimarydepartment', [
                        'data1' => $filteredData1,
                        'data2' => $filteredData2,
                        'year' => $dataYear
                    ]);
                    break;
                case 'numoperationsprimary':
                    $data = $this->getDataFromCSV('C_123_223.csv', $dataYear);
                    $filteredData = $this->filterDataByCol(0,'1', $data);
                    return view('numoperationsprimary', [
                        'data' => $filteredData,
                        'year' => $dataYear
                    ]);
                    break;
                case 'SlipMcCharacteristicsMdcGender':
                    $data = $this->getDataFromCSV('C_111_211.csv', $dataYear);
                    $filteredData = $this->filterDataByCol(0,2, $data);
                    $dataSum = $this->getDataFromCSV('C_211_sum.csv', $dataYear);
                    return view('SlipMcCharacteristicsMdcGender', [
                        'data' => $filteredData,
                        'dataSum' => $dataSum,
                        'year' => $dataYear
                    ]);
                    break;
                case 'SlipMcAgeGender':
                    $data = $this->getDataFromCSV('C_112_212.csv', $dataYear);
                    $filteredData = $this->filterDataByCol(0,2, $data);
                    $dataSum = $this->getDataFromCSV('C_212_sum.csv', $dataYear);
                    return view('SlipMcAgeGender', [
                        'data' => $filteredData,
                        'dataSum' => $dataSum,
                        'year' => $dataYear
                    ]);
                    break;
                case 'SlipMcDrg':
                    $data = $this->getDataFromCSV('C_113_213.csv', $dataYear);
                    $filteredData = $this->filterDataByCol(0,2, $data);
                    $dataSum = $this->getDataFromCSV('C_213_sum.csv', $dataYear);
                    return view('SlipMcDrg', [
                        'data' => $filteredData,
                        'dataSum' => $dataSum,
                        'year' => $dataYear
                    ]);
                    break;
                case 'PrimaryDiagsProcsSlipMcPdChapter':
                    $data = $this->getDataFromCSV('C_1_2abc.csv', $dataYear);
                    $filteredData = $this->filterPrimaryDiagsProc(1,3, $data);
                    $dataSum = $this->getDataFromCSV('C_214_sum.csv', $dataYear);
                    return view('PrimaryDiagsProcsSlipMcPdChapter', [
                        'data' => $filteredData,
                        'dataSum' => $dataSum,
                        'year' => $dataYear
                    ]);
                    break;
                case 'PrimaryDiagsProcsSlipMcPdGroup':
                    $data = $this->getDataFromCSV('C_1_2abc.csv', $dataYear);
                    $filteredData = $this->filterPrimaryDiagsProc(2,3, $data);
                    $dataSum = $this->getDataFromCSV('C_214_sum.csv', $dataYear);
                    return view('PrimaryDiagsProcsSlipMcPdGroup', [
                        'data' => $filteredData,
                        'dataSum' => $dataSum,
                        'year' => $dataYear
                    ]);
                    break;
                case 'PrimaryDiagsProcsSlipMcPdCat':
                    $data = $this->getDataFromCSV('C_1_2abc.csv', $dataYear);
                    $filteredData = $this->filterPrimaryDiagsProc(3,3, $data);
                    $dataSum = $this->getDataFromCSV('C_214_sum.csv', $dataYear);
                    return view('PrimaryDiagsProcsSlipMcPdCat', [
                        'data' => $filteredData,
                        'dataSum' => $dataSum,
                        'year' => $dataYear
                    ]);
                    break;
                case 'SizeByState':
                    $data = $this->getDataFromCSV('B_1_KH_Bundesland_Groesse(Betten).csv', $dataYear);
                    $filteredData = $this->filterDataByCol(4,$request->input('bl'), $data);
                    $dataSum = $this->getColSum(2, $filteredData);
                    return view('SizeByState', [
                        'data' => array_sort($filteredData,5),
                        'dataSum' => $dataSum,
                        'year' => $dataYear
                    ]);
                    break;
                case 'SizeByResponsible':
                    $data = $this->getDataFromCSV('B_2_KH_Traeger_Groesse(Faelle).csv', $dataYear);
                    $filteredData = $this->filterDataByCol(5,$request->input('traeger'), $data);
                    $dataSum = $this->getColSum(2, $filteredData);
                    return view('SizeByResponsible', [
                        'data' => array_sort($filteredData,5),
                        'dataSum' => $dataSum,
                        'year' => $dataYear
                    ]);
                    break;
                case 'CmiByBedClass':
                    $data = $this->getDataFromCSV('B_3_KH_Groesse(Betten)_CMI.csv', $dataYear);
                    $filteredData = $this->filterDataByCol(0,$request->input('bettenstufe'), $data);
                    $dataSum = $this->getColSum(2, $filteredData);
                    return view('CmiByBedClass', [
                        'data' => $this->array_sort($filteredData,5),
                        'dataSum' => $dataSum,
                        'year' => $dataYear
                    ]);
                    break;
                case 'InfoByHospitalSize':
                    $data = $this->getDataFromCSV('C_121_221_Bundesland_Groesse(Betten)_FZ_VWD_CMI.csv', $dataYear);
                    $filteredData = $this->filterDataByTwoCol(0,8,1,$request->input('bl'), $data);
                    $dataSum = $this->getDataFromCSV('C_121_221_sum.csv', $dataYear);
                    $filteredDataSum = $this->filterDataByTwoCol(0,7,1,$request->input('bl'), $dataSum);
                    return view('InfoByHospitalSize', [
                        'data' => $this->array_sort($filteredData,9),
                        'dataSum' => $filteredDataSum,
                        'year' => $dataYear
                    ]);
                    break;
                case 'PrimaryDiagsProcsSlipMcProcChapter':
                    $data = $this->getDataFromCSV('C_1_2abc.csv', $dataYear);
                    $filteredData = $this->filterPrimaryDiagsProc(1,4, $data);
                    $dataSum = $this->getDataFromCSV('C_215_sum.csv', $dataYear);
                    $dataCountProz = $this->getPercent($dataYear, 2);
                    return view('PrimaryDiagsProcsSlipMcProcChapter', [
                        'data' => $filteredData,
                        'dataSum' => $dataSum,
                        'countProz' => $dataCountProz,
                        'year' => $dataYear
                    ]);
                    break;
                case 'PrimaryDiagsProcsSlipMcProcArea':
                    $data = $this->getDataFromCSV('C_1_2abc.csv', $dataYear);
                    $filteredData = $this->filterPrimaryDiagsProc(2,4, $data);
                    $dataSum = $this->getDataFromCSV('C_215_sum.csv', $dataYear);
                    $dataCountProz = $this->getPercent($dataYear, 2);
                    return view('PrimaryDiagsProcsSlipMcProcArea', [
                        'data' => $filteredData,
                        'dataSum' => $dataSum,
                        'countProz' => $dataCountProz,
                        'year' => $dataYear
                    ]);
                    break;
                case 'PrimaryDiagsProcsSlipMcProcCode':
                    $data = $this->getDataFromCSV('C_1_2abc.csv', $dataYear);
                    $filteredData = $this->filterPrimaryDiagsProc(3,4, $data);
                    $dataSum = $this->getDataFromCSV('C_215_sum.csv', $dataYear);
                    $dataCountProz = $this->getPercent($dataYear, 2);
                    return view('PrimaryDiagsProcsSlipMcProcCode', [
                        'data' => $filteredData,
                        'dataSum' => $dataSum,
                        'countProz' => $dataCountProz,
                        'year' => $dataYear
                    ]);
                    break;
                case 'InfoByHospitalSize2':
                    $data = $this->getDataFromCSV('C_121_221_Bundesland_Groesse(Betten)_FZ_VWD_CMI.csv', $dataYear);
                    $filteredData = $this->filterDataByTwoCol(0,8,2,$request->input('bl'), $data);
                    $dataSum = $this->getDataFromCSV('C_121_221_sum.csv', $dataYear);
                    $filteredDataSum = $this->filterDataByTwoCol(0,7,2,$request->input('bl'), $dataSum);
                    return view('InfoByHospitalSize2', [
                        'data' => $this->array_sort($filteredData,9),
                        'dataSum' => $filteredDataSum,
                        'year' => $dataYear
                    ]);
                    break;
                case 'CasesSlipMc':
                    $data1 = $this->getDataFromCSV('C_122_222.csv', $dataYear);
                    $data2 = $this->getDataFromCSV('C_122_222.csv', $dataYear);
                    $filteredData1 = $this->filterDataByTwoCol(0,1,1,'A', $data1);
                    $filteredData2 = $this->filterDataByTwoCol(0,1,2,'E', $data2);
                    return view('CasesSlipMc', [
                        'data1' => $filteredData1,
                        'data2' => $filteredData2,
                        'year' => $dataYear
                    ]);
                    break;
                case 'NumOperationsSlipMc':
                    $data = $this->getDataFromCSV('C_123_223.csv', $dataYear);
                    $filteredData = $this->filterDataByCol(0,'2', $data);
                    return view('NumOperationsSlipMc', [
                        'data' => $filteredData,
                        'year' => $dataYear
                    ]);
                    break;
                case 'PartialInpatientPdChapter':
                    $data = $this->getDataFromCSV('D.csv', $dataYear);
                    $filteredData = $this->filterDataByCol(0,1, $data);
                    $dataSum = $this->getDataFromCSV('D_1_sum.csv', $dataYear);
                    return view('PartialInpatientPdChapter', [
                        'data' => array_sort($filteredData,5),
                        'dataSum' => $dataSum,
                        'year' => $dataYear
                    ]);
                    break;
                case 'PartialInpatientPdGroup':
                    $data = $this->getDataFromCSV('D.csv', $dataYear);
                    $filteredData = $this->filterDataByCol(0,2, $data);
                    $dataSum = $this->getDataFromCSV('D_1_sum.csv', $dataYear);
                    return view('PartialInpatientPdGroup', [
                        'data' => array_sort($filteredData,5),
                        'dataSum' => $dataSum,
                        'year' => $dataYear
                    ]);
                    break;
                case 'PartialInpatientPdCat':
                    $data = $this->getDataFromCSV('D.csv', $dataYear);
                    $filteredData = $this->filterDataByCol(0,3, $data);
                    $dataSum = $this->getDataFromCSV('D_1_sum.csv', $dataYear);
                    return view('PartialInpatientPdCat', [
                        'data' => array_sort($filteredData,5),
                        'dataSum' => $dataSum,
                        'year' => $dataYear
                    ]);
                    break;
                case 'PartialInpatientProcChapter':
                    $data = $this->getDataFromCSV('D.csv', $dataYear);
                    $filteredData = $this->filterDataByCol(0,4, $data);
                    $dataSum = $this->getDataFromCSV('D_2_sum.csv', $dataYear);
                    return view('PartialInpatientProcChapter', [
                        'data' => array_sort($filteredData,5),
                        'dataSum' => $dataSum,
                        'year' => $dataYear
                    ]);
                    break;
                case 'PartialInpatientProcArea':
                    $data = $this->getDataFromCSV('D.csv', $dataYear);
                    $filteredData = $this->filterDataByCol(0,5, $data);
                    $dataSum = $this->getDataFromCSV('D_2_sum.csv', $dataYear);
                    return view('PartialInpatientProcArea', [
                        'data' => array_sort($filteredData,5),
                        'dataSum' => $dataSum,
                        'year' => $dataYear
                    ]);
                    break;
                case 'SystemRatedPdLessComplex':
                    $data = $this->getDataFromCSV('E.csv', $dataYear);
                    $filteredData = $this->filterDataByCol(0,1, $data);
                    $dataSum = $this->getDataFromCSV('E_1a_sum.csv', $dataYear);
                    return view('SystemRatedPdLessComplex', [
                        'data' => $this->array_sort($filteredData, 3),
                        'dataSum' => $dataSum,
                        'year' => $dataYear
                    ]);
                    break;
                case 'SystemRatedPdComplex':
                    $data = $this->getDataFromCSV('E.csv', $dataYear);
                    $filteredData = $this->filterDataByCol(0,3, $data);
                    $dataSum = $this->getDataFromCSV('E_2a_sum.csv', $dataYear);
                    return view('SystemRatedPdComplex', [
                        'data' => $this->array_sort($filteredData, 3, false),
                        'dataSum' => $dataSum,
                        'year' => $dataYear
                    ]);
                    break;
                case 'SystemRatedPdFrequently':
                    $data = $this->getDataFromCSV('E.csv', $dataYear);
                    $filteredData = $this->filterDataByCol(0,5, $data);
                    $dataSum = $this->getDataFromCSV('E_3a_sum.csv', $dataYear);
                    return view('SystemRatedPdFrequently', [
                        'data' => $this->array_sort($filteredData, 4, false),
                        'dataSum' => $dataSum,
                        'year' => $dataYear
                    ]);
                    break;
                case 'SystemRatedSlipMcLessComplex':
                    $data = $this->getDataFromCSV('E.csv', $dataYear);
                    $filteredData = $this->filterDataByCol(0,2, $data);
                    $dataSum = $this->getDataFromCSV('E_1b_sum.csv', $dataYear);
                    return view('SystemRatedSlipMcLessComplex', [
                        'data' => $this->array_sort($filteredData, 3),
                        'dataSum' => $dataSum,
                        'year' => $dataYear
                    ]);
                    break;
                case 'SystemRatedSlipMcComplex':
                    $data = $this->getDataFromCSV('E.csv', $dataYear);
                    $filteredData = $this->filterDataByCol(0,4, $data);
                    $dataSum = $this->getDataFromCSV('E_2b_sum.csv', $dataYear);
                    return view('SystemRatedSlipMcComplex', [
                        'data' => $this->array_sort($filteredData, 3, false),
                        'dataSum' => $dataSum,
                        'year' => $dataYear
                    ]);
                    break;
                case 'SystemRatedSlipMcFrequently':
                    $data = $this->getDataFromCSV('E.csv', $dataYear);
                    $filteredData = $this->filterDataByCol(0,6, $data);
                    $dataSum = $this->getDataFromCSV('E_3b_sum.csv', $dataYear);
                    return view('SystemRatedSlipMcFrequently', [
                        'data' => $this->array_sort($filteredData, 4, false),
                        'dataSum' => $dataSum,
                        'year' => $dataYear
                    ]);
                    break;
            }
        }
        else {
            abort(404);
        }
    }

    public function getPercent($dataYear, $department) {
        $data = $this->getDataFromCSV('Proz_HA_BA.csv', $dataYear);
        $filteredData = $this->filterDataByCol(0, $department, $data);
        return $filteredData[0][1];
    }

    public function filterPrimaryDiagsProc($type1, $type2, $data) {
        $filteredData = [];
        foreach($data as $entry) {
            if($entry[0] == $type1 && $entry[1] == $type2 ) {
                array_push($filteredData, $entry);
            }
        }
        return $filteredData;
    }

    public function filterDataByCol($col, $filter, $data) {
        $filteredData = [];
        foreach($data as $entry) {
            if($entry[$col] == $filter) {
                array_push($filteredData, $entry);
            }
        }
        return array_sort($filteredData,5);
    }

    public function filterDataByTwoCol($col1, $col2, $filter1, $filter2, $data) {
        $filteredData = [];
        foreach($data as $entry) {
            if($entry[$col1] == $filter1 && $entry[$col2] == $filter2) {
                array_push($filteredData, $entry);
            }
        }
        return array_sort($filteredData,5);
    }

    public function getColSum($col, $data) {
        $colSum = 0;
        foreach($data as $entry) {
            $colSum += $entry[$col];
        }
        return $colSum;
    }

    public function isDataYearValid($dataYear) {
        $dirs = scandir(public_path('content/'));
        foreach($dirs as $dir) {
            if(strlen ($dir) == 4) {
                if($dir == $dataYear) {
                    return true;
                }
            }
        }
        return false;
    }

    public function getDataFromCSV($csv, $dataYear) {
        $csvFile = file('content\\' . strval($dataYear) . '\\' . $csv);
        $data = [];
        foreach ($csvFile as $line) {
            $data[] = str_getcsv($line, ';');
        }
        unset($data[0]);
        return $data;
    }

    public function array_sort($array, $col, $sort_ascending=true)     {
        if (count($array))
                $temp_array[key($array)] = array_shift($array);

            foreach($array as $key => $val){
                $offset = 0;
                $found = false;
                foreach($temp_array as $tmp_key => $tmp_val)
                {
                    if(!$found and strtolower($val[$col]) > strtolower($tmp_val[$col]))
                    {
                        $temp_array = array_merge(    (array)array_slice($temp_array,0,$offset),
                            array($key => $val),
                            array_slice($temp_array,$offset)
                        );
                        $found = true;
                    }
                    $offset++;
                }
                if(!$found) $temp_array = array_merge($temp_array, array($key => $val));
            }

            if ($sort_ascending) $array = array_reverse($temp_array);

            else $array = $temp_array;
        return $array;
    }
}
