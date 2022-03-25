<?php
    $user = \Illuminate\Support\Facades\Auth::user();
?>

<div class="form profile">
    <div class="form-content profile">
        <p>{{ $user->name }} {{ $user->patronymic }}</p>
        <a href="/admin" class="btn">Администрирование</a>
        <a href="/logout" class="btn">ВЫЙТИ</a>
    </div>
</div>
