/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

import { Tooltip, Toast, Popover } from 'bootstrap';



// start the Stimulus application
import './bootstrap';


import { createApp } from 'vue';
import App from './js/App.vue';
//import Tableau from './js/test.vue';
//import TableauCell from './js/test2.vue';
import TableauMaj from './js/TableauMaj.vue';
import Gagnant from './js/gagnant.vue';
createApp(App).mount('#vue-app');
//createApp(Tableau).mount('#tab-app');
createApp(TableauMaj).mount('#table-maj');
createApp(Gagnant).mount('#gagnant');