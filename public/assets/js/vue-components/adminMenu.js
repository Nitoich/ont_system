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
            console.log(this.expand)
            this.expand = !this.expand;
            console.log(this.expand)
            localStorage.setItem('amenu_mode', this.expand);
        },
        goToSite(url) {
            window.location.href=url;
        },
    },
    mounted() {
        let menu_mode = localStorage.getItem('amenu_mode');

        if(menu_mode !== null) {
            if(menu_mode == 'true') {
                this.expand = true;
            } else {
                this.expand = false;
            }
        }
    }
}

window.addEventListener('DOMContentLoaded', (event) => {
    window.adminMenu = Vue.createApp(adminMenu).mount('#vue-menu');
})

