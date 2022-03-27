@extends('templates.default')

@section('title')
    ADMIN
@endsection

@section('jos')
    <script src="{{ asset('assets/js/loadingModal.js') }}"></script>
    <script src="https://kit.fontawesome.com/630e35a26e.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue@3"></script>
    <script src="assets/js/vue-components/adminMenu.js"></script>
    <script src="assets/js/modalClass.js"></script>
    <link rel="stylesheet" href="/adm_style.css">
@endsection

@section('content')
    <div id="vue-menu">
        <div ref="menu" class="menu" @mouseenter="showing()" @mouseleave="hidding()">
            <ul class="menu__list">
                <li class="menu__item" @click="goToSite('/')">
                    <div class="item__img">
                        <i class="fa-brands fa-firefox-browser"></i>
                    </div>
                    <div class="item__name">На сайт</div>
                </li>

                <li class="menu__item" @click="goToSite('/admin?tab=home')">
                    <div class="item__img">
                        <i class="fa-solid fa-house-user"></i>
                    </div>
                    <div class="item__name">Главная</div>
                </li>

                <li class="menu__item" @click="goToSite('/admin?tab=teachers')">
                    <div class="item__img">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="item__name">Учителя</div>
                </li>

                <li class="menu__item" @click="goToSite('/admin?tab=groups')">
                    <div class="item__img">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div class="item__name">Группы</div>
                </li>

                <li class="menu__item" @click="goToSite('/admin?tab=rasp')">
                    <div class="item__img">
                        <i class="fa-solid fa-table-cells"></i>
                    </div>
                    <div class="item__name">Расписание</div>
                </li>

                <li class="menu__item" @click="goToSite('/admin?tab=izm')">
                    <div class="item__img">
                        <i class="fa-solid fa-newspaper"></i>
                    </div>
                    <div class="item__name">Изменения</div>
                </li>
            </ul>
        </div>
    </div>

    <div class="content">
        @include('templates.AdminTemplates.' . $tab)
    </div>
@endsection

