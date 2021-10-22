<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$checkMember = 0;

if (isset($_COOKIE['owner_flag'])) {
    if ($_COOKIE['owner_flag'] == 'Y') {
        $vehicles = getVehicleInfoToArray()['resultData'];
        
        foreach($vehicles as $vehicle) {
            $vin = $vehicle["vehicl_no"];
            $model = $vehicle["model"];
            $modelYear = (int)$vehicle["model_year"];
            
            // echo $model . " || " . $modelYear;

            if (($model == "XC90" || $model == "S90" || $model == "V90CC") && $modelYear >= 2017) {
                $checkMember += 1;
            }
            
            if (($model == "XC60" || $model == "XC40") && $modelYear >= 2018) {
                $checkMember += 1;
            }

            if (($model == "S60" || $model == "V60CC") && $modelYear >= 2019) {
                $checkMember += 1;
            }
            
            // echo $vin;
            // $sql = " SELECT count(*) FROM volvo_promo_apply_1 where vin = '{$vin}'";
            // $checkMember += $db->select_one($sql);
        }
    }
}

echo $checkMember;
?>