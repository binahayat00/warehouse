<template>
    <div class="containe  r1 p-5 p-md-5 pt-4 height w-100">
            <div class="text-right my_margin">
                <div class="row w-100 mb-3 mx-0">
                    <div class="col-6">
                        <button id="btn_modal_peyk" type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#modal-peyk" @click="cleanForm">افزودن پیک
                        </button>

                    </div>
                    <div class="col-6 pl-0 text-left">
                        <div class="search-box mr-5">
                            <h5 class="d-inline-flex">جستجو:</h5>
                            <button class="btn-search"><i class="fas fa-search"></i></button>
                            <input type="text" class="input-search" v-model="searchQuery"
                                   placeholder="جستجو...">
                        </div>
                    </div>

                </div>
                <div class="modal" tabindex="-1" id="modal-peyk">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">افزودن پیک</h5>
                                <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body form-group text-right">
                                <div>
                                    <label>نام:</label>

                                    <multiselect v-model="peyk_rel.user_id" :options="users"
                                                 :custom-label="name_family"
                                                 :showLabels="false" placeholder="نام پیک"></multiselect>

                                </div>

                                <div class="mt-4">
                                    <label>نام وسیله:</label>
                                    <multiselect v-model="peyk_rel.vehicle_id"
                                                 :options="vehicle_list"
                                                 :custom-label="nameWithLang"
                                                 :showLabels="false" placeholder="نام وسیله"></multiselect>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary " data-dismiss="modal">
                                    لغو
                                </button>
                                <button type="button" class="btn btn-primary" @click="save(peyk_rel)">ثبت
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--////////////////////////////////////////////////-->
            <div id="table-units" class="table-responsive table-bordered text-center style_table">
                <table id="delivery" class="table">
                    <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>نام</th>
                        <th>نام خانوادگی</th>
                        <th>کد پرسنلی</th>
                        <th>نام وسیله</th>
                        <th>شماره وسیله</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody class="tbody-units">
                    <tr v-for='(peyk, index) in resultQuery' :key="index" :class="{editing: peyk == editedPeyk}"
                        v-cloak>
                        <td label="ردیف">{{ index + 1 }}</td>
                        <td label="نام">
                            <input type="text" class="form-control text-center d-inline w-100"
                                   :value="peyk.user.first_name" placeholder="نام" readonly>
                        </td>
                        <td label="نام خانوادگی">
                                <input type="text" class="form-control text-center d-inline w-100"
                                       :value="peyk.user.last_name" placeholder="نام خانوادگی" readonly>

                        </td>
                        <td label="کد پرسنلی">

                                <input type="text" :value="peyk.user.personnel_code" class="form-control text-center"
                                       readonly>

                        </td>
                        <td label="نام وسیله">

                                <input type="text" class="form-control d-inline w-100 text-center"
                                       :value="peyk.vehicle.name" placeholder="نام وسیله" readonly>

                        </td>
                        <td label="شماره وسیله">
                            <input type="text" class="form-control d-inline w-100 text-center"
                                   :value="peyk.vehicle.number" placeholder="شماره وسیله" readonly>
                        </td>
                        <td label="عملیات">

                                <a class="badge badge-danger"
                                   @click="">حذف</a>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

    </div>
</template>

<script>
import Swal from "sweetalert2";
import Multiselect from 'vue-multiselect'

export default {
    name: "peyk_management",
    data() {
        return {
            searchQuery: null,
            vehicle_list: [],
            editedPeyk: null,
            users: [],
            peyk_rel: {user_id: '', vehicle_id: ''},
            peyk_list: [],
            peyk:null
        }
    },

    methods: {
        nameWithfamily({first_name, last_name, code}) {
            return `${first_name} ${last_name} ${code}`
        },
        nameWithLang({name, number}) {
            return `${name} - ${number}`
        },
        name_family({first_name, last_name,personnel_code}) {
            return `${first_name}  ${last_name} - ${personnel_code}`
        },
        cleanForm(){
            this.peyk_rel= {user_id: '', vehicle_id: ''}
        },

        loadVehicle() {
            axios.get('api/vehicle/all').then(({data}) => (this.vehicle_list = data.data))
        },
        loadUser() {
            axios.get('api/user/all').then(({data}) => (this.users = data.data));
        },
        loadPeyk() {
            axios.get('api/delivery/all').then(({data}) => (this.peyk_list = data.data))
        },
        save(peyk_rel) {

            axios.post('/api/delivery/store', this.peyk={user_id: peyk_rel.user_id.id, vehicle_id: peyk_rel.vehicle_id.id}
            ).then((response) => {
                if (response.data.success) {
                    $("#modal-peyk .close").click()
                    this.cleanForm()
                    this.loadPeyk()
                    Swal.fire({
                        heightAuto: false,
                        position: 'center',
                        icon: 'success',
                        title: 'ذخیره با موفقیت ذخیره شد',
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
            }).catch(error => {
                if (!error.response.data.success) {
                    Swal.fire({
                        heightAuto: false,
                        icon: 'error',
                        title: 'خطا . . .',
                        text:error.response.data.message
                    })
                }

            })
        },
        // cancel() {
        //     this.editedPeyk = null;
        // },
        // editedPeykleList(peyk) {
        //     this.editedPeyk = peyk
        // },

    },
    computed: {
        resultQuery() {
            if (this.searchQuery) {
                return this.peyk_list.filter(item => {
                    const filter = this.searchQuery;
                    const name = String(item.user.first_name).includes(filter);
                    const family = String(item.user.last_name).includes(filter);
                    const code = String(item.user.personnel_code).includes(filter);
                    const vehicle = String(item.vehicle.name).includes(filter);


                    return family || name || code || vehicle
                });
            } else {
                return this.peyk_list;
            }
        }
    },
    created() {
        this.loadPeyk()
        this.loadVehicle()
        this.loadUser()
    },
    components: {
        Multiselect
    }

}
</script>

<style scoped>
.containe{
    overflow-y: auto;
}

.tbody-units {
    text-align: center;
}

#table_units_mobile label {
    font-size: 12px;
    margin-bottom: 0;
    padding-bottom: 0;
}

#table_units_mobile input {
    font-size: 14px;
}


a {
    font-size: 12px;
}

.text_area {
    height: 38px !important;
}
.height{
    height: 75%;
}

</style>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
