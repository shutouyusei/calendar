@php
    $time=explode("-",$date,2);
    $day=[31,28,31,30,31,30,31,31,30,31,30,31];
    $ex=false;
    if($time[0]%4===0){
        if($time[0]%100===0){
            if($time[0]%400===0){
                $ex=false;
            }
            else{
                $ex=true;
            }
        }
        else{
            $ex=true;
        }
    }
    else{
        $ex=false;
    }
    if($ex){
        $day[1]=29;
    }

    $today=$day[$time[1]-1];
@endphp
@php
    $dat = date('w', strtotime($time[0].$time[1].'01'));
    $date1=1-$dat;
@endphp
<table class="w-full h-96 text-xl text-center">
    <tr class='text-xl'>
        <th>SUN</th>
        <th>MON</th>
        <th>TUE</th>
        <th>WED</th>
        <th>THU</th>
        <th>FRI</th>
        <th>SAT</th>
    </tr>
    @php
    use App\Models\Calendar;
        for($i=0;$i<6;$i++){
            echo "<tr>";
            for($l=1;$l<8;$l++){
                 $dat=$date1;
                 $date1++;
                 if($dat<1){$dat=" ";
                echo "<td>{$dat}</td>";
                }
                 else if($dat>$today){$dat="";
                 echo "<td>{$dat}</td>";
                }
                else{
                    $da=$dat;
                    if($da<10){$da="0".$da;}
                    $clickdate=$date."-".$da;
                if(DB::table('calendars')->where('date','=', $clickdate)->count()>0){
                          echo "<td class='bg-red-500'><a href=http://localhost/sa/{$clickdate}>{$dat}</a></td>";
                     }
                else{echo "<td><a href=http://localhost/sa/{$clickdate}>{$dat}</a></td>";}}
            }
            echo "</tr>";
        }
    @endphp
</table>