<?php

require 'common.php';

$error = false;
$wieght = '';
$height = '';
$BMI = '';

if (isset($_POST['form_sub']) && $_POST['form_sub'] == 1) {
    $weight = $_POST['weight'];
    $height = $_POST['height'];

    //weight validation
    if ($weight == '' && strlen($weight) == 0) {
        $error = true;
        $weight_error = "You must fill your weight.";
    } else if (!is_numeric($weight)) {
        $error = true;
        $weight_error = "You should type number.";
    }

    //height validation
    if ($height == '' && strlen($height) == 0) {
        $error = true;
        $height_error = "You must fill your height.";
    } else if (!is_numeric($height)) {
        $error = true;
        $height = "You should type number.";
    }

    //calculate BMI
    if (!$error) {
        $height_metre = $height / 100;
        $BMI = $weight / ($height_metre * $height_metre);
    }

    // BMI categories
    if ($bmi < 18.5) {
        $bmi_category = "Underweight";
    } elseif ($bmi < 24.9) {
        $bmi_category = "Normal weight";
    } elseif ($bmi < 29.9) {
        $bmi_category = "Overweight";
    } else {
        $bmi_category = "Obese";
    }
}

require 'header.php';
require 'under_header.php';
?>

<div class="container">
    <div class="card-body pt-5">
        <h1 class="text-center text-color">Calculate BMI</h1>
        <form class="mt-5 mb-5 login-input" method="POST">
            <div class="form-group">
                <label>Height (cm):</label>
                <input type="number" class="form-control" step="0.1" value="<?= $weight ?>" name="weight">
                <label for="weight" class="text-danger"><?= $email_error ?></label>
            </div>
            <div class="form-group">
                <label>Weight (kg):</label>
                <input type="number" class="form-control" step="0.1" value="<?= $height ?>" name="height">
                <label for="height" class="text-danger"><?= $height_error ?></label>
            </div>
            <input type="hidden" name="form_sub" value="1">
            <button class="btn btn-dark login-form__btn submit w-100">Execute</button>
            <br>
            <br>
            <label for="result">Result</label>
            <input type="text" class="form-control" value="<?= $BMI ?> <?= $bmi_category ?>">
        </form>
    </div>
</div>


<?=
require 'footer.php';
?>