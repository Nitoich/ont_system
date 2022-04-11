const AdminIzm = {
    data(){
        return {
            izmDate: '',
            group: '',
            izm: undefined,
            izmDateList: undefined,
            groups: undefined,
        }
    },
    mounted() {
        console.log("Izm vue app mounted!");
        this.getIzmDate();
        this.getGroups();
    },
    methods: {
        getIzmDate() {
            fetch('/izm')
                .then(res => {return res.json()})
                .then(res => {
                    console.log(res)
                    this.izmDateList = res;
                })
        },
        getGroups() {
            fetch('/api/group')
                .then(res => {return res.json()})
                .then(res => {
                    console.log(res)
                    this.groups = res;
                })
        },
        getIzm() {
            if (this.izmDate != '' && this.group != '') {
                console.log('123')
                fetch(`/izm/date?id=${this.izmDate}&group=${this.group}`)
                    .then(res => {return res.json()})
                    .then(res => {
                        console.log(res)
                        this.izm = res;
                    })
            }
        },
        setActiveIzmDate(event) {
            console.log(event.target);
            this.$refs.izmDataItems.forEach(el => {
                el.classList.remove('active');
            });
            event.target.classList.add('active');
            this.izmDate = event.target.getAttribute('data-id');
        },
        setActiveGroup(event) {
            console.log(event.target);
            this.$refs.groupsItems.forEach(el => {
                el.classList.remove('active');
            });
            event.target.classList.add('active');
            this.group = event.target.getAttribute('data-group');
        }
    },
    watch: {
        group: function() {
            this.getIzm()
        },
        izmDate: function() {
            this.getIzm()
        }
    }
};

window.addEventListener('DOMContentLoaded', () => {
    window.ContentVueApp = Vue.createApp(AdminIzm).mount('#vue-admin-izm');
})


