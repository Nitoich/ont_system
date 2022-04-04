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
            //
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
