<?php
/**
 * Created by PhpStorm.
 * User: AB-Nexttech
 * Date: 8/21/2019
 * Time: 7:42 PM
 */
$conn=mysqli_connect('localhost','skilling_skill2','skill@5674',"skilling_dmap");
//mysqli_select_db($conn,);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$db=mysqli_connect('localhost','skilling_skill','skill@5674',"admin_skilling");
//mysqli_select_db($conn,);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$url='http://skillingpakistan.gov.pk';
function get_table($table){
    global $db;
    $query1 = "select * from {$table} ORDER BY name ASC";
    $get=$db->query($query1);
    return $get;
}
function get_table_by_type($table,$column,$value,$count=0,$column2='',$value2='',$column3='',$value3=''){
    global $db;
    if($column2&&!$column3){
        if($count==1){
            $query = "select COUNT(*) as total from {$table} WHERE  {$column}='$value' AND {$column2}='$value2'  ORDER BY name ASC";
        }else{
            $query = "select * from {$table} WHERE {$column}='$value' AND {$column2}='$value2'  ORDER BY name ASC";
        }
    }elseif($column3){
        if($count==1){
            $query = "select COUNT(*) as total from {$table} WHERE  {$column}='$value' AND {$column2}='$value2' AND {$column3}='$value3'  ORDER BY name ASC";
        }else{
            $query = "select * from {$table} WHERE {$column}='$value' AND {$column2}='$value2' AND {$column3}='$value3' ORDER BY name ASC";
        }
    }
    else{
        if($count==1){
            $query = "select COUNT(*) as total from {$table} WHERE  {$column}='$value'  ORDER BY name ASC";
        }else{
            $query = "select * from {$table} WHERE {$column}='$value' ORDER BY name ASC";
        }
    }

if ($count==1){
    $d=$db->query($query);
    $get=mysqli_fetch_array($d);
}else{
    $get=$db->query($query);
}

    return $get;
}

function clean($st) {
    //$string=strtolower($st);
    $string=$st;
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    return preg_replace('/-+/', '', $string); // Replaces multiple hyphens with single one.
}

function get_district_id($name=''){//get districts ids
    $districts_table= get_table('districts');
//Districts
    while ($districts=mysqli_fetch_array($districts_table)){
        $district_array[clean($districts['name'])]=$districts['id'];
    }
    if ($name){
        return $district_array[$name];
    }
    return json_encode($district_array);
}
function get_province_id($name=''){//get districts ids
    $districts_table= get_table('provinces');
//Districts
    while ($districts=mysqli_fetch_array($districts_table)){
        $district_array[clean($districts['name'])]=$districts['id'];
    }
    if ($name){
        return $district_array[$name];
    }
    return json_encode($district_array);
}
//get_table_by_type('institutes','district_id',$districts['id'],'1','institute_type','1');//Vocational
//get_table_by_type('institutes','district_id',$districts['id'],'1','institute_type','2');//Technical
