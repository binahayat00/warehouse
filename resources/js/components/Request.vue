<template>
    <div class="p-5 p-md-5 pt-4 height-100 w-100">
        <div class="container-fluid height-100">

            <!--            ///////////////////////-->

            <div class="modal fade" id="modal_file" tabindex="-1" role="dialog" aria-labelledby="modal_file"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">لیست فایل ها</h5>
                        </div>
                        <div class="modal-body">

                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_file">
                                افزودن فایل
                            </button>
                            <div>
                                <table class="table table-bordered">
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

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-if="file_array[my_index].files!=null" v-for="(file,index) in file_array[my_index].files" :key="index">
                                        <td>
                                            {{index+1}}
                                        </td>
                                        <td>
                                            {{file.name}}
                                        </td>
                                        <td>
                                            {{file.description}}
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
            <!--/////////////-->
            <div class="modal fade" id="add_file" tabindex="-1" role="dialog" aria-labelledby="add_file"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">افزودن فایل</h5>
                            <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body">
                            <div class="text-group row mr-1">
                                <label class="input-group-btn">
                    <span class="btn btn-primary" style="border-radius: 0 5px 5px 0">
                        انتخاب فایل <input id="file" type="file" style="display: none" v-on:change="onFileChange">
                    </span>
                                </label>
                                <input :value="name_file" id="text_input" class="form-control"
                                       style="width: 250px;border-radius: 0;border: 1px solid darkgray" readonly>
                            </div>
                            <div class="col mt-2">
                                <label>نام:</label>
                                <input v-model="file_title" type="text" class="form-control">
                            </div>

                            <div class="col">
                                <label>توضیحات:</label>
                                <input v-model="file_description" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">لغو</button>
                            <button type="button" class="btn btn-success btb_submit" @click="formSubmit" enctype="multipart/form-data">ارسال</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--            ///////////////////////////-->
            <form class="height-100" name="requestForm" id="requestForm">
                <div class="text-center" id="screen_web">

                    <table id="table-request" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th width="12%">
                                <img src="images/ardakan.png">
                                <p class="img_title">گروه کارخانجات شیشه اردکان</p>
                                <p class="img_title2">ARDAKAN FLOAT GLASS CO</p>
                            </th>
                            <th width="60%">
                                <p class="tablesubject mx-auto">درخواست کالا از انبار</p>
                            </th>
                            <th width="15%" class="my-auto">
                                <div class="row flex-column">
                                    <h5 class="text_form">
                                        تاریخ :
                                    </h5>
                                    <h5 class="text_form">
                                        {{date}}
                                    </h5>
                                </div>
                            </th>
                            <th width="15%" class="my-auto">
                                <div class="row flex-column">
                                    <h5 class="text_form">
                                        شماره درخواست:
                                    </h5>
                                    <h5 class="text_form">
                                        123456
                                    </h5>
                                </div>

                            </th>
                        </tr>
                        <tr>
                            <td class="wid-40 inline-block mx-0">
                                <h6>
                                    رامین اقتداری
                                </h6>

                            </td>
                            <td class="wid-20 inline-block mx-0">
                                <h6>4847</h6>
                            </td>
                            <td class="wid-40 inline-block mx-0">
                                <h6>
                                    برنامه نویسی
                                </h6>
                            </td>
                        </tr>
                        <tr class="text-nowrap">
                            <th class="wid-3">ردیف</th>
                            <th class="wid-15">شرح کالا</th>
                            <th class="wid-12">مشخصات فنی</th>
                            <th class="wid-7">مقدار درخواستی</th>
                            <th class="wid-15">نام انبار</th>
                            <th class="wid-8">محل مصرف</th>
                            <th class="wid-7">وضعیت داغی</th>
                            <th class="wid-7 px-0">تعداد داغی</th>
                            <th class="wid-7">مدرک پیوست</th>
                            <th class="wid-12">بارگذاری فایل</th>
                            <th class="wid-4 p-1"><i id="addrow" class="fa fa-plus add " @click="addRow"> </i></th>
                        </tr>
                        </thead>
                        <tbody id="table-body-request">
                        <div>
                            <tr v-for='(myform, index) in requestDetails' :key="index" class="align-items-center">
                                <td class="wid-3 pading_y1">{{ index + 1 }}</td>
                                <td class="wid-15 pading_y">
<!--                                    <Select2 v-model="myform.product_id" :options="option_kala"-->
<!--                                             placeholder="نام کالا را انتخاب کنید"/>-->

                                <div> <multiselect v-model="myform.product_id" :options="products_array.map(type => type.id)" :custom-label="opt => products_array.find(x => x.id == opt).name" :showLabels="false" placeholder="نام کالا"></multiselect></div>

                                </td>
                                <td class="wid-12 pading_y">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modal-config"><i class="fas fa-cogs"></i> مشخصات کالا
                                    </button>
                                    <div class="modal" tabindex="-1" id="modal-config">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">مشخصات فنی</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body form-group text-right">

                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div>
                                                                <label>
                                                                    رنگ:
                                                                </label>
                                                                <input v-model="myform.cont2" type="text" name="color"
                                                                       class="form-control w-auto d-inline-block"
                                                                       placeholder="رنگ">
                                                            </div>
                                                            <div>
                                                                <label>
                                                                    جنس:
                                                                </label>
                                                                <input v-model="myform.cont2" type="text" name="type"
                                                                       class="form-control w-auto d-inline-block"
                                                                       placeholder="جنس">
                                                            </div>

                                                        </div>

                                                        <div class="col-6">
                                                            <div>
                                                                <label>
                                                                    تعداد:
                                                                </label>
                                                                <input v-model="myform.cont2" type="text" name="count"
                                                                       class="form-control w-auto d-inline-block"
                                                                       placeholder="تعداد">
                                                            </div>
                                                            <div>
                                                                <label>
                                                                    سایز:
                                                                </label>
                                                                <input v-model="myform.cont2" type="text" name="size"
                                                                       class="form-control w-auto d-inline-block"
                                                                       placeholder="سایز">
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                        لغو
                                                    </button>
                                                    <button type="button" class="btn btn-primary">تائید</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                                <td class="wid-7 pading_y">
                                    <input id="count1" v-model="myform.amount" type="number"
                                           name="counter"
                                           class="form-control"
                                           min="0"
                                           max="20"
                                           placeholder="تعداد" data-toggle="tooltip" data-placement="top"
                                           title=" تعداد مجاز: 2" @click="tooltip">
                                </td>
                                <td class="wid-15 pading_y">

                                    <div> <multiselect v-model="myform.warehouses_id" :options="warehouse_array.map(type => type.id)" :custom-label="opt => warehouse_array.find(x => x.id == opt).name" :showLabels="false" placeholder="نام کالا"></multiselect></div>

                                </td>
                                <td class="wid-8 pading_y">

                                    <textarea v-model="myform.location" type="text" class="form-control" placeholder="محل مصرف"></textarea>
                                </td>
                                <td class="wid-7 py-auto">

                                    <div class="text-right">
                                        <input type="radio" id="noitem" v-model="myform.worn" :value="false">
                                        <label for="noitem">ندارد</label>
                                    </div>
                                    <div class="text-right">
                                        <input type="radio" id="okitem" v-model="myform.worn" :value="true">
                                        <label for="okitem">دارد</label>
                                    </div>

                                </td>
                                <td class="wid-7 pading_y px-0">
                                    <input v-if="myform.worn" v-model="myform.worn_amount" type="number" name="counter2"
                                           class="form-control"
                                           min="0"
                                           max="20"
                                           placeholder="تعداد">
                                    <input v-if="myform.worn==false" type="number"
                                           name="counter2"
                                           class="form-control notactive-lable"
                                           placeholder="تعداد" readonly>
                                </td>
                                <td class="wid-7 py-auto">
                                    <div class="text-right">
                                        <input type="radio" id="no-attachment" v-model="myform.file_flag"
                                               :value="false">
                                        <label for="no-attachment">ندارد</label>
                                    </div>
                                    <div class="text-right">
                                        <input type="radio" id="attachment" v-model="myform.file_flag" :value="true">
                                        <label for="attachment">دارد</label>
                                    </div>
                                </td>

                                <td class="wid-12 pading_y">
                                    <div class="form-group m-0" id="file-group">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#modal_file" @click="my_index=index" :disabled="!myform.file_flag">فایل پیوست
                                        </button>
                                    </div>
                                </td>


                                <td class="wid-3 pading_y2">
                                    <i class="fas fa-trash-alt minus" @click="deleteRow(index)"></i>
                                </td>
                            </tr>
                        </div>
                        </tbody>

                    </table>
                </div>
                <!--                                   mobile modal-->
                <!--                <div id="screen_mobile" class="height-80">-->
                <!--                    <div class="table text-center height-95">-->
                <!--                        <table id="table-request-mobile" class="table table-bordered border-0 height-100">-->
                <!--                            <thead>-->
                <!--                            <tr>-->
                <!--                                <th colspan="3">درخواست کالا از انبار</th>-->

                <!--                            </tr>-->
                <!--                            <tr>-->
                <!--                                <th colspan="2">-->
                <!--                                    <div>-->
                <!--                                        <span style="font-size: 13px">-->
                <!--                                            تاریخ :-->
                <!--                                        </span>-->
                <!--                                        <span style="font-size: 14px">-->
                <!--                                            1400/04/24-->
                <!--                                        </span>-->
                <!--                                    </div>-->
                <!--                                </th>-->
                <!--                                <th colspan="2">-->
                <!--                                    <div>-->
                <!--                                        <span style="font-size: 13px">-->
                <!--                                            شماره درخواست:-->
                <!--                                        </span>-->
                <!--                                        <span style="font-size: 14px">-->
                <!--                                            123456-->
                <!--                                        </span>-->
                <!--                                    </div>-->

                <!--                                </th>-->
                <!--                            </tr>-->
                <!--                            <tr>-->
                <!--                                <td>-->
                <!--                                    <h5 style="font-size: 16px">رامین اقتداری</h5>-->
                <!--                                </td>-->
                <!--                                <td>-->
                <!--                                    <h5 style="font-size: 16px">4847</h5>-->
                <!--                                </td>-->
                <!--                                <td>-->
                <!--                                    <h5 style="font-size: 16px">-->
                <!--                                        واحد برنامه نویسی-->
                <!--                                    </h5>-->
                <!--                                </td>-->
                <!--                            </tr>-->

                <!--                            </thead>-->
                <!--                            <tbody>-->
                <!--                            <div v-for='(myform, index) in myrequest' :key="index">-->

                <!--                                <tr>-->
                <!--                                    <th class="wid-30">نام کالا</th>-->
                <!--                                    <td class="wid-70">-->
                <!--                                        <Select2 v-model="myform.kala" :options="option_kala"-->
                <!--                                                 placeholder="نام کالا را انتخاب کنید"/>-->
                <!--                                    </td>-->
                <!--                                </tr>-->
                <!--                                <tr>-->
                <!--                                    <th>مشخصات فنی</th>-->
                <!--                                    <td><input type="text" name="config" v-model="myform.config"-->
                <!--                                               class="form-control"-->
                <!--                                               placeholder="مشخصات فنی">-->
                <!--                                    </td>-->
                <!--                                </tr>-->
                <!--                                <tr>-->
                <!--                                    <th>مقدار درخواستی</th>-->
                <!--                                    <td>-->
                <!--                                        <input v-model="myform.cont1" type="number" name="counter"-->
                <!--                                               class="form-control"-->
                <!--                                               placeholder="تعداد">-->
                <!--                                    </td>-->
                <!--                                </tr>-->
                <!--                                <tr>-->
                <!--                                    <th>نام انبار</th>-->
                <!--                                    <td>-->
                <!--                                        <Select2 v-model="myform.anbar" :options="option_anbar"-->
                <!--                                                 placeholder="نام انبار را انتخاب کنید"/>-->
                <!--                                    </td>-->
                <!--                                </tr>-->
                <!--                                <tr>-->
                <!--                                    <th>محل مصرف</th>-->
                <!--                                    <td>-->
                <!--                                        <input v-model="myform.masraf" type="text" name="masraf"-->
                <!--                                               class="form-control"-->
                <!--                                               placeholder="محل مصرف">-->
                <!--                                    </td>-->
                <!--                                </tr>-->
                <!--                                <tr>-->
                <!--                                    <th>وضعیت داغی</th>-->
                <!--                                    <td class="text-right">-->

                <!--                                        <div class="inline">-->
                <!--                                            <input v-model="myform.status" type="radio" id="noitem"-->
                <!--                                                   :value="false">-->
                <!--                                            <label for="noitem">ندارد</label>-->
                <!--                                        </div>-->
                <!--                                        <div class=" inline">-->
                <!--                                            <input v-model="myform.status" type="radio" id="okitem" :value="true">-->
                <!--                                            <label for="okitem">دارد</label>-->
                <!--                                        </div>-->

                <!--                                    </td>-->
                <!--                                </tr>-->
                <!--                                <tr>-->
                <!--                                    <th>تعداد داغی</th>-->
                <!--                                    <td>-->
                <!--                                        <input v-if="myform.status" v-model="myform.cont2" type="number" name="counter2"-->
                <!--                                               class="form-control"-->
                <!--                                               placeholder="تعداد">-->
                <!--                                        <input v-if="myform.status==false" v-model="myform.cont2" type="number"-->
                <!--                                               name="counter2"-->
                <!--                                               class="form-control"-->
                <!--                                               placeholder="تعداد" readonly>-->
                <!--                                    </td>-->
                <!--                                </tr>-->
                <!--                                <tr>-->
                <!--                                    <th>مدرک پیوست</th>-->
                <!--                                    <td class="text-right">-->
                <!--                                        <div class="inline">-->
                <!--                                            <input type="radio" id="no-attachment" v-model="myform.file" value="0">-->
                <!--                                            <label for="no-attachment">ندارد</label>-->
                <!--                                        </div>-->
                <!--                                        <div class="inline">-->
                <!--                                            <input type="radio" id="attachment" v-model="myform.file" value="1">-->
                <!--                                            <label for="attachment">دارد</label>-->
                <!--                                        </div>-->
                <!--                                    </td>-->
                <!--                                </tr>-->
                <!--                                <tr>-->
                <!--                                    <th>بارگذاری فایل</th>-->
                <!--                                    <td>-->
                <!--                                        <div class="form-group m-0" id="file-group">-->
                <!--                                            <input type="file" name="file" id="file" class="inputfile">-->
                <!--                                            <label v-if="myform.file == false" id="lable-attach"-->
                <!--                                                   class="m-0 notactive-lable"-->
                <!--                                                   for="file">فایل خود را-->
                <!--                                                انتخاب کنید</label>-->
                <!--                                            <label v-if="myform.file == true" id="lable-attach1"-->
                <!--                                                   class="m-0 active-lable"-->
                <!--                                                   for="file">فایل خود را-->
                <!--                                                انتخاب کنید</label>-->
                <!--                                        </div>-->
                <!--                                    </td>-->
                <!--                                </tr>-->
                <!--                                <tr>-->

                <!--                                    <td colspan="2">-->
                <!--                                        <div><i class="fas fa-minus minus" @click="deleteRow(index)"></i></div>-->
                <!--                                    </td>-->
                <!--                                </tr>-->
                <!--                                <tr>-->
                <!--                                    <div class="endrow">-->

                <!--                                    </div>-->
                <!--                                </tr>-->

                <!--                            </div>-->

                <!--                            </tbody>-->

                <!--                        </table>-->
                <!--                    </div>-->
                <!--                    <div class="d-flex">-->
                <!--                        <i style="background-color: #34ce57" id="addrow" class="fa fa-plus add "-->
                <!--                           @click="addRow"> </i>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                          end mobile modal-->

                <div class="col text-left">
                    <button type="button" class="btn btn-primary submit" @click="sendRequest">ارسال</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import Select2 from 'v-select2-component';
import Multiselect from 'vue-multiselect';
import Swal from "sweetalert2";


export default {
    name: "request",
    data() {
        return {
            file_array:[{files:[]}],
            file:null,
            name_file:'',
            file_description:'',
            file_title:'',
            my_index: 0,
            myValue: '',
            option_kala: [{id: 1, text: "کالا 1"}, {id: 2, text: "کالا 2"}, {id: 3, text: "کالا 3"}],
            option_kala1: [{id: 1, name: "کالا 1"}, {id: 2, name: "کالا 2"}, {id: 3, name: "کالا 3"}],
            option_anbar: [{id: 1, text: "انبار شیمیایی"}, {id: 2, text: "انبار مرکزی"}, {
                id: 3,
                text: "انبار مصرفی هبلکس"
            }],
            allRequests: [],
            requestDetails: [{
                product_id: null,
                amount: null,
                location: '',
                worn: false,
                worn_amount: null,
                file_flag: false,
                file: '',
                name_file: '',
                file_id:[],
                warehouses_id:''
            }],
            request: {
                descriptions: null
            },
            date:'',
            products_array:[],
            warehouse_array:[]
        }
    },
    components: {Select2, Multiselect},

    methods: {

        addRow: function () {
            this.requestDetails.push({
                product_id: null,
                amount: null,
                location: '',
                worn: false,
                worn_amount: null,
                file_flag: false,
                file: '',
                name_file: '',
                file_id:[],
                warehouses_id:''
            })
            this.file_array.push({files:[]})
        },
        deleteRow(index) {

            if (this.requestDetails.length <= 1) {
                alert("تعداد سطر نمی تواند خالی باشد")
            } else {
                this.requestDetails.splice(index, 1);
                this.file_array.splice(index,1)
            }
        },
        formSubmit(e) {

            e.preventDefault();
            let currentObj = this;
            // this.loader = true;
            let formData = new FormData();
            // formData.append('request', this.request);
            // formData.append('file',this.file);
            formData.append('file', this.file);
            formData.append('description', this.file_description);
            formData.append('name', this.file_title);
            formData.append('filesCategory_id', 1);

            axios.post('api/file/storeInStorageAndTable', formData)
                .then((response) => {
                    $("#add_file .close").click();
                    Swal.fire({
                        heightAuto: false,
                        position: 'center',
                        icon: 'success',
                        title: 'فایل با موفقیت بارگذاری شد',
                        showConfirmButton: false,
                        timer: 2000
                    })
                    this.file_array[this.my_index].files.push({name:this.file_title,description:this.file_description})
                    this.requestDetails[this.my_index].file_id.push(response.data.data.id)
                    this.cleanForm()
                }).catch(error => {
                if (error.response.status == '406') {
                    Swal.fire({
                        icon: 'error',
                        title: error.response.message,
                        text: error.response.data.message,
                    })
                    // this.$data.loader = false

                }
                if (error.response.status == '400') {
                    // this.$data.loader = false

                    Swal.fire({
                        icon: 'error',
                        title: error.response.message,
                        text: error.response.data.file[0],
                    })


                }
                currentObj.output = error;


            });
        },
        getAllRequests() {
            axios.get('api/requests/all').then(
                (response) => {
                    console.log(response.data);
                    if (response.data.success) {
                        this.allRequests = response.data;
                        console.log(this.allRequests)
                    }
                })
        },
        tooltip() {
            $('#count1').tooltip({'trigger': 'focus', 'title': 'Password tooltip'})
        },
        onFileChange(e) {
            this.file = e.target.files[0];
            this.name_file = e.target.files[0].name;
        },
        cleanForm(){
            this.file=null,
                this.name_file=null,
                this.file_title=null,
                this.file_description=null
        },
        sendRequest()
        {
            axios.post('api/request/RequestDetails/store',{
                request:this.request,
                requestDetails:this.requestDetails
            })
                .then((response) => {
                    Swal.fire({
                        heightAuto: false,
                        position: 'center',
                        icon: 'success',
                        title: 'درخواست با موفقیت ارسال شد',
                        showConfirmButton: false,
                        timer: 2000
                    })
                }).catch(error => {
                if (error.response.status == '406') {
                    Swal.fire({
                        icon: 'error',
                        title: error.response.message,
                        text: error.response.data.message,
                    })
                    // this.$data.loader = false

                }
                if (error.response.status == '400') {
                    // this.$data.loader = false

                    Swal.fire({
                        icon: 'error',
                        title: error.response.message,
                        text: error.response.data.file[0],
                    })


                }
            });
        },
        loadProducts(){
            axios.get('api/products/all').then(({data}) => (this.products_array = data.data))
        },
        loadWarehouse(){
            axios.get('api/warehouse/all').then(({data}) => (this.warehouse_array = data.data))
        },
        loadDate(){
            axios.post('api/getCurrentDate').then(({data}) => (this.date = data.data))
        }
    },
    created() {
        this.loadProducts()
        this.loadWarehouse()
        this.loadDate()
    },

}
</script>
<style>
.multiselect__content-wrapper {
    /*display: contents!important;*/
    /*position: fixed!important;*/
}

</style>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
