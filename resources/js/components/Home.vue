<template>
    <main>
        <div class="registration__box">
            <h2>新規登録</h2>
            <form class="registration__form">
                <input type="text" value="" />
                <button style="margin-left: 1rem">登録</button>
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
                    <li class="sammary__item">
                        <div class="sammary__number">1</div>
                        <div class="sammary__content">testtest</div>
                        <div class="sammary__create-date">2023.07.28</div>
                        <div class="sammary__update-date">2023.07.18</div>
                        <div class="sammary__button">
                            <button class="edit">編集</button>
                        </div>
                        <div class="sammary__button">
                            <button class="delete">削除</button>
                        </div>
                    </li>
                    <li class="sammary__item">
                        <div class="sammary__number">1</div>
                        <div class="sammary__content">testtest</div>
                        <div class="sammary__create-date">2023.07.28</div>
                        <div class="sammary__update-date">2023.07.18</div>
                        <div class="sammary__button">
                            <button class="edit">編集</button>
                        </div>
                        <div class="sammary__button">
                            <button class="delete">削除</button>
                        </div>
                    </li>
                    <li class="sammary__item">
                        <div class="sammary__number">1</div>
                        <div class="sammary__content">testtest</div>
                        <div class="sammary__create-date">2023.07.28</div>
                        <div class="sammary__update-date">2023.07.18</div>
                        <div class="sammary__button">
                            <button class="edit">編集</button>
                        </div>
                        <div class="sammary__button">
                            <button class="delete">削除</button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </main>
</template>
<style lang="scss" scoped>
.registration__box {
    padding: 5rem 0;
    border-bottom: 3px solid rgb(225, 225, 225);
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
    &:last-child{
        border: none;
    }
    .sammary__number {
        width: 8rem;
    }
    .sammary__content {
        width: 20rem;
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
