<div class="hstack justify-content-between flex-wrap gap-1 mb-4">
    @if(isset($schedule) && $schedule)
        @php
            $start_time = Carbon\Carbon::parse($schedule->start_time);
            $end_time = Carbon\Carbon::parse($schedule->end_time);
        @endphp

        @while ($start_time < $end_time)
            <input name="tutorial-booking" type="radio" class="btn-check" id="{{ $start_time->format('H:i') }}" value="{{ $start_time->format('H:i:s') }}">
            <label class="btn btn-outline-primary" style="min-width:120px" for="{{ $start_time->format('H:i') }}">
                {{ $start_time->format('H:i') }} - {{ $start_time->addMinutes(60)->format('H:i') }}
            </label>
        @endwhile
        <input type="hidden" id="scheduleeid" name="schedule" value="{{$schedule->id}}">
    @else
        <p>No schedule available for the selected date.</p>
    @endif
</div>

{{-- <div class="hstack justify-content-between flex-wrap gap-1 mb-4">
    @if($schedule)
        @php
            $start_time = Carbon\Carbon::parse($schedule->start_time);
            $end_time = Carbon\Carbon::parse($schedule->end_time);
        @endphp

        @while ($start_time < $end_time)
            <input name="tutorial-booking" type="radio" class="btn-check" id="{{ $start_time->format('H:i') }}">
            <label class="btn btn-outline-primary" for="{{ $start_time->format('H:i') }}">
                {{ $start_time->format('h:i A') }} - {{ $start_time->addMinutes(30)->format('h:i A') }}
            </label>
        @endwhile
    @else
        <p>No schedule available for the selected date.</p>
    @endif
</div>
 --}}