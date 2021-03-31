<template>
	<div>
		<div class="content">
			<div class="container-fluid">
				<!--~~~~~~~ TABLE ONE ~~~~~~~~~-->
				<div class="_1adminOverveiw_table_recent _box_shadow _border_radious _mar_b30 _p20">
					<p class="_title0">Role Management  <Button @click="addModal=true"><Icon type="md-add" /> Add a new role</Button></p>

					<div class="_overflow _table_div">
						<table class="_table">
								<!-- TABLE TITLE -->
							<tr>
								<th>ID</th>
								<th>Role Type</th>
								<th>Created At</th>
								<th>Action</th>
							</tr>
								<!-- TABLE TITLE -->
								<!-- ITEMS -->
							<tr v-for="(role , i) in roles" :key="i" v-if="roles.length">
								<td>{{role.id}}</td>
								<td class="_table_name">{{role.roleName}}</td>
								<td>{{role.created_at}}</td>
								<td>
								   	<Button type="info" size="small" @click="showEditModal(role, i)">Edit</Button>
								    <Button type="error" size="small" @click="showDeletingModal(role, i)" :loading="role.isDeleting">Delete</Button>
								</td>
							</tr>
						</table>
					</div>
					<!-- MODAL -->
				</div>
				 	<Modal
				        v-model="addModal"
				        title="Add Role"
				        :mask-closable = "false"
				        :closable = "false"
				        >
				        <Input v-model="data.roleName" placeholder="Role Name..." />
				        <div slot="footer">
				        	<Button type="default" @click="addModal=false">Close</Button>
				        	<Button type="primary" @click="addRole" :disabled="isAdding" :loading="isAdding">{{isAdding ? 'Adding..' : 'Add Role'}}</Button>
				        </div>
				    </Modal>

				    <!-- ROLE EDITTING MODAL -->
				    <Modal
				        v-model="editModal"
				        title="Edit Tag"
				        :mask-closable = "false"
				        :closable = "false"
				        >
				        <Input v-model="editData.roleName" placeholder="Edit Role Name" />
				        <div slot="footer">
				        	<Button type="default" @click="editModal=false">Close</Button>
				        	<Button type="primary" @click="editRole" :disabled="isAdding" :loading="isAdding">{{isAdding ? 'Adding..' : 'Edit Role'}}</Button>
				        </div>
				    </Modal>

				    <!-- DELETE MODAL -->
					<deleteModal></deleteModal>
				     <!-- <Modal
				      v-model="deleteModal" 
				      width="360"
				      >
			        <p slot="header" style="color:#f60;text-align:center">
			            <Icon type="ios-information-circle"></Icon>
			            <span>Delete confirmation</span>
			        </p>
			        <div style="text-align:center">
			            <p>Are you sure you want to delete this tag?</p>
			        </div>
			        <div slot="footer">
			            <Button type="error" size="large" long :loading="isDeleting" :disabled="isDeleting" @click="deleteTag">Delete</Button>
			        </div>
   					 </Modal> -->

			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
import { mapGetters } from 'vuex';
import deleteModal from "../components/deleteModal.vue";
export default{
	data(){
		return{
			data:{
				roleName: ''
			},
			addModal: false,
			editModal: false,
			deleteModal: false,
			isAdding: false,
			roles:[],
			editData : {
				roleName : ''
			},
			index: -1,
			showDeleteModal: false,
			isDeleting: false,
			deleteItem:{},
			deletingIndex: -1
		}
	},
	methods : {
		async addRole(){
			if (this.data.roleName.trim() == '') return this.error('Role name is required')
				const res = await this.callApi('post','app/create_role', this.data);
			if (res.status === 201) {
				this.roles.unshift(res.data);
				this.success("Role has been added successfully");
				this.addModal = false;
				this.data.roleName = '';
			}
			else{
				if (res.status == 422) {
					if (res.data.errors.roleName) {
						this.warning(res.data.errors.roleName);
					}
				}
			}
		},
		async editRole(){
			if (this.editData.roleName.trim() == '') return this.error('Role name is required')
				const res = await this.callApi('post','app/edit_role', this.editData);
			if (res.status === 200) {
				this.success("Role has been edited successfully");
				this.roles[this.index].roleName = this.editData.roleName;
				this.editModal = false;
			}
			else{
				if (res.status == 422) {
					if (res.data.errors.tagName) {
						this.warning(res.data.errors.tagName);
					}
				}
			}
		},
		showEditModal(role, index){
			let obj = {
				id: role.id,
				roleName: role.roleName
			}
			this.editData = obj;
			this.editModal = true;
			this.index = index;
		},
		// async deleteTag(){	
		// 	this.isDeleting = true;
		// 	const res = await this.callApi('post','app/delete_tag', this.deleteItem);
		// 	if (res.status == 200) {
		// 			this.tags.splice(this.deletingIndex,1);
		// 			this.success("Tag has been deleted");
		// 			this.deleteModal= false;

		// 	}
		// 	else{
		// 		this.error();
		// 		console.log(tag)
		// 	}
		// 	this.isDeleting = false;
		// },
		showDeletingModal(tag,index){
			const deleteModalObj = {
				showDeleteModal: true,
				deleteUrl: 'app/delete_tag',
				data: tag,	
				deletingIndex: index,
				isDeleted: false
       		}
			   this.$store.commit('setDeletingModalObj',deleteModalObj);
		}
	},
	
	async created(){
		const res = await this.callApi('get','app/get_roles', this.data);
			if (res.status === 200) {
				this.roles = res.data.roles;
			}
			else{
				this.error("Something went wrong");
			}
	},
	components : {
		deleteModal
	},
	computed:{
		...mapGetters(['getDeleteModalObj'])
	},
	watch:{
		getDeleteModalObj(obj){
			if (obj.isDeleted) {
				this.tags.splice(obj.deletingIndex,1);
			}
		}
	}
}
</script>




			