const adminMenu = {
    data() {
        return {
            expand: false
        }
    },
    methods: {
        showing() {
            this.$refs.menu.classList.add('active');
        },
        hidding() {
            this.$refs.menu.classList.remove('active');
        },
        toggleView() {
            this.$refs.menu.classList.toggle('active');
        },
        goToSite(url) {
            window.location.href=url;
        },
    }
}

window.addEventListener('DOMContentLoaded', (event) => {
    window.adminMenu = Vue.createApp(adminMenu).mount('#vue-menu');
})

