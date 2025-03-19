<?php

namespace App\Helpers\Oreno;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Description of Date
 *
 * @author User
 */
class Date {

    //put your code here
    public function now($format = 'Y-m-d H:i:s') {
        return gmdate($format, time() + 60 * 60 * 7);
    }

    public function after($hour, $date_start = null) {
        if ($date_start != null) {
            return gmdate('Y-m-d H:i:s', strtotime($date_start . '+' . $hour . 'hour'));
        } else {
            return gmdate('Y-m-d H:i:s', strtotime($this->now() . '+' . $hour . 'hour'));
        }
    }

    public function diff($date_1, $date_2, $getSecond = false, $getDetailDate = false) {
        $datetime1 = date_create($date_1);
        $datetime2 = date_create($date_2);
        $interval = date_diff($datetime1, $datetime2);
        $times = array(
            'year' => $interval->y,
            'month' => $interval->m,
            'day' => $interval->d,
            'hour' => $interval->h,
            'minute' => $interval->i,
            'second' => $interval->s
        );
        if ($getSecond == true) {
            if ($interval->i > 0) {
                return array('i' => $interval->i, 's' => $interval->s);
            } else {
                return array('i' => $interval->s);
            }
        }
        $res = '';
        if ($getDetailDate == false) {
            foreach ($times AS $key => $val) {
                if ($key == 'year' && $val > 0) {
                    $res = $val . ' year';
                }
                if ($key == 'month' && $val <= 12 && $val > 0) {
                    $res = $val . ' month';
                }
                if ($key == 'day' && $val < 31 && $val > 0) {
                    $res = $val . ' day';
                }
                if ($key == 'hour' && $val < 24 && $val > 0) {
                    $res = $val . ' hour';
                }
                if ($res == "") {
                    if ($key == 'minute' && $val < 60 && $val > 0) {
                        $res = $val . ' min';
                    }
                    if ($key == 'second' && $val < 60 && $val > 0) {
                        $res = $val . ' sec';
                    }
                }
            }
        } else {
            $res = $this->detail($times);
        }
        return $res;
    }

    public function range($start, $end, $step = '+1 day', $output_format = 'd/m/Y') {
        $dates = array();
        $current = strtotime($start);
        $last = strtotime($end);
        while ($current <= $last) {
            $dates[] = date($output_format, $current);
            $current = strtotime($step, $current);
        }
        return $dates;
    }

    public function detail($param = null, $options = []) {
        if ($param != null) {
            $str = '';
            if ($param['month'] > 0) {
                $str = $param['month'] . 'bulan2 ' . ',';
            } elseif ($param['month'] > 0 && $param['day'] > 0) {
                $str = $param['month'] . 'bulan1 ' . ',' . $param['day'] . ' hari';
            } elseif ($param['month'] == 0 && $param['day'] > 0) {
                $str = $param['day'] . ' hari';
            } elseif ($param['month'] == 0 && $param['day'] == 0 && $param['hour'] > 0) {
                $str = $param['hour'] . ' jam';
            } elseif ($param['month'] == 0 && $param['day'] == 0 && $param['hour'] == 0 && $param['minute'] > 0) {
                $str = $param['minute'] . ' menit';
            } elseif ($param['month'] == 0 && $param['day'] == 0 && $param['hour'] == 0 && $param['minute'] == 0) {
                $str = $param['second'] . ' detik';
            } else {
                $str_detail = $param['month'] . 'bulan' . ',';
                if (isset($param['day']) && $param['day'] != 0) {
                    $str_detail .= $param['day'] . ' hari' . ',';
                }
                if (isset($param['hour']) && $param['hour'] != 0) {
                    $str_detail .= $param['hour'] . ' jam' . ',';
                }
                if (isset($param['minute']) && $param['minute'] != 0) {
                    $str_detail .= $param['minute'] . ' menit' . ',';
                }
                if (isset($param['second']) && $param['second'] != 0) {
                    $str_detail .= $param['second'] . ' detik';
                }
                $str = $str_detail;
            }
            //1 hari - 20 jam - 30 menit - 22 detik 
            return $str . ' yang lalu';
        }
    }

    public function indonesian_format($timestamp = '', $date_format = 'l, j F Y | H:i', $suffix = 'WIB') {
        if (trim($timestamp) == '') {
            $timestamp = time();
        } elseif (!ctype_digit($timestamp)) {
            $timestamp = strtotime($timestamp);
        }
        # remove S (st,nd,rd,th) there are no such things in indonesia :p
        $date_format = preg_replace("/S/", "", $date_format);
        $pattern = array(
            '/Mon[^day]/', '/Tue[^sday]/', '/Wed[^nesday]/', '/Thu[^rsday]/',
            '/Fri[^day]/', '/Sat[^urday]/', '/Sun[^day]/', '/Monday/', '/Tuesday/',
            '/Wednesday/', '/Thursday/', '/Friday/', '/Saturday/', '/Sunday/',
            '/Jan[^uary]/', '/Feb[^ruary]/', '/Mar[^ch]/', '/Apr[^il]/', '/May/',
            '/Jun[^e]/', '/Jul[^y]/', '/Aug[^ust]/', '/Sep[^tember]/', '/Oct[^ober]/',
            '/Nov[^ember]/', '/Dec[^ember]/', '/January/', '/February/', '/March/',
            '/April/', '/June/', '/July/', '/August/', '/September/', '/October/',
            '/November/', '/December/',
        );
        $replace = array('Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min',
            'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu',
            'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des',
            'Januari', 'Februari', 'Maret', 'April', 'Juni', 'Juli', 'Agustus', 'September',
            'Oktober', 'November', 'Desember',
        );
        $date = gmdate($date_format, $timestamp + 60 * 60 * 7);
        $date = preg_replace($pattern, $replace, $date);
        $date = "{$date} {$suffix}";
        return $date;
    }

    public function month_name($lang = 'eng') {
        if ($lang == 'eng') {
            $month = array('january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december');
        } elseif ($lang == 'ind') {
            $month = array('januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember');
        } else {
            $month = array();
        }
        return $month;
    }

    public function calendar($month, $year) {
        // Draw table for Calendar 
        $calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';
        // Draw Calendar table headings 
        $headings = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        $calendar .= '<tr class="calendar-row"><td class="calendar-day-head">' . implode('</td><td class="calendar-day-head">', $headings) . '</td></tr>';
        //days and weeks variable for now ... 
        $running_day = date('w', mktime(0, 0, 0, $month, 1, $year));
        $days_in_month = date('t', mktime(0, 0, 0, $month, 1, $year));
        $days_in_this_week = 1;
        $day_counter = 0;
        $dates_array = array();
        // row for week one 
        $calendar .= '<tr class="calendar-row">';
        // Display "blank" days until the first of the current week 
        for ($x = 0; $x < $running_day; $x++):
            $calendar .= '<td class="calendar-day-np">&nbsp;</td>';
            $days_in_this_week++;
        endfor;
        // Show days.... 
        for ($list_day = 1; $list_day <= $days_in_month; $list_day++):
            if ($list_day == date('d') && $month == date('n')) {
                $currentday = 'currentday';
            } else {
                $currentday = '';
            }
            $calendar .= '<td class="calendar-day ' . $currentday . '">';
            // Add in the day number
            if ($list_day < date('d') && $month == date('n')) {
                $showtoday = '<strong class="overday">' . $list_day . '</strong>';
            } else {
                $showtoday = $list_day;
            }
            $calendar .= '<div class="day-number">' . $showtoday . '</div>';
            // Draw table end
            $calendar .= '</td>';
            if ($running_day == 6):
                $calendar .= '</tr>';
                if (($day_counter + 1) != $days_in_month):
                    $calendar .= '<tr class="calendar-row">';
                endif;
                $running_day = -1;
                $days_in_this_week = 0;
            endif;
            $days_in_this_week++;
            $running_day++;
            $day_counter++;
        endfor;
        // Finish the rest of the days in the week
        if ($days_in_this_week < 8):
            for ($x = 1; $x <= (8 - $days_in_this_week); $x++):
                $calendar .= '<td class="calendar-day-np">&nbsp;</td>';
            endfor;
        endif;
        // Draw table final row
        $calendar .= '</tr>';
        // Draw table end the table 
        $calendar .= '</table>';
        // Finally all done, return result 
        return $calendar;
    }

}
