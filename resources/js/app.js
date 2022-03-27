
require('./bootstrap');

window.Vue = require('vue').default;

import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)


Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('send-message', require('./components/SendMessage.vue').default);
Vue.component('chat-component', require('./components/Chat.vue').default);

const app = new Vue({
    el: '#app',
});
