<template>
	<div class="table-responsive">
		<table class="table table-bordered table-striped table-customers">
			<thead>
				<tr>
					<th>NIT</th>
					<th>Cliente</th>
					<th>Tipo</th>
					<th>Dirección</th>
					<th>País</th>
					<th>Ciudad</th>
					<th>Teléfono</th>
					<th>E-mail</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="value in data">
					<td>{{value.nit}}</td>
					<td>{{value.name}}</td>
					<td>{{value.customer_type}}</td>
					<td>{{value.address}}</td>
					<td>{{value.country}}</td>
					<td>{{value.city}}</td>
					<td>{{value.phone}}</td>
					<td>{{value.email}}</td>
					<td class="options">
						<a href="#" title="Adicionar Contactos" @click.prevent="addContacts(value.id)"><i class="fas fa-users"></i></a>
						<a href="#" title="Editar Cliente" @click.prevent="modalCustomer(value.id, 2)"><i class="far fa-edit"></i></a>
						<a href="#" title="Eliminar Cliente" @click.prevent="modalCustomer(value.id, 3)"><i class="far fa-trash-alt"></i></a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</template>

<script>
    export default {
    	props: {
    		data: {
    			default: null
    		}
    	},
    	methods: {
    		addContacts(id){
    			console.log(id);
    		},
    		modalCustomer(id, op){
    			this.$emit('modal', id, op);
    		}
    	}
    }
</script>