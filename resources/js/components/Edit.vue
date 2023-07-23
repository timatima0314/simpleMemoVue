<template>
    <main>
        <h2 class="edit__heading">No{{ route.params.id }}&nbsp;メモ編集</h2>
        <div class="edit__box">
            <div class="edit__titel">メモ内容</div>
            <form @submit.prevent>
                <input
                    class="edit__input"
                    type="text"
                    name="content"
                    v-model="contentEdit"
                />
                <div class="error__messages">
                    <span v-if="errorsMessages">{{ errorsMessages }}</span>
                </div>
                <div class="edit__button-wrap">
                    <router-link to="/"
                        ><button type="button" class="back">
                            戻る
                        </button></router-link
                    >
                    <button @click="updateExe">修正</button>
                </div>
            </form>
        </div>
    </main>
</template>
<script lang="ts" setup>
import { onMounted, ref } from "vue";
import { useRoute } from "vue-router";
import { get, update } from "../api/simpleMemoAPI";

const route = useRoute();
const contentEdit = ref("");
const errorsMessages = ref("");
const editItemGet = async () => {
    await get().then((item) => {
        const filterData = item.filter((val) => {
            return val.id == route.params.id;
        });
        contentEdit.value = filterData[0].content;
    });
};
const updateExe = async () => {
    await update(route.params.id, contentEdit.value).then((res) => {
        if (res.status == 400) {
            errorsMessages.value = res.errors.content[0];
        } else {
            errorsMessages.value = "";
        }
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
.edit__input {
    margin: 3rem 0 0rem;
    width: 100%;
}
.error__messages {
    color: red;
    height: 2rem;
}
.edit__button-wrap {
    display: flex;
    justify-content: space-between;
    .back {
        background-color: green;
    }
}
</style>
