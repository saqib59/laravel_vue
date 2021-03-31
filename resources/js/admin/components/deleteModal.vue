 <!-- DELETE MODAL -->
 <template>
    <div>
        <Modal
            :value=getDeleteModalObj.showDeleteModal
            :mask-closable = "false"
            :closable = "false"
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
                <Button type="default" size="large" @click="closeModal">Close</Button>
                <Button type="error" size="large" :loading="isDeleting" :disabled="isDeleting" @click="deleteCategory">Delete</Button>
            </div>
        </Modal>
    </div>
 </template>
            
<script type="text/javascript">
import { mapGetters } from 'vuex';

export default {
    data(){
		return{
			isDeleting: false,
			deleteItem:{},
		}
	},
    methods:{
        async deleteCategory(){
            this.isDeleting = true;
            const res = await this.callApi('post',this.getDeleteModalObj.deleteUrl, this.getDeleteModalObj.data);
            if (res.status == 200) {
                this.success("Category has been deleted");
                this.$store.commit('setDeleteModal',true);
                this.deleteModal= false;
            }
            else{
                this.error();
                this.$store.commit('setDeleteModal',false);
                console.log(tag)
            }
            this.isDeleting = false;
            getDeleteModalObj.showDeleteModal = false;
        },
        closeModal(){
            this.$store.commit('setDeleteModal',false);
        }
    },
    computed:{
        ...mapGetters(['getDeleteModalObj'])
    }
}
</script>
