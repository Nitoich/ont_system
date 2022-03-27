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
        }
    }
}

window.addEventListener('DOMContentLoaded', () => {
    window.TeacherList = Vue.createApp(TeacherList).mount('#vue-teacher-list');
})
