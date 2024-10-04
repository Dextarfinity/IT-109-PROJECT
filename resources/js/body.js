import './bootstrap';
import { createApp } from 'vue';
import Body from '../vueFiles/body.vue';
import router from './bodyRouter.js'; 

const body = createApp(Body);
body.use(router);
body.mount('#body');
