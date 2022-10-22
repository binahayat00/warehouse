<template>
    <div class="containe  r1 p-5 p-md-5 pt-4 height w-100">
        <div class="text-right my_margin">
            <div class="row w-100 mb-3 mx-0">
                <div class="col-6">
                    <button id="btn_modal_peyk" type="button" class="btn btn-success" data-toggle="modal"
                            data-target="#modal-peyk" @click="cleanForm">افزودن وسیله نقلیه</button>

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
                            <h5 class="modal-title">افزودن وسیله نقلیه</h5>
                            <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body form-group text-right">
                            <div>

                                <div>
                                    <label class="typo__label">نام وسیله</label>
                                    <input v-model="vehicle.name" type="text" class="form-control">
                                </div>
                                <div class="mt-2">
                                    <label class="typo__label">شماره وسیله</label>
                                    <input v-model="vehicle.number" type="text" class="form-control">
                                </div>
                                <div class="mt-2">
                                    <label class="typo__label">توضیحات</label>
                                    <input v-model="vehicle.description" type="text" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary " data-dismiss="modal">
                                لغو
                            </button>
                            <button type="button" class="btn btn-primary"
                                    @click="save(vehicle)">ثبت
                            </button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!--////////////////////////////////////////////////-->
        <div id="table-vehicle" class="table-responsive table-bordered">
            <table class="table style_table">
                <thead>
                <tr>
                    <th>ردیف</th>
                    <th>نام وسیله</th>
                    <th>شماره وسیله</th>
                    <th>توضیحات</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody class="tbody-units">
                <tr v-for='(vehicle, index) in resultQuery' :key="index" :class="{editing: vehicle == editedVehicle}"
                    v-cloak>
                    <td><h4>{{ index + 1 }}</h4></td>
                    <td>
                        <div class="view">
                            <input type="text" class="form-control d-inline w-100"
                                   :value="vehicle.name" placeholder="نام وسیله" readonly>
                        </div>
                        <div class="edit">
                            <input type="text" class="form-control d-inline w-100"
                                   v-model="vehicle.name" placeholder="نام وسیله">

                        </div>
                    </td>
                    <td>

                        <div class="view">
                            <input id="input_cost1" class="form-control"
                                   :value="vehicle.number"
                                   type="text"
                                   placeholder="شماره وسیله" readonly>
                        </div>
                        <div class="edit">
                            <input class="form-control w-100"
                                   v-model="vehicle.number"
                                   type="text"
                                   placeholder="شماره وسیله">

                        </div>

                    </td>
                    <td>
                        <div class="view">
                            <textarea v-model="vehicle.description" class="form-control text_area" readonly></textarea>
                        </div>
                        <div class="edit">
                            <textarea v-model="vehicle.description" class="form-control"></textarea>
                        </div>
                    </td>
                    <td>
                        <div class="view">
                            <i  class="badge badge-warning" @click="editedVehicleList(vehicle)">ویرایش</i>
                            <i  class="badge badge-danger" @click="deleteVehicle(vehicle)">حذف</i>
                        </div>
                        <div class="edit">
                            <i  class="badge badge-success" @click="update(vehicle)">ذخیره</i>
                            <i  class="badge badge-secondary p-1 mx-2" @click="cancel(vehicle)">لغو</i>
                        </div>


                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <!--                ///////////////////////////////////////////////////////////////////-->
<!--        <div id="table_units_mobile">-->
<!--            <div class="box" v-for='(vehicle, index) in resultQuery' :key="index"-->
<!--                 :class="{editing: vehicle == editedUser}"-->
<!--                 v-cloak>-->
<!--                <div class="row text-right mb-2">-->
<!--                    <div class="col-6">-->
<!--                        <label class="mb-0 pb-0">نام واحد:</label>-->
<!--                        <input type="text" class="form-control d-inline w-100"-->
<!--                               :value="unit.unit.name" placeholder="نام واحد" readonly>-->

<!--                    </div>-->

<!--                    <div class="col-6">-->
<!--                        <div class="view">-->
<!--                            <label class="mb-0 pb-0">ضریب واحد:</label>-->
<!--                            <input class="form-control"-->
<!--                                   :value="unit.rate"-->
<!--                                   type="number"-->
<!--                                   placeholder="مبلغ به ریال" readonly>-->
<!--                        </div>-->
<!--                        <div class="edit">-->
<!--                            <label class="mb-0 pb-0">ضریب واحد:</label>-->
<!--                            <input id="input_cost" class="form-control w-100"-->
<!--                                   v-model="rate"-->
<!--                                   type="number"-->
<!--                                   placeholder="مبلغ به ریال" pattern="[0-9]{2}" min="0" max="100">-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="row text-right mb-3">-->
<!--                    <div class="col-12">-->
<!--                        <div class="view">-->
<!--                            <label class="mb-0 pb-0">توضیحات:</label>-->
<!--                            <textarea v-model="unit.description" class="form-control text_area" disabled></textarea>-->
<!--                        </div>-->
<!--                        <div class="edit">-->
<!--                            <label class="mb-0 pb-0">توضیحات:</label>-->
<!--                            <textarea v-model="unit.description" class="form-control"></textarea>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

<!--                <div class="row text-center">-->
<!--                    <div class="col-6 border">-->
<!--                        عملیات-->
<!--                    </div>-->
<!--                    <div class="col-6 border">-->
<!--                        <div class="view">-->
<!--                            <a v-if="date==current_date" href="#" class="badge badge-warning" @click="editUser(unit)">ویرایش</a>-->
<!--                            <a v-if="date >= current_date" href="#" class="badge badge-danger"-->
<!--                               @click="deleteMonthRateOfUnit(unit)">حذف</a>-->
<!--                        </div>-->
<!--                        <div class="edit">-->
<!--                            <a href="#" class="badge badge-success" @click="updateMonthRateOfUnit(unit)">ذخیره</a>-->
<!--                            <a href="#" class="badge badge-secondary p-1 mx-2" @click="cancel(unit)">لغو</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

<!--            </div>-->
<!--        </div>-->
    </div>

</template>

<script>
import Swal from "sweetalert2";
import Multiselect from 'vue-multiselect'

export default {
    name: "Vehicle",
    data() {
        return {
            searchQuery: null,
            vehicle: {
                name: '',
                number: '',
                description: '',
            },
            vehicle_list: [],
            editedVehicle: null,
        }
    },
    methods: {
        loadVehicle() {
            axios.get('api/vehicle/all').then(({data}) => (this.vehicle_list = data.data))
        },
        cleanForm(){
           this.vehicle= {
                name: '',
                    number: '',
                    description: '',
            }
        },

        deleteVehicle(vehicle) {
            Swal.fire({
                heightAuto: false,
                icon: 'error',
                title: 'آیا از حذف وسیله نقلیه اطمینان دارید؟',
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonText: 'بله',
                cancelButtonText: ' خیر',
                timer: 10000
            }).then((response) => {
                if (response.isConfirmed) {
                    axios.delete('/api/vehicle/delete/'+ vehicle.id
                    ).then((response) => {
                        if (response.data.success) {
                            this.loadVehicle()
                            Swal.fire({
                                heightAuto: false,
                                position: 'center',
                                icon: 'success',
                                title: 'حذف با موفقیت انجام شد',
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
                                text:error.response.data.message
                            })
                        }

                    })
                }

            })
        },
        editedVehicleList(vehicle) {
            this.editedVehicle = vehicle
        },

        update(vehicle) {

            axios.put('/api/vehicle/update', vehicle
            ).then((response) => {
                if (response.data.success) {
                    this.editedVehicle = null
                    Swal.fire({
                        heightAuto: false,
                        position: 'center',
                        icon: 'success',
                        title: 'ویرایش با موفقیت ذخیره شد',
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
                        text:error.response.data.message
                    })
                }

            })
        },
        cancel() {
            this.editedVehicle = null;
        },
        save(vehicle) {
            axios.post('/api/vehicle/store', vehicle
            ).then((response) => {
                if (response.data.success) {
                    $("#modal-peyk .close").click()
                    Swal.fire({
                        heightAuto: false,
                        position: 'center',
                        icon: 'success',
                        title: 'ذخیره با موفقیت ذخیره شد',
                        showConfirmButton: false,
                        timer: 2000
                    })
                    this.cleanForm()
                    this.loadVehicle()
                }
            }).catch(error => {
                if (!error.response.data.status) {
                    Swal.fire({
                        heightAuto: false,
                        icon: 'error',
                        title: 'خطا . . .',
                        text: 'وارد کردن نام وسیله اجباری است'
                    })
                }

            })
        },


    },
    computed: {
        resultQuery() {
            if (this.searchQuery) {
                return this.vehicle_list.filter(item => {
                    const filter = this.searchQuery;
                    const name = String(item.name).includes(filter);
                    const number = String(item.number).includes(filter);

                    return name || number
                });
            } else {
                return this.vehicle_list;
            }
        }
    },
    created() {
        this.loadVehicle()
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
a {
    font-size: 12px;
}

.text_area {
    height: 38px;
}
.height{
    height: 75%;
}

@media only screen
and (max-width: 760px), (min-device-width: 768px)
and (max-device-width: 1024px) {
    .height{
        height: 95%;
    }
    table,table td h4,#btn_modal_peyk,.search-box h5,.badge{
        font-size: 14px!important;
    }
    .containe .my_margin{
        margin-top: 10%;
    }
    .search-box {
        display: flex;
        margin-top: 5px;
        margin-right: 0 !important;
    }
    table td, tr {
        display: block;
    }


    table thead tr {
        display: none;
        position: absolute;
        /*top: -9999px;*/
        /*right: -9999px;*/
    }

    table tr {
        margin: 0 0 1rem 0;
        border-radius: 10px;
        border: 1px solid gray;
    }

    table tr:nth-child(odd) {
        background: #bab8b8;
    }

    table td {
        border: none;
        border-bottom: 1px solid #eee;
        position: relative;
        padding-right: 58%;
    }

    table td:before {
        position: absolute;
        right: 0px;
        width: 50%;
        padding-right: 10px;
        white-space: nowrap;
    }

    #table-vehicle td:nth-of-type(1):before {
        content: "ردیف";
    }

    #table-vehicle td:nth-of-type(2):before {
        content: "نام وسیله";
    }

    #table-vehicle td:nth-of-type(3):before {
        content: "شماره وسیله";
    }
    #table-vehicle td:nth-of-type(4):before {
        content: "توضیحات";
    }

    #table-vehicle td:nth-of-type(5):before {
        content: "عملیات";
    }
}

</style>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
