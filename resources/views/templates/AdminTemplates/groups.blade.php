<div class="wrapper" id="vue-group-management">
    <h1 class="title">Управление группами</h1>
    <div class="add-group">
        <h2>Добавить новую группу</h2>
        <input type="text" placeholder="Название" ref="addInput">
        <button>ДОБАВИТЬ</button>
    </div>
    <div class="search-group">
        <label for="search-input">Поиск: </label>
        <input type="text" id="search-input" v-model="this.query" @keyup.enter="this.getGroups()">
        <button @click="this.getGroups()">ПОИСК</button>
    </div>
    <div class="group__list">
        <div class="group__item" v-for="group in this.groups" :id="group">
            <div class="name">Название: @{{ group }}</div>
            <div class="group__control">
                <button>Удалить</button>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/vue-components/groupManagementPage.js"></script>

<style>
    .wrapper {
        width: 100%;
        padding: 0 10px;
        box-sizing: border-box;
    }

    .title {
        text-align: center;
    }

    .group__list {
        padding: 10px;
        box-sizing: border-box;
    }

    .group__item {
        padding: 5px;
        border: 2px solid black;
        display: flex;
        justify-content: space-between;
    }
</style>
