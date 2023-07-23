import { ref, InjectionKey, reactive } from 'vue'
const state = reactive({
    auth: false

});
const authUser= () => state.auth = true;
const unAuthUser= () => state.auth = false;

export default {
    state, authUser,unAuthUser
}

export const key: InjectionKey<any> = Symbol('key')