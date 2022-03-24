
@extends('templates.default')

@section('title')
    Расписание
@endsection

@section('jos')
    <link rel="stylesheet" href="app.css">
    <script src="https://kit.fontawesome.com/630e35a26e.js" crossorigin="anonymous"></script>
    <script src="<?php echo asset('assets/js/slidesForm.js'); ?>"></script>
@endsection

@section('content')
    <?php // var_dump(asset('/images/bg.webp')); ?>
    <div class="bg"></div>
    <div class="bg-overlay"></div>

    <header class="header">
        <div class="wrapper">
            <div class="header__content">
                <p>Расписание</p>
                <p>Телефон: (3537)21-66-29</p>
            </div>
        </div>
    </header>

    <main class="main">
        <div class="wrapper">
            <div class="main__content">
                <div class="forms">
                    <div class="forms__container">
                        @include('templates.forms.main')
                        @include('templates.forms.rasp')
                        @include('templates.forms.izm')
                        @include('templates.forms.login')
                    </div>
                </div>

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
                        <li>
                            <button class="slide-btn login" data-slide="login">
                                <i class="fa-solid fa-user"></i>
                                <p>Авторизация</p>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="wrapper">
            <div class="footer__content">
                Copyright © 2021 И.В.Финк
            </div>
        </div>
    </footer>

    <script src="<?php echo resource_path(); ?>/main.js"></script>
@endsection
