import { createApp } from 'vue';
import './custom.css';
import App from './App.vue';
import DeliveryInfo from './components/DeliveryInfo.vue';
import DeliveryList from './components/DeliveryList.vue';
import { createRouter, createWebHistory } from 'vue-router';

const routes = [
  { path: '/', component: DeliveryInfo },
  { path: '/deliveries', component: DeliveryList },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

createApp(App)
  .use(router)
  .mount('#app');
