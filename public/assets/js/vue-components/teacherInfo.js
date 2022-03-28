const teacherCard = {
    data() {
        return {
            id: document.getElementById('modal-id').value,
            login: document.getElementById('modal-login').value,
            password: document.getElementById('modal-password').value,
            first_name: document.getElementById('modal-name').value,
            last_name: document.getElementById('modal-fam').value,
            patronymic: document.getElementById('modal-patronymic').value,
            delTimeout: 6,
            canUpdate: false
        }
    },
    props: [
        'loginData'
    ],
    methods: {
        updateRequest() {
            console.log(this.id)
            let Data = {
                id: this.id,
                login: this.login,
                password: this.password,
                last_name: this.last_name,
                first_name: this.first_name,
                patronymic: this.patronymic,
                _token: document.querySelector('input[name="_token"]').value
            };
            fetch(`/admin/teacher/update`, {
                method: 'post',
                credentials: 'same-origin',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(Data)
            })
                .then(res => {
                    if (res.status != 200) {
                        console.log('Error')
                    } else {
                        window.location.reload();
                    }
                })
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
                fetch(`/admin/teacher?login=${this.login}&_token=${document.querySelector('input[name="_token"]').value}`, {
                    method: 'delete',
                    credentials: 'same-origin'
                })
                    .then(res => {
                        if(res.status != 200) {
                            console.log('error!');
                        } else {
                            window.location.reload();
                        }
                    })
            }
        },
        enableUpdateButton() {
            this.canUpdate = true;
        }
    },
    watch: {
        first_name: function () {
            this.enableUpdateButton();
        },
        last_name: function() {
            this.enableUpdateButton();
        },
        patronymic: function() {
            this.enableUpdateButton();
        },
        password: function() {
            this.enableUpdateButton();
        },
        login: function() {
            this.enableUpdateButton();
        }
    }
};
