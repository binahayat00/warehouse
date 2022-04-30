<template>
    <div id="peyk_content" class="table-responsive margin_top">
        <div class="text-right">
            <div class="row w-100 mb-3 mx-0">
                <div class="col-6">
                    <button id="btn_modal_peyk" type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#modal-peyk">افزودن وسیله نقلیه جدید
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
                            <h5 class="modal-title">افزودن وسیله نقلیه</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
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
                            <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">
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
        <div id="table-units" class="table-responsive table-bordered">
            <table class="table">
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

<style>
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


[v-cloak] {
    display: none;
}

.edit {
    display: none;
}

.editing .edit {
    display: block;
}

.editing .view {
    display: none;
}
.search-box {
    width: fit-content;
    height: fit-content;
    position: relative;
    display: inline-block;
}

.input-search {
    height: 40px;
    width: 40px;
    border-style: none;
    padding: 10px;
    font-size: 18px;
    letter-spacing: 2px;
    outline: none;
    border-radius: 25px;
    transition: all 1s ease-in-out;
    background: linear-gradient(to bottom left, #4e78e1, #54aaf5, #4e78e1);
    padding-right: 40px;
    color: #ffffff;
}

.input-search::placeholder {
    color: rgba(255, 255, 255, .5);
    font-size: 18px;
    letter-spacing: 2px;
    font-weight: 100;
}

.btn-search {
    width: 40px;
    height: 40px;
    border-style: none;
    font-size: 20px;
    font-weight: bold;
    outline: none;
    cursor: pointer;
    border-radius: 50%;
    position: absolute;
    left: 0px;
    color: #ffffff;
    background: linear-gradient(to bottom left, #4e78e1, #54aaf5, #4e78e1);
    pointer-events: painted;
}

.btn-search:focus ~ .input-search {
    width: 200px;
    border-radius: 25px 25px 25px 25px;
    background: linear-gradient(to bottom left, #4e78e1, #54aaf5, #4e78e1);
    border-bottom: 1px solid rgba(255, 255, 255, .5);
    /*transition: all 1.5s cubic-bezier(0, 0.110, 0.35, 2);*/
}

.input-search:focus {
    width: 200px;
    border-radius: 25px 25px 25px 25px;
    background: linear-gradient(to bottom left, #4e78e1, #54aaf5, #4e78e1);
    border-bottom: 1px solid rgba(255, 255, 255, .5);
    /*transition: all 1.5s cubic-bezier(0, 0.110, 0.35, 2);*/
}
@media only screen and (max-width: 600px) {
    #table-units {
        display: none;
    }

    .search-box {
        display: flex;
        margin-top: 5px;
        margin-right: 0 !important;
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
