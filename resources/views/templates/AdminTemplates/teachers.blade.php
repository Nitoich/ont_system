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
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
    }

    .teacher__item {
        padding: 20px 5px;
        border: 2px solid #000;
        width: 200px;
        border-radius: 10px;
        cursor: pointer;
        margin: 10px 0;
        transition: transform 0.4s;
    }

    .teacher__item:hover {
        transform: perspective(300px) translateZ(20px);
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
            <li class="teacher__item" data-id="{{ $teacher->id }}">
                <p>ФИО: {{ $teacher->FIO }}</p>
                <p>ID: {{ $teacher->id }}</p>
                <p>login: {{ $teacher->login }}</p>
            </li>
        @endforeach
    </ul>
</div>

<script>
    let teachers_cards = document.querySelectorAll('li.teacher__item');
    teachers_cards.forEach(el => {
        el.addEventListener('click', function(event) {
            let RootModal = new Modal('<h1 align="center">Loading...</h1>');
            fetch('/admin/teacher?id=' + this.getAttribute('data-id'), {
                method: 'get',
                credentials: "same-origin"
            })
            .then(res => {
                console.log(res.status)
                return res.text();
            })
            .then(res => {
                RootModal.setTemplate(res);
            })

        });
    });
</script>
