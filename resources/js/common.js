import { mapGetters } from 'vuex';
export default {
    methods: {
        async callApi(method, url, dataObject) {
            try {
                return await axios({
                    method: method,
                    url: url,
                    data: dataObject

                });
            } catch (error) {
                console.log('some error occured');
                return error.response;
            }

        },
        info(desc, title = "hey") {
            this.$Notice.info({
                title: title,
                desc: desc
            });
        },
        success(desc, title = "Great") {
            this.$Notice.success({
                title: title,
                desc: desc
            });
        },
        warning(desc, title = "Oops!") {
            this.$Notice.warning({
                title: title,
                desc: desc
            });
        },
        error(desc = "Something went wrong", title = "Oops") {
            this.$Notice.error({
                title: title,
                desc: desc
            });
        },
        success_msg(msg = "Success") {
            this.$Message.success(msg);
        },
        warning_msg(msg = "Warning") {
            this.$Message.warning(msg);
        },
        error_msg(msg = "Error") {
            this.$Message.error(msg);
        },
        checkUserPermission(key) {
            if (!this.userPermission) return true;
            let isPermitted = false;
            for (let data of this.userPermission) {
                if (this.$route.name == data.name) {
                    if (data[key]) {
                        isPermitted = true;
                        break;
                    } else {
                        break;
                    }
                }
            }
            return isPermitted;
            // console.log("this.$route", this.$route.name)
        },
        isProd() {
            if (process.env.MIX_APP_ENV == "prod") {
                return "/spin_and_win/";
            } else {
                return "/Saqib/laravel/"
            }
        }
    },
    computed: {
        ...mapGetters({
            'userPermission': 'getUserPermission'
        }),
        isReadPermitted() {
            return this.checkUserPermission('read')
        },
        isWritePermitted() {
            return this.checkUserPermission('write')
        },
        isUpdatePermitted() {
            return this.checkUserPermission('update')
        },
        isDeletePermitted() {
            return this.checkUserPermission('delete')
        },
    }

}