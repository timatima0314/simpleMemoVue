<template>
    <main>
        <div class="registration__box">
            <h2>新規登録</h2>
            <form class="registration__form" @submit.prevent>
                <input type="text" v-model="contentValue" />
                <button style="margin-left: 1rem" @click="createExe">
                    登録
                </button>
                <div class="error__messages">
                    <span v-if="errorsMessages">{{ errorsMessages }}</span>
                </div>
            </form>
        </div>
        <div class="sammary__box">
            <h3 class="sammary__heading">メモ一覧</h3>
            <div class="sammary">
                <ul class="sammary__list">
                    <li style="line-height: 3rem" class="sammary__item">
                        <div class="sammary__number">No</div>
                        <div class="sammary__content">メモ内容</div>
                        <div class="sammary__create-date">作成日時</div>
                        <div class="sammary__update-date">更新日時</div>
                        <div class="sammary__button edit"></div>
                        <div class="sammary__button delete"></div>
                    </li>
                    <li
                        class="sammary__item"
                        v-for="(item, i) in memoList"
                        :key="item.id"
                    >
                        <div class="sammary__number">
                            {{ i + 1 }}
                        </div>
                        <div class="sammary__content">
                            {{ item.content }}
                        </div>
                        <div class="sammary__create-date">
                            {{ item.created_at }}
                        </div>
                        <div class="sammary__update-date">
                            {{ item.updated_at }}
                        </div>
                        <div class="sammary__button">
                            <button
                                class="edit"
                                @click="edit"
                                :data-id="item.id"
                                :data-index="i + 1"
                            >
                                編集
                            </button>
                        </div>
                        <div class="sammary__button">
                            <button
                                class="delete"
                                @click="delConfOpen(item.id)"
                            >
                                削除
                            </button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </main>
</template>
<script lang="ts" setup>
import { ref, onMounted } from "vue";
import { get, create, destroy } from "../api/simpleMemoAPI";
import { getAuth } from "../api/authApi";
import { useRouter } from "vue-router";
import { SimpleMemo } from "../type/type";

const router = useRouter();

const memoList = ref<SimpleMemo[]>();
const contentValue = ref("");
const currentUserId = ref<number>();
const errorsMessages = ref("");

const edit = (event) => {
    const dbId = event.target.dataset.id;
    const index = event.target.dataset.index;
    router.push({
        name: "Edit",
        query: {
            editId: dbId,
            indexId: index,
        },
    });
};

const createExe = async () => {
    await create(contentValue.value, currentUserId.value)
        .then((res) => {
            if (res.status == 400) {
                errorsMessages.value = res.errors.content[0];
            } else {
                errorsMessages.value = "";
                contentValue.value = "";
            }
        })
        .catch((errors) => {
            throw new Error(`${errors.status}:createApi失敗`);
        });
    memoList.value = await get();
};
const delConfOpen = async (id: number) => {
    const delConf = confirm("本当に削除してもよろしいでしょうか？");
    if (delConf) {
        destroy(id)
            .then(async () => {
                memoList.value = await get();
            })
            .catch((Error) => {
                throw new Error(`${Error.message}: destroyApi失敗`);
            });
    }
};
onMounted(async () => {
    const currentUserData = await getAuth().catch((Error) => {
        throw new Error(`${Error.message}: getAuth失敗`);
    });
    if (currentUserData) {
        memoList.value = await get().catch((Error) => {
            throw new Error(`${Error.message}: get失敗`);
        });
        currentUserId.value = currentUserData.id;
    } else {
        router.push("/login");
    }
});
</script>
<style lang="scss" scoped>
.registration__box {
    padding: 5rem 0;
    border-bottom: 3px solid rgb(225, 225, 225);
}
.error__messages {
    color: red;
    height: 2rem;
}
.sammary__heading {
    line-height: 6rem;
}
.sammary__list {
    font-weight: bold;
}
.sammary__item {
    display: flex;
    align-items: center;
    text-align: center;
    border-bottom: 2px solid rgb(225, 225, 225);
    line-height: 5rem;
    &:last-child {
        border: none;
    }
    .sammary__number {
        width: 8rem;
    }
    .sammary__content {
        width: 20rem;
        line-height: 1.5rem;
        text-align: left;
    }
    .sammary__create-date {
        width: 15rem;
        text-align: left;
    }
    .sammary__update-date {
        width: 15rem;
        text-align: left;
    }
    .sammary__button {
        width: 6rem;
    }
    .edit {
        background-color: green;
    }
    .delete {
        background-color: red;
    }
}
</style>
