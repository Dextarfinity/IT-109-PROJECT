import { createRouter, createWebHistory } from 'vue-router';
import Body from '../vueFiles/body.vue';
import Home from '../vueFiles/views/HomeSection.vue'
import Faq from '../vueFiles/views/FAQsSection.vue'
import Setting from '../vueFiles/views/SettingsSection.vue'
import Profile from '../vueFiles/views/ProfileSection.vue'


const routes = [
  {
    path: '/main',
    name: 'Home',
    component: Home
  },
  {
    path: '/faq',
    name: 'Faq',
    component: Faq
  },
  {
    path: '/setting',
    name: 'Setting',
    component: Setting
  },
  {
    path: '/profile',
    name: 'Profile',
    component: Profile
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
