const GroupsManagement = {
    data() {
        return {
            groups: null,
            query: ''
        }
    },
    mounted() {
        console.log('Page mounted!');
        this.getGroups();
    },
    methods: {
        getGroups() {
            fetch(`/api/group?query=${this.query}`, {
                credentials: 'same-origin'
            })
                .then(res => {return res.json()})
                .then(res => {
                    this.groups = res;
                })
        },
        addGroups() {
            let input = this.$refs.addInput.value;
            if (input != '') {
                fetch('/admin/group', {
                    method: 'post',
                    credentials: 'same-origin',
                })
                    .then(res => {return res.json()})
                    .then(res => {
                        console.log(res);
                    })
            }
        }
    }
}

window.GroupsManagement = Vue.createApp(GroupsManagement).mount('#vue-group-management');
