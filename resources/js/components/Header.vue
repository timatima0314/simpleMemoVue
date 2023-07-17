<template>
    <header>
        <div class="header__main">
            <div>
                <h1 class="header__title">
                    <router-link to="/">Simple Memo</router-link>
                </h1>
            </div>
            <div class="header__auth">
                <div class="header__auth__item">
                    <router-link to="/login">ログイン</router-link>
                </div>
                <div class="header__auth__item">新規登録</div>
            </div>
        </div>
    </header>
</template>
<style lang="scss" scoped>
header {
    background-color: rgb(28, 82, 184);
    color: #fff;
    height: 100px;
}
.header__main {
    display: flex;
    height: 100%;
    justify-content: space-between;
    align-items: center;
    width: 1080px;
    margin: 0 auto;
}
.header__title {
    font-weight: normal;
}
.header__auth {
    display: flex;
    width: 150px;
    justify-content: space-between;
}
</style>
