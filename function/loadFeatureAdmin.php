<?php
session_start();
include '../includes/autoload.php';

if (isset($_POST['loadFeatures'])) {
    $output = "";
    if (isset($_POST['perId'])) {
        $perId = $_POST['perId'];
    } else {
        $perId = $_SESSION['auth_user']['id_quyen'];
    }
    $featuresView = new FeaturesView();
    $result = $featuresView->getAllFeaturesView();
    $resultFeaturesOfPermission = $featuresView->getFeaturesByIdPerView($perId);
    if ($result) {
        $stt = 1;
        foreach ($result as $item) {
            $tenchucnang = $item['tenchucnang'];
            $id_chucnang = $item['id_chucnang'];
            if ($resultFeaturesOfPermission) {
                foreach ($resultFeaturesOfPermission as $item123) {
                    if ($id_chucnang == $item123['id_chucnang']) {
                        $className = 'checked';
                        break;
                    } else {
                        $className = '';
                    }
                }
                $output .= "<tr>
            <td class=' fs-5'>{$stt}</td>
            <td class=' fs-5'>{$tenchucnang}</td>
            <td class=' fs-5' id='{$id_chucnang}'>
                                <div class='form-check form-switch'>
                                <input class='form-check-input' type='checkbox' role='switch' id='flexSwitchCheckChecked' $className>
                                 </div>
            </td>
            
        </tr>";
                $stt++;
            } else {
                $output .= "<tr>
            <td class=' fs-5'>{$stt}</td>
            <td class=' fs-5'>{$tenchucnang}</td>
            <td class=' fs-5' id='{$id_chucnang}'>
                                <div class='form-check form-switch'>
                                <input class='form-check-input input-features' fid='{$id_chucnang}' type='checkbox' role='switch' id='flexSwitchCheckChecked'>
                                 </div>
            </td>
            
        </tr>";
                $stt++;
            }
        }
        echo $output;
    } else echo "Not Found";
}
