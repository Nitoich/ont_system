<div class="form rasp" id="rasp-vue-app">
    <div class="form-content">
        <div class="filter-container">
            <select name="" id="select-group" class="groups" v-model="group" @change="change()">
                <option value="" disabled selected>Группа</option>
                @foreach(\App\Models\Group::all() as $group)
                    <option value="{{ $group->nomer }}">{{ $group->nomer }}</option>
                @endforeach
            </select>

            @if(\Illuminate\Support\Facades\Auth::check())
                <button>Редактировать</button>
            @endif
        </div>
        <div class="rasp-container">

        </div>
    </div>
</div>
