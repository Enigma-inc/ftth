require('./bootstrap');
import * as VueGoogleMaps from 'vue2-google-maps'

Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyAod6lAn1ShRI4nhmU2d0y7FiyGXJQHeRo',
        libraries: 'drawing,visualization'
    }
})


Vue.component('notifications', require('./components/Notifications.vue'));
Vue.component('application', require('./components/Application.vue'));
Vue.component('ftth-locations', require('./components/ftth-locations.vue'));
Vue.component('ftth-map', require('./components/ftth-map.vue'));

const app = new Vue({
    el: '#app'
});