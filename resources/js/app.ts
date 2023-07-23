import "./bootstrap";
import router from "./router";
import { createApp, provide } from "vue";
import store, { key } from "./store";
import App from "./App.vue";

const app = createApp(App);
app.use(router);
app.provide(key, store);
app.mount("#app");
