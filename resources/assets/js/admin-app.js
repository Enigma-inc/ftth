require('./admin-bootstrap');
import AdminApp from './components/admin/Admin-app.vue'
Vue.component('application', require('./components/Application.vue'));

new Vue({
    el: '#app',
    template: '<AdminApp/>',
    components: { AdminApp }
});