<div class="form login">
    <div class="wrapper">
        <form action="/login" method="post" class="form-content">
            @csrf
            <input type="username" placeholder="Логин">
            <input type="password" placeholder="Пароль">
            <button id="auth-button" type="submit">Войти</button>
        </form>
    </div>
</div>
