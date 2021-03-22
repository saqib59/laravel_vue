<template>
	<div>
		<div class="content">
			<div class="container-fluid">
				<!--~~~~~~~ TABLE ONE ~~~~~~~~~-->
				<div class="_1adminOverveiw_table_recent _box_shadow _border_radious _mar_b30 _p20">
					<p class="_title0">Categories  <Button @click="addModal=true"><Icon type="md-add" /> Add Category</Button></p>

					<div class="_overflow _table_div">
						<table class="_table">
								<!-- TABLE TITLE -->
							<tr>
								<th>ID</th>
								<th>Icon Image</th>
								<th>Category Name</th>
								<th>Created At</th>
								<th>Action</th>
							</tr>
								<!-- TABLE TITLE -->
								<!-- ITEMS -->
							<tr v-for="(category , i) in categories" :key="i">
								<td>{{category.id}}</td>
								<td class="table_image">
									<img :src="`uploads/${category.IconName}`" />
								</td>
								<td class="_table_name">{{category.categoryName}}</td>
								<td>{{category.created_at}}</td>
								<td>
								   	<Button type="info" size="small" @click="showEditModal(category, i)">Edit</Button>
								    <Button type="error" size="small" @click="showDeletingModal(category, i)" :loading="category.isDeleting">Delete</Button>
								</td>
							</tr>
						</table>
					</div>
					<!-- ADD CATEGORY MODAL -->
				</div>
				 	<Modal
				        v-model="addModal"
				        title="Add Category"
				        :mask-closable = "false"
				        :closable = "false"
				        >
				        <Upload
							ref="uploads"
							type="drag"
					        :headers="{'x-csrf-token': token, 'X-Requested-With': 'XMLHttpRequest' }"	
					        action="app/upload"
							:on-success="handleSuccess"
							:on-error="handleError"
							:format="['jpg','jpeg','png']"
							:max-size="2048"
							:on-exceeded-size="handleMaxSize"
							:on-format-error="handleFormatError"
							>
					        <div style="padding: 20px 0">
					            <Icon type="ios-cloud-upload" size="52" style="color: #3399ff"></Icon>
					            <p>Click or drag files here to upload</p>
					        </div>
					    </Upload>
						 <div class="demo-upload-list" v-if="data.IconName">
							 <h1
								<img :src="`/uploads/${data.IconName}`">
								<div class="demo-upload-list-cover">
									<Icon type="ios-eye-outline" @click.native="handleView(data.IconName)"></Icon>
									<Icon type="ios-trash-outline" @click="handleRemove()"></Icon>
								</div>
						</div>
				        <Input v-model="data.categoryName" placeholder="Enter Category Name..." />
				        <div slot="footer">
				        	<Button type="default" @click="addModal=false">Close</Button>
				        	<Button type="primary" @click="addCategory" :disabled="isAdding" :loading="isAdding">{{isAdding ? 'Adding..' : 'Add Category'}}</Button>
				        </div>
				    </Modal>

				    <!-- CATEGORY EDITTING MODAL -->
				    <Modal
				        v-model="editModal"
				        title="Edit Category"
				        :mask-closable = "false"
				        :closable = "false"
				        >
				        <!-- <Input v-model="editData.categoryName" placeholder="Edit Category Name" /> -->
						 <Upload v-show="isIconImageNew"
							ref="editDataUploads"
							type="drag"
					        :headers="{'x-csrf-token': token, 'X-Requested-With': 'XMLHttpRequest' }"	
					        action="app/upload"
							:on-success="handleSuccess"
							:on-error="handleError"
							:format="['jpg','jpeg','png']"
							:max-size="2048"
							:on-exceeded-size="handleMaxSize"
							:on-format-error="handleFormatError"
							>
					        <div style="padding: 20px 0">
					            <Icon type="ios-cloud-upload" size="52" style="color: #3399ff"></Icon>
					            <p>Click or drag files here to upload</p>
					        </div>
					    </Upload>
						 <div class="demo-upload-list" v-if="editData.IconName">
								<img :src="`/uploads/${editData.IconName}`">
								<div class="demo-upload-list-cover">
									<Icon type="ios-trash-outline" @click="handleRemove(false)"></Icon>
								</div>
						</div>
				        <Input v-model="editData.categoryName" placeholder="Enter Category Name..." />
				        <div slot="footer">
				        	<Button type="default" @click="closeEditModal">Close</Button>
				        	<Button type="primary" @click="editCategory" :disabled="isAdding" :loading="isAdding">{{isAdding ? 'Editing..' : 'Edit Category'}}</Button>
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
			            <p>Are you sure you want to delete this category?</p>
			        </div>
			        <div slot="footer">
			            <Button type="error" size="large" long :loading="isDeleting" :disabled="isDeleting" @click="deleteCategory">Delete</Button>
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
				IconName: '',
				categoryName: ''
			},
			addModal: false,
			editModal: false,
			deleteModal: false,
			isAdding: false,
			categories:[],
			editData : {
				IconName: '',
				categoryName: ''
			},
			index: -1,
			showDeleteModal: false,
			isDeleting: false,
			deleteItem:{},
			deletingIndex: -1,
			token: '',
			isIconImageNew:false,
			isEditingItem:false,
		}
	},
	methods : {
		async addCategory(){
			if (this.data.categoryName.trim() == '') return this.error('Category name is required')
			if (this.data.IconName.trim() == '') return this.error('Category image is required')
				const res = await this.callApi('post','app/create_category', this.data);
			if (res.status === 201) {
				this.categories.unshift(res.data);
				this.success("Category has been added successfully");
				this.addModal = false;
				this.data.categoryName = '';
				this.data.IconName = '';
				this.$refs.uploads.clearFiles();
			}
			else{
				if (res.status == 422) {
					if (res.data.errors.IconName) {
						this.warning(res.data.errors.IconName[0]);
					}
				}
			}
		},
		async editCategory(){
			if (this.editData.categoryName.trim() == '') return this.error('Category name is required')
			if (this.editData.IconName.trim() == '') return this.error('Category image is required')
				const res = await this.callApi('post','app/edit_category', this.editData);
			if (res.status === 200) {
				this.success("Category has been edited successfully");
				this.categories[this.index].categoryName = this.editData.categoryName;
				this.editModal = false;
				this.editData.IconName = '';
				this.$refs.editDataUploads.clearFiles();
			}
			else{
				if (res.status == 422) {
					if (res.data.errors.tagName) {
						this.warning(res.data.errors.tagName);
					}
				}
			}
		},
		showEditModal(category, index){
			let obj = {
				id: category.id,
				categoryName: category.categoryName,
				IconName: category.IconName
			}
			this.editData = obj;
			this.editModal = true;
			this.index = index;
			this.isEditingItem = true;
		},
		async deleteCategory(){	
			this.isDeleting = true;
			const res = await this.callApi('post','app/delete_category', this.deleteItem);
			if (res.status == 200) {
					this.categories.splice(this.deletingIndex,1);
					this.success("Category has been deleted");
					this.deleteModal= false;

			}
			else{
				this.error();
				console.log(tag)
			}
			this.isDeleting = false;
		},
		async handleRemove(isAdd=true){
			if (!isAdd) {//for editing
				this.isIconImageNew = true;
				let image =  this.editData.IconName;
				this.editData.IconName ='';
				this.$refs.editDataUploads.clearFiles();
			}else{ // for adding
				let image =  this.data.IconName;
				this.data.IconName ='';
				this.$refs.uploads.clearFiles();
			}
			const res = await this.callApi('post','app/delete_image', {imageName: image});
			if (res.status != 200) {
					this.data.IconName = image;
					this.error();
			}
		},
		closeEditModal(){
			this.isEditingItem = false;
			this.editModal = false;
		},
		showDeletingModal(category,index){
			this.deleteItem= category;
			this.deletingIndex = index;
			this.deleteModal = true;
		},
		handleSuccess (res, file) {
			if (this.isEditingItem) {
				return this.editData.IconName = res
			}
			this.data.IconName = res
		},
		handleError (res, file) {
			console.log(res)
			if (file.errors.file.length) {
				this.warning(file.errors.file[0]);
			}
			else{
				this.error();
			}
		},
		handleFormatError (file) {
			this.$Notice.warning({
				title: 'The file format is incorrect',
				desc: 'File format of ' + file.name + ' is incorrect, please select jpg or png.'
			});
		},
		handleMaxSize (file) {
			this.$Notice.warning({
				title: 'Exceeding file size limit',
				desc: 'File  ' + file.name + ' is too large, no more than 2M.'
			});
		},
	},
	
	 async mounted(){
	 	this.token = document.querySelector('meta[name="csrf-token"').content;

		const res = await this.callApi('get','app/get_categories', this.data);
			if (res.status === 200) {
				this.categories = res.data.categories;
				console.log("categories",this.categories);
			}
			else{
				this.error("Something went wrong");

			}
	},
}
</script>




			