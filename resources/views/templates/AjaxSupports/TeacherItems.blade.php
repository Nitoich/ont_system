<style>
    .teacher__item {
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
    }
</style>

@if(count($teachers) == 0)
    <h1>Ничего нет</h1>
@endif

@foreach($teachers as $teacher)
    <li class="teacher__item" data-id="{{ $teacher->id }}">
        <p>ФИО: {{ $teacher->FIO }}</p>
        <p>ID: {{ $teacher->id }}</p>
        <p>login: {{ $teacher->login }}</p>
    </li>
@endforeach
