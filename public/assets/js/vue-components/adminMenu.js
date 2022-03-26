const adminMenu = {
    data() {
        return {

        }
    },
    methods: {
        showing() {
            this.$refs.menu.classList.add('active');
        },
        hidding() {
            this.$refs.menu.classList.remove('active');
        },
        goToSite(url) {
            window.location.href=url;
        },
    }
}

window.addEventListener('DOMContentLoaded', (event) => {
    window.adminMenu = Vue.createApp(adminMenu).mount('#vue-menu');
})

