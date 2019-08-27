
require('./bootstrap');

window.Vue = require('vue');
// import InstantSearch from 'vue-instantsearch';
//
// Vue.use(InstantSearch);


// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('flash', require('./components/Flash.vue'));
Vue.component('reply', require('./components/Reply.vue'));
Vue.component('favorite', require('./components/Favorite.vue'));
Vue.component('user-notifications', require('./components/UserNotifications.vue'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#forum',
});
