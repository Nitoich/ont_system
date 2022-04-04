<style>
    .wrapper {
        width: 100%;
        padding: 0 10px;
        box-sizing: border-box;
    }

    .title {
        text-align: center;
    }

    .teacher__list,
    .teachers {
        list-style: none;
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
    }

    .teacher_add {
        padding: 20px;
        border: 2px solid black;
        display: none;
    }

    .teachers__search {
        width: 100%;
        padding: 20px;
        box-sizing: border-box;
        display: flex;
        align-items: center;
    }

    .teachers__search input {
        font-weight: bold;
        width: inherit;
        font-size: 24px;
        margin: 0 10px;
    }

    .btn {
        padding: 10px;
        background: #207d59;
        border: none;
        cursor: pointer;
        transition: 0.3s;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 40px;
        margin: 0 10px;
    }

    .btn:hover {
        background: #207d5999;
    }

    @media screen and (max-width: 768px) {
        .teachers__search {
            flex-direction: column;
        }

        .teachers__search input {
            margin-bottom: 10px;
        }

        .btn {
            margin: 10px 0;
        }
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
    <ul class="teacher__list" id="vue-teacher-list">
        <li class="teachers__search">
            <input @keyup.enter="getTeachers()" v-model="this.query" type="text" id="search-input" placeholder="Поиск">
            <button class="btn" @click="getTeachers()">Применить</button>
            <button class="btn" @click="showAddTeacherModal()">Добавить преподователя</button>
        </li>
        <div ref="teachersList" class="teachers">

        </div>
    </ul>
</div>

<script src="assets/js/vue-components/teacherInfo.js"></script>
<script src="assets/js/vue-components/teacherList.js"></script>
<script src="assets/js/vue-components/teacherAdd.js"></script>

<script>


    document.getElementById('add_teacher').addEventListener('click', event => {
        let data = {
            _token: document.querySelector('input[name="_token"]').value,
            last_name: document.getElementById('last_name').value,
            first_name: document.getElementById('first_name').value,
            patronymic: document.getElementById('patronymic').value,
            login: document.getElementById('login').value,
            password: document.getElementById('password').value
        }

        let validationError = false;


        // Очистка и валидация
        for(el in data) {
            if(data[el] == '') {
                validationError = true;
            }
        }

         if(validationError) {
             this.ErrorModal = new Modal(`
                 <div style="padding: 20px;">
                     <p style="font-size: 26px">Не все поля заполнены!</p>
                 </div>
             `);
             return false;
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
                console.log(res.json())
            } else {
                console.log('Succes!');
                window.location.reload();
            }
        })
    })
</script>
