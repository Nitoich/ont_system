const adminMenu = {
    data() {
        return {

        }
    },
    methods: {
        showing() {
            console.log('123')
            this.$refs.menu.classList.add('active');
        },
        hidding() {
            this.$refs.menu.classList.remove('active');
        },
        goToSite() {
            window.location.href='/'
        }
    }
}
console.log('123')

window.addEventListener('DOMContentLoaded', (event) => {
    window.adminMenu = Vue.createApp(adminMenu).mount('#vue-menu');
})

