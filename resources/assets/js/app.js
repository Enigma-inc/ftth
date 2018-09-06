require('./bootstrap');
import VueFormWizard from 'vue-form-wizard'
import 'vue-form-wizard/dist/vue-form-wizard.min.css';
import Vuelidate from 'vuelidate';
import vSelect from 'vue-select';


import VueNoty from 'vuejs-noty'

Vue.use(VueNoty)

Vue.use(Vuelidate);
Vue.use(VueFormWizard);
Vue.component('v-select', vSelect);


Vue.component('notifications', require('./components/Notifications.vue'));
Vue.component('application', require('./components/Application.vue'));
Vue.component('ftth-locations', require('./components/ftth-locations.vue'));
Vue.component('ftth-map', require('./components/ftth-map.vue'));
Vue.component('apply-btn', require('./components/apply-btn.vue'));

const app = new Vue({
    el: '#app'
});