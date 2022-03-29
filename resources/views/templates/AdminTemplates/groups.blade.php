<div class="wrapper" id="vue-group-management">
    <h1 class="title">Управление группами</h1>
    <div class="add-group">
        <h2>Добавить новую группу</h2>
        <input type="text" placeholder="Название">
        <button>ДОБАВИТЬ</button>
    </div>
    <div class="search-group">
        <label for="search-input">Поиск: </label>
        <input type="text" id="search-input">
        <button>ПОИСК</button>
    </div>
    <div class="group__list">
        <div class="group__item">
            <div class="name">ИСП-3</div>
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
</style>
