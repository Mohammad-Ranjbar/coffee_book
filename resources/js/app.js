require('./bootstrap');

window.Vue = require('vue');

Vue.component('flash', require('./components/Flash.vue').default);
Vue.component('reply', require('./components/Reply.vue').default);
Vue.component('favorite', require('./components/Favorite.vue').default);
Vue.component('user-notifications', require('./components/UserNotifications.vue').default);
Vue.component('Like', require('./components/Like.vue').default);
Vue.component('Sort', require('./components/Sort.vue').default);
Vue.component('chat', require('./components/chat.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
	el: '#app',
});


