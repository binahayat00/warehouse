<template>
    <div class="containe  r1 p-5 p-md-5 pt-4 height-100 w-100">





        <!-- مودال نمایش جزئیات   ///////////////////////////////////////-->
        <div class="modal" tabindex="-1" id="modal-details">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header float-left text-left">
                        <!--                        <h5 class="modal-title">نمایش جزئیات</h5>-->
                        <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body form-group text-right">
                        <table id="table-information" class="table table-striped table-bordered text-center style_table">
                            <thead>
                            <tr>
                                <th colspan="10"><h4>نمایش جزئیات</h4></th>

                            </tr>
                            <tr>
                                <th>ردیف</th>
                                <th>نام کالا</th>
                                <!--                                <th>مشخصات کالا</th>-->
                                <th>تعداد</th>
                                <th>واحد درخواست کننده</th>
                                <th>مرکز هزینه</th>
                                <th>انبار</th>
                                <th>وضعیت درخواست</th>
                                <th>نمایش تائیدیه ها</th>
                                <th>توضیحات</th>
                                <th>فایل</th>
                            </tr>
                            </thead>
                            <tbody>
                            <template v-if="request_all!=''">
                                <tr v-if="request_all[request_id].request_detail!=''"
                                    v-for="(details,index) in request_all[request_id].request_detail" :key="index">
                                    <td label="ردیف">{{ index + 1 }}</td>
                                    <td label="نام کالا">{{ details.product.name }}</td>
                                    <!--                                    <td>بزرگ</td>-->
                                    <td label="تعداد">{{ details.amount }}</td>
                                    <td label="واحد درخواست کننده">{{ request_all[request_id].unit.name }}</td>
                                    <td label="مرکز هزینه">
                                        <label v-if="details.center">
                                            {{ details.center.name}}
                                        </label>

                                    </td>
                                    <td label="انبار">{{ details.warehouse.name }}</td>
                                    <td label="وضعیت درخواست"><i v-if="details.confirmed==null" class="badge badge-warning">در انتظار
                                        تائید</i>
                                        <i v-if="details.confirmed==0" class="badge badge-danger">عدم تائید</i>
                                        <i v-if="details.confirmed==1" class="badge badge-success">تائید</i></td>

                                    <td label="نمایش تائیدیه ها">
                                        <i class="fa fa-info-circle fa-2x" data-toggle="modal"
                                           data-target="#show_confirm" @click="getLoadConfirm(details.id)"></i>
                                    </td>
                                    <td label="توضیحات">
                                        <textarea class="form-control" rows="4" cols="50" disabled>{{details.descriptions}}</textarea>

                                    </td>
                                    <td label="فایل">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#modal_file" @click="showFile(details)"
                                                :disabled="disable_btn(details)">نمایش
                                        </button>
                                    </td>
                                </tr>
                            </template>
                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">
                            بستن
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!--        /////////////////////////////////////////////////////////////-->

        <!-- مودال نمایش تائیدیه ها   ///////////////////////////// -->
        <div class="modal fade" id="show_confirm" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">نمایش تائیدیه ها</h5>
                        <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <table class="table table-bordered style_table">
                                <thead>
                                <tr>
                                    <th>
                                        ردیف
                                    </th>
                                    <th>
                                        نام تائید کننده
                                    </th>
                                    <th>
                                        نام تائیدیه
                                    </th>
                                    <th>
                                        وضعیت تائید
                                    </th>
                                    <th>
                                        توضیحات
                                    </th>
                                    <th>
                                        تاریخ
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <template v-if="details_confirm!=''">
                                    <tr v-for="(confirm,index) in details_confirm" :key="index">
                                        <td label="ردیف">
                                            {{ index + 1 }}
                                        </td>
                                        <td label="نام تائید کننده" v-if="confirm.user!=null">
                                            {{ confirm.user.first_name }} {{ confirm.user.last_name }}
                                        </td>
                                        <td label="نام تائید کننده" v-if="confirm.user==null">
                                            نا معلوم
                                        </td>
                                        <td label="نام تائیدیه" v-if="confirm.confirm.name!=null">
                                            {{ confirm.confirm.name }}
                                        </td>
                                        <td label="وضعیت تائید">
                                            <i v-if="confirm.confirmed==null" class="badge badge-warning">در انتظار
                                                تائید</i>
                                            <i v-if="confirm.confirmed==0" class="badge badge-danger">عدم تائید</i>
                                            <i v-if="confirm.confirmed==1" class="badge badge-success">تائید</i>
                                        </td>
                                        <td label="توضیحات">
                                            <textarea class="form-control" rows="4" cols="50" disabled>{{confirm.description}}</textarea>

                                        </td>
                                        <td label="تاریخ">
                                            {{ confirm.updated_at }}
                                        </td>
                                    </tr>
                                </template>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                    </div>
                </div>
            </div>
        </div>

        <!--        //////////////////////////// modal file-->
        <div class="modal fade" id="modal_file" tabindex="-1" role="dialog" aria-labelledby="modal_file"
             aria-hidden="true">
            <div class="modal-dialog d-flex" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">لیست فایل ها</h5>
                    </div>
                    <div class="modal-body">

                        <div>
                            <table id="file_table" class="table table-bordered style_table">
                                <thead>
                                <tr>
                                    <th>
                                        ردیف
                                    </th>
                                    <th>
                                        نام فایل
                                    </th>
                                    <th>
                                        توضیحات
                                    </th>
                                    <th>
                                        پیش نمایش
                                    </th>
                                    <th>
                                        دانلود
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-if="file_array!=null" v-for="(file,index) in file_array" :key="index">
                                    <td label="ردیف">
                                        {{ index + 1 }}
                                    </td>
                                    <td label="نام فایل">
                                        {{ file.file.name }}
                                    </td>
                                    <td label="توضیحات">
                                        {{ file.file.description }}
                                    </td>
                                    <td label="پیش نمایش">

                                        <div class="preview">

                                            <a :href="'/file-show?fileId='+ file.file_id" target="_blank">
                                                <img class="size_img" :src="'/file-show?fileId='+ file.file_id"
                                                     alt="باز کردن"/>
                                            </a>
                                        </div>
                                    </td>
                                    <td label="دانلود">
                                        <a :href="'/file-download?fileId='+ file.file_id"
                                           class="btn btn-sm btn-primary">دانلود</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                    </div>
                </div>
            </div>
        </div>


        <div id="printMe" dir="rtl">
            <div class="modal p-2" tabindex="-1" id="modal-print" role="dialog" aria-labelledby="modal-print"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <div class="row w-100 justify-content-center align-items-center">
                                <div class="col-4 d-flex">
                                    <!--                                    <h5 v-if="request_all">-->
                                    <!--                                        {{ request_all[request_id].request_detail[0].warehouse.name }}</h5>-->

                                    <div class="img_print">
                                        <span><img src="/images/ardakan.png"></span>
                                        <span class="img-font">
                                                    						گروه کارخانجات شیشه اردکان
                                                    					</span>
                                        <span class="img-font">ARDAKAN FLOAT GLASS CO</span>
                                    </div>

                                </div>
                                <div class="col-4">
                                    <h2 class="print-head">رسید تحویل</h2>
                                </div>
                                <div class="col-4 text-center">
                                    <h5 class="inline fa-1x">تاریخ:</h5>
                                    <h5 v-if="request_all!=''" class="inline fa-1x">
                                        {{ convertDate(request_all[request_id].created_at) }}</h5>
                                    <h5 v-if="request_all!=''" class="d-block fa-1x">
                                        {{ request_all[request_id].request_detail[0].warehouse.name }}</h5>
                                </div>
                            </div>

                            <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                                <!--                                <span aria-hidden="true">&times;</span>-->
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-bordered style_table">
                                    <thead>
                                    <tr>
                                        <th>
                                            ردیف
                                        </th>
                                        <th>نام کالا</th>
                                        <th>تعداد</th>
                                        <th>واحد درخواست کننده</th>
                                        <th>مرکز هزینه</th>
                                        <th>وضعیت تائید</th>
                                        <th>توضیحات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <template v-if="request_all!=''">
                                        <tr v-for="(print,index) in request_all[this.request_id].request_detail"
                                            :key="index">
                                            <td label="ردیف">
                                                {{ index + 1 }}
                                            </td>
                                            <td label="نام کالا">
                                                {{ print.product.name }}
                                            </td>
                                            <td label="تعداد">
                                                {{ print.amount }}
                                            </td>
                                            <td label="واحد درخواست کننده">
                                                {{ request_all[request_id].unit.name }}
                                            </td>
                                            <td label="مرکز هزینه">
                                                <label v-if="print.center"> {{ print.center.name }}</label>

                                            </td>
                                            <td label="وضعیت تائید">
                                                <i v-if="print.confirmed==null">در انتظار تائید</i>
                                                <i v-if="print.confirmed==0">عدم تائید</i>
                                                <i v-if="print.confirmed==1" >تائید</i>
                                            </td>
                                            <td label="توضیحات">
                                                {{ print.descriptions }}
                                            </td>
                                        </tr>
                                    </template>

                                    </tbody>
                                </table>
                            </div>

                            <div class="row text-right p-3">
                                <p class="inline">آدرس تحویل:</p>
                                <p class="inline"></p>
                            </div>

                            <div class="row m-0 mt-xl-3 text-center">
                                <div class="col-4 border">

                                    <div class="signature">
                                        <p>مسئول انبار</p>
                                    </div>
                                </div>

                                <div class="col-4 border">

                                    <div class="signature">
                                        <p>مسئول پیک</p>
                                    </div>
                                </div>

                                <div class="col-4 border">

                                    <div class="signature">
                                        <p>دریافت کننده</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button v-print="printObj" type="button" id="btnPrint"
                                    class="btn btn-primary">چاپ
                            </button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!--/////////////////////////////////////////////////////-->
        <div class="switch-holder float-left">
            <div class="switch-label">
                <i class="fa fa-bluetooth-b"></i><span>اماده به کار</span>
            </div>
            <div class="switch-toggle">
                <input v-model="online" type="checkbox" id="ready"  :true-value=1
                       :false-value=0 @change="changeValue(online)">
                <label for="ready"></label>
            </div>
        </div>
        <h4 class="mb-4 my-font-size">درخواست های در انتظار تحویل</h4>
        <div class="text-center">
            <table id="table_status" class="table table-bordered style_table">
                <thead>
                <tr>
                    <th>ردیف</th>
                    <th>واحد درخواست کننده</th>
                    <th>شماره درخواست</th>
                    <th>تاریخ</th>
                    <th>وضعیت تحویل</th>
                    <th>نام وسیله</th>
                    <th>توضیحات</th>
                    <th>پرینت رسید تحویل</th>
                    <th>مشاهده جزئیات</th>
                    <th>تحویل</th>
                </tr>
                </thead>
                <tbody id="tbody_status">
                <tr v-for="(request,index) in request_all" :key="index">
                    <td label="ردیف">{{ index + 1 }}</td>
                    <td label="واحد درخواست کننده">{{ request.unit.name }}</td>
                    <td label="شماره درخواست">{{ request.request_number }}</td>
                    <td label="تاریخ"> {{convertDate(request.created_at)}}</td>

                    <td label="وضعیت تحویل">
                        <i v-if="request.status.id!=5" class="badge badge-warning">{{request.status.name}}</i>
                        <i v-if="request.status.id==5" class="badge badge-success">تحویل داده شده</i>
                    </td>
                    <td label="نام وسیله">
                        <label v-if="request.request_detail[0].delivery[0].vehicle">
                            {{request.request_detail[0].delivery[0].vehicle.name}} - {{request.request_detail[0].delivery[0].vehicle.number}}
                        </label>

                    </td>
                    <td label="توضیحات">
                        <textarea class="form-control" disabled>{{request.descriptions}}</textarea>
                    </td>
                    <td label="پرینت رسید تحویل">
                        <button type="button" class="btn btn-primary btn-table" data-toggle="modal"
                                data-target="#modal-print" @click="request_info(request.id)">
                            <i class="fas fa-print"></i>
                        </button>

                    </td>
                    <td label="مشاهده جزئیات">

                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal-details" @click="request_info(index)"><i
                            class="fas fa-info-circle"></i> نمایش جزئیات
                        </button>
                    </td>
                    <td label="تحویل">

                        <button type="button" class="btn btn-success"  @click="delivery(request.id)" :disabled="request.status.id==5"> <i class="fas fa-people-carry"></i>
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>

<script>
import Multiselect from 'vue-multiselect'
import Swal from "sweetalert2";
import moment from "moment-jalaali";

export default {
    name: "receive_request_peyk",
    data() {
        return {
            request_all: '',
            printObj: {
                id: "printMe",
            },
            request_id: 0,
            details_id_array: [],
            file_array: null,
            online:0,
            details_confirm:''
        }
    }, methods: {
        getLoadConfirm(detailsID) {

            axios.get('api/requestDetailsConfirms/confirmsOfRequestDetail', {
                params: {
                    'requests_detail_id': detailsID,
                }
            }).then(({data}) => (this.details_confirm = data.data));

        },
        convertDate(date){
            return  moment(date).utc("jYYYY-jMM-jDDTHH:mm:ss.SSZ").format("jYYYY-jMM-jDD HH:mm:ss")
        },
        loadRequest() {
            axios.get('api/requests/delivery').then(({data}) => (this.request_all = data.data))
        },
        request_info(index) {
            this.request_id = index;
        },
        showFile(details) {
            this.file_array = details.file_request_detail;
        },
        downloadFile(file_id){
            axios.get('/file-download',{params:{ 'fileId':file_id}
            }).then((response) => {
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
        }
,
        disable_btn(details){
            if(details.file_request_detail!='')
            {
                return false
            }
            else {
                return true
            }
        },
        delivery(requestID){
            Swal.fire({
                icon: 'info',
                title: "لطفا کد تائید را وارد کنید:",
                input: 'text',
                inputValue: '',
                showCancelButton: true,
                confirmButtonText: 'ثبت',
                cancelButtonText: 'لغو'
            }).then((result) => {
                if (result.isConfirmed) {
                    if(result.value!='') {
                        axios.get('api/requests/checkValidatedCode',{params: {
                                requestId: requestID,
                                validatedCode: result.value
                            }
                        })
                            .then((response) => {
                                if(response.data.success) {
                                    this.loadRequest()
                                    Swal.fire({
                                        heightAuto: false,
                                        position: 'center',
                                        icon: 'success',
                                        title: 'تحویل داده شد',
                                        showConfirmButton: false,
                                        timer: 2000
                                    })
                                }
                                else {
                                    Swal.fire({
                                        heightAuto: false,
                                        position: 'center',
                                        icon: 'error',
                                        title: 'کد تحویل اشتباه است',
                                        showConfirmButton: false,
                                        timer: 2000
                                    })
                                }
                            }).catch(error => {
                            if (!error.response.data.success) {
                                Swal.fire({
                                    heightAuto: false,
                                    position: 'center',
                                    icon: 'error',
                                    title: 'کد تحویل اشتباه است',
                                    showConfirmButton: false,
                                    timer: 2000
                                })
                            }

                        })
                    }

                }
                else {
                    if(result.value!='') {
                        result.value=''
                    }

                }

            });
        }
        ,
        changeValue(online)
        {
            axios.put('api/delivery/updateOnlineStatus',{
                online:online
                }
            ).then((response) => {

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
        }
    }, components: {
        Multiselect
    },
    created() {
        this.loadRequest()
    }
}
</script>


<style scoped>

#table_status {
    font-size: 13px;
}

.badge {
    font-weight: 400;
    font-size: 14px;
}

.switch-holder {
    display: flex;
    width: 300px;
    padding: 10px 20px;
    border-radius: 10px;
    margin-bottom: 30px;
    box-shadow: -8px -8px 15px rgba(255,255,255,.7),
    10px 10px 10px rgba(0,0,0, .3),
    inset 8px 8px 15px rgba(255,255,255,.7),
    inset 10px 10px 10px rgba(0,0,0, .3);
    justify-content: space-between;
    align-items: center;
}

.switch-label {
    width: 150px;
}

.switch-label i {
    margin-right: 5px;
}

.switch-toggle {
    height: 40px;
}

.switch-toggle input[type="checkbox"] {
    position: absolute;
    opacity: 0;
    z-index: -2;
}

.switch-toggle input[type="checkbox"] + label {
    position: relative;
    display: inline-block;
    width: 100px;
    height: 40px;
    border-radius: 20px;
    margin: 0;
    cursor: pointer;
    box-shadow: inset -8px -8px 15px rgba(255,255,255,.6),
    inset 10px 10px 10px rgba(0,0,0, .25);

}

.switch-toggle input[type="checkbox"] + label::before {
    position: absolute;
    content: 'OFF';
    font-size: 13px;
    text-align: center;
    line-height: 25px;
    top: 8px;
    left: 8px;
    width: 45px;
    height: 25px;
    border-radius: 20px;
    background-color: #d1dad3;
    box-shadow: -3px -3px 5px rgba(255,255,255,.5),
    3px 3px 5px rgba(0,0,0, .25);
    transition: .3s ease-in-out;
}

.switch-toggle input[type="checkbox"]:checked + label::before {
    left: 50%;
    content: 'ON';
    color: #fff;
    background-color: #00b33c;
    box-shadow: -3px -3px 5px rgba(255,255,255,.5),
    3px 3px 5px #00b33c;
}

textarea{
    height: 40px;
}


</style>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
