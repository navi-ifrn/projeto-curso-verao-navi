import Vue from 'vue'
import App from './App.vue'
import router from "./routes/Routes";

import 'tabler-ui/dist/assets/css/dashboard.css';

Vue.config.productionTip = false

new Vue({
  router,
  render: h => h(App),
}).$mount('#app')
