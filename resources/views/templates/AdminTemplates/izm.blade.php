<script src="assets/js/vue-components/adminIzm.js"></script>

<div class="wrapper" id="vue-admin-izm" >
    <h1 class="title">Управление изменениями в расписании</h1>
    <div class="izm__content">
        <div class="column izmDate">
            <div ref="izmDataItems" :data-id="item.id" class="izmDate__item" v-for="item in this.izmDateList" @click="setActiveIzmDate">
                @{{ item.data }} (@{{ item.den }})
            </div>
        </div>
        <div class="column izmGroup">
            <div ref="groupsItems" class="izmDate__item" v-for="item in this.groups" :data-group="item" @click="setActiveGroup">
                @{{ item }}
            </div>
        </div>
        <div class="column LessonsGroup">
            <div class="izmDate__item" v-for="item in this.izm">
                Пара: @{{ item.para }} || Кабинет: @{{ item.kabinet }} || Причина: @{{ item.prichina }}
            </div>
        </div>
    </div>
</div>

<style>
    .wrapper {
        width: 100%;
        padding: 0 10px;
        box-sizing: border-box;
    }

    .title {
        text-align: center;
    }

    .izm__content {
        display: flex;
        flex-direction: row;
        width: 100%;
        height: 95vh;
    }

    .column {
        border: 2px solid black;
        max-width: 200px;
        flex: 1;
        overflow: auto;
    }

    .column.LessonsGroup {
        flex: 2;
        max-width: none;
    }

    .izmDate__item {
        padding: 10px;
        box-sizing: border-box;
        cursor: pointer;
        user-select: none;
    }

    .izmDate__item.active {
        background: gray;
    }

    .izmDate__item:hover {
        background: grey;
    }
</style>
