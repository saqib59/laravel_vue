<template>
	<div>
		<div class="content">
			<div class="container-fluid">
				<!--~~~~~~~ TABLE ONE ~~~~~~~~~-->
				<div class="_1adminOverveiw_table_recent _box_shadow _border_radious _mar_b30 _p20">
					<p class="_title0">All Designs <Button @click="showDrawer=true"><Icon type="md-add" /> Add new design</Button></p>

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
				</div>
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
					<deleteModal></deleteModal>
			</div>
            <!-- ADD DESIGN DRAWER -->
        <div>
        <Drawer
            title="Add Design"
            v-model="showDrawer"
            width="720"
            :mask-closable="false"
        >
            <Form :model="data">
                <Row :gutter="32">
                    <Col span="12">
                        <FormItem label="Title" label-position="top">
                            <Input v-model="data.title" />
                        </FormItem>
                    </Col>
                    <Col span="12">
                        <FormItem label="Project Name" label-position="top">
                          <Input v-model="data.projectName" />
                        </FormItem>
                    </Col>
                </Row>
                <Row :gutter="32">
                    <Col span="12">
                        <FormItem label="Category" label-position="top">
                            <Select v-model="data.category">
                                <Option v-for="category in categories" :value="category.id" :key="category.id">{{ category.categoryName }}</Option>
                            </Select>
                        </FormItem>
                    </Col>
                    <Col span="12">
                        <FormItem label="Tags" label-position="top">
                            <Select v-model="data.type" multiple>
                                <Option v-for="tag in tags" :value="tag.id" :key="tag.id">{{ tag.tagName }}</Option>
                            </Select>
                        </FormItem>
                    </Col>
                </Row>
                <FormItem label="Description" label-position="top">
                    <Input type="textarea" v-model="data.metaDescription" :rows="4" placeholder="please enter the description" />
                </FormItem>
                <Row :gutter="32">
                    <Col span="24">
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
					            <p>Click or drag image here to upload</p>
					        </div>
					    </Upload>
                         <div class="demo-upload-list" v-if="data.featuredImage">
								<img :src="`/uploads/${data.featuredImage}`">
								<div class="demo-upload-list-cover">
									<Icon type="ios-trash-outline" @click="handleRemove()"></Icon>
								</div>
						</div>
                    </Col>
                </Row>
            </Form>
            <div class="demo-drawer-footer">
                <Button style="margin-right: 8px" @click="showDrawer = false">Cancel</Button>
                <Button type="primary" @click="addDesign">Submit</Button>
            </div>
        </Drawer>    
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
				title: '',
				projectName: '',
                user_id:'',
				category: '',
				tag: '',
                featuredImage:  '',
                metaDescription: ''
			},
			addModal: false,
			editModal: false,
			deleteModal: false,
			isAdding: false,
			tags:[],
			categories:[],
			editData : {
				title: '',
				projectName: '',
                user_id:'',
				category: '',
				tag: '',
                featuredImage:  '',
                metaDescription: ''
			},
			index: -1,
			showDeleteModal: false,
			isDeleting: false,
			deleteItem:{},
			deletingIndex: -1,
            showDrawer: false,
            isFeaturedImage:false,
            isEditingItem: false
		}
	},

	methods : {
		async addDesign(){
			if (this.data.title.trim() == '') return this.error_msg('Title is required')
			if (this.data.projectName.trim() == '') return this.error_msg('Project name is required')
			if (!this.data.category) return this.error_msg('Category is required')
			if (this.data.featuredImage.trim() == '') return this.error_msg('Image is required')

			const res = await this.callApi('post','app/add_design', this.data);
			console.log("res",res);
			if (res.status === 201) {
				this.tags.unshift(res.data);
				this.success_msg("Design has been added successfully");
				this.showDrawer = false;
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
        handleSuccess (res, file) {
			if (this.isEditingItem) {
				return this.editData.featuredImage = res
			}
			this.data.featuredImage = res
		},
		handleError (res, file) {
			console.log("res",res)
			// if (file.errors.file.length) {
			// 	this.warning(file.errors.file[0]);
			// }
			// else{
			// 	this.error();
			// }
		},
		handleFormatError (file) {
            this.warning_msg('File format of ' + file.name + ' is incorrect, please select jpg or png.')
		},
		handleMaxSize (file) {
            this.warning_msg('File  ' + file.name + ' is too large, no more than 2M.')
		},
        async handleRemove(isAdd=true){
			if (!isAdd) {//for editing
				this.isIconImageNew = true;
				let image =  this.editData.IconName;
				this.editData.IconName ='';
				this.$refs.editDataUploads.clearFiles();
			}else{ // for adding
				let image =  this.data.featuredImage;
				this.data.featuredImage ='';
				this.$refs.uploads.clearFiles();
			}
			const res = await this.callApi('post','app/delete_image', {imageName: image});
			if (res.status != 200) {
                this.data.featuredImage = image;
                this.error_msg();
			}
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
        this.token = document.querySelector('meta[name="csrf-token"').content;
		const res_tags = await this.callApi('get','app/get_tags', this.data);
			if (res_tags.status === 200) {
				this.tags = res_tags.data.tags;
				console.log("this.tags",this.tags);
			}
			else{
				this.error("Something went wrong");
			}
        const res = await this.callApi('get','app/get_categories', this.data);
			if (res.status === 200) {
				this.categories = res.data.categories;
				console.log("this.categories",this.categories);
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




			