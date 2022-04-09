
@extends('templates.default')

@section('title')
    Расписание
@endsection

@section('jos')
    <link rel="stylesheet" href="app.css">
    <script src="{{ asset('assets/js/loadingModal.js') }}"></script>
    <script src="https://kit.fontawesome.com/630e35a26e.js" crossorigin="anonymous"></script>
    <script src="<?php echo asset('assets/js/slidesForm.js'); ?>"></script>
    <script src="https://unpkg.com/vue@3"></script>
    <script src="{{ asset('assets/js/vue-components/Rasp.js') }}"></script>
    <script src="{{ asset('assets/js/vue-components/Izm.js') }}"></script>
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
                        @if(!\Illuminate\Support\Facades\Auth::check())
                            @include('templates.forms.login')
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::check())
                            @include('templates.forms.profile')
                        @endif
                    </div>
                </div>
                @include('templates.navigation')
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
@endsection
