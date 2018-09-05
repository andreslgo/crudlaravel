
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
axios = require('axios');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('form-customer', require('./components/FormCustomer.vue'));
Vue.component('table-customers', require('./components/TableCustomers.vue'));

const app = new Vue({
    el: '#app',
    data(){
    	return{
    		/*
				action: 1  -- Crear cliente
				action: 2  -- Actualizar Cliente
				action: 3  -- Eliminar Cliente
    		*/
    		action: 1,
    		data: null,
            customer: null
    	}
    },
    methods: {
    	updateCustomers() {
    		$("#modalCustomer").modal('hide');
            this.getCustomers();
    	},
    	modalCustomer(id, op){
    		this.action = op;
            if(id == null){
                this.customer = null;
            }else{
                for(i in this.data){
                    if(this.data[i].id = id){
                        this.customer = this.data[i];
                        break;
                    }
                }    
            }
            
    		$("#modalCustomer").modal('show');
    	},
        getCustomers(){
            let self = this;
            axios.get('api/customers')
            .then(response => {
                self.data = response.data
            });
        }
    },
    mounted(){
        this.getCustomers();
    }
});
