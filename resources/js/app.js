import './bootstrap';
import {createApp} from 'vue';
import router from './ViewsRouter';
import App from '../vueFiles/app.vue'

const app = createApp(App);

app.use(router);
app.mount('#app');