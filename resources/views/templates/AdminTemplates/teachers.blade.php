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
        @csrf
        <input type="text" placeholder="Фамилия" id="last_name">
        <input type="text" placeholder="Имя" id="first_name">
        <input type="text" placeholder="Отчество" id="patronymic">
        <input type="text" placeholder="Логин" id="login">
        <input type="password" placeholder="Пароль" id="password">
        <button id="add_teacher">ДОБАВИТЬ</button>
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
                window.teacherInfo = Vue.createApp({
                    data() {
                        return {
                            login: document.getElementById('modal-login').value,
                            password: document.getElementById('modal-password').value,
                            first_name: document.getElementById('modal-name').value,
                            last_name: document.getElementById('modal-fam').value,
                            patronymic: document.getElementById('modal-patronymic').value,
                            delTimeout: 6,
                        }
                    },
                    props: [
                        'loginData'
                    ],
                    methods: {
                        updateRequest() {
                            console.log(this.first_name)
                            console.log(this.last_name)
                        },
                        deleteTeacher() {
                            if(this.delTimeout != 0) {
                                let interval = setInterval(() => {
                                    console.log(this.delTimeout);
                                    if (this.delTimeout != 0) {
                                        this.delTimeout--;
                                        this.$refs.deleteBtn.innerHTML = `Обдумайте это решение! (${this.delTimeout})`;
                                    } else {
                                        clearInterval(interval);
                                        this.$refs.deleteBtn.innerHTML = 'Я все обдумал, всё равно удалить';
                                    }
                                }, 1000);
                            } else {
                                console.log('DELETE!')
                            }
                        }
                    }
                }).mount('#info-container');
            })
        });
    });

    document.getElementById('add_teacher').addEventListener('click', event => {
        let data = {
            _token: document.querySelector('input[name="_token"]').value,
            last_name: document.getElementById('last_name').value,
            first_name: document.getElementById('first_name').value,
            patronymic: document.getElementById('patronymic').value,
            login: document.getElementById('login').value,
            password: document.getElementById('password').value
        }

        fetch(`/admin/teacher?_token=${data._token}&last_name=${data.last_name}&first_name=${data.first_name}&patronymic=${data.patronymic}&login=${data.login}&password=${data.password}`, {
            method: "post",
            credentials: "same-origin",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(res => {
            if (res.status != 200) {
                console.log('Error!')
            } else {
                console.log('Succes!');
                window.location.reload();
            }
        })
    })
</script>
