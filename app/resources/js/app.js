import Vue from 'vue';
import moment from 'moment';
// Vue.prototype.moment = moment;
// import index from "./components/Index";

Vue.component('index', require('./components/Index').default);
Vue.component('product-index', require('./components/products/ProductIndex').default);
Vue.component('product-detail', require('./components/products/ProductDetail').default);
Vue.component('product-card', require('./components/products/ProductCard').default);

require('./bootstrap');

const app = new Vue({
    el: '#app',
    // components: {
    //     index,
    //     product-index
    // }
});
