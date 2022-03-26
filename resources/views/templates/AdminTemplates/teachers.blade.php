<style>
    .wrapper {
        width: 100%;
        padding: 0 10px;
        box-sizing: border-box;
    }

    .title {
        text-align: center;
    }

    .teacher__list {
        list-style: none;
    }

    .teacher__item {
        padding: 20px;
        border: 2px solid #000;
    }

    .teacher_add {
        padding: 20px;
        border: 2px solid black;
    }
</style>

<div class="wrapper">
    <h1 class="title">Управление учителями</h1>
    <div class="teacher_add">
        <form action="">
            <input type="text" placeholder="Фамилия">
            <input type="text" placeholder="Имя">
            <input type="text" placeholder="Отчество">
            <input type="text" placeholder="Логин">
            <input type="password" placeholder="Пароль">
            <button>ДОБАВИТЬ</button>
        </form>
    </div>
    <ul class="teacher__list">
        @foreach(\App\Models\User::all() as $teacher)
            <li class="teacher__item">
                {{ $teacher->FIO }}
            </li>
        @endforeach
    </ul>
</div>
