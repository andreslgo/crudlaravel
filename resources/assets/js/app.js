
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
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
    		idCustomer: null, 
    		data: [
    			{
    				id: 1,
    				nit: 900500500,
    				name: 'Bicco Farms',
    				customer_type: 'Persona Juridica',
    				country: 'Colombia',
    				city: 'Bogota',
    				address: 'Cra 14 No. 79-78',
    				phone: '3007393899',
    				email: 'andresl@biccofarms.com'
    			}
    		]
    	}
    },
    methods: {
    	updateCustomers() {
    		console.log('Actualizado');
    	},
    	modalCustomer(id, op){
    		this.idCustomer = id;
    		this.action = op;
    		$("#modalCustomer").modal('show');
    	}
    }
});
