<?php
/*----------------------------------------------------------------------------------*\
    阴历资料设定
    struct tagLunarCal
    {
        int 'BaseDays';         // 到西历 1 月 1 日到农历正月初一的累积日数
        int 'Intercalation';    // 闰月月份. 0==此年没有闰月
        int 'BaseWeekday';      // 此年西历 1 月 1 日为星期几再减 1
        int 'BaseKanChih';      // 此年西历 1 月 1 日之干支序号减 1
        int 'MonthDays'[13];    // 此农历年每月之大小, 0==小月(29日), 1==大月(30日)
    };
\*----------------------------------------------------------------------------------*/

define("FIRSTYEAR", 1900);
define("LASTYEAR", 2099);

global $gloLunarCal, $gloSolarCal, $gloSolarDays;

$gloLunarCal = array (
	array ( // 1900
		'BaseDays' => 30,
		'Intercalation' => 8,
		'BaseWeekday' => 0,
		'BaseKanChih' => 17,
		'MonthDays' => array (0, 1, 0, 0, 1, 0, 1, 1, 0, 1, 1, 0, 1)
		),
	array (
		'BaseDays' => 49,
		'Intercalation' => 0,
		'BaseWeekday' => 1,
		'BaseKanChih' => 17,
		'MonthDays' => array (0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 1, 0, 1)
		),
	array (
		'BaseDays' => 38,
		'Intercalation' => 0,
		'BaseWeekday' => 2,
		'BaseKanChih' => 17,
		'MonthDays' => array (1, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 1, 0)
		),
	array (
		'BaseDays' => 28,
		'Intercalation' => 5,
		'BaseWeekday' => 3,
		'BaseKanChih' => 17,
		'MonthDays' => array (0, 1, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, 1)
		),
	array ( // 1904
		'BaseDays' => 46,
		'Intercalation' => 0,
		'BaseWeekday' => 4,
		'BaseKanChih' => 17,
		'MonthDays' => array (1, 1, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, 1)
		),
	array (
		'BaseDays' => 34,
		'Intercalation' => 0,
		'BaseWeekday' => 6,
		'BaseKanChih' => 17,
		'MonthDays' => array (1, 1, 0, 1, 1, 0, 0, 1, 0, 1, 0, 1, 0)
		),
	array (
		'BaseDays' => 24,
		'Intercalation' => 4,
		'BaseWeekday' => 0,
		'BaseKanChih' => 17,
		'MonthDays' => array (0, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1)
		),
	array (
		'BaseDays' => 43,
		'Intercalation' => 0,
		'BaseWeekday' => 1,
		'BaseKanChih' => 17,
		'MonthDays' => array (0, 1, 0, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1)
		),
	array ( // 1908
		'BaseDays' => 32,
		'Intercalation' => 0,
		'BaseWeekday' => 2,
		'BaseKanChih' => 17,
		'MonthDays' => array (1, 0, 0, 1, 1, 0, 1, 0, 1, 1, 0, 1, 0)
		),
	array (
		'BaseDays' => 21,
		'Intercalation' => 2,
		'BaseWeekday' => 4,
		'BaseKanChih' => 17,
		'MonthDays' => array (0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 1, 0, 1)
		),
	array (
		'BaseDays' => 40,
		'Intercalation' => 0,
		'BaseWeekday' => 5,
		'BaseKanChih' => 17,
		'MonthDays' => array (0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 1, 0, 1)
		),
	array (
		'BaseDays' => 29,
		'Intercalation' => 6,
		'BaseWeekday' => 6,
		'BaseKanChih' => 17,
		'MonthDays' => array (1, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, 1, 1)
		),
	array ( // 1912
		'BaseDays' => 48,
		'Intercalation' => 0,
		'BaseWeekday' => 0,
		'BaseKanChih' => 17,
		'MonthDays' => array (1, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, 1, 1)
		),
	array (
		'BaseDays' => 36,
		'Intercalation' => 0,
		'BaseWeekday' => 2,
		'BaseKanChih' => 17,
		'MonthDays' => array (1, 1, 0, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1)
		),
	array (
		'BaseDays' => 25,
		'Intercalation' => 5,
		'BaseWeekday' => 3,
		'BaseKanChih' => 17,
		'MonthDays' => array (1, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 0, 1)
		),
	array (
		'BaseDays' => 44,
		'Intercalation' => 0,
		'BaseWeekday' => 4,
		'BaseKanChih' => 17,
		'MonthDays' => array (1, 0, 1, 1, 0, 1, 0, 1, 0, 1, 0, 0, 1)
		),
	array ( // 1916
		'BaseDays' => 33,
		'Intercalation' => 0,
		'BaseWeekday' => 5,
		'BaseKanChih' => 17,
		'MonthDays' => array (1, 1, 0, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1)
		),
	array (
		'BaseDays' => 22,
		'Intercalation' => 2,
		'BaseWeekday' => 0,
		'BaseKanChih' => 17,
		'MonthDays' => array (1, 0, 0, 1, 0, 1, 1, 0, 1, 1, 0, 1, 0)
		),
	array (
		'BaseDays' => 41,
		'Intercalation' => 0,
		'BaseWeekday' => 1,
		'BaseKanChih' => 17,
		'MonthDays' => array (1, 0, 0, 1, 0, 1, 0, 1, 1, 0, 1, 1, 0)
		),
	array (
		'BaseDays' => 31,
		'Intercalation' => 7,
		'BaseWeekday' => 2,
		'BaseKanChih' => 17,
		'MonthDays' => array (0, 1, 0, 0, 1, 0, 0, 1, 1, 0, 1, 1, 1)
		),
	array ( // 1920
		'BaseDays' => 50,
		'Intercalation' => 0,
		'BaseWeekday' => 3,
		'BaseKanChih' => 17,
		'MonthDays' => array (0, 1, 0, 0, 1, 0, 0, 1, 1, 0, 1, 1, 1)
		),
	array (
		'BaseDays' => 38,
		'Intercalation' => 0,
		'BaseWeekday' => 5,
		'BaseKanChih' => 17,
		'MonthDays' => array (1, 0, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 1)
		),
	array (
		'BaseDays' => 27,
		'Intercalation' => 5,
		'BaseWeekday' => 6,
		'BaseKanChih' => 17,
		'MonthDays' => array (1, 0, 1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1)
		),
	array (
		'BaseDays' => 46,
		'Intercalation' => 0,
		'BaseWeekday' => 0,
		'BaseKanChih' => 17,
		'MonthDays' => array (0, 1, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0)
		),
	array ( // 1924
		'BaseDays' => 35,
		'Intercalation' => 0,
		'BaseWeekday' => 1,
		'BaseKanChih' => 17,
		'MonthDays' => array (0, 1, 1, 0, 1, 1, 0, 1, 0, 1, 0, 0, 1)
		),
	array (
		'BaseDays' => 23,
		'Intercalation' => 4,
		'BaseWeekday' => 3,
		'BaseKanChih' => 17,
		'MonthDays' => array (1, 0, 1, 0, 1, 1, 0, 1, 1, 0, 1, 0, 1)
		),
	array (
		'BaseDays' => 43,
		'Intercalation' => 0,
		'BaseWeekday' => 4,
		'BaseKanChih' => 17,
		'MonthDays' => array (0, 0, 1, 0, 1, 0, 1, 1, 0, 1, 1, 0, 1)
		),
	array (
		'BaseDays' => 32,
		'Intercalation' => 0,
		'BaseWeekday' => 5,
		'BaseKanChih' => 17,
		'MonthDays' => array (1, 0, 0, 1, 0, 1, 0, 1, 0, 1, 1, 1, 0)
		),
	array ( // 1928
		'BaseDays' => 22,
		'Intercalation' => 2,
		'BaseWeekday' => 6,
		'BaseKanChih' => 17,
		'MonthDays' => array (0, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 1, 1)
		),
	array (
		'BaseDays' => 40,
		'Intercalation' => 0,
		'BaseWeekday' => 1,
		'BaseKanChih' => 17,
		'MonthDays' => array (0, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 1, 0)
		),
	array (
		'BaseDays' => 29,
		'Intercalation' => 0,
		'BaseWeekday' => 2,
		'BaseKanChih' => 17,
		'MonthDays' => array (0, 1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 0)
		),
	array (
		'BaseDays' => 47,
		'Intercalation' => 0,
		'BaseWeekday' => 3,
		'BaseKanChih' => 17,
		'MonthDays' => array (1, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1)
		),
	array ( // 1932
		'BaseDays' => 36,
		'Intercalation' => 0,
		'BaseWeekday' => 4,
		'BaseKanChih' => 17,
		'MonthDays' => array (1, 1, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0)
		),
	array (
		'BaseDays' => 25,
		'Intercalation' => 5,
		'BaseWeekday' => 6,
		'BaseKanChih' => 17,
		'MonthDays' => array (0, 1, 1, 0, 1, 1, 0, 1, 0, 1, 0, 0, 1)
		),
	array (
		'BaseDays' => 44,
		'Intercalation' => 0,
		'BaseWeekday' => 0,
		'BaseKanChih' => 17,
		'MonthDays' => array (0, 1, 0, 1, 1, 0, 1, 0, 1, 1, 0, 1, 1)
		),
	array (
		'BaseDays' => 34,
		'Intercalation' => 0,
		'BaseWeekday' => 0,
		'BaseKanChih' => 17,
		'MonthDays' => array (0, 0, 1, 0, 1, 0, 1, 1, 0, 1, 1, 0, 1)
		),
    array ( // 1936
        'BaseDays' => 23,
        'Intercalation' => 3,
        'BaseWeekday' => 2,
        'BaseKanChih' => 17,
        'MonthDays' => array (1, 0, 0, 1, 0, 0, 1, 1, 0, 1, 1, 1, 0)
        ),
    array (
        'BaseDays' => 41,
        'Intercalation' => 0,
        'BaseWeekday' => 4,
        'BaseKanChih' => 23,
        'MonthDays' => array (1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 1, 0, 1)
        ),
    array (
        'BaseDays' => 30,
        'Intercalation' => 7,
        'BaseWeekday' => 5,
        'BaseKanChih' => 28,
        'MonthDays' => array (1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 0, 1)
        ),
    array (
        'BaseDays' => 49,
        'Intercalation' => 0,
        'BaseWeekday' => 6,
        'BaseKanChih' => 33,
        'MonthDays' => array (1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1)
        ),
    array ( // 1940
        'BaseDays' => 38,
        'Intercalation' => 0,
        'BaseWeekday' => 0,
        'BaseKanChih' => 38,
        'MonthDays' => array (1, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1)
        ),
    array (
        'BaseDays' => 26,
        'Intercalation' => 6,
        'BaseWeekday' => 2,
        'BaseKanChih' => 44,
        'MonthDays' => array (1, 1, 0, 1, 1, 0, 1, 0, 0, 1, 0, 1, 0)
        ),
    array (
        'BaseDays' => 45,
        'Intercalation' => 0,
        'BaseWeekday' => 3,
        'BaseKanChih' => 49,
        'MonthDays' => array (1, 0, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0)
        ),
    array (
        'BaseDays' => 35,
        'Intercalation' => 0,
        'BaseWeekday' => 4,
        'BaseKanChih' => 54,
        'MonthDays' => array (0, 1, 0, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1)
        ),
    array (	// 1944
        'BaseDays' => 24,
        'Intercalation' => 4,
        'BaseWeekday' => 5,
        'BaseKanChih' => 59,
        'MonthDays' => array (1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 0, 1, 1)
        ),
    array (
        'BaseDays' => 43,
        'Intercalation' => 0,
        'BaseWeekday' => 0,
        'BaseKanChih' => 5,
        'MonthDays' => array (0, 0, 1, 0, 0, 1, 0, 1, 1, 1, 0, 1, 1)
        ),
    array (
        'BaseDays' => 32,
        'Intercalation' => 0,
        'BaseWeekday' => 1,
        'BaseKanChih' => 10,
        'MonthDays' => array (1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 0, 1, 1)
        ),
    array (
        'BaseDays' => 21,
        'Intercalation' => 2,
        'BaseWeekday' => 2,
        'BaseKanChih' => 15,
        'MonthDays' => array (1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1)
        ),
    array ( // 1948
        'BaseDays' => 40,
        'Intercalation' => 0,
        'BaseWeekday' => 3,
        'BaseKanChih' => 20,
        'MonthDays' => array (1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1)
        ),
    array (
        'BaseDays' => 28,
        'Intercalation' => 7,
        'BaseWeekday' => 5,
        'BaseKanChih' => 26,
        'MonthDays' => array (1, 0, 1, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1)
        ),
    array (
        'BaseDays' => 47,
        'Intercalation' => 0,
        'BaseWeekday' => 6,
        'BaseKanChih' => 31,
        'MonthDays' => array (0, 1, 1, 0, 1, 1, 0, 0, 1, 0, 1, 0, 1)
        ),
    array (
        'BaseDays' => 36,
        'Intercalation' => 0,
        'BaseWeekday' => 0,
        'BaseKanChih' => 36,
        'MonthDays' => array (1, 0, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0)
        ),
    array ( // 1952
        'BaseDays' => 26,
        'Intercalation' => 5,
        'BaseWeekday' => 1,
        'BaseKanChih' => 41,
        'MonthDays' => array (0, 1, 0, 1, 0, 1, 0, 1, 1, 0, 1, 0, 1)
        ),
    array (
        'BaseDays' => 44,
        'Intercalation' => 0,
        'BaseWeekday' => 3,
        'BaseKanChih' => 47,
        'MonthDays' => array (0, 1, 0, 0, 1, 1, 0, 1, 1, 0, 1, 0, 1)
        ),
    array (
        'BaseDays' => 33,
        'Intercalation' => 0,
        'BaseWeekday' => 4,
        'BaseKanChih' => 52,
        'MonthDays' => array (1, 0, 1, 0, 0, 1, 0, 1, 1, 0, 1, 1, 0)
        ),
    array (
        'BaseDays' => 23,
        'Intercalation' => 3,
        'BaseWeekday' => 5,
        'BaseKanChih' => 57,
        'MonthDays' => array (0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 1)
        ),
    array ( // 1956
        'BaseDays' => 42,
        'Intercalation' => 0,
        'BaseWeekday' => 6,
        'BaseKanChih' => 2,
        'MonthDays' => array (0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 1)
        ),
    array (
        'BaseDays' => 30,
        'Intercalation' => 8,
        'BaseWeekday' => 1,
        'BaseKanChih' => 8,
        'MonthDays' => array (1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0)
        ),
    array (
        'BaseDays' => 48,
        'Intercalation' => 0,
        'BaseWeekday' => 2,
        'BaseKanChih' => 13,
        'MonthDays' => array (1, 1, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0)
        ),
    array (
        'BaseDays' => 38,
        'Intercalation' => 0,
        'BaseWeekday' => 3,
        'BaseKanChih' => 18,
        'MonthDays' => array (0, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1)
        ),
    array ( // 1960
        'BaseDays' => 27,
        'Intercalation' => 6,
        'BaseWeekday' => 4,
        'BaseKanChih' => 23,
        'MonthDays' => array (1, 0, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1, 0)
        ),
    array (
        'BaseDays' => 45,
        'Intercalation' => 0,
        'BaseWeekday' => 6,
        'BaseKanChih' => 29,
        'MonthDays' => array (1, 0, 1, 0, 1, 0, 1, 1, 0, 1, 0, 1, 0)
        ),
    array (
        'BaseDays' => 35,
        'Intercalation' => 0,
        'BaseWeekday' => 0,
        'BaseKanChih' => 34,
        'MonthDays' => array (0, 1, 0, 0, 1, 0, 1, 1, 0, 1, 1, 0, 1)
        ),
    array (
        'BaseDays' => 24,
        'Intercalation' => 4,
        'BaseWeekday' => 1,
        'BaseKanChih' => 39,
        'MonthDays' => array (1, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 1, 0)
        ),
    array ( // 1964
        'BaseDays' => 43,
        'Intercalation' => 0,
        'BaseWeekday' => 2,
        'BaseKanChih' => 44,
        'MonthDays' => array (1, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 1, 0)
        ),
    array (
        'BaseDays' => 32,
        'Intercalation' => 0,
        'BaseWeekday' => 4,
        'BaseKanChih' => 50,
        'MonthDays' => array (0, 1, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, 1)
        ),
    array (
        'BaseDays' => 20,
        'Intercalation' => 3,
        'BaseWeekday' => 5,
        'BaseKanChih' => 55,
        'MonthDays' => array (1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0)
        ),
    array (
        'BaseDays' => 39,
        'Intercalation' => 0,
        'BaseWeekday' => 6,
        'BaseKanChih' => 0,
        'MonthDays' => array (1, 1, 0, 1, 1, 0, 0, 1, 0, 1, 0, 1, 0)
        ),
    array ( // 1968
        'BaseDays' => 29,
        'Intercalation' => 7,
        'BaseWeekday' => 0,
        'BaseKanChih' => 5,
        'MonthDays' => array (0, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1)
        ),
    array (
        'BaseDays' => 47,
        'Intercalation' => 0,
        'BaseWeekday' => 2,
        'BaseKanChih' => 11,
        'MonthDays' => array (0, 1, 0, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1)
        ),
    array (
        'BaseDays' => 36,
        'Intercalation' => 0,
        'BaseWeekday' => 3,
        'BaseKanChih' => 16,
        'MonthDays' => array (1, 0, 0, 1, 0, 1, 1, 0, 1, 1, 0, 1, 0)
        ),
    array (
        'BaseDays' => 26,
        'Intercalation' => 5,
        'BaseWeekday' => 4,
        'BaseKanChih' => 21,
        'MonthDays' => array (0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 1, 0, 1)
        ),
    array ( // 1972
        'BaseDays' => 45,
        'Intercalation' => 0,
        'BaseWeekday' => 5,
        'BaseKanChih' => 26,
        'MonthDays' => array (0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 0, 1, 1)
        ),
    array (
        'BaseDays' => 33,
        'Intercalation' => 0,
        'BaseWeekday' => 0,
        'BaseKanChih' => 32,
        'MonthDays' => array (1, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, 1, 1)
        ),
    array (
        'BaseDays' => 22,
        'Intercalation' => 4,
        'BaseWeekday' => 1,
        'BaseKanChih' => 37,
        'MonthDays' => array (1, 1, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, 1)
        ),
    array (
        'BaseDays' => 41,
        'Intercalation' => 0,
        'BaseWeekday' => 2,
        'BaseKanChih' => 42,
        'MonthDays' => array (1, 1, 0, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1)
        ),
    array ( // 1976
        'BaseDays' => 30,
        'Intercalation' => 8,
        'BaseWeekday' => 3,
        'BaseKanChih' => 47,
        'MonthDays' => array (1, 1, 0, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1)
        ),
    array (
        'BaseDays' => 48,
        'Intercalation' => 0,
        'BaseWeekday' => 5,
        'BaseKanChih' => 53,
        'MonthDays' => array (1, 0, 1, 1, 0, 1, 0, 1, 0, 1, 0, 0, 1)
        ),
    array (
        'BaseDays' => 37,
        'Intercalation' => 0,
        'BaseWeekday' => 6,
        'BaseKanChih' => 58,
        'MonthDays' => array (1, 0, 1, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1)
        ),
    array (
        'BaseDays' => 27,
        'Intercalation' => 6,
        'BaseWeekday' => 0,
        'BaseKanChih' => 3,
        'MonthDays' => array (1, 0, 0, 1, 0, 1, 1, 0, 1, 1, 0, 1, 0)
        ),
    array ( // 1980
        'BaseDays' => 46,
        'Intercalation' => 0,
        'BaseWeekday' => 1,
        'BaseKanChih' => 8,
        'MonthDays' => array (1, 0, 0, 1, 0, 1, 0, 1, 1, 0, 1, 1, 0)
        ),
    array (
        'BaseDays' => 35,
        'Intercalation' => 0,
        'BaseWeekday' => 3,
        'BaseKanChih' => 14,
        'MonthDays' => array (0, 1, 0, 0, 1, 0, 0, 1, 1, 0, 1, 1, 1)
        ),
    array (
        'BaseDays' => 24,
        'Intercalation' => 4,
        'BaseWeekday' => 4,
        'BaseKanChih' => 19,
        'MonthDays' => array (1, 0, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 1)
        ),
    array (
        'BaseDays' => 43,
        'Intercalation' => 0,
        'BaseWeekday' => 5,
        'BaseKanChih' => 24,
        'MonthDays' => array (1, 0, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 1)
        ),
    array ( // 1984
        'BaseDays' => 32,
        'Intercalation' => 10,
        'BaseWeekday' => 6,
        'BaseKanChih' => 29,
        'MonthDays' => array (1, 0, 1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1)
        ),
    array (
        'BaseDays' => 50,
        'Intercalation' => 0,
        'BaseWeekday' => 1,
        'BaseKanChih' => 35,
        'MonthDays' => array (0, 1, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0)
        ),
    array (
        'BaseDays' => 39,
        'Intercalation' => 0,
        'BaseWeekday' => 2,
        'BaseKanChih' => 40,
        'MonthDays' => array (0, 1, 1, 0, 1, 1, 0, 1, 0, 1, 0, 0, 1)
        ),
    array (
        'BaseDays' => 28,
        'Intercalation' => 6,
        'BaseWeekday' => 3,
        'BaseKanChih' => 45,
        'MonthDays' => array (1, 0, 1, 0, 1, 1, 0, 1, 1, 0, 1, 0, 0)
        ),
    array ( // 1988
        'BaseDays' => 47,
        'Intercalation' => 0,
        'BaseWeekday' => 4,
        'BaseKanChih' => 50,
        'MonthDays' => array (1, 0, 1, 0, 1, 0, 1, 1, 0, 1, 1, 0, 1)
        ),
    array (
        'BaseDays' => 36,
        'Intercalation' => 0,
        'BaseWeekday' => 6,
        'BaseKanChih' => 56,
//        'MonthDays' => array (1, 0, 0, 1, 0, 0, 1, 1, 0, 1, 1, 1, 0)
        'MonthDays' => array (1, 0, 0, 1, 0, 1, 0, 1, 0, 1, 1, 1, 0)
        ),
    array (
        'BaseDays' => 26,
        'Intercalation' => 5,
        'BaseWeekday' => 0,
        'BaseKanChih' =>  1,
        'MonthDays' => array (0, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 1, 1)
        ),
    array (
        'BaseDays' => 45,
        'Intercalation' => 0,
        'BaseWeekday' => 1,
        'BaseKanChih' => 6,
        'MonthDays' => array (0, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 1, 0)
        ),
    array ( // 1992
        'BaseDays' => 34,
        'Intercalation' => 0,
        'BaseWeekday' => 2,
        'BaseKanChih' => 11,
        'MonthDays' => array (0, 1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 0)
        ),
    array (
        'BaseDays' => 22,
        'Intercalation' => 3,
        'BaseWeekday' => 4,
        'BaseKanChih' => 17,
        'MonthDays' => array (0, 1, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0)
        ),
    array (
        'BaseDays' => 40,
        'Intercalation' => 0,
        'BaseWeekday' => 5,
        'BaseKanChih' => 22,
        'MonthDays' => array (1, 1, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0)
        ),
    array (
        'BaseDays' => 30,
        'Intercalation' => 8,
        'BaseWeekday' => 6,
        'BaseKanChih' => 27,
        'MonthDays' => array (0, 1, 1, 0, 1, 0, 1, 1, 0, 0, 1, 0, 1)
        ),
    array ( // 1996
        'BaseDays' => 49,
        'Intercalation' => 0,
        'BaseWeekday' => 0,
        'BaseKanChih' => 32,
        'MonthDays' => array (0, 1, 0, 1, 1, 0, 1, 0, 1, 1, 0, 0, 1)
        ),
    array (
        'BaseDays' => 37,
        'Intercalation' => 0,
        'BaseWeekday' => 2,
        'BaseKanChih' => 38,
        'MonthDays' => array (1, 0, 1, 0, 1, 0, 1, 1, 0, 1, 1, 0, 1)
        ),
    array (
        'BaseDays' => 27,
        'Intercalation' => 5,
        'BaseWeekday' => 3,
        'BaseKanChih' => 43,
        'MonthDays' => array (1, 0, 0, 1, 0, 0, 1, 1, 0, 1, 1, 0, 1)
        ),
    array (
        'BaseDays' => 46,
        'Intercalation' => 0,
        'BaseWeekday' => 4,
        'BaseKanChih' => 48,
        'MonthDays' => array (1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 1, 0, 1)
        ),
    array ( // 2000
        'BaseDays' => 35,
        'Intercalation' => 0,
        'BaseWeekday' => 5,
        'BaseKanChih' => 53,
        'MonthDays' => array (1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 0, 1)
        ),
    array (
        'BaseDays' => 23,
        'Intercalation' => 4,
        'BaseWeekday' => 0,
        'BaseKanChih' => 59,
        'MonthDays' => array (1, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1)
        ),
    array (
        'BaseDays' => 42,
        'Intercalation' => 0,
        'BaseWeekday' => 1,
        'BaseKanChih' => 4,
        'MonthDays' => array (1, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1)
        ),
    array (
        'BaseDays' => 31,
        'Intercalation' => 0,
        'BaseWeekday' => 2,
        'BaseKanChih' => 9,
        'MonthDays' => array (1, 1, 0, 1, 1, 0, 1, 0, 0, 1, 0, 1, 0)
        ),
    array ( // 2004
        'BaseDays' => 21,
        'Intercalation' => 2,
        'BaseWeekday' => 3,
        'BaseKanChih' => 14,
        'MonthDays' => array (0, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1)
        ),
    array (
        'BaseDays' => 39,
        'Intercalation' => 0,
        'BaseWeekday' => 5,
        'BaseKanChih' => 20,
        'MonthDays' => array (0, 1, 0, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1)
        ),
    array (
        'BaseDays' => 28,
        'Intercalation' => 7,
        'BaseWeekday' => 6,
        'BaseKanChih' => 25,
        'MonthDays' => array (1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 0, 1, 1)
        ),
    array (
        'BaseDays' => 48,
        'Intercalation' => 0,
        'BaseWeekday' => 0,
        'BaseKanChih' => 30,
        'MonthDays' => array (0, 0, 1, 0, 0, 1, 0, 1, 1, 1, 0, 1, 1)
        ),
    array ( // 2008
        'BaseDays' => 37,
        'Intercalation' => 0,
        'BaseWeekday' => 1,
        'BaseKanChih' => 35,
        'MonthDays' => array (1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 0, 1, 1)
        ),
    array (
        'BaseDays' => 25,
        'Intercalation' => 5,
        'BaseWeekday' => 3,
        'BaseKanChih' => 41,
        'MonthDays' => array (1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1)
        ),
    array (
        'BaseDays' => 44,
        'Intercalation' => 0,
        'BaseWeekday' => 4,
        'BaseKanChih' => 46,
        'MonthDays' => array (1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1)
        ),
    array (
        'BaseDays' => 33,
        'Intercalation' => 0,
        'BaseWeekday' => 5,
        'BaseKanChih' => 51,
        'MonthDays' => array (1, 0, 1, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1)
        ),
    array ( // 2012
        'BaseDays' => 22,
        'Intercalation' => 4,
        'BaseWeekday' => 6,
        'BaseKanChih' => 56,
        'MonthDays' => array (1, 0, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0)
        ),
    array ( //update by jenny 20130624 更正
        'BaseDays' => 40,
        'Intercalation' => 0,
        'BaseWeekday' => 1,
        'BaseKanChih' => 2,
        //'MonthDays' => array (1, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 1, 0)
        'MonthDays' => array (1, 0, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1, 0)
        ),
    array (
        'BaseDays' => 30,
        'Intercalation' => 9,
        'BaseWeekday' => 2,
        'BaseKanChih' => 7,
        'MonthDays' => array (0, 1, 0, 1, 0, 1, 0, 1, 1, 0, 1, 0, 1)
        ),
    array (
        'BaseDays' => 49,
        'Intercalation' => 0,
        'BaseWeekday' => 3,
        'BaseKanChih' => 12,
        'MonthDays' => array (0, 1, 0, 0, 1, 0, 1, 1, 1, 0, 1, 0, 1)
        ),
    array ( // 2016
        'BaseDays' => 38,
        'Intercalation' => 0,
        'BaseWeekday' => 4,
        'BaseKanChih' => 17,
        'MonthDays' => array (1, 0, 1, 0, 0, 1, 0, 1, 1, 0, 1, 1, 0)
        ),
    array (
        'BaseDays' => 27,
        'Intercalation' => 6,
        'BaseWeekday' => 6,
        'BaseKanChih' => 23,
        'MonthDays' => array (0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 1)
        ),
    array (
        'BaseDays' => 46,
        'Intercalation' => 0,
        'BaseWeekday' => 0,
        'BaseKanChih' => 28,
        'MonthDays' => array (0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 0)
        ),
    array (// 2019 fixed 20130412 1大2小
        'BaseDays' => 35,
        'Intercalation' => 0,
        'BaseWeekday' => 1,
        'BaseKanChih' => 33,
        'MonthDays' => array (1, 0, 1, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0)
        //'MonthDays' => array (0, 1, 1, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0)
        ),
    array ( // 2020
        'BaseDays' => 24,
        'Intercalation' => 4,
        'BaseWeekday' => 2,
        'BaseKanChih' => 38,
        'MonthDays' => array (0, 1, 1, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1)
        ),
    array (
        'BaseDays' => 42,
        'Intercalation' => 0,
        'BaseWeekday' => 4,
        'BaseKanChih' => 44,
        'MonthDays' => array (0, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1)
        ),
    array (
        'BaseDays' => 31,
        'Intercalation' => 0,
        'BaseWeekday' => 5,
        'BaseKanChih' => 49,
        'MonthDays' => array (1, 0, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1, 0)
        ),
    array (
        'BaseDays' => 21,
        'Intercalation' => 2,
        'BaseWeekday' => 6,
        'BaseKanChih' => 54,
        'MonthDays' => array (0, 1, 0, 1, 0, 1, 0, 1, 1, 0, 1, 0, 1)
        ),
    array ( // 2024
        'BaseDays' => 40,
        'Intercalation' => 0,
        'BaseWeekday' => 0,
        'BaseKanChih' => 59,
        'MonthDays' => array (0, 1, 0, 0, 1, 0, 1, 1, 0, 1, 1, 0, 1)
        ),
    array (
        'BaseDays' => 28,
        'Intercalation' => 6,
        'BaseWeekday' => 2,
        'BaseKanChih' => 5,
        'MonthDays' => array (1, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 1, 0)
        ),
    array (
        'BaseDays' => 47,
        'Intercalation' => 0,
        'BaseWeekday' => 3,
        'BaseKanChih' => 10,
        'MonthDays' => array (1, 0, 1, 0, 0, 1, 0, 0, 1, 1, 1, 0, 1)
        ),
    array (
        'BaseDays' => 36,
        'Intercalation' => 0,
        'BaseWeekday' => 4,
        'BaseKanChih' => 15,
        'MonthDays' => array (1, 1, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, 1)
        ),
    array ( // 2028
        'BaseDays' => 25,
        'Intercalation' => 5,
        'BaseWeekday' => 5,
        'BaseKanChih' => 20,
        'MonthDays' => array (1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0)
        ),
    array (
        'BaseDays' => 43,
        'Intercalation' => 0,
        'BaseWeekday' => 0,
        'BaseKanChih' => 26,
        'MonthDays' => array (1, 1, 0, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1)
        ),
    array (
        'BaseDays' => 32,
        'Intercalation' => 0,
        'BaseWeekday' => 1,
        'BaseKanChih' => 31,
        'MonthDays' => array (1, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1, 0, 0)
        ),
    array (
        'BaseDays' => 22,
        'Intercalation' => 3,
        'BaseWeekday' => 2,
        'BaseKanChih' => 36,
        'MonthDays' => array (0, 1, 1, 0, 1, 0, 1, 1, 0, 1, 0, 1, 0)
        ),
    array ( //2032
        'BaseDays' => 41,
        'Intercalation' => 0,
        'BaseWeekday' => 3,
        'BaseKanChih' => 41,
        'MonthDays' => array (1, 0, 0, 1, 0, 1, 1, 0, 1, 1, 0, 1, 0)
        ),
    array (
        'BaseDays' => 30,
        'Intercalation' => 11,
        'BaseWeekday' => 5,
        'BaseKanChih' => 47,
        'MonthDays' => array (0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1)
        ),
    array (
        'BaseDays' => 49,
        'Intercalation' => 0,
        'BaseWeekday' => 6,
        'BaseKanChih' => 52,
        'MonthDays' => array (0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 0, 1, 1)
        ),
    array (
        'BaseDays' => 38,
        'Intercalation' => 0,
        'BaseWeekday' => 0,
        'BaseKanChih' => 57,
        'MonthDays' => array (1, 0, 1, 0, 1, 1, 0, 0, 1, 1, 0, 1, 1)
        ),
    array ( //2036
        'BaseDays' => 27,
        'Intercalation' => 6,
        'BaseWeekday' => 1,
        'BaseKanChih' => 2,
        'MonthDays' => array (1, 1, 0, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1)
        ),
    array (
        'BaseDays' => 45,
        'Intercalation' => 0,
        'BaseWeekday' => 3,
        'BaseKanChih' => 8,
        'MonthDays' => array (1, 1, 0, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1)
        ),
    array (
        'BaseDays' => 34,
        'Intercalation' => 0,
        'BaseWeekday' => 4,
        'BaseKanChih' => 13,
        'MonthDays' => array (1, 1, 0, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1)
        ),
    array (
        'BaseDays' => 23,
        'Intercalation' => 5,
        'BaseWeekday' => 5,
        'BaseKanChih' => 18,
        'MonthDays' => array (1, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1, 0, 0)
        ),
    array ( //2040
        'BaseDays' => 42,
        'Intercalation' => 0,
        'BaseWeekday' => 6,
        'BaseKanChih' => 23,
        'MonthDays' => array (1, 0, 1, 1, 0, 1, 0, 1, 1, 0, 1, 0, 0)
        ),
    array (
        'BaseDays' => 31,
        'Intercalation' => 0,
        'BaseWeekday' => 1,
        'BaseKanChih' => 29,
        'MonthDays' => array (0, 1, 0, 1, 0, 1, 1, 0, 1, 1, 0, 1, 0)
        ),
    array (
        'BaseDays' => 21,
        'Intercalation' => 2,
        'BaseWeekday' => 2,
        'BaseKanChih' => 34,
        'MonthDays' => array (0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 0, 1, 1)
        ),
    array (
        'BaseDays' => 40,
        'Intercalation' => 0,
        'BaseWeekday' => 3,
        'BaseKanChih' => 39,
        'MonthDays' => array (0, 1, 0, 0, 1, 0, 0, 1, 1, 0, 1, 1, 1)
        ),
    array ( //2044
        'BaseDays' => 29,
        'Intercalation' => 7,
        'BaseWeekday' => 4,
        'BaseKanChih' => 44,
        'MonthDays' => array (1, 0, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 1)
        ),
    array (
        'BaseDays' => 47,
        'Intercalation' => 0,
        'BaseWeekday' => 6,
        'BaseKanChih' => 50,
        'MonthDays' => array (1, 0, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 1)
        ),
    array (
        'BaseDays' => 36,
        'Intercalation' => 0,
        'BaseWeekday' => 0,
        'BaseKanChih' => 55,
        'MonthDays' => array (1, 0, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 1)
        ),
    array (
        'BaseDays' => 25,
        'Intercalation' => 5,
        'BaseWeekday' => 1,
        'BaseKanChih' => 0,
        'MonthDays' => array (1, 0, 1, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1)
        ),
    array ( //2048
        'BaseDays' => 44,
        'Intercalation' => 0,
        'BaseWeekday' => 2,
        'BaseKanChih' => 5,
        'MonthDays' => array (0, 1, 1, 0, 1, 1, 0, 1, 0, 0, 1, 0, 1)
        ),
    array (
        'BaseDays' => 32,
        'Intercalation' => 0,
        'BaseWeekday' => 4,
        'BaseKanChih' => 11,
        'MonthDays' => array (1, 0, 1, 0, 1, 1, 0, 1, 1, 0, 1, 0, 0)
        ),
    array (
        'BaseDays' => 22,
        'Intercalation' => 3,
        'BaseWeekday' => 5,
        'BaseKanChih' => 16,
        'MonthDays' => array (0, 1, 0, 1, 0, 1, 0, 1, 1, 0, 1, 1, 0)
        ),
    array (
        'BaseDays' => 41,
        'Intercalation' => 0,
        'BaseWeekday' => 6,
        'BaseKanChih' => 21,
        'MonthDays' => array (1, 0, 0, 1, 0, 0, 1, 1, 0, 1, 1, 1, 0)
        ),
    array ( //2052
        'BaseDays' => 31,
        'Intercalation' => 8,
        'BaseWeekday' => 0,
        'BaseKanChih' => 26,
        'MonthDays' => array (0, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 1, 1)
        ),
    array (
        'BaseDays' => 49,
        'Intercalation' => 0,
        'BaseWeekday' => 2,
        'BaseKanChih' => 32,
        'MonthDays' => array (0, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 1, 0)
        ),
    array (
        'BaseDays' => 38,
        'Intercalation' => 0,
        'BaseWeekday' => 3,
        'BaseKanChih' => 37,
        'MonthDays' => array (0, 1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 0)
        ),
    array (
        'BaseDays' => 27,
        'Intercalation' => 6,
        'BaseWeekday' => 4,
        'BaseKanChih' => 42,
        'MonthDays' => array (0, 1, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0)
        ),
    array ( //2056
        'BaseDays' => 45,
        'Intercalation' => 0,
        'BaseWeekday' => 5,
        'BaseKanChih' => 47,
        'MonthDays' => array (1, 1, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0)
        ),
    array (
        'BaseDays' => 34,
        'Intercalation' => 0,
        'BaseWeekday' => 0,
        'BaseKanChih' => 53,
        'MonthDays' => array (0, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1)
        ),
    array (
        'BaseDays' => 23,
        'Intercalation' => 4,
        'BaseWeekday' => 1,
        'BaseKanChih' => 58,
        'MonthDays' => array (1, 0, 1, 0, 1, 0, 1, 1, 0, 1, 1, 0, 0)
        ),
    array (
        'BaseDays' => 42,
        'Intercalation' => 0,
        'BaseWeekday' => 2,
        'BaseKanChih' => 3,
        'MonthDays' => array (1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 1, 0, 1)
        ),
    array ( //2060
        'BaseDays' => 32,
        'Intercalation' => 0,
        'BaseWeekday' => 3,
        'BaseKanChih' => 8,
        'MonthDays' => array (1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 1, 0, 1)
        ),
    array (
        'BaseDays' => 20,
        'Intercalation' => 3,
        'BaseWeekday' => 5,
        'BaseKanChih' => 14,
        'MonthDays' => array (1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 1, 0)
        ),
    array (
        'BaseDays' => 39,
        'Intercalation' => 0,
        'BaseWeekday' => 6,
        'BaseKanChih' => 19,
        'MonthDays' => array (1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 0, 1)
        ),
    array (
        'BaseDays' => 28,
        'Intercalation' => 7,
        'BaseWeekday' => 0,
        'BaseKanChih' => 24,
        'MonthDays' => array (1, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1)
        ),
    array ( //2064
        'BaseDays' => 47,
        'Intercalation' => 0,
        'BaseWeekday' => 1,
        'BaseKanChih' => 29,
        'MonthDays' => array (1, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1)
        ),
    array (
        'BaseDays' => 35,
        'Intercalation' => 0,
        'BaseWeekday' => 3,
        'BaseKanChih' => 35,
        'MonthDays' => array (1, 1, 0, 1, 1, 0, 1, 0, 0, 1, 0, 1, 0)
        ),
    array (
        'BaseDays' => 25,
        'Intercalation' => 5,
        'BaseWeekday' => 4,
        'BaseKanChih' => 40,
        'MonthDays' => array (0, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1)
        ),
    array (
        'BaseDays' => 44,
        'Intercalation' => 0,
        'BaseWeekday' => 5,
        'BaseKanChih' => 45,
        'MonthDays' => array (0, 1, 0, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1)
        ),
    array ( //2068
        'BaseDays' => 33,
        'Intercalation' => 0,
        'BaseWeekday' => 6,
        'BaseKanChih' => 50,
        'MonthDays' => array (1, 0, 1, 0, 0, 1, 1, 0, 1, 1, 0, 1, 0)
        ),
    array (
        'BaseDays' => 22,
        'Intercalation' => 4,
        'BaseWeekday' => 1,
        'BaseKanChih' => 56,
        'MonthDays' => array (0, 1, 0, 1, 0, 0, 1, 0, 1, 1, 1, 0, 1)
        ),
    array (
        'BaseDays' => 41,
        'Intercalation' => 0,
        'BaseWeekday' => 2,
        'BaseKanChih' => 1,
        'MonthDays' => array (0, 1, 0, 1, 0, 0, 1, 0, 1, 1, 0, 1, 1)
        ),
    array (
        'BaseDays' => 30,
        'Intercalation' => 8,
        'BaseWeekday' => 3,
        'BaseKanChih' => 6,
        'MonthDays' => array (1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1)
        ),
    array ( //2072
        'BaseDays' => 49,
        'Intercalation' => 0,
        'BaseWeekday' => 4,
        'BaseKanChih' => 11,
        'MonthDays' => array (1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1)
        ),
    array (
        'BaseDays' => 37,
        'Intercalation' => 0,
        'BaseWeekday' => 6,
        'BaseKanChih' => 17,
        'MonthDays' => array (1, 0, 1, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1)
        ),
    array (
        'BaseDays' => 26,
        'Intercalation' => 6,
        'BaseWeekday' => 0,
        'BaseKanChih' => 22,
        'MonthDays' => array (1, 0, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0)
        ),
    array (
        'BaseDays' => 45,
        'Intercalation' => 0,
        'BaseWeekday' => 1,
        'BaseKanChih' => 27,
        'MonthDays' => array (1, 0, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1, 0)
        ),
    array ( //2076
        'BaseDays' => 35,
        'Intercalation' => 0,
        'BaseWeekday' => 2,
        'BaseKanChih' => 32,
        'MonthDays' => array (0, 1, 0, 1, 0, 1, 0, 1, 1, 0, 1, 0, 1)
        ),
    array (
        'BaseDays' => 23,
        'Intercalation' => 4,
        'BaseWeekday' => 4,
        'BaseKanChih' => 38,
        'MonthDays' => array (1, 0, 1, 0, 0, 1, 0, 1, 1, 1, 0, 1, 0)
        ),
    array (
        'BaseDays' => 42,
        'Intercalation' => 0,
        'BaseWeekday' => 5,
        'BaseKanChih' => 43,
        'MonthDays' => array (1, 0, 1, 0, 0, 1, 0, 1, 1, 0, 1, 1, 0)
        ),
    array (
        'BaseDays' => 32,
        'Intercalation' => 0,
        'BaseWeekday' => 6,
        'BaseKanChih' => 48,
        'MonthDays' => array (0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 1)
        ),
    array ( //2080
        'BaseDays' => 21,
        'Intercalation' => 3,
        'BaseWeekday' => 0,
        'BaseKanChih' => 53,
        'MonthDays' => array (1, 0, 1, 0, 1, 0, 0, 1, 0, 0, 1, 1, 1)
        ),
    array (
        'BaseDays' => 39,
        'Intercalation' => 0,
        'BaseWeekday' => 2,
        'BaseKanChih' => 59,
        'MonthDays' => array (0, 1, 1, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0)
        ),
    array (
        'BaseDays' => 28,
        'Intercalation' => 7,
        'BaseWeekday' => 3,
        'BaseKanChih' => 4,
        'MonthDays' => array (0, 1, 1, 1, 0, 0, 1, 0, 1, 0, 0, 1, 1)
        ),
    array (
        'BaseDays' => 47,
        'Intercalation' => 0,
        'BaseWeekday' => 4,
        'BaseKanChih' => 9,
        'MonthDays' => array (0, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1)
        ),
    array ( //2084
        'BaseDays' => 36,
        'Intercalation' => 0,
        'BaseWeekday' => 5,
        'BaseKanChih' => 14,
        'MonthDays' => array (1, 0, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1, 0)
        ),
    array (
        'BaseDays' => 25,
        'Intercalation' => 5,
        'BaseWeekday' => 0,
        'BaseKanChih' => 20,
        'MonthDays' => array (0, 1, 0, 0, 1, 1, 0, 1, 1, 0, 1, 0, 1)
        ),
    array (
        'BaseDays' => 44,
        'Intercalation' => 0,
        'BaseWeekday' => 1,
        'BaseKanChih' => 25,
        'MonthDays' => array (0, 1, 0, 0, 1, 0, 1, 1, 0, 1, 1, 0, 1)
        ),
    array (
        'BaseDays' => 33,
        'Intercalation' => 0,
        'BaseWeekday' => 2,
        'BaseKanChih' => 30,
        'MonthDays' => array (1, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 1, 0)
        ),
    array ( //2088
        'BaseDays' => 23,
        'Intercalation' => 4,
        'BaseWeekday' => 3,
        'BaseKanChih' => 35,
        'MonthDays' => array (0, 1, 0, 1, 0, 0, 1, 0, 0, 1, 1, 1, 0)
        ),
    array (
        'BaseDays' => 40,
        'Intercalation' => 0,
        'BaseWeekday' => 5,
        'BaseKanChih' => 41,
        'MonthDays' => array (1, 1, 0, 1, 0, 0, 0, 1, 0, 1, 1, 0, 1)
        ),
    array (
        'BaseDays' => 29,
        'Intercalation' => 8,
        'BaseWeekday' => 6,
        'BaseKanChih' => 46,
        'MonthDays' => array (1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0)
        ),
    array (
        'BaseDays' => 48,
        'Intercalation' => 0,
        'BaseWeekday' => 0,
        'BaseKanChih' => 51,
        'MonthDays' => array (1, 1, 0, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1)
        ),
    array ( //2092
        'BaseDays' => 37,
        'Intercalation' => 0,
        'BaseWeekday' => 1,
        'BaseKanChih' => 56,
        'MonthDays' => array (1, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1, 0, 0)
        ),
    array (
        'BaseDays' => 26,
        'Intercalation' => 6,
        'BaseWeekday' => 3,
        'BaseKanChih' => 2,
        'MonthDays' => array (0, 1, 1, 0, 1, 0, 1, 1, 0, 1, 0, 1, 0)
        ),
    array (
        'BaseDays' => 45,
        'Intercalation' => 0,
        'BaseWeekday' => 4,
        'BaseKanChih' => 7,
        'MonthDays' => array (0, 1, 0, 1, 0, 1, 1, 0, 1, 1, 0, 1, 0)
        ),
    array (
        'BaseDays' => 35,
        'Intercalation' => 0,
        'BaseWeekday' => 5,
        'BaseKanChih' => 12,
        'MonthDays' => array (0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 1, 0, 1)
        ),
    array ( //2096
        'BaseDays' => 24,
        'Intercalation' => 4,
        'BaseWeekday' => 6,
        'BaseKanChih' => 17,
        'MonthDays' => array (1, 0, 1, 0, 0, 1, 0, 0, 1, 1, 1, 0, 1)
        ),
    array (
        'BaseDays' => 42,
        'Intercalation' => 0,
        'BaseWeekday' => 1,
        'BaseKanChih' => 23,
        'MonthDays' => array (1, 0, 1, 0, 0, 0, 1, 0, 1, 1, 0, 1, 1)
        ),
    array (
        'BaseDays' => 31,
        'Intercalation' => 0,
        'BaseWeekday' => 2,
        'BaseKanChih' => 28,
        'MonthDays' => array (1, 1, 0, 1, 0, 0, 0, 1, 0, 1, 0, 1, 1)
        ),
    array ( //2099
        'BaseDays' => 20,
        'Intercalation' => 2,
        'BaseWeekday' => 3,
        'BaseKanChih' => 33,
        'MonthDays' => array (1, 1, 0, 1, 1, 0, 0, 1, 0, 0, 1, 0, 1)
        )
    );

// 西历年每月之日数
$gloSolarCal = array (31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

// 西历年每月之累积日数, 平年与闰年
$gloSolarDays = array (
    array (0, 31, 59, 90, 120, 151, 181, 212, 243, 273, 304, 334, 365, 396),
    array (0, 31, 60, 91, 121, 152, 182, 213, 244, 274, 305, 335, 366, 397)
    );
?>
<?PHP
/*==================================================================================*\
    版权所有: 紫微科技有限公司
    撰写人员: Eagle Lee
    撰写日期: July 2000

    备    注: 由BCB改写为PHP
\*==================================================================================*/

//require('./include/caldata.inc');



if (!defined('CLASS_FINALDATE_EXISTS') && !class_exists('FinalDate')){

	  define('CLASS_FINALDATE_EXISTS', true);


/*
struct ConvDate
{
    int Source;
    int SolarYear;
    int SolarMonth;
    int SolarDate;
    int LunarYear;
    int LunarMonth;
    int LunarDate;
    int Weekday;
    int Kan;
    int Chih;
};
var $StruCD_CD;
*/
class FinalDate
{
    var $iSolarYear,      //阳历
        $iSolarMonth,
        $iSolarDay;
    var $iLunarYear,      //阴历
        $iLunarMonth,     //闰月保持不变
        $iLunarLeapMonth, //闰月值，若为零则不是闰月
        $iLunarDay;
    var $iHour, $iMinutes, $iWeekday;
    var $iSex;

    var $iYearKan, $iYearChih, $iMonthKan, $iHourChih;
    var $StruCD_CD;


    var $iSolarYear1=0,      //阳历
        $iSolarMonth1,
        $iSolarDay1;
    var $iLunarYear1,      //阴历
        $iLunarMonth1,     //闰月保持不变
        $iLunarLeapMonth1, //闰月值，若为零则不是闰月
        $iLunarDay1;
    var $iHour1;    
    var $iYearKan1, $iYearChih1, $iMonthKan1;

    /*----------------------------------------------------------------------------------*\
        求此西历年是否为闰年, 返回 0 为平年, 1 为闰年
    \*----------------------------------------------------------------------------------*/
    function GetLeap( $iYear )
    {
        if ($iYear % 400 == 0) return 1;
        else if ($iYear % 100 == 0) return 0;
        else if ($iYear % 4 == 0) return 1;
        else return 0;
    }

    /*----------------------------------------------------------------------------------*\
        阳历农历转换
        function CalConv( struct ConvDate *cd )
    \*----------------------------------------------------------------------------------*/
    function CalConv()
    {
        global $gloLunarCal, $gloSolarCal, $gloSolarDays;

        if ($this->StruCD_CD["Source"] == 0)  /* Solar */
        {
            if ($this->StruCD_CD["SolarYear"] <= FIRSTYEAR
                    || $this->StruCD_CD["SolarYear"] > LASTYEAR)
                return 1;

            $iSm = $this->StruCD_CD["SolarMonth"] - 1;

            if ($iSm < 0 || $iSm > 11) return 2;

            $iLeap = $this->GetLeap($this->StruCD_CD["SolarYear"]);

            if ($iSm == 1) $iD = $iLeap + 28;
            else $iD = $gloSolarCal[$iSm];

            if ($this->StruCD_CD["SolarDate"] < 1
                    || $this->StruCD_CD["SolarDate"] > $iD)
                return 3;

            $iY = $this->StruCD_CD["SolarYear"] - FIRSTYEAR;
            $iAcc = $gloSolarDays[$iLeap][$iSm] + $this->StruCD_CD["SolarDate"];
            $this->StruCD_CD["Weekday"] = ($iAcc + $gloLunarCal[$iY]["BaseWeekday"]) % 7;
            $iKc = $iAcc + $gloLunarCal[$iY]["BaseKanChih"];
            $this->StruCD_CD["Kan"] = $iKc % 10;
            $this->StruCD_CD["Chih"] = $iKc % 12;

            if ($iAcc <= $gloLunarCal[$iY]["'BaseDays'"])
            {
                $iY --;
                $this->StruCD_CD["LunarYear"] = $this->StruCD_CD["SolarYear"] - 1;
                $iLeap = $this->GetLeap($this->StruCD_CD["LunarYear"]);
                $iSm += 12;
                $iAcc = $gloSolarDays[$iLeap][$iSm] + $this->StruCD_CD["SolarDate"];
            }
            else $this->StruCD_CD["LunarYear"] = $this->StruCD_CD["SolarYear"];

            $iL1 = $gloLunarCal[$iY]["'BaseDays'"];
            for ($iI = 0; $iI < 13; $iI ++)
            {
                $iL2 = $iL1 + $gloLunarCal[$iY]["MonthDays"][$iI] + 29;
                if ($iAcc <= $iL2) break;
                $iL1 = $iL2;
            }

            $this->StruCD_CD["LunarMonth"] = $iI + 1;
            $this->StruCD_CD["LunarDate"] = $iAcc - $iL1;
            $iIm = $gloLunarCal[$iY]["Intercalation"];

            if ($iIm != 0 && $this->StruCD_CD["LunarMonth"] > $iIm )
            {
                $this->StruCD_CD["LunarMonth"] --;
                if ($this->StruCD_CD["LunarMonth"] == $iIm )
                    $this->StruCD_CD["LunarMonth"] = -$iIm;
            }

            if ($this->StruCD_CD["LunarMonth"] > 12)
                $this->StruCD_CD["LunarMonth"] -= 12;
                
        //  var_dump($this->StruCD_CD["LunarMonth"]);
        }
        else  /* Lunar */
        {
            if ($this->StruCD_CD["LunarYear"] < FIRSTYEAR
                    || $this->StruCD_CD["LunarYear"] >= LASTYEAR)
                return 1;

            $iY = $this->StruCD_CD["LunarYear"] - FIRSTYEAR;
            $iIm = $gloLunarCal[$iY]["Intercalation"];
            $iLm = $this->StruCD_CD["LunarMonth"];

            if ($iLm < 0)
            {
                if ($iLm != -$iIm ) return 2;
            }
            else if ($iLm < 1 || $iLm > 12 ) return 2;

            if ($iIm != 0 )
            {
                if ($iLm > $iIm) $iLm ++;
                else if ($iLm == -$iIm) $iLm = $iIm + 1;
            }

            $iLm--;
            if ($this->StruCD_CD["LunarDate"] > ($gloLunarCal[$iY]["MonthDays"][$iLm] + 29) )
                return 3;

            $iAcc = $gloLunarCal[$iY]["'BaseDays'"];
            for ($iI = 0; $iI < $iLm; $iI ++)
            {
                $iAcc += $gloLunarCal[$iY]["MonthDays"][$iI] + 29;
            }

            $iAcc += $this->StruCD_CD["LunarDate"];
            $iLeap = $this->GetLeap($this->StruCD_CD["LunarYear"]);
            for ($iI = 13; $iI >= 0; $iI --)
            {
                if ($iAcc > $gloSolarDays[$iLeap][$iI])
                    break;
            }
            $this->StruCD_CD["SolarDate"] = $iAcc - $gloSolarDays[$iLeap][$iI];
            if ( $iI <= 11 )
            {
                $this->StruCD_CD["SolarYear"] = $this->StruCD_CD["LunarYear"];
                $this->StruCD_CD["SolarMonth"] = $iI + 1;
            }
            else
            {
                $this->StruCD_CD["SolarYear"] = $this->StruCD_CD["LunarYear"] + 1;
                $this->StruCD_CD["SolarMonth"] = $iI - 11;
            }
            $iLeap = $this->GetLeap($this->StruCD_CD["SolarYear"]);
            $iY = $this->StruCD_CD["SolarYear"] - FIRSTYEAR;
            $iAcc = $gloSolarDays[$iLeap][$this->StruCD_CD["SolarMonth"]-1]
                    + $this->StruCD_CD["SolarDate"];
            $this->StruCD_CD["Weekday"] = ($iAcc + $gloLunarCal[$iY]["BaseWeekday"]) % 7;
            $iKc = $iAcc + $gloLunarCal[$iY]["BaseKanChih"];
            $this->StruCD_CD["Kan"] = $iKc % 10;
            $this->StruCD_CD["Chih"] = $iKc % 12;
        }
        return 0;
    }

    function SetDate($iYear, $iMonth, $iDay, $iHour, $iMinutes, $SolarOrLunar, $revise=false)
    {
        //if ($iYear < 1850) $iYear += 1911;

        // 传入的日期要以公元为主
        if ($iYear < FIRSTYEAR) return 1;

        if ($SolarOrLunar == SOLAR_TYPE)  //国历
        {
            $this->StruCD_CD["SolarYear"] = $iYear;
            $this->StruCD_CD["SolarMonth"] = $iMonth;
            $this->StruCD_CD["SolarDate"] = $iDay;
        }
        else                    //阴历
        {
            $this->StruCD_CD["LunarYear"] = $iYear;
            $this->StruCD_CD["LunarMonth"] = $iMonth;
            $this->StruCD_CD["LunarDate"] = $iDay;
        }
        $this->StruCD_CD["Source"] = $SolarOrLunar;                
        $iRtCode = $this->CalConv();
    //  echo '<pre>';print_r($this->StruCD_CD);echo '</pre>';
        if ($iRtCode > 0) return $iRtCode;

        $this->iSolarYear = $this->StruCD_CD["SolarYear"];
        $this->iSolarMonth = $this->StruCD_CD["SolarMonth"];
        $this->iSolarDay = $this->StruCD_CD["SolarDate"];

        $this->iLunarYear = $this->StruCD_CD["LunarYear"];
        $this->iLunarMonth = $this->StruCD_CD["LunarMonth"];
        $this->iLunarDay = $this->StruCD_CD["LunarDate"];

        // LunarLeapMonth
        // 非闰月则为零
        // 闰月的月份为超过15日算下一个月，前15日算当月份
        // 闰月LunarLeapMonth 为确定的月份
        $this->iLunarLeapMonth = $this->iLunarMonth;
        if ($this->iLunarMonth < 0)
        {
            $this->iLunarMonth = abs($this->iLunarMonth);
        }
        
        
     /*   $this->iLunarLeapMonth = 0;
        if ($this->iLunarMonth < 0)
        {
            $this->iLunarMonth = abs($this->iLunarMonth);
            if ($this->iLunarDay > 15)
                $this->iLunarLeapMonth = $this->iLunarMonth + 1;
        }*/

        $this->iHour = $iHour;
        $this->iMinutes = $iMinutes;

        // 计算年干支
        $iYearTemp = $this->iLunarYear - 1911;
        //if ($iYearTemp < 12)
            $iYearTemp += 60;
        $this->iYearKan = ($iYearTemp - 13) % 10;
        //$this->iYearChih = ($this->iLunarYear - 13) % 12;
        $this->iYearChih = ($iYearTemp - 13) % 12;

        //计算月干
        //求宫位遁干（求寅月干）
        //               2  3  4  5  6  7  8  9 10 11  0  1
        //地支          寅 卯 辰 巳 午 未 申 酉 戌 亥 子 丑
        //              -----------------------------------
        //    0甲 5己 | 丙 丁 戊 己 庚 辛 壬 癸 甲 乙 丙 丁
        //               2  3  4  5  6  7  8  9  0  1  2  3
        //生  1乙 6庚 | 戊 己 庚 辛 壬 癸 甲 乙 丙 丁 戊 己
        //               4  5  6  7  8  9  0  1  2  3  4  5
        //年  2丙 7辛 | 庚 辛 壬 癸 甲 乙 丙 丁 戊 己 庚 辛
        //               6  7  8  9  0  1  2  3  4  5  6  7
        //干  3丁 8壬 | 壬 癸 甲 乙 丙 丁 戊 己 庚 辛 壬 癸
        //               8  9  0  1  2  3  4  5  6  7  8  9
        //    4戊 9癸 | 甲 乙 丙 丁 戊 己 庚 辛 壬 癸 甲 乙
        //               0  1  2  3  4  5  6  7  8  9  0  1
        $this->iMonthKan = ($this->iYearKan % 5 * 2 + 2) % 10;


        //求生时地支
        //夏令时间、日光节约时间
        //民国 34 - 40 年 05/01 - 09/30
        //        41   年 03/01 - 10/31
        //     42 - 43 年 04/01 - 10/31
        //     44 - 45 年 04/01 - 09/30
        //     46 - 48 年 04/01 - 09/30
        //     49 - 50 年 06/01 - 09/30
        //     63 - 64 年 04/01 - 09/30
        //        68   年 07/01 - 09/30
        //
        // 早子   丑    寅    卯    辰    巳    午    未    申    酉    戌    亥   早子
        //00-01 01-02 03-04 05-06 07-08 09-10 11-12 13-14 15-16 17-18 19-20 21-22 23-24

        //尚未考虑夏令、日光时间，原因在月日是用阴历或阳历
        $this->iHourChih = 0;
        if ($iHour >= 1) $this->iHourChih = (($iHour / 2) + ($iHour % 2)) % 12;
        //richard 根据保留原有输入时间不变，在1499行增加变量定义，并调整下面有关逻辑，将日期
        //初始化值保留，并增加有关方法进行求取
        if ($this->iSolarYear1 == 0)
        {
         $this->iSolarYear1 =$this->iSolarYear;
         $this->iSolarMonth1=$this->iSolarMonth;
         $this->iSolarDay1  =$this->iSolarDay;
         $this->iLunarYear1 =$this->iLunarYear;
         $this->iLunarMonth1=$this->iLunarMonth;
         $this->iLunarLeapMonth1=$this->iLunarLeapMonth;
         $this->iLunarDay1  =$this->iLunarDay;
         //$this->iHourChih1  =$iHour;
         $this->iHour1      =$iHour;
         $this->iYearKan1   =$iYearKan;
         $this->iYearChih1  =$iYearChih;
         $this->iMonthKan1  =$iMonthKan;
        }  

        /*      
        $iSolarYear1=$iSolarYear;
        $iSolarMonth1=$iSolarMonth;
        $iSolarDay1=$iSolarDay;
        $iLunarYear1=$iLunarYear;
        $iLunarMonth1=$iLunarMonth;
        $iLunarLeapMonth1=$iLunarLeapMonth;
        $iLunarDay1=$iLunarDay;
        $iHourChih1=$iHourChih;
        */
        
        // 如果使用修正，那么23点将会转化为第2天的0点
        if($revise){
            if ($iHour == 23) $this->NextHourChih(); 
        }

        return 0;
    }

    function SetHourChih( $iHourChih )
    {
        if ($iHourChih < 0 || $iHourChih > 12) return false;

        $this->iHourChih = $iHourChih;
        return true;
    }

    function PrevHourChih()
    {
        $iHour = $this->iHour;
        $iMinute = $this->iMinutes;
        $iYear = $this->iSolarYear;
        $iMonth = $this->iSolarMonth;
        $iDay = $this->iSolarDay;

        if ($iHour >= 2) $iHour -= 2;
        else
        {
            if ($iHour == 1) $iHour = 0;
            else
            {
                $iHour = 22;
                do
                {
                    if ($iDay > 1) $iDay --;
                    else
                    {
                        $iDay = 31;
                        if ($iMonth > 1) $iMonth --;
                        else
                        {
                            $iMonth = 12;
                            $iYear --;
                        }
                    }
                    $this->StruCD_CD["SolarDate"] = $iDay;
                    $this->StruCD_CD["SolarMonth"] = $iMonth;
                    $this->StruCD_CD["SolarYear"] = $iYear;

                    $this->StruCD_CD["Source"] = SOLAR_TYPE;
                    $iRtCode = $this->CalConv();
                } while ($iRtCode);
            }
        }
        $this->SetDate($iYear, $iMonth, $iDay, $iHour, $iMinute, SOLAR_TYPE);
    }

    function NextHourChih()
    {
        $iHour = $this->iHour;
        $iMinute = $this->iMinutes;
        $iYear = $this->iSolarYear;
        $iMonth = $this->iSolarMonth;
        $iDay = $this->iSolarDay;

        if ($iHour <= 20) $iHour += 2;
        else
        {
            if ($iHour > 20)
            {
                $iHour = 0;
                do
                {
                    if ($iDay < 31) $iDay ++;
                    else
                    {
                        $iDay = 1;
                        if ($iMonth < 12) $iMonth ++;
                        else
                        {
                            $iMonth = 1;
                            $iYear ++;
                        }
                    }
                    $this->StruCD_CD["SolarDate"] = $iDay;
                    $this->StruCD_CD["SolarMonth"] = $iMonth;
                    $this->StruCD_CD["SolarYear"] = $iYear;

                    $this->StruCD_CD["Source"] = SOLAR_TYPE;
                    $iRtCode = $this->CalConv();
                } while ($iRtCode);
            }
        }
        $this->SetDate($iYear, $iMonth, $iDay, $iHour, $iMinute, SOLAR_TYPE);
    }

    // 求阴历年月日
    function AskYear()
    {
        return $this->iLunarYear;
    }

    function AskMonth()
    {
        return $this->iLunarMonth;
    }

    function AskLeapMonth()
    {
        return $this->iLunarLeapMonth;
    }

    function AskDay()
    {
        return $this->iLunarDay;
    }

    function AskHour()
    {
        return $this->iHour;
    }

    function AskMinutes()
    {
        return $this->iMinutes;
    }

    function AskSex()
    {
        return $this->iSex;
    }

    function AskYear1()
    {
        return $this->iLunarYear1;
    }

    function AskMonth1()
    {
        return $this->iLunarMonth1;
    }

    function AskLeapMonth1()
    {
        return $this->iLunarLeapMonth1;
    }

    function AskDay1()
    {
        return $this->iLunarDay1;
    }

    function AskHour1()
    {
        return $this->iHour1;
    }
    // 求阳历年月日
    function AskSolarYear()
    {
        return $this->iSolarYear;
    }

    function AskSolarMonth()
    {
        return $this->iSolarMonth;
    }

    function AskSolarDay()
    {
        return $this->iSolarDay;
    }

    // 求年干
    function AskYearKan()
    {
        return $this->iYearKan;
    }

    // 求年支
    function AskYearChih()
    {
        return $this->iYearChih;
    }

    // 求月干
    function AskMonthKan()
    {
        return $this->iMonthKan;
    }

    // 求时支
    function AskHourChih()
    {
        return $this->iHourChih;
    }
    function AskSolarYear1()
    {
        return $this->iSolarYear1;
    }

    function AskSolarMonth1()
    {
        return $this->iSolarMonth1;
    }

    function AskSolarDay1()
    {
        return $this->iSolarDay1;
    }
    function AskHourChih1()
    {
        return $this->iHourChih1;
    }
    // 求年干
    function AskYearKan1()
    {
        return $this->iYearKan1;
    }

    // 求年支
    function AskYearChih1()
    {
        return $this->iYearChih1;
    }

    // 求月干
    function AskMonthKan1()
    {
        return $this->iMonthKan1;
    }    
}

}
?>