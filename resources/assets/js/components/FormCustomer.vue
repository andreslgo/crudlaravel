<template>
	<div>
		<button class="btn btn-success" @click="modalCustomer(null, 1)">
        <i class="far fa-file"></i> Nuevo Cliente
    </button>
    <div class="modal fade bd-example-modal-lg" id="modalCustomer" tabindex="-1" role="dialog" aria-labelledby="Cliente" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		  	<form @submit.prevent="send">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h4 class="modal-title" id="exampleModalLabel">
			        	<span v-if="action == 1" class="text-primary">Crear Cliente</span>
			        	<span v-if="action == 2" class="text-warning">Actualizar Cliente</span>
			        	<span v-if="action == 3" class="text-danger">Eliminar Cliente</span>
			        </h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
			          <span aria-hidden="true">x</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<div class="row">
			      		<div class="col-md-6 col-sm-12">
			      			<div class="form-group">
			      				<label for="nit">NIT</label>
			      				<input :readonly="action == 3" type="number" class="form-control" placeholder="NIT" name="nit" id="nit" v-model="form.nit">
			      			</div>		
			      		</div>
			      		<div class="col-md-6 col-sm-12">
			      			<div class="form-group">
			      				<label for="customer_type">Tipo de Cliente</label>
			      				<select :readonly="action == 3" name="customer_type" id="customer_type" class="form-control" v-model="form.customer_type">
			      					<option v-for="customertype in customertypes" :value="customertype.id">{{customertype.customer_type}}</option>
			      				</select>
			      			</div>
			      		</div>
			      	</div>
			      	<div class="row">
			      		<div class="col-sm-12">
			      			<div class="form-group">
			      				<label for="name">Razón Social</label>
			      				<input :readonly="action == 3" type="text" class="form-control" placeholder="Razón social" name="name" id="name" v-model="form.name">	
			      			</div>
			      		</div>
			      	</div>
			      	<div class="row">
			      		<div class="col-sm-12">
			      			<div class="form-group">
			      				<label for="address">Dirección</label>
			      				<input :readonly="action == 3" type="text" class="form-control" placeholder="direccion" name="address" id="address" v-model="form.address">
			      			</div>
			      		</div>
			      	</div>
			      	<div class="row">
			      		<div class="col-md-6 col-sm-12">
			      			<div class="form-group">
			      				<label for="country">País</label>
			      				<select :readonly="action == 3" id="country" name="country" class="form-control" v-model="form.country" @change="changeCountry">
			      					<option v-for="country in countries" :value="country.id">{{country.country}}</option>
			      				</select>
			      			</div>
			      		</div>
			      		<div class="col-md-6 col-sm-12">
			      			<div class="form-group">
			      				<label for="city">Ciudad</label>
			      				<select :readonly="action == 3" id="city" name="city" class="form-control" v-model="form.city">
			      					<option v-for="city in cities" :value="city.id">{{city.city}}</option>
			      				</select>
			      			</div>
			      		</div>
			      	</div>
			      	<div class="row">
			      		<div class="col-md-4 col-sm-12">
			      			<div class="form-group">
			      				<label for="phone">Teléfono</label>
			      				<input :readonly="action == 3" type="text" class="form-control" placeholder="Teléfono" name="phone" id="phone" v-model="form.phone">
			      			</div>
			      		</div>
			      		<div class="col-md-8 col-sm-12">
			      			<div class="form-group">
			      				<label for="email">Correo Electrónico</label>
			      				<input :readonly="action == 3" type="email" class="form-control" placeholder="Correo Electrónico" name="email" id="email" v-model="form.email">
			      			</div>
			      		</div>
			      	</div>
			      </div>
			      <div class="modal-footer">
			      	<div class="alert alert-danger" v-if="error">{{ error }}</div>
			        <button type="button" class="btn btn-lg btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
			        <button type="submit" v-if="action == 3" class="btn btn-lg btn-danger"><i class="far fa-trash-alt"></i> Eliminar</button>
			        <button type="submit" v-if="action == 2" class="btn btn-lg btn-warning"><i class="far fa-check-circle"></i> Actualizar</button>
			        <button type="submit" v-if="action == 1" class="btn btn-lg btn-primary"><i class="far fa-check-circle"></i> Guardar</button>
			      </div>
			    </div>
		    </form>
		  </div>
		</div>
	</div>
</template>
<script>
	export default {
		props: {
			action: {
				default: 1
			},
			idCustomer: {
				default: null
			},
			customer: {
				default: null
			}
		},
		data(){
			return{
				form: {
					id: null, 
					nit: null,
					name: null,
					customer_type: null,
					address: null,
					country: null,
					city: null,
					phone: null,
					email: null
				},
				countries: null,
				cities: null,
				customertypes: null,
				error: null
			}
		},
		watch: {
			customer(){
				if(this.customer !== null){
					this.form.id = this.customer.id;
					this.form.nit = this.customer.nit;
					this.form.name = this.customer.name;
					this.form.customer_type = this.customer.id_customer_type;
					this.form.address = this.customer.address;
					this.form.country = this.customer.id_country;
					if(this.action !== 1){
						this.changeCountry();
					}
					this.form.city = this.customer.id_city;
					this.form.phone = this.customer.phone;
					this.form.email = this.customer.email;
				}else{
					this.form.nit = null;
					this.form.name = null;
					this.form.customer_type = null;
					this.form.address = null;
					this.form.country = null;
					this.form.city = null;
					this.form.phone = null;
					this.form.email = null;
				}
			}
		},
		methods: {
			modalCustomer(id, op){
				this.$emit('modal', id, op);
			},
			changeCountry(){
				let self = this;
				axios.get('api/cities/' + this.form.country)
					.then(response => {
						self.cities = response.data;
					})
			},
			send(){
				let self = this;
				let payload = new FormData();
				this.error = null;
				payload.append('id', this.form.id);
				payload.append('nit', this.form.nit);
				payload.append('name', this.form.name);
				payload.append('customer_type', this.form.customer_type);
				payload.append('address', this.form.address);
				payload.append('country', this.form.country);
				payload.append('city', this.form.city);
				payload.append('phone', this.form.phone);
				payload.append('email', this.form.email);
				if(this.action == 1){
					axios.post('api/customers', payload)
						.then(response => {
							self.$emit('update');
						})
						.catch(error => {
							self.error = error.data;
						});	
				}

				if(this.action == 2){
					payload.append('_method', 'PUT');
					axios.post('api/customers', payload)
						.then(response => {
							self.$emit('update');
						})
						.catch(error => {
							self.error = error.data;
						});	
				}

				if(this.action == 3){
					axios.delete('api/customers/' + this.form.id)
						.then(response => {
							self.$emit('update');
						})
						.catch(error => {
							self.error = error.data;
						});	
				}


				
			}
		},
		mounted(){
			let self = this;
			axios.get('api/countries')
				.then(response => {
					self.countries = response.data;
				})
			axios.get('api/customertypes')
				.then(response=>{
					self.customertypes = response.data;
				})
		}
	}
</script>