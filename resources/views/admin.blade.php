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
        <div ref="menu" class="menu">
            <ul class="menu__list">
                <li class="menu__item" @click="goToSite('/')">
                    <div class="item__img">
                        <i class="fa-brands fa-firefox-browser"></i>
                    </div>
                    <div class="item__name">На сайт</div>
                </li>

                <li class="menu__item <?php if(isset($_GET['tab']) && $_GET['tab'] == 'home') { echo "active"; } ?>" @click="goToSite('/admin?tab=home')">
                    <span></span>
                    <span></span>
                    <div class="item__img">
                        <i class="fa-solid fa-house-user"></i>
                    </div>
                    <div class="item__name">Главная</div>
                </li>

                <li class="menu__item <?php if(isset($_GET['tab']) && $_GET['tab'] == 'teachers') { echo "active"; } ?>" @click="goToSite('/admin?tab=teachers')">
                    <span></span>
                    <span></span>
                    <div class="item__img">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="item__name">Учителя</div>
                </li>

                <li class="menu__item <?php if(isset($_GET['tab']) && $_GET['tab'] == 'groups') { echo "active"; } ?>" @click="goToSite('/admin?tab=groups')">
                    <span></span>
                    <span></span>
                    <div class="item__img">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div class="item__name">Группы</div>
                </li>

                <li class="menu__item <?php if(isset($_GET['tab']) && $_GET['tab'] == 'rasp') { echo "active"; } ?>" @click="goToSite('/admin?tab=rasp')">
                    <span></span>
                    <span></span>
                    <div class="item__img">
                        <i class="fa-solid fa-table-cells"></i>
                    </div>
                    <div class="item__name">Расписание</div>
                </li>

                <li class="menu__item <?php if(isset($_GET['tab']) && $_GET['tab'] == 'izm') { echo "active"; } ?>" @click="goToSite('/admin?tab=izm')">
                    <span></span>
                    <span></span>
                    <div class="item__img">
                        <i class="fa-solid fa-newspaper"></i>
                    </div>
                    <div class="item__name">Изменения</div>
                </li>
            </ul>

            <button class="expand-btn" @click="this.toggleView()"><i class="fa-solid fa-left-right"></i></button>
        </div>
    </div>

    <div class="content">
        @include('templates.AdminTemplates.' . $tab)
    </div>
@endsection

