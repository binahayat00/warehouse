    <template>
        <div id="permission_content" class="table-responsive margin_top">

                <div class="modal" id="permission" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">افزودن دسترسی</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <i class="tim-icons icon-simple-remove"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label">کاربر</label>
                                    <select  v-model="role_name" id="user" class="form-control">
                                        <option v-for="role in roles">{{role.name}} </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">دسترسی</label>

                                    <multiselect v-model="value"  track-by="name" label="name" placeholder="انتخاب" :options="permissions" :searchable="true" :allow-empty="false" :multiple="true" >
                                    </multiselect>

                                </div>



                            </div>
                            <div class="modal-footer">
                                <button @click="assignPermissionToRole()" class="btn btn-primary">افزودن دسترسی</button>
                                <button type="button" class="btn btn-secondary"  data-dismiss="modal">لغو</button>
                            </div>
                        </div>
                    </div>
                </div>

                        <div class="text-right">
                            <button data-toggle="modal" data-target="#permission"
                                    class="btn cyan_color">افزودن مجوز دسترسی
                            </button>
                        </div>
                                <table class="table border">
                                    <thead>
                                    <tr>
                                        <th>نوع کاربر</th>
                                        <th style="width: 70%">دسترسی ها</th>

                                    </tr>
                                    </thead>
                                    <tr v-for="role in roles">
                                        <td>{{role.name}}</td>
                                        <td><span class="badge bg-info text-white mx-1 p-2" v-for="permission in role.permissions">{{permission.name}} </span></td>
                                    </tr>

                                </table>
                            </div>

    </template>


<script>
import Multiselect from 'vue-multiselect'
import Swal from "sweetalert2";
export default {
    components: { Multiselect },
    data() {
        return {
            permissions:[],
            roles:{},
            role_name:'',
            value: [

            ],
            options: [

            ],
            permission_name:''
        }
    },
    methods: {
        cleanForm() {
            this.permission_name = '',
                this.value = '',
                this.role_name = ''
        },
        addTag (newTag) {
            const tag = {
                name: newTag,
                code: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
            }
            this.options.push(tag)
            this.value.push(tag)
        },
        getRoles() {
            axios.get('api/roles').then(({data}) => (this.roles = data.roles)
            );
        },
        getPermissions() {
            axios.get('api/permissions').then(({data}) => (this.permissions = data.permissions));
        },

        assignPermissionToRole() {
            axios.post('api/permission/asign', {permission_name:this.value,role_name:this.role_name}).then((response) => {

                Swal.fire({
                    icon: 'success',
                    title: response.data.message,
                    showConfirmButton: false,
                    timer: 1000

                })
                this.getRoles()
                this.cleanForm()
                $('#permission .close').click()

            }).catch(error => {

                this.allerrors = error.response.data
                if (error.response.data.status =='406') {
                    Swal.fire({
                        icon: 'error',
                        title: 'خطا . . .',
                        text: error.response.data.message
                    })
                }


            })
        },
    },

    created() {
        this.getRoles()
        this.getPermissions()

    },
name: "Permission.vue"
}

</script>
    <style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style scoped>
#permission_content{
    text-align: center;
    width: 100%;
    margin: 2%;
    padding: 1%;
}
.badge{
    font-size: 14px;
    margin-top: 5px;
}
@media only screen and (max-width: 600px) {

    table {
        font-size: 18px;
    }
    td, tr {
        display: block;
    }


    thead tr {
        position: absolute;
        /*top: -9999px;*/
        right: -9999px;
    }

    tr {
        margin: 0 0 1rem 0;
        border-radius: 10px;
        border: 1px solid gray;
    }

    tr:nth-child(odd) {
        background: #bab8b8;
    }

    td {
        border: none;
        border-bottom: 1px solid #eee;
        position: relative;
        padding-right: 50%;
    }

    td:before {
        position: absolute;
        right: 6px;
        width: 45%;
        padding-right: 10px;
        white-space: nowrap;
    }

    table td:nth-of-type(1):before {
        content: "نوع کاربر";
    }

    table td:nth-of-type(2):before {
        content: "دسترسی ها";
    }

}
</style>
