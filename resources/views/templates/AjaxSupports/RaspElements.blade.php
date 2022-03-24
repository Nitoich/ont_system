@foreach($data as $day)
    <div class="day">
        {{ $day[0]->day->den }}
        @foreach($day as $para)
            <div class="lesson_number">
                {{ $para->para }} -- {{ $para->disciplina }} @isset($para->cabinet)-- {{ $para->cabinet->nomer }} @endisset -- {{ $para->tip }}
            </div>
        @endforeach
    </div>
@endforeach
