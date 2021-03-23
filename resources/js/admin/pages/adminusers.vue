<template>
	<div>
		<div class="content">
			<div class="container-fluid">
				<!--~~~~~~~ TABLE ONE ~~~~~~~~~-->
				<div class="_1adminOverveiw_table_recent _box_shadow _border_radious _mar_b30 _p20">
					<p class="_title0">Tags  <Button @click="addModal=true"><Icon type="md-add" /> Add User</Button></p>

					<div class="_overflow _table_div">
						<table class="_table">
								<!-- TABLE TITLE -->
							<tr>
								<th>ID</th>
								<th>UserName</th>
								<th>Email</th>
								<th>User Role</th>
								<th>Action</th>
							</tr>
								<!-- TABLE TITLE -->
								<!-- ITEMS -->
							<tr v-for="(user , i) in users" :key="i" v-if="users.length">
								<td>{{user.id}}</td>
								<td class="_table_name">{{user.fullname}}</td>
								<td>{{user.email}}</td>
								<td>{{user.userRole}}</td>
								<td>
								   	<Button type="info" size="small" @click="showEditModal(user, i)">Edit</Button>
								    <Button type="error" size="small" @click="showDeletingModal(user, i)" :loading="user.isDeleting">Delete</Button>
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
    				        <Input v-model="data.fullname" placeholder="User Name" />
                        </div>
                        <div class="space">
                            <Input v-model="data.email" placeholder="User Email" />
                        </div>
                        <div class="space">
                            <Input v-model="data.autopassword" placeholder="User Password">
                                <Button slot="append" icon="ios-key" @click="generate"></Button>
                            </Input>
                        </div>
                        <div class="space">
                            <Select v-model="data.userRole" placeholder="Select User Role">
                                <Option value="team_lead" >Team Lead</Option>
                                <Option value="user" >User</Option>
                            </Select>
                        </div>
				        <div slot="footer">
				        	<Button type="default" @click="addModal=false">Close</Button>
				        	<Button type="primary" @click="addUser" :disabled="isAdding" :loading="isAdding">{{isAdding ? 'Adding..' : 'Add User'}}</Button>
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
    				        <Input v-model="editData.fullname" placeholder="User Name" />
                        </div>
                        <div class="space">
                            <Input v-model="editData.email" placeholder="User Email" />
                        </div>
                        <div class="space">
                            <Input v-model="data.autopassword" placeholder="User Password">
                                <Button slot="append" icon="ios-key" @click="generate"></Button>
                            </Input>
                        </div>
                        <div class="space">
                            <Select v-model="editData.userRole" placeholder="Select User Role">
                                <Option value="team_lead" >Team Lead</Option>
                                <Option value="user" >User</Option>
                            </Select>
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
                fullname:'',
                email:'',
				autopassword: '',
                userRole: ''
			},
			addModal: false,
			editModal: false,
			deleteModal: false,
			isAdding: false,
			users:[],
			editData : {
                id: "",
				fullname: "",
				email: "",
				userRole: ""
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
            default: '16'
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
             this.data.autopassword = password;
    },
		async addUser(){
			if (this.data.fullname.trim() == '') return this.error('User fullname is required')
			if (this.data.autopassword.trim() == '') return this.error('Password is required')
			if (this.data.userRole.trim() == '') return this.error('User Role is required')
			if (this.data.email.trim() == '') return this.error('Email is required')

				const res = await this.callApi('post','app/create_user', this.data);
			if (res.status === 201) {
				// this.tags.unshift(res.data);
				this.success("User has been added successfully");
				// this.addModal = false;
				// this.data.tagName = '';
                console.log("success",res.data.errors)
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
			if (this.editData.userRole.trim() == '') return this.error('User Role is required')
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
		showEditModal(user, index){
			let obj = {
				id: user.id,
				fullname: user.fullname,
				email: user.email,
				userRole: user.userRole   
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
		const res = await this.callApi('get','app/get_users', this.data);
			if (res.status === 200) {
				this.users = res.data.users;
				console.log("users",this.users);
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




			