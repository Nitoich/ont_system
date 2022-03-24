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

    }
}

window.addEventListener('load', (event) => {
    window.RaspVue = Vue.createApp(Rasp).mount('#rasp-vue-app');
});
