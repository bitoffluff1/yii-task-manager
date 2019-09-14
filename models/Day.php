<?php


namespace app\models;


use yii\base\Model;

class Day extends Model
{
    public $dayOff = false; //false - рабочий, true - выходной
    public $activities;
}