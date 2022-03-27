const teacherCard = {
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
        }
    }
};
