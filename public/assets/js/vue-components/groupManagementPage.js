const GroupsManagement = {
    mounted() {
        console.log('Page mounted!');
    }
}

window.GroupsManagement = Vue.createApp(GroupsManagement).mount('#vue-group-management');
