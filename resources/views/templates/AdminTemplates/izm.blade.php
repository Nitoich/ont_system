<div class="wrapper">
    <h1 class="title">Управление изменениями в расписании</h1>
    <div class="izm__content">
        <div class="column izmDate">
            @foreach(\App\Models\IzmDate::all() as $item)
                <div class="izmDate__item">
                    <p>{{ $item->data }} ({{ $item->den }})</p>
                </div>
            @endforeach
        </div>
        <div class="column izmGroup">
            @foreach(\App\Models\Group::all() as $item)
                <div class="izmDate__item">
                    <p>{{ $item->nomer }}</p>
                </div>
            @endforeach
        </div>
        <div class="column LessonsGroup">
            @foreach(\App\Models\Izm::all() as $item)
                <div class="izmDate__item">
                    <p>Пара: {{ $item->para }} Кабинет: {{ $item->kabinet }} Причина: {{ $item->prichina }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    .wrapper {
        width: 100%;
        padding: 0 10px;
        box-sizing: border-box;
    }

    .title {
        text-align: center;
    }

    .izm__content {
        display: flex;
        flex-direction: row;
        width: 100%;
        height: 95vh;
    }

    .column {
        border: 2px solid black;
        max-width: 200px;
        flex: 1;
        overflow: auto;
    }

    .column.LessonsGroup {
        flex: 2;
        max-width: none;
    }

    .izmDate__item {
        padding: 10px;
        box-sizing: border-box;
        cursor: pointer;
    }

    .izmDate__item:hover {
        background: grey;
    }
</style>
