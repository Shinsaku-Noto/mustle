<?php
    namespace App\Calendar;
    
    class CalendarView {
        
        function render() {
            $html =[];
            $html[] ='<div class="calendar">';
            $html[] ='<table class="table">';
            $html[] ='<thread>';
            $html[] ='<tr>';
            $html[] ='<th>月</th>';
            $html[] ='<th>火</th>';
            $html[] ='<th>水</th>';
            $html[] ='<th>木</th>';
            $html[] ='<th>金</th>';
            $html[] ='<th>土</th>';
            $html[] ='<th>日</th>';
            $html[] ='</tr>';
            $html[] ='</thread>';
            $html[] ='</table>';
            $html[] ='</div>';
            return implode("",$html);
        }
    }







