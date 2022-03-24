<div class="nav">
    <ul class="nav__container">
        <li>
            <button class="slide-btn home" data-slide="home">
                <i class="fa-solid fa-house-user"></i>
                <p>Главная</p>
            </button>
        </li>
        <li>
            <button class="slide-btn rasp" data-slide="rasp">
                <i class="fa-solid fa-table-cells"></i>
                <p>Расписание</p>
            </button>
        </li>
        <li>
            <button class="slide-btn izm" data-slide="izm">
                <i class="fa-solid fa-newspaper"></i>
                <p>Изменения</p>
            </button>
        </li>
        @if(!\Illuminate\Support\Facades\Auth::check())
            <li>
                <button class="slide-btn login" data-slide="login">
                    <i class="fa-solid fa-key"></i>
                    <p>Авторизация</p>
                </button>
            </li>
        @endif
        @if(\Illuminate\Support\Facades\Auth::check())
            <li>
                <button class="slide-btn profile" data-slide="profile">
                    <i class="fa-solid fa-user"></i>
                    <p>Профиль <br> {{ \Illuminate\Support\Facades\Auth::user()->name }}</p>
                </button>
            </li>
        @endif
    </ul>
</div>
