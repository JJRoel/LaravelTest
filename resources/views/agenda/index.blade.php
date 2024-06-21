@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ url('/agenda?thismonth=' . ($thisMonth - 1) . '&thisyear=' . $thisYear) }}" class="btn btn-secondary">&laquo; Vorige</a>
        <h1 class="text-center">{{ $monthName }} {{ $thisYear }}</h1>
        <a href="{{ url('/agenda?thismonth=' . ($thisMonth + 1) . '&thisyear=' . $thisYear) }}" class="btn btn-secondary">Volgende &raquo;</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Maandag</th>
                <th>Dinsdag</th>
                <th>Woensdag</th>
                <th>Donderdag</th>
                <th>Vrijdag</th>
                <th>Zaterdag</th>
                <th>Zondag</th>
            </tr>
        </thead>
        <tbody>
            @php
                $firstDayOfMonth = \Carbon\Carbon::create($thisYear, $thisMonth, 1)->dayOfWeek;
                $daysInMonth = \Carbon\Carbon::create($thisYear, $thisMonth)->daysInMonth;
                $dayCounter = 1;
                $printedDays = 0;
            @endphp
            @for ($week = 0; $week < 6; $week++)
                <tr>
                    @for ($day = 0; $day < 7; $day++)
                        @if ($week == 0 && $day < $firstDayOfMonth)
                            <td></td>
                        @elseif ($dayCounter > $daysInMonth)
                            <td></td>
                        @else
                            <td class="text-center" onclick="window.location.href='{{ url('/agenda/day?jour=' . $dayCounter . '&mois=' . $thisMonth . '&annee=' . $thisYear) }}'">
                                <strong>{{ $dayCounter }}</strong>
                                <ul class="list-unstyled">
                                    @foreach ($agendaItems as $item)
                                        @if (\Carbon\Carbon::create($thisYear, $thisMonth, $dayCounter)->isSameDay($item->date))
                                            <li>{{ $item->titre }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </td>
                            @php $dayCounter++; $printedDays++; @endphp
                        @endif
                    @endfor
                </tr>
                @if ($printedDays >= $daysInMonth)
                    @break
                @endif
            @endfor
        </tbody>
    </table>
@endsection
