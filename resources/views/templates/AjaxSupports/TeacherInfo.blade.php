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

    .teacher-modal-delete {
        width: 550px;
        margin: 10px 20px;
        background: rgba(255,20,20, 0.8);
        border: none;
        height: 38px;
        cursor: pointer;
        font-weight: bold;
        border-radius: 10px;
        color: #fff;
        transition: 0.3s;
    }

    .teacher-modal-delete:hover {
        background: rgba(255,20,20, 1);
    }
</style>

<input type="hidden" id="modal-login" value="{{ $teacher->login }}">
<input id="modal-password" type="hidden" value="{{ $teacher->password }}">
<input id="modal-fam" type="hidden" value="{{ $teacher->Fam }}">
<input id="modal-name" type="hidden" value="{{ $teacher->name }}">
<input id="modal-patronymic" type="hidden" value="{{ $teacher->patronymic }}">

<div class="info-container" id="info-container">

    <div class="input-block">
        <label for="login">Логин:</label><br>
        <input disabled v-model="this.login" type="text">
    </div>

    <div class="input-block">
        <label for="password">Пароль:</label><br>
        <input type="text" v-model="this.password">
    </div>

    <div class="input-block">
        <label for="fam">Фамилия:</label><br>
        <input type="text" v-model="this.last_name">
    </div>

    <div class="input-block">
        <label for="name">Имя:</label><br>
        <input type="text" v-model="this.first_name">
    </div>

    <div class="input-block">
        <label for="patronymic">Отчество:</label><br>
        <input type="text" v-model="this.patronymic">
    </div>

    <div class="input-block">
        <button @click="updateRequest()">ОБНОВИТЬ</button>
    </div>

    <button ref="deleteBtn" @click="deleteTeacher()" class="btn red teacher-modal-delete">УДАЛИТЬ</button>

</div>
