@extends('templates.default')

@section('title')
    ADMIN
@endsection

@section('jos')
    <script src="{{ asset('assets/js/loadingModal.js') }}"></script>
    <script src="https://kit.fontawesome.com/630e35a26e.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue@3"></script>
    <script src="assets/js/vue-components/adminMenu.js"></script>
    <link rel="stylesheet" href="/adm_style.css">
@endsection

@section('content')
    <div id="vue-menu">
        <div ref="menu" class="menu" @mouseenter="showing()" @mouseleave="hidding()">
            <ul class="menu__list">
                <li class="menu__item" @click="goToSite()">
                    <div class="item__img">
                        <i class="fa-solid fa-house-user"></i>
                    </div>
                    <div class="item__name">На сайт</div>
                </li>

                <li class="menu__item">
                    <div class="item__img">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="item__name">Учителя</div>
                </li>
            </ul>
        </div>
    </div>

    <div class="content">

    </div>
@endsection

