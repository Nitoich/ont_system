<div class="form izm" id="vue-izm">
    <div class="wrapper">
        <div class="filter">
            <label for="izm-date">Дата: </label>
            <input type="date" v-model="this.date" id="izm-date">
            <select name="" id="select-group" class="groups" v-model="group" :disabled="!Boolean(this.izmDate)">
                <option value="" disabled selected>Группа</option>
                @foreach(\App\Models\Group::all() as $group)
                    <option value="{{ $group->nomer }}">{{ $group->nomer }}</option>
                @endforeach
            </select>
        </div>
        <div class="izm__list" ref="IzmList">

        </div>
    </div>
</div>
