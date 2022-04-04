const TeacherAdd = {
    data() {
        return {
            login: '',
            password: '',
            last_name: '',
            first_name: '',
            patronymic: '',
            canCreate: false,
            error: false,
            errorText: ''
        }
    },
    watch: {
        login: function() {
            this.canCreateStat();
        },
        password: function() {
            this.canCreateStat();
        },
        last_name: function() {
            this.canCreateStat();
        },
        first_name: function() {
            this.canCreateStat();
        },
        patronymic: function() {
            this.canCreateStat();
        }
    },
    methods: {
        addTeacher() {
            fetch(`/admin/teacher?_token=${document.querySelector('input[name="_token"]').value}&last_name=${this.last_name}&first_name=${this.first_name}&patronymic=${this.patronymic}&login=${this.login}&password=${this.password}`, {
                method: "post",
                credentials: "same-origin",
            })
                .then(res => {
                    if (res.status != 200) {
                        this.error = true;
                        this.errorText = res.json();
                        console.log(this.errorText);
                    } else {
                        console.log('Succes!');
                        window.location.reload();
                    }
                })
        },
        canCreateStat() {
            if (this.login == '' || this.password == '' || this.last_name == '' || this.first_name == '' || this.patronymic == '') {
                this.canCreate = false;
            } else {
                this.canCreate = true;
            }
        }
    }
}
