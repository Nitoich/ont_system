<style>
    .info-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        max-width: 600px;
        font-family: "Segoe UI";
    }

    .input-block {
        margin: 10px 20px;
        width: 250px;
        box-sizing: border-box;
    }

    .input-block > input {
        padding: 5px;
        font-size: 20px;
        font-weight: bold;
        box-sizing: border-box;
    }

    .input-block > button {
        width: 257.667px;
        margin-top: 21px;
        height: 38px;
    }
</style>

<div class="info-container">

    <div class="input-block">
        <label for="login">Логин:</label><br>
        <input disabled id="login" type="text" value="{{ $teacher->login }}">
    </div>

    <div class="input-block">
        <label for="password">Пароль:</label><br>
        <input id="password" type="text" value="{{ $teacher->password }}">
    </div>

    <div class="input-block">
        <label for="fam">Фамилия:</label><br>
        <input id="fam" type="text" value="{{ $teacher->fam }}">
    </div>

    <div class="input-block">
        <label for="name">Имя:</label><br>
        <input id="name" type="text" value="{{ $teacher->name }}">
    </div>

    <div class="input-block">
        <label for="patronymic">Отчество:</label><br>
        <input id="patronymic" type="text" value="{{ $teacher->patronymic }}">
    </div>

    <div class="input-block">
        <button>ОБНОВИТЬ</button>
    </div>

</div>
