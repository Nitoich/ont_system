<style>
    /*.teacher__item {
        padding: 20px 5px;
        border: 2px solid #000;
        width: 200px;
        border-radius: 10px;
        cursor: pointer;
        margin: 10px 5px;
        transition: transform 0.4s;
    }

    .teacher__item:hover {
        transform: perspective(300px) translateZ(20px);
    } */

    .teacher__item {
        /* Add shadows to create the "card" effect */
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 200px;
        margin: 10px;
        cursor: pointer;
    }

    /* On mouse-over, add a deeper shadow */
    .teacher__item:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }

    /* Add some padding inside the card container */
    .container {
        padding: 2px 16px;
    }
</style>

@if(count($teachers) == 0)
    <h1>Ничего нет</h1>
@endif

@foreach($teachers as $teacher)
    <li class="teacher__item" data-id="{{ $teacher->id }}">
        @if(mb_substr($teacher->FIO, -1) == 'а')
            <img src="https://html5css.ru/howto/img_avatar2.png" alt="Avatar" style="width:100%">
        @else
            <img src="https://html5css.ru/howto/img_avatar.png" alt="Avatar" style="width:100%">
        @endif
        <div class="container">
            <h4><b>{{ $teacher->FIO }}</b></h4>
            <p>Логин: {{ $teacher->login }}</p>
            <p>ID: {{ $teacher->id }}</p>
        </div>
    </li>
@endforeach
