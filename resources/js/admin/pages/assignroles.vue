<template>
	<div>
		<div class="content">
			<div class="container-fluid">
				<!--~~~~~~~ TABLE ONE ~~~~~~~~~-->
				<div class="_1adminOverveiw_table_recent _box_shadow _border_radious _mar_b30 _p20">
					<p class="_title0">Permissions     
                        <Select v-model="data.id" placeholder="Select User Role" style="width:300px" @on-change="changeRole">
                                <Option  :value="role.id" v-for="(role, index) in roles" :key="index" v-if="roles.length">{{role.roleName}}</Option>
                        </Select>
					<div class="_overflow _table_div">
						<table class="_table">
								<!-- TABLE TITLE -->
							<tr>
								<th>Content Type</th>
								<th>Read</th>
								<th>Write</th>
								<th>Update</th>
								<th>Delete</th>
							</tr>
								<!-- TABLE TITLE -->
								<!-- ITEMS -->
							<tr v-for="(content, index) in contentType" :key="index">
								<td>{{content.contentName}}</td>
								<td> <Checkbox v-model="content.read"></Checkbox> </td>
								<td> <Checkbox v-model="content.write"></Checkbox> </td>
								<td> <Checkbox v-model="content.update"></Checkbox> </td>
								<td> <Checkbox v-model="content.delete"></Checkbox> </td>
							</tr>
						</table>
                        <div class="center_button">
                                <Button type="primary" :loading="isSending" :disabled="isSending" @click="assignRoles">Assign</Button>
                            </div>
					</div>
					<!-- MODAL -->
				</div>
			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
export default{
	data(){
		return{
			data:{
				roleName: '',
                id:null
			},
            isSending: false,
            roles:[],
            contentType:[
                {contentName:'Home', read:false, write: false, update: false, delete: false, name: '/'},
                {contentName:'Spin and Win', read:false, write: false, update: false, delete: false, name: '/spinwin'},
                {contentName:'Designs', read:false, write: false, update: false, delete: false, name: 'designs'},
                {contentName:'Tags', read:false, write: false, update: false, delete: false, name: 'tags'},
                {contentName:'Category', read:false, write: false, update: false, delete: false, name: 'category'},
                {contentName:'Users', read:false, write: false, update: false, delete: false, name: 'adminusers'},
                {contentName:'Role Management', read:false, write: false, update: false, delete: false, name: 'roles'},
                {contentName:'Permissions', read:false, write: false, update: false, delete: false, name: 'assignroles'},
               
            ],
            contentTypeDefault:[
                {contentName:'Home', read:false, write: false, update: false, delete: false, name: '/'},
                {contentName:'Spin and Win', read:false, write: false, update: false, delete: false, name: '/spinwin'},
                {contentName:'Designs', read:false, write: false, update: false, delete: false, name: 'designs'},
                {contentName:'Tags', read:false, write: false, update: false, delete: false, name: 'tags'},
                {contentName:'Category', read:false, write: false, update: false, delete: false, name: 'category'},
                {contentName:'Users', read:false, write: false, update: false, delete: false, name: 'adminusers'},
                {contentName:'Role Management', read:false, write: false, update: false, delete: false, name: 'roles'},
                {contentName:'Permissions', read:false, write: false, update: false, delete: false, name: 'assignroles'},
            ]
		}
	},
	methods : {
        async assignRoles(){
            let data = JSON.stringify(this.contentType);
                const res = await this.callApi('post','app/assign_roles', {'permissions': data, 'id': this.data.id});
            if(res.status == 200){
                this.success('Permssions updated successfully');
                let index = this.roles.findIndex(role => role.id === this.data.id)
                this.roles[index].permissions = data
                location.reload();
            } 
            else{
                this.error();
            }
        },
        changeRole(){
            let index = this.roles.findIndex(role => role.id === this.data.id)
            let permissions = this.roles[index].permissions;
            if(!permissions){
                this.contentType = this.contentTypeDefault;
            }else{
                this.contentType = JSON.parse(permissions);
            }
        }
    },

	async created(){
		const res = await this.callApi('get','app/get_roles', this.data);
			if (res.status === 200) {
				this.roles = res.data.roles;
                if (res.data.roles.length) {
                    console.log("res.data.length",res.data.length);
                    this.data.id = res.data.roles[1].id;
                    if(res.data.roles[1].permissions){
                        this.contentType = JSON.parse(res.data.roles[1].permissions);
                        console.log("res.contentType",this.contentType)
                    }
                    else{
                        console.log("res.data.roles",res.data.roles)
                    }
                }
                else{
                    console.log("res.data",res.data.roles.length);
                }
			}
			else{
				this.error("Something went wrong");
			}
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




			