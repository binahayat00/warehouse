<template>
    <div id="peyk_content" class="table-responsive margin_top">
        <div class="text-right">
            <div class="row w-100 mb-3 mx-0">
                <div class="col-6">
                    <button id="btn_modal_peyk" type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#modal-peyk">افزودن پیک جدید
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
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>

                        <div class="modal-body form-group text-right">
                            <div>
                                <label>نام:</label>

                                    <multiselect v-model="peyk_rel.user_id" :options="users.map(type => type.id)" :custom-label="opt => users.find(x => x.id == opt).first_name+' '+users.find(x => x.id == opt).last_name+' '+users.find(x => x.id == opt).personnel_code" :showLabels="false" placeholder="نام پیک"></multiselect>

                            </div>

                            <div class="mt-4">
                                <label>نام وسیله:</label>
                                <multiselect v-model="peyk_rel.vehicle_id" :options="vehicle_list.map(type => type.id)" :custom-label="opt => vehicle_list.find(x => x.id == opt).name" :showLabels="false" placeholder="نام وسیله"></multiselect>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">
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
        <div id="table-units" class="table-responsive table-bordered">
            <table class="table">
                <thead>
                <tr>
                    <th>ردیف</th>
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>کد پرسنلی</th>
                    <th>نام وسیله</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody class="tbody-units">
                <tr v-for='(peyk, index) in resultQuery' :key="index" :class="{editing: peyk == editedPeyk}"
                    v-cloak>
                    <td><h4>{{ index + 1 }}</h4></td>
                    <td>
                        <input type="text" class="form-control text-center d-inline w-100"
                               :value="peyk.user.first_name" placeholder="نام" readonly>
                    </td>
                    <td>

                        <div class="view">
                            <input type="text" class="form-control text-center d-inline w-100"
                                   :value="peyk.user.last_name" placeholder="نام خانوادگی" readonly>
                        </div>
                        <div class="edit">
                            <input class="form-control text-center w-100"
                                   v-model="peyk.user.last_name"
                                   type="text"
                                   placeholder="نام خانوادگی">

                        </div>

                    </td>
                    <td>
                        <div class="view">
                            <input type="text" :value="peyk.user.personnel_code" class="form-control text-center" readonly>
                        </div>
                        <div class="edit">
                            <input type="text" v-model="peyk.user.personnel_code" class="form-control text-center">
                        </div>
                    </td>
                    <td>

                        <div class="view">
                            <input type="text" class="form-control d-inline w-100 text-center"
                                   :value="peyk.vehicle.name" placeholder="نام وسیله" readonly>
                        </div>
                        <div class="edit">
                            <input class="form-control w-100 text-center"
                                   v-model="peyk.vehicle.name"
                                   type="text"
                                   placeholder="نام وسیله">

                        </div>

                    </td>
                    <td>
                        <div class="view">
                            <a class="badge badge-warning" @click="editedPeykleList(peyk)">ویرایش</a>
                            <a class="badge badge-danger"
                               @click="">حذف</a>
                        </div>
                        <div class="edit">
                            <a href="#" class="badge badge-success" @click="updateMonthRateOfUnit(peyk)">ذخیره</a>
                            <a href="#" class="badge badge-secondary p-1 mx-2" @click="cancel">لغو</a>
                        </div>


                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <!--                ///////////////////////////////////////////////////////////////////-->
<!--                <div id="table_units_mobile">-->
<!--                    <div class="box" v-for='(unit, index) in resultQuery' :key="index" :class="{editing: unit == editedUser}"-->
<!--                         v-cloak>-->
<!--                        <div class="row text-right mb-2">-->
<!--                            <div class="col-6">-->
<!--                                    <label class="mb-0 pb-0">نام واحد:</label>-->
<!--                                    <input type="text" class="form-control d-inline w-100"-->
<!--                                           :value="unit.unit.name" placeholder="نام واحد" readonly>-->

<!--                            </div>-->

<!--                            <div class="col-6">-->
<!--                                <div class="view">-->
<!--                                    <label class="mb-0 pb-0">ضریب واحد:</label>-->
<!--                                    <input class="form-control"-->
<!--                                           :value="unit.rate"-->
<!--                                           type="number"-->
<!--                                           placeholder="مبلغ به ریال" readonly>-->
<!--                                </div>-->
<!--                                <div class="edit">-->
<!--                                    <label class="mb-0 pb-0">ضریب واحد:</label>-->
<!--                                    <input id="input_cost" class="form-control w-100"-->
<!--                                           v-model="rate"-->
<!--                                           type="number"-->
<!--                                           placeholder="مبلغ به ریال" pattern="[0-9]{2}" min="0" max="100">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="row text-right mb-3">-->
<!--                            <div class="col-12">-->
<!--                                <div class="view">-->
<!--                                    <label class="mb-0 pb-0">توضیحات:</label>-->
<!--                                    <textarea v-model="unit.description" class="form-control text_area" disabled></textarea>-->
<!--                                </div>-->
<!--                                <div class="edit">-->
<!--                                    <label class="mb-0 pb-0">توضیحات:</label>-->
<!--                                    <textarea v-model="unit.description" class="form-control"></textarea>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="row text-center">-->
<!--                            <div class="col-6 border">-->
<!--                               عملیات-->
<!--                            </div>-->
<!--                            <div class="col-6 border">-->
<!--                                <div class="view">-->
<!--                                    <a v-if="date==current_date" href="#" class="badge badge-warning" @click="editUser(unit)">ویرایش</a>-->
<!--                                    <a v-if="date >= current_date" href="#" class="badge badge-danger"-->
<!--                                       @click="deleteMonthRateOfUnit(unit)">حذف</a>-->
<!--                                </div>-->
<!--                                <div class="edit">-->
<!--                                    <a href="#" class="badge badge-success" @click="updateMonthRateOfUnit(unit)">ذخیره</a>-->
<!--                                    <a href="#" class="badge badge-secondary p-1 mx-2" @click="cancel(unit)">لغو</a>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                    </div>-->
<!--                </div>-->
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
            vehicle_list:[],
            editedPeyk: null,
            users:[],
            peyk_rel:{user_id:'',vehicle_id:''},
            peyk_list:[]
        }
    },

    methods: {
        nameWithfamily({first_name,last_name,code}) {
            return `${first_name} ${last_name} ${code}`
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
            axios.post('/api/delivery/store', peyk_rel
            ).then((response) => {
                if (response.data.success) {
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
                if (!error.response.data.status) {
                    Swal.fire({
                        heightAuto: false,
                        icon: 'error',
                        title: 'خطا . . .',
                        text: error.response.data.message
                    })
                }

            })
        },
        cancel() {
            this.editedPeyk = null;
        },
        editedPeykleList(peyk) {
            this.editedPeyk = peyk
        },

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
#peyk_content {
    text-align: center;
    width: 100%;
    margin: 2%;
    padding: 1%;
}


.tbody-units {
    text-align: center;
}

.wid-70 {
    width: 70%;
}

#input_cost {
    width: auto;
}

#table_units_mobile {
    display: none;
}

#table_units_mobile label {
    font-size: 12px;
    margin-bottom: 0;
    padding-bottom: 0;
}

#table_units_mobile input {
    font-size: 14px;
}


.box {
    padding: 5%;
    width: 310px;
    height: 200px;
    background-color: #efefef;
    margin-bottom: 5%;
    border-radius: 10px;
    box-shadow: rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
}

a {
    font-size: 12px;
}

@media only screen and (max-width: 600px) {
    #table-units {
        display: none;
    }
    .search-box{
        display: flex;
        margin-top: 5px;
        margin-right: 0!important;
    }

    #table_units_mobile {
        display: table;
        margin: auto;
    }
}

.text_area {
    height: 38px !important;
}


</style>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
