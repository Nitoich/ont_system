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
        },
        showAll() {
            console.log(this.$refs.raspContainer.children)
            for (let i = 0; i < this.$refs.raspContainer.children.length; i++) {
                this.$refs.raspContainer.children[i].classList.add('active');
            }
        },
        closeAll() {
            for (let i = 0; i < this.$refs.raspContainer.children.length; i++) {
                this.$refs.raspContainer.children[i].classList.remove('active');
            }
        }
    }
}

window.addEventListener('load', (event) => {
    window.RaspVue = Vue.createApp(Rasp).mount('#rasp-vue-app');
});
