import { createApp } from 'vue'

import router from './routers'
import App from './App.vue'

import axios from 'axios';
window.axios = axios;

import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

import { faBars, faListCheck, faFolder, faUserGroup, faVideo, faBlog, faRightFromBracket, faGear } from "@fortawesome/free-solid-svg-icons"
import { faBell, faMessage } from '@fortawesome/free-regular-svg-icons';

library.add(faBars, faListCheck, faFolder, faUserGroup, faVideo, faBlog, faRightFromBracket, faBell, faGear, faMessage);

import "./style.css";

const app = createApp(App);
app.use(router);
app.component('font-awesome-icon', FontAwesomeIcon)
app.mount('#app');
