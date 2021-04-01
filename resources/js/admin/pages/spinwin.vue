<template>
	<div>
		<div class="content">
			<div class="container-fluid">
				<!--~~~~~~~ TABLE ONE ~~~~~~~~~-->
				<div class="_1adminOverveiw_table_recent _box_shadow _border_radious _mar_b30 _p20">
					<p class="_title0">Spin And Win  <Button @click="addModal=true"><Icon type="md-add" /> Add User</Button></p>

					<div class="_overflow _table_div">
						<table class="_table">
								<!-- TABLE TITLE -->
							<tr>
								<th>ID</th>
								<th>User Id</th>
								<th>Website Url</th>
								<th>Token</th>
								<th>Action</th>
							</tr>
								<!-- TABLE TITLE -->
								<!-- ITEMS -->
							<tr v-for="(app , i) in registered_apps" :key="i" v-if="registered_apps.length">
								<td>{{app.id}}</td>
								<td class="_table_name">{{app.user_id}}</td>
								<td>{{app.url}}</td>
								<td>{{app.token}}</td>
								<td>
								   	<Button type="info" size="small" @click="showEditModal(app, i)">Edit</Button>
								    <Button type="error" size="small" @click="showDeletingModal(app, i)" :loading="app.isDeleting">Delete</Button>
								</td>
							</tr>
						</table>
					</div>
					<!-- ADD USER MODAL -->
				</div>
				 	<Modal
				        v-model="addModal"
				        title="Add User"
				        :mask-closable = "false"
				        :closable = "false"
				        >
                        <div class="space">
    				        <Input v-model="data.url" placeholder="Site Url" />
                        </div>
				        <div slot="footer">
				        	<Button type="default" @click="addModal=false">Close</Button>
				        	<Button type="primary" @click="addSiteRecord" :disabled="isAdding" :loading="isAdding">{{isAdding ? 'Adding..' : 'Add User'}}</Button>
				        </div>
				    </Modal>

				        <!-- TAG EDITTING MODAL -->
				    <Modal
				        v-model="editModal"
				        title="Edit User"
				        :mask-closable = "false"
				        :closable = "false"
				        >
                        <div class="space">
    				        <Input v-model="editData.url" placeholder="Edit Site Url" />
                        </div>
				        <div slot="footer">
				        	<Button type="default" @click="editModal=false">Close</Button>
				        	<Button type="primary" @click="editUser" :disabled="isAdding" :loading="isAdding">{{isAdding ? 'Editing..' : 'Edit User'}}</Button>
				        </div>
				    </Modal>
				    <!-- DELETE MODAL -->
					<deleteModal></deleteModal>
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
                url:'',
                token:'',
				user_id:''
			},
			addModal: false,
			editModal: false,
			deleteModal: false,
			isAdding: false,
			registered_apps:[],
			roles:[],
			editData : {
                url:'',
				user_id:'',
                token:'',
			},
			index: -1,
			showDeleteModal: false,
			isDeleting: false,
			deleteItem:{},
			deletingIndex: -1
		}
	},
    props : {
        type: {
            type: String,
            default: 'text'
        },
        size: {
            type: String,
            default: '32'
        },
        characters: {
            type: String,
            default: 'a-z,A-Z,0-9,#'
        },
        placeholder: {
            type: String,
            default: 'Password'
        },
        auto: [String, Boolean],
        value: ''
    },
	methods : {
         generate () {
            let charactersArray = this.characters.split(',');  
            let CharacterSet = '';
            let password = '';
            
            if( charactersArray.indexOf('a-z') >= 0) {
                CharacterSet += 'abcdefghijklmnopqrstuvwxyz';
            }
            if( charactersArray.indexOf('A-Z') >= 0) {
                CharacterSet += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            }
            if( charactersArray.indexOf('0-9') >= 0) {
                CharacterSet += '0123456789';
            }
            if( charactersArray.indexOf('#') >= 0) {
                CharacterSet += '![]{}()%&*$#^<>~@|';
            }
            
            for(let i=0; i < this.size; i++) {
                password += CharacterSet.charAt(Math.floor(Math.random() * CharacterSet.length));
            }
             this.data.token = password;
			 this.data.user_id = this.$user.id;
    },
		async addSiteRecord(){
				this.generate();
			if (this.data.url.trim() == '') return this.error('Site Url is required')
			if (!this.data.user_id) return this.error('Unauthorized request')
				const res = await this.callApi('post','api/create_token_spinnwin', this.data);
			if (res.status === 201) {
				this.registered_apps.unshift(res.data);
				this.success("App registered successfully");
				this.addModal = false;
				// this.data.tagName = '';
                console.log("success",res)
			}
			else{
				if (res.status == 422) {
					if (res.data.errors) {
                        for(let i in res.data.errors){
						    this.warning(res.data.errors[i][0]);
                        }
					}
				}
			}
		},
		async editUser(){
            if (this.editData.fullname.trim() == '') return this.error('User fullname is required')
			if (!this.data.role_id) return this.error('User Role is required')
			if (this.editData.email.trim() == '') return this.error('Email is required')

				const res = await this.callApi('post','app/edit_user', this.editData);
			if (res.status === 200) {
				this.success("User has been edited successfully");
				this.users[this.index] = this.editData;
				this.editModal = false;
			}
			else{
				if (res.status == 422) {
					if (res.data.errors) {
                         for(let i in res.data.errors){
						    this.warning(res.data.errors[i][0]);
                        }
					}
				}
			}
		},
		showEditModal(app, index){
			let obj = {
				id: app.id,
				user_id: app.user_id,
				url: app.url,
				token: app.token   
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
		const [res,resRoles] = await Promise.all([
			this.callApi('get','api/get_site_records', this.data),
			this.callApi('get','app/get_roles', this.data),
		]);
			if (res.status === 200) {
				this.registered_apps = res.data.registered_apps;
				console.log("registered_apps",this.registered_apps);
			}
			else{
				this.error("Something went wrong");
			}
			if (resRoles.status === 200) {
				this.roles = resRoles.data.roles;
				console.log("roles",this.roles);
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




			