import Vue from 'vue'
import App from './App.vue'

import 'tabler-ui/dist/assets/css/dashboard.css';

Vue.config.productionTip = false

new Vue({
  render: h => h(App),
}).$mount('#app')
