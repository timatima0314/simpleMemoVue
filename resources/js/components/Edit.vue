<template>
    <main>
        <h2 class="edit__heading">No1&nbsp;メモ編集</h2>
        <div class="edit__box">
            <div class="edit__titel">メモ内容</div>
            <form>
                <input type="text" name="content"/>
            </form>
            <div class="edit__button-wrap">
                <router-link to="/"><button class="back">戻る</button></router-link>
                <button>修正</button>
            </div>
        </div>
    </main>
</template>
<style lang="scss" scoped>
main{
    padding-top:3rem ;
    font-weight:bold ;
}
.edit__heading{
    text-align: center;
    line-height: 8rem;
    
}
.edit__box{
    width: 600px;
    margin: 0 auto;
}
.edit__titel{
    font-size: 1.2rem;
}
input{
    margin: 3rem 0;
    width: 100%;;
}
.edit__button-wrap{
    display: flex;
    justify-content: space-between;
    .back{
        background-color: green;
    }
}
</style>
