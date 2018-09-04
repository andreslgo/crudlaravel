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
			      				<input type="number" class="form-control" placeholder="NIT" name="nit" id="nit" v-model="form.nit">
			      			</div>		
			      		</div>
			      		<div class="col-md-6 col-sm-12">
			      			<div class="form-group">
			      				<label for="customer_type">Tipo de Cliente</label>
			      				<select name="customer_type" id="customer_type" class="form-control" v-model="form.customer_type"></select>
			      			</div>
			      		</div>
			      	</div>
			      	<div class="row">
			      		<div class="col-sm-12">
			      			<div class="form-group">
			      				<label for="name">Razón Social</label>
			      				<input type="text" class="form-control" placeholder="Razón social" name="name" id="name" v-model="form.name">	
			      			</div>
			      		</div>
			      	</div>
			      	<div class="row">
			      		<div class="col-sm-12">
			      			<div class="form-group">
			      				<label for="address">Dirección</label>
			      				<input type="text" class="form-control" placeholder="direccion" name="address" id="address" v-model="form.address">
			      			</div>
			      		</div>
			      	</div>
			      	<div class="row">
			      		<div class="col-md-6 col-sm-12">
			      			<div class="form-group">
			      				<label for="country">País</label>
			      				<select id="country" name="country" class="form-control" v-model="form.country"></select>
			      			</div>
			      		</div>
			      		<div class="col-md-6 col-sm-12">
			      			<div class="form-group">
			      				<label for="city">Ciudad</label>
			      				<select id="city" name="city" class="form-control" v-model="form.city"></select>
			      			</div>
			      		</div>
			      	</div>
			      	<div class="row">
			      		<div class="col-md-4 col-sm-12">
			      			<div class="form-group">
			      				<label for="phone">Teléfono</label>
			      				<input type="text" class="form-control" placeholder="Teléfono" name="phone" id="phone" v-model="form.phone">
			      			</div>
			      		</div>
			      		<div class="col-md-8 col-sm-12">
			      			<div class="form-group">
			      				<label for="email">Correo Electrónico</label>
			      				<input type="email" class="form-control" placeholder="Correo Electrónico" name="email" id="email" v-model="form.email">
			      			</div>
			      		</div>
			      	</div>
			      </div>
			      <div class="modal-footer">
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
			}
		},
		data(){
			return{
				form: {
					nit: null,
					name: null,
					customer_type: null,
					address: null,
					country: null,
					city: null,
					phone: null,
					email: null
				}
			}
		},
		methods: {
			modalCustomer(id, op){
				this.$emit('modal', id, op);
			},
			send(){
				this.$emit('update');
			}
		}
	}
</script>