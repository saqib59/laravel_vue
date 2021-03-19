<template>
	<div>
		<div class="content">
			<div class="container-fluid">
				<!--~~~~~~~ TABLE ONE ~~~~~~~~~-->
				<div class="_1adminOverveiw_table_recent _box_shadow _border_radious _mar_b30 _p20">
					<p class="_title0">Tags  <Button @click="addModal=true"><Icon type="md-add" /> Add tag</Button></p>

					<div class="_overflow _table_div">
						<table class="_table">
								<!-- TABLE TITLE -->
							<tr>
								<th>ID</th>
								<th>Tag Name</th>
								<th>Created At</th>
								<th>Action</th>
							</tr>
								<!-- TABLE TITLE -->
								<!-- ITEMS -->
							<tr v-for="(tag , i) in tags" :key="i" v-if="tags.length">
								<td>{{tag.id}}</td>
								<td class="_table_name">{{tag.tagName}}</td>
								<td>{{tag.created_at}}</td>
								<td>
								   	<Button type="info" size="small" @click="showEditModal(tag, i)">Edit</Button>
								    <Button type="error" size="small" @click="showDeletingModal(tag, i)" :loading="tag.isDeleting">Delete</Button>
								</td>
							</tr>
						</table>
					</div>
					<!-- MODAL -->
				</div>
				 	<Modal
				        v-model="addModal"
				        title="Add Tag"
				        :mask-closable = "false"
				        :closable = "false"
				        >
				        <Input v-model="data.tagName" placeholder="Enter Tag Name..." />
				        <div slot="footer">
				        	<Button type="default" @click="addModal=false">Close</Button>
				        	<Button type="primary" @click="addTag" :disabled="isAdding" :loading="isAdding">{{isAdding ? 'Adding..' : 'Add Tag'}}</Button>
				        </div>
				    </Modal>

				    <!-- TAG EDITTING MODAL -->
				    <Modal
				        v-model="editModal"
				        title="Edit Tag"
				        :mask-closable = "false"
				        :closable = "false"
				        >
				        <Input v-model="editData.tagName" placeholder="Edit Tag Name" />
				        <div slot="footer">
				        	<Button type="default" @click="editModal=false">Close</Button>
				        	<Button type="primary" @click="editTag" :disabled="isAdding" :loading="isAdding">{{isAdding ? 'Adding..' : 'Edit Tag'}}</Button>
				        </div>
				    </Modal>

				    <!-- DELETE MODAL -->
				     <Modal
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
   					 </Modal>

			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
export default{
	data(){
		return{
			data:{
				tagName: ''
			},
			addModal: false,
			editModal: false,
			deleteModal: false,
			isAdding: false,
			tags:[],
			editData : {
				tagName : ''
			},
			index: -1,
			showDeleteModal: false,
			isDeleting: false,
			deleteItem:{},
			deletingIndex: -1
		}
	},
	methods : {
		async addTag(){
			if (this.data.tagName.trim() == '') return this.error('Tag name is required')
				const res = await this.callApi('post','app/create_tag', this.data);
			if (res.status === 201) {
				this.tags.unshift(res.data);
				this.success("Tag has been added successfully");
				this.addModal = false;
				this.data.tagName = '';
			}
			else{
				if (res.status == 422) {
					if (res.data.errors.tagName) {
						this.warning(res.data.errors.tagName);
					}
				}
			}
		},
		async editTag(){
			if (this.editData.tagName.trim() == '') return this.error('Tag name is required')
				const res = await this.callApi('post','app/edit_tag', this.editData);
			if (res.status === 200) {
				this.success("Tag has been edited successfully");
				this.tags[this.index].tagName = this.editData.tagName;
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
		showEditModal(tag, index){
			let obj = {
				id: tag.id,
				tagName: tag.tagName
			}
			this.editData = obj;
			this.editModal = true;
			this.index = index;
		},
		async deleteTag(){	
			this.isDeleting = false;
			const res = await this.callApi('post','app/delete_tag', this.deleteItem);
			if (res.status == 200) {
					this.tags.splice(this.deletingIndex,1);
					this.success("Tag has been deleted");
					this.deleteModal= false;

			}
			else{
				this.error();
				console.log(tag)
			}
			this.isDeleting = true;
		},
		showDeletingModal(tag,index){
			this.deleteItem= tag;
			this.deletingIndex = index;
			this.deleteModal = true;
		}
	},
	
	async created(){
		const res = await this.callApi('get','app/get_tags', this.data);
			if (res.status === 200) {
				this.tags = res.data.tags;
				console.log(this.tags);
			}
			else{
				this.error("Something went wrong");

			}
	},
}
</script>




			