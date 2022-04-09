const IzmSlide = {
    data() {
        return {
            date: '',
            group: '',
            izmDate: undefined
        }
    },
    mounted() {
        this.date = new Date().toISOString().toString().slice(0,10);
        console.log('Izm vue app mounted!')
    },
    methods: {
        getIzm() {
            fetch(`/izm/date?`)
        },
        getIzmDate() {
            fetch(`/izm?date=${this.date}`)
                .then(res => {
                    if (res.status != 200) {
                        return undefined;
                    } else {
                        return res.json();
                    }
                })
                .then(res => {
                    this.izmDate = res;
                    console.log(this.izmDate)
                })
        }
    },
    watch: {
        date: function () {
            this.getIzmDate();
        }
    }
}

window.addEventListener('DOMContentLoaded', () => {
    Vue.createApp(IzmSlide).mount('#vue-izm');
})
