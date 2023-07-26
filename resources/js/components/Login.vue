<template>
    <main>
        <div class="login">
            <div class="loginForm__box">
                <div class="loginForm__heading">ログイン</div>
                <form @submit.prevent>
                    <table class="loginForm__table">
                        <tr class="login__Form__tr">
                            <td class="loginForm__label">メールアドレス</td>
                            <td class="loginForm__input-wrap">
                                <input type="text" v-model="email" />
                            </td>
                        </tr>
                        <tr class="login__Form__tr error">
                            <td></td>
                            <td>
                                {{ valiErrorMessage.email[0] }}
                            </td>
                        </tr>

                        <tr class="login__Form__tr">
                            <td class="loginForm__label">パスワード</td>
                            <td class="loginForm__input-wrap">
                                <input type="password" v-model="password" />
                            </td>
                        </tr>
                        <tr
                            v-if="valiErrorMessage.password"
                            class="login__Form__tr error"
                        >
                            <td></td>
                            <td>
                                {{ valiErrorMessage.password[0] }}
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td v-if="errorMessage" style="color: red">
                                {{ errorMessage }}
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="height: 3rem">
                                <input
                                    class="visually-hidden"
                                    type="radio"
                                /><label>ログイン情報を記憶</label>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="loginForm__button">
                                <button @click="loginApp">ログイン</button>
                                <span>パスワードをお忘れですか？</span>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </main>
</template>

<script setup lang="ts">
import { ref, inject, reactive } from "vue";
import { useRouter } from "vue-router";
import { login } from "../api/authApi";
import { key } from "../store/index";

const router = useRouter();
const email = ref("");
const password = ref("");
const store = inject(key);
const valiErrorMessage = reactive({ email: "", password: "" });
const errorMessage = ref("");

const loginApp = () => {
    login(email.value, password.value)
        .then(() => {
            store.authUser();
            router.push("/");
        })
        .catch((Error) => {
            errorMessage.value = Error.response.data.errorMessage;
            const ErrorRes = Error.response.data.errors;
            valiErrorMessage.email = ErrorRes.email;
            valiErrorMessage.password = ErrorRes.password;
        });
};
</script>
<style lang="scss" scoped>
.login {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
}
.loginForm__box {
    border: 2px solid rgb(225, 225, 225);
    width: 40rem;
    font-weight: bold;
}
.loginForm__table {
    margin: 2rem auto 3rem;
}
.loginForm__heading {
    background-color: rgb(219, 219, 219);
    height: 4rem;
    font-size: 1.2rem;
    padding-left: 2rem;
    display: flex;
    align-items: center;
    border-bottom: 2px solid rgb(225, 225, 225);
}
.login__Form__tr {
    height: 38px;
}
.loginForm__label {
    width: 10rem;
}
.loginForm__button {
    span {
        font-weight: 100;
        color: gray;
        margin-left: 1rem;
    }
}
.visually-hidden {
    position: absolute;
    white-space: nowrap;
    border: 0;
    clip: rect(0 0 0 0);
    clip-path: inset(50%);
    overflow: hidden;
    height: 1px;
    width: 1px;
    margin: -1px;
    padding: 0;
}
label {
    cursor: pointer;
    padding-left: 30px;
    position: relative;
}

label::before,
label::after {
    content: "";
    display: block;
    position: absolute;
}

label::before {
    background-color: #fff;
    border-radius: 0%;
    border: 1px solid #ddd;
    width: 20px;
    height: 20px;
    transform: translateY(-50%);
    top: 50%;
    left: 5px;
}

label::after {
    border-bottom: 2px solid #ddd;
    border-left: 2px solid #ddd;
    opacity: 0;
    height: 5px;
    width: 10px;
    transform: rotate(-45deg);
    top: 2px;
    left: 10px;
}

input:checked + label::after {
    opacity: 1;
}
.error {
    color: red;
}
</style>
