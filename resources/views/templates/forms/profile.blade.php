<?php
    $user = \Illuminate\Support\Facades\Auth::user();
?>

<div class="form profile">
    <p>{{ $user->name }} {{ $user->patronymic }}</p>
    <a href="/logout">ВЫЙТИ</a>
</div>
