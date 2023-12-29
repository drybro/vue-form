<?php
// $ php -S localhost:3000 validate.php
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);

if (!empty($_POST)) $data = $_POST;
else exit;

if (!array_key_exists('agreed', $data))
    $ret = ['error' => ['agreed' => 'required']];
elseif (!array_key_exists('word', $data))
    $ret = ['error' => ['word' => 'required']];
elseif (strlen($data['word']) < 5)
    $ret = ['error' => ['word' => 'min length 5']];
elseif (!array_key_exists('numb', $data))
    $ret = ['error' => ['numb' => 'required']];
elseif (!is_numeric($data['numb']))
    $ret = ['error' => ['numb' => 'NaN']];
elseif ($data['numb'] > 100)
    $ret = ['error' => ['numb' => '100 max']];
elseif ($data['numb'] < 5)
    $ret = ['error' => ['numb' => '5 min']];
elseif (!array_key_exists('details', $data))
    $ret = ['error' => ['details' => 'required']];
elseif (strlen($data['details']) > 255)
    $ret = ['error' => ['details' => 'max length 255']];
elseif (!array_key_exists('phone', $data))
    $ret = ['error' => ['phone' => 'required']];
elseif (!preg_match('(\d\d\d-\d\d\d\d)', $data['phone']))
    $ret = ['error' => ['phone' => 'format 555-5555']];
elseif (!array_key_exists('dayOfWeek', $data))
    $ret = ['error' => ['dayOfWeek' => 'required']];
elseif (!array_key_exists('daysOfWeek', $data))
    $ret = ['error' => ['daysOfWeek' => 'required']];
elseif (
    !empty(array_intersect($data['daysOfWeek'], array('Mon', 'Tue', 'Wed', 'Thu', 'Fri')))
    && !empty(array_intersect($data['daysOfWeek'], array('Sat', 'Sun')))
)
    $ret = ['error' => ['daysOfWeek' => 'Select ether weekdays or weekends.']];
else $ret = $data;
echo json_encode($ret);
