@php
    $time = explode("-", $date, 2);
    $day = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    $ex = false;
    if ($time[0] % 4 === 0) {
        if ($time[0] % 100 === 0) {
            if ($time[0] % 400 === 0) {
                $ex = false;
            } else {
                $ex = true;
            }
        } else {
            $ex = true;
        }
    } else {
        $ex = false;
    }
    if ($ex) {
        $day[1] = 29;
    }

    $today = $day[$time[1] - 1];
@endphp
@php
    $dat = date('w', strtotime($time[0] . $time[1] . '01'));
    $date1 = 1 - $dat;
@endphp
<table class="w-full h-96 text-xl text-center border-collapse">
    <tr class="text-sm font-semibold text-gray-600 uppercase tracking-wider">
        <th class="py-2">SUN</th>
        <th class="py-2">MON</th>
        <th class="py-2">TUE</th>
        <th class="py-2">WED</th>
        <th class="py-2">THU</th>
        <th class="py-2">FRI</th>
        <th class="py-2">SAT</th>
    </tr>
    @for ($i = 0; $i < 6; $i++)
        <tr>
            @for ($l = 1; $l < 8; $l++)
                @php
                    $dat = $date1;
                    $date1++;
                @endphp
                @if ($dat < 1)
                    <td class="py-2 text-gray-300">&nbsp;</td>
                @elseif ($dat > $today)
                    <td class="py-2">&nbsp;</td>
                @else
                    @php
                        $da = $dat;
                        if ($da < 10) { $da = "0" . $da; }
                        $clickdate = $date . "-" . $da;
                        $hasSchedule = DB::table('calendars')->where('date', '=', $clickdate)->count() > 0;
                    @endphp
                    @if ($hasSchedule)
                        <td class="py-2 bg-indigo-100 rounded">
                            <a href="{{ route('calendar.spindex', $clickdate) }}" class="text-indigo-700 font-semibold hover:text-indigo-900">{{ $dat }}</a>
                        </td>
                    @else
                        <td class="py-2 hover:bg-gray-50 rounded">
                            <a href="{{ route('calendar.spindex', $clickdate) }}" class="text-gray-700 hover:text-gray-900">{{ $dat }}</a>
                        </td>
                    @endif
                @endif
            @endfor
        </tr>
    @endfor
</table>
