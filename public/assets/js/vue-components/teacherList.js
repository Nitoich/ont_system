const TeacherList = {
    data() {
        return {
            query: ''
        }
    },
    mounted() {
        this.getTeachers();
    },
    methods: {
        getTeachers() {
            fetch('/admin/teacher/list?query=' + this.query + '&_token=' + document.querySelector('input[name="_token"]').value, {
                method: 'get',
                credentials: "same-origin"
            })
                .then(res => {return res.text()})
                .then(res => {
                    this.$refs.teachersList.innerHTML = res;
                    this.setCBToCards();
                })
        },
        setCBToCards() {
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
                            window.teacherInfo = Vue.createApp(teacherCard).mount('#info-container');
                        })
                });
            });
        },
        showAddTeacherModal() {
            let RootModal = new Modal(`
                <style>
                    .input-block {
                        margin: 10px 0;
                        box-sizing: border-box;
                    }

                    .input-block > input {
                        padding: 5px;
                        box-sizing: border-box;
                        font-size: 20px;
                        font-weight: bold;
                        box-sizing: border-box;
                    }

                    .input-block > button {
                        width: 100%;
                        height: 38px;
                    }
                </style>
                <div id="add-new-teacher">
                    <div class="teacher-error" v-if="this.error">
                        <p>@{{ this.errorText }}</p>
                    </div>

                    <div class="input-block">
                        <label for="login">Логин:</label><br>
                        <input v-model="this.login" type="text">
                    </div>

                    <div class="input-block">
                        <label for="password">Пароль:</label><br>
                        <input type="text" v-model="this.password">
                    </div>

                    <div class="input-block">
                        <label for="fam">Фамилия:</label><br>
                        <input type="text" v-model="this.last_name">
                    </div>

                    <div class="input-block">
                        <label for="name">Имя:</label><br>
                        <input type="text" v-model="this.first_name">
                    </div>

                    <div class="input-block">
                        <label for="patronymic">Отчество:</label><br>
                        <input type="text" v-model="this.patronymic">
                    </div>

                    <div class="input-block">
                        <button :disabled="!this.canCreate" @click="addTeacher()">ДОБАВИТЬ</button>
                    </div>
                </div>
            `);

            window.VueAppModal = Vue.createApp(TeacherAdd).mount('#add-new-teacher');
        }
    }
}

window.addEventListener('DOMContentLoaded', () => {
    window.TeacherList = Vue.createApp(TeacherList).mount('#vue-teacher-list');
})
