const Rasp = {
    data() {
        return {
            group: '',
        }
    },
    methods: {
        change() {
            console.log(this.group);
        },
        getRasp() {
            fetch(`/api/rasp?group=${this.group}`, {
                headers: {
                    'Content-Type': 'text/html'
                }
            })
                .then((res) => {return res.text()})
                .then((res) => {
                    console.log(res);
                    this.$refs.raspContainer.innerHTML = res;
                    document.querySelectorAll('.day').forEach(el => {
                        el.addEventListener('click', function(event) {
                            if (!event.target.classList.contains('lesson_number')) {
                                this.classList.toggle('active');
                            }
                        })
                    })
                })
        }
    }
}

window.addEventListener('load', (event) => {
    window.RaspVue = Vue.createApp(Rasp).mount('#rasp-vue-app');
});
