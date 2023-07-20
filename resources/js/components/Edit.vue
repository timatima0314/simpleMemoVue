<template>
    <main>
        <h2 class="edit__heading">No1&nbsp;メモ編集</h2>
        <div class="edit__box">
            <div class="edit__titel">メモ内容</div>
            <form>
                <input type="text" name="content" v-model="contentEdit" />
            </form>
            <div class="edit__button-wrap">
                <router-link to="/"
                    ><button class="back">戻る</button></router-link
                >
                <button @click="update(route.params.id, contentEdit)">
                    修正
                </button>
            </div>
        </div>
    </main>
</template>
<script lang="ts" setup>
import { onMounted, ref } from "vue";
import { useRoute } from "vue-router";
import { get, update } from "../api/simpleMemoAPI";

const route = useRoute();
const contentEdit = ref("");
const editItemGet = async () => {
    await get().then((item) => {
        const filterData = item.filter((val) => {
            return val.id == route.params.id;
        });
        contentEdit.value = filterData[0].content;
    });
};
onMounted(async () => {
    editItemGet();
});
</script>

<style lang="scss" scoped>
main {
    padding-top: 3rem;
    font-weight: bold;
}
.edit__heading {
    text-align: center;
    line-height: 8rem;
}
.edit__box {
    width: 600px;
    margin: 0 auto;
}
.edit__titel {
    font-size: 1.2rem;
}
input {
    margin: 3rem 0;
    width: 100%;
}
.edit__button-wrap {
    display: flex;
    justify-content: space-between;
    .back {
        background-color: green;
    }
}
</style>
