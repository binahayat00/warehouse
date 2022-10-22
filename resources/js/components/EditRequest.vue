<template>
    <div class="p-md-5 pt-4 height-100 w-100">
        <div class="container-fluid height-100">

            <!--            ///////////////////////-->

            <div class="modal fade" id="modal_file" tabindex="-1" role="dialog" aria-labelledby="modal_file"
                 aria-hidden="true">
                <div class="modal-dialog d-flex" role="document">
                    <div class="modal-content w-auto">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">لیست فایل ها</h5>
                        </div>
                        <div class="modal-body">

                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_file"
                                    @click="cleanForm">
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
                                        <th>
                                            پیش نمایش
                                        </th>
                                        <th>
                                            حذف
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-if="file_array[my_index].files!=null"
                                        v-for="(file,index) in file_array[my_index].files" :key="index">
                                        <td>
                                            {{ index + 1 }}
                                        </td>
                                        <td>
                                            {{ file.name }}
                                        </td>
                                        <td>
                                            {{ file.description }}
                                        </td>
                                        <td>
                                            <div class="preview">

                                                <a :href="'/file-show?fileId='+ file.id" target="_blank">
                                                    <img class="size_img" :src="'/file-show?fileId='+ file.id"
                                                         alt="باز کردن"/>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <i class="fas fa-trash-alt minus" @click="deleteImg(index,my_index)"></i>
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
                <div class="modal-dialog " role="document">
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
                                <input v-model="file_title" type="text" class="form-control" maxlength="30">
                            </div>

                            <div class="col">
                                <label>توضیحات:</label>
                                <input v-model="file_description" type="text" class="form-control" maxlength="60">
                            </div>
                        </div>
                        <div class="preview">
                            <img id="img_preview" v-if="url" :src="url" onclick="this.requestFullscreen()"/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">لغو</button>
                            <button type="button" class="btn btn-success btb_submit" @click="formSubmit"
                                    enctype="multipart/form-data">ارسال
                            </button>
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
                                        {{ date }}
                                    </h5>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td class="mx-0">
                                <h6>{{ user.first_name }} {{ user.last_name }}</h6>

                            </td>
                            <td class="mx-0">
                                <h6>{{ user.personnel_code }}</h6>
                            </td>
                            <td class="mx-0">
                                <h6 v-if="edit_request_array!=''">{{edit_request_array[0].unit.name }}</h6>
                            </td>
                            <td class="p-0 mx-0" width="20%">

                                <div class="row">
                                    <div class="col-3 d-flex justify-content-center">
                                        <h6 class="my-auto">
                                            نام انبار:
                                        </h6>
                                    </div>
                                    <div v-if="warehouses!=null" class="col-9">
                                        {{ warehouses.name }}
                                    </div>`


                                </div>
                            </td>
                            <td class="p-0 mx-0" width="30%">

                                <div class="row">
                                    <div class="col-3 d-flex justify-content-center">
                                        <h6 class="my-auto">
                                            توضیحات:
                                        </h6>
                                    </div>
                                    <div class="col-9 d-flex justify-content-center">
                                        <textarea v-model="request.descriptions"
                                                  class="form-control " maxlength="120"></textarea>
                                    </div>


                                </div>
                            </td>
                        </tr>
                        </thead>
                    </table>
                    <div class="my-height">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="text-nowrap">
                                <th>ردیف</th>
                                <th width="18%">شرح کالا</th>
                                <th>مشخصات فنی</th>
                                <th width="2%">مقدار درخواستی</th>
                                <th width="14%">مرکز هزینه</th>
                                <th width="20px">وضعیت داغی</th>
                                <th width="2%">تعداد داغی</th>
                                <th>بارگذاری فایل</th>
                                <th>توضیحات</th>
                                <th><i id="addrow" class="fa fa-plus add " @click="addRow"> </i></th>
                            </tr>
                            </thead>
                            <tbody id="table-body-request">

                            <tr v-for='(myform, index) in requestDetails' :key="index" class="align-items-center">
                                <td class="py-0">{{ index + 1 }}</td>
                                <td class="py-0">
                                    <div class="d-flex justify-content-center">

                                        <multiselect :id="'product'+index" v-model="myform.product_id"
                                                     :options="products_array"
                                                     :custom-label="nameWithLang"
                                                     :showLabels="false" placeholder="نام کالا"
                                                     @input="send_itemDataId(myform.product_id,index)"></multiselect>
                                        <div :class="'circle'+index">
                                            <div :class="'check'+index"></div>
                                        </div>
                                    </div>

                                </td>
                                <td class="py-0">
                                    <button type="button" class="btn btn-primary btn_config" data-bs-toggle="modal"
                                            :disabled="true"
                                            data-bs-target="#modal-config" @click="getApiAttribute(myform.product_id)">
                                        به زودی در شناسنامه کالا
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

                                                            <div v-if="attribute_product" class="mb-2">
                                                           <span v-if="attribute_product.width">
                                                            {{ attribute_product.width.persian_name }}
                                                            </span>
                                                                <input type="text" class="form-control d-inline-block"
                                                                       :value="attribute_product.width.value">
                                                            </div>


                                                            <div v-if="attribute_product" class="mb-2">
                                                                <label v-if="attribute_product.itemDataId">
                                                                    {{ attribute_product.itemDataId.persian_name }}
                                                                </label>
                                                                <input type="text" class="form-control d-inline-block"
                                                                       :value="attribute_product.itemDataId.value">
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
                                <td class="py-0">
                                    <input :id="'count'+index" v-model="myform.amount" type="number"
                                           name="counter"
                                           class="form-control"
                                           placeholder="تعداد" data-toggle="tooltip" data-placement="top"
                                           @change="check_amount(myform.amount,myform.amount_rayvarz,index)"
                                           :title="'تعدادمجاز: '+myform.amount_rayvarz" @click="tooltip" required>
                                </td>

                                <td class="py-0">
                                    <multiselect v-if="center" :id="'center'+index" v-model="myform.center_id"
                                                 :options="center"
                                                 :custom-label="nameWithcode"
                                                 :showLabels="false" placeholder="مرکز هزینه"></multiselect>
                                </td>
                                <td class=" py-2 ">
                                    <div class="checkbox-custom">
                                        <label class="d-flex justify-content-start align-items-center">
                                            <input
                                                v-model="myform.worn"
                                                type="radio"
                                                class="option-not ml-2" :value="false">
                                            <b></b>
                                            <small>ندارد</small>
                                        </label>
                                    </div>
                                    <div class="checkbox-custom">
                                        <label class="d-flex justify-content-start align-items-center">
                                            <input
                                                v-model="myform.worn"
                                                type="radio"
                                                class="option-input ml-2" :value="true">
                                            <b></b>
                                            <small>دارد</small>
                                        </label>
                                    </div>


                                </td>
                                <td class="px-0 py-0">
                                    <input v-if="myform.worn" v-model="myform.worn_amount" type="number" name="counter2"
                                           class="form-control"
                                           @change="() => { if(myform.worn_amount > 100) { myform.worn_amount = 100 } else if(myform.worn_amount <1) {myform.worn_amount = 1}}"
                                           placeholder="تعداد">
                                    <input v-if="myform.worn==false" type="number"
                                           name="counter2"
                                           class="form-control notactive-lable"
                                           placeholder="تعداد" readonly>
                                </td>

                                <td class="py-0">
                                    <div class="form-group m-0" id="file-group">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#modal_file" @click="my_index=index">فایل پیوست
                                        </button>
                                    </div>
                                </td>
                                <td>
                                <textarea v-model="myform.descriptions" class="form-control"
                                          style="height: 38px"></textarea>
                                </td>

                                <td class="py-0">
                                    <i class="fas fa-trash-alt minus" @click="deleteRow(index)"></i>
                                </td>
                            </tr>

                            </tbody>

                        </table>
                    </div>

                </div>
                <!--                                   mobile modal-->


                <div id="screen_mobile" class="height-90">
                    <div class="table text-center height-95">
                        <table id="table-request-mobile" class="table table-bordered border-0 height-100">
                            <thead>
                            <tr>
                                <th colspan="3">درخواست کالا از انبار</th>

                            </tr>
                            <tr>
                                <td>
                                    <h5 style="font-size: 16px">{{ user.first_name }} {{ user.last_name }}</h5>
                                </td>
                                <td>
                                    <h5 style="font-size: 16px">{{ user.personnel_code }}</h5>
                                </td>
                                <td>
                                    <h5 v-if="edit_request_array!=''" style="font-size: 16px">
                                        {{edit_request_array[0].unit.name }}
                                    </h5>
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">
                                    <div>
                                                        <span style="font-size: 13px">
                                                            تاریخ :
                                                        </span>
                                        <span style="font-size: 14px">
                                                            {{ date }}
                                                        </span>
                                    </div>

                                </th>
                                <th>
                                    <!--                                    <button type="button" class="btn btn-sm btn-info w-75" @click="addRow">+</button>-->

                                    <div class="row">
                                        <div class="col-3 d-flex justify-content-center">
                                            <h6 class="my-auto">
                                                انبار:
                                            </h6>
                                        </div>
                                        <div v-if="warehouses!=null" class="col-9 p-1">
                                            <h6>
                                                {{ warehouses.name }}
                                            </h6>

                                        </div>

                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="3" class="py-0">
                                    <div class="row">
                                        <div class="col-3 d-flex justify-content-center">
                                            <h6 class="my-auto">
                                                توضیحات:
                                            </h6>
                                        </div>
                                        <div class="col-9 d-flex justify-content-center">
                                        <textarea v-model="request.descriptions"
                                                  class="form-control h-75 my-auto" maxlength="120"></textarea>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="3" class="py-0">
                                    <div class="row">
                                        <div class="col-6 d-flex justify-content-center">
                                            <h6 class="my-auto">
                                                افزودن سطر جدید:
                                            </h6>
                                        </div>
                                        <div class="col-6 d-flex justify-content-center">
                                            <button type="button" class="btn btn-sm btn-info w-75" @click="addRow">+
                                            </button>
                                        </div>
                                    </div>
                                </th>
                            </tr>

                            </thead>
                            <tbody>
                            <div v-for="(myform, index) in requestDetails" :key="index">

                                <tr>
                                    <th class="wid-30">نام کالا</th>
                                    <td class="wid-70">
                                        <div class="d-flex justify-content-center">

                                            <multiselect :id="'product'+index" v-model="myform.product_id"
                                                         :options="products_array"
                                                         :custom-label="nameWithLang"
                                                         :showLabels="false" placeholder="نام کالا"
                                                         @input="send_itemDataId(myform.product_id,index)"></multiselect>
                                            <div :class="'circle'+index">
                                                <div :class="'check'+index"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>مشخصات فنی</th>
                                    <td>
                                        <button type="button" class="btn btn-primary btn_config" data-bs-toggle="modal"
                                                :disabled="true"
                                                data-bs-target="#modal-config"
                                                @click="getApiAttribute(myform.product_id)">
                                            به زودی در شناسنامه کالا
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <th>مقدار درخواستی</th>
                                    <td>
                                        <input :id="'count'+index" v-model="myform.amount" type="number"
                                               name="counter"
                                               class="form-control"
                                               placeholder="تعداد" data-toggle="tooltip" data-placement="top"
                                               @change="check_amount(myform.amount,myform.amount_rayvarz,index)"
                                               :title="'تعدادمجاز: '+myform.amount_rayvarz" @click="tooltip" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th>مرکز هزینه</th>
                                    <td>
                                        <multiselect v-if="center" :id="'center'+index" v-model="myform.center_id"
                                                     :options="center"
                                                     :custom-label="nameWithcode"
                                                     :showLabels="false" placeholder="مرکز هزینه"></multiselect>
                                    </td>
                                </tr>
                                <tr>
                                    <th>وضعیت داغی</th>
                                    <td class="text-right">

                                        <div class="inline">
                                            <input type="radio" id="noitem" v-model="myform.worn" :value="false">
                                            <label for="noitem">ندارد</label>
                                        </div>
                                        <div class=" inline">
                                            <input type="radio" id="okitem" v-model="myform.worn" :value="true">
                                            <label for="okitem">دارد</label>
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <th>تعداد داغی</th>
                                    <td>
                                        <input v-if="myform.worn" v-model="myform.worn_amount" type="number"
                                               name="counter2"
                                               class="form-control"
                                               @change="() => { if(myform.worn_amount > 100) { myform.worn_amount = 100 } else if(myform.worn_amount <1) {myform.worn_amount = 1}}"
                                               placeholder="تعداد">
                                        <input v-if="myform.worn==false" type="number"
                                               name="counter2"
                                               class="form-control notactive-lable"
                                               placeholder="تعداد" readonly>
                                    </td>
                                </tr>

                                <tr>
                                    <th>بارگذاری فایل</th>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#modal_file" @click="my_index=index">فایل پیوست
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        توضیحات
                                    </td>
                                    <td>
                                <textarea v-model="myform.descriptions" class="form-control"
                                          style="height: 38px"></textarea>
                                    </td>
                                </tr>
                                <tr>

                                    <td colspan="2">
                                        <div><i class="fas fa-minus minus" @click="deleteRow(index)"></i></div>
                                    </td>
                                </tr>
                                <tr>
                                    <div class="endrow">

                                    </div>
                                </tr>

                            </div>

                            </tbody>

                        </table>
                    </div>

                </div>


                <!--                          end mobile modal-->

                <div class="col text-left">
                    <button type="button" class="btn btn-success submit" @click="checkValidation">ثبت ویرایش</button>
                </div>

            </form>

        </div>
    </div>
</template>

<script>

import Multiselect from 'vue-multiselect';
import Swal from "sweetalert2";
import moment from "moment-jalaali";

export default {
    name: "request",
    data() {
        return {
            file_array: [{files: []}],
            file: null,
            name_file: '',
            file_description: '',
            file_title: '',
            my_index: 0,
            myValue: '',
            allRequests: [],
            requestDetails: [
                {
                product_id: null,
                amount: '',
                location: '',
                center_id: '',
                worn: false,
                worn_amount: null,
                file: '',
                name_file: '',
                file_id: [],
                descriptions: null,
                amount_rayvarz: null
            }
            ],
            request: {
                descriptions: null,
                warehouses_id: null
            },
            date: '',
            products_array: [],
            user: '',
            url: null,
            errors: {product: '', amount: ''},

            locations: null,
            center: null,
            show_form: null,
            attribute_product: null,
            loading: false,
            warehouses:null,
            edit_request_array:[],
            array_load:[]
        }
    },
    components: {Multiselect},

    methods: {
        nameWithLang({name, itemDataId}) {
            return `${name} - ${itemDataId}`
        },
        nameWithcode({name, rayvarz_id}) {
            return `${name} - ${rayvarz_id}`
        },
        addRow: function () {

            this.requestDetails.push({
                product_id: null,
                amount: '',
                location: '',
                center_id: '',
                worn: false,
                worn_amount: null,
                file: '',
                name_file: '',
                file_id: [],
                warehouses_id: '',
                descriptions: null,
                amount_rayvarz: null
            })
            this.file_array.push({files: []})
            var y = $("#table-request-mobile tbody").scrollTop();
            $('#table-request-mobile tbody').animate({scrollTop: 4000 + y}, 1500);
        },
        deleteRow(index) {

            if (this.requestDetails.length <= 1) {
                alert("تعداد سطر نمی تواند خالی باشد")
            } else {
                Swal.fire({
                    position: 'center',
                    heightAuto: false,
                    icon: 'question',
                    title: "آیا ردیف حذف شود؟",
                    showConfirmButton: true,
                    showCancelButton: true,
                    confirmButtonText: "بله",
                    cancelButtonText: "انصراف",
                    confirmButtonColor: "#d33"

                }).then((response) => {
                    if (response.isConfirmed) {
                        this.requestDetails.splice(index, 1);
                        this.file_array.splice(index, 1)
                    }

                })

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

                    this.file_array[this.my_index].files.push({
                        name: this.file_title,
                        description: this.file_description,
                        url: this.url,
                        file_id: response.data.data.id
                    })
                    this.requestDetails[this.my_index].file_id.push(response.data.data.id)
                    this.cleanForm()
                }).catch(error => {
                if (!error.response.success) {
                    Swal.fire({
                        icon: 'error',
                        title: error.response.message,
                        text: Object.values(error.response.data.message),
                    })
                    // this.$data.loader = false

                }
                if (error.response.success) {
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
            this.url = URL.createObjectURL(this.file);
        },
        cleanForm() {
            this.file = null,
                this.name_file = '',
                this.file_title = '',
                this.file_description = '',
                this.url = null
            $("#file").val('')
        },
        checkValidation() {
            this.errors = {product: '', amount: ''}
            for (let i = 0; i < this.requestDetails.length; i++) {
                $("#count" + i).addClass("border");
                $("#product" + i).parent().addClass("border");
                if (this.requestDetails[i].product_id == null) {
                    $("#product" + i).parent().removeClass("border");
                    this.errors.product = "وارد کردن نام کالا اجباری است"
                    $("#product" + i).parent().css("border", "2px solid red");
                }
                if (this.requestDetails[i].amount == '') {
                    $("#count" + i).removeClass("border");
                    this.errors.amount = "وارد کردن تعداد اجباری است"
                    $("#count" + i).css("border", "2px solid red");
                }
            }

            if (this.errors.product != '' || this.errors.amount != '') {
                Swal.fire({
                    icon: 'error',
                    title: this.errors.product + '\n' +
                        this.errors.amount
                })
            } else {
                this.sendRequest()
            }
        },
        sendRequest() {
            for (let i = 0; i < this.requestDetails.length; i++) {
                this.requestDetails[i].product_id = this.requestDetails[i].product_id.id
                this.requestDetails[i].center_id = this.requestDetails[i].center_id.id
            }
            axios.put('api/requestdetails/update', {
                request: this.request,
                requestDetails: this.requestDetails
            })
                .then((response) => {
                    Swal.fire({
                        heightAuto: false,
                        position: 'center',
                        icon: 'success',
                        title: 'درخواست با موفقیت ارسال شد',
                        html: 'کد تحویل شما: ' + response.data.data.requestData.validated_code + '<br>' +
                            '<small>دادن این کد به مامور پیک الزامی می باشد</small>'
                        ,
                        showConfirmButton: true,
                    })

                    this.requestDetails = [{
                        product_id: null,
                        amount: '',
                        location: '',
                        center_id: '',
                        worn: false,
                        worn_amount: null,
                        file: '',
                        name_file: '',
                        file_id: [],
                        descriptions: null,
                        amount_rayvarz: null
                    }],

                        this.request = {
                            descriptions: null,
                            warehouses_id: null
                        },
                        this.warehouses = null
                    this.showProducts()
                    $(location).attr('href', '/#/myrequest');

                })
        },
        loadProducts() {
            axios.get('api/products/productsByWarehouseId', {params: {warehouseId: this.warehouses.rayvarz_id}}).then(({data}) => (this.products_array = data.data,this.findDetailsRequest()))
        },
        loadLocation() {
            axios.get('api/center/allActive').then(({data}) => (this.center = data.data));
        },
        loadEdit(){
            axios.get('api/requests/getAllDetailsById',{params:{requestId:this.$route.params.id}}).then(({data}) => (this.edit_request_array = data.data,this.replaceData()));
        },
        replaceData(){
            this.warehouses = this.edit_request_array[0].request_detail[0].warehouse
            this.showProducts()
            this.date= this.convertDate(this.edit_request_array[0].created_at)
            this.user=this.edit_request_array[0].user
            this.request.descriptions=this.edit_request_array[0].descriptions

        },
        findDetailsRequest(){
            this.requestDetails= []
            this.file_array=[]
            for (let i=0;i<this.edit_request_array[0].request_detail.length;i++)
            {
                this.requestDetails.push({
                    product_id: null,
                    amount: this.edit_request_array[0].request_detail[i].amount,
                    location: '',
                    center_id: '',
                    worn: this.checkWorn(i),
                    worn_amount:this.edit_request_array[0].request_detail[i].worn_amount,
                    file: '',
                    name_file: '',
                    file_id: [],
                    descriptions: this.edit_request_array[0].request_detail[i].descriptions,
                    amount_rayvarz: null
                })
                this.file_array.push({files: []})
                this.findDataRequestDetails(this.edit_request_array[0].request_detail[i],i);
            }
            setTimeout(() => {
                this.checkItem();
            }, 1000)

        },
        findDataRequestDetails(details,index){
            for (let i=0;i<this.products_array.length;i++)
            {
                if(this.products_array[i].itemDataId==details.product.itemDataId)
                {
                    this.requestDetails[index].product_id=this.products_array[i]
                    // this.send_itemDataId(this.products_array[i], index)
                    this.array_load.push(this.products_array[i])
                    break
                }
            }

            for (let j=0;j<this.center.length;j++)
            {
                if(this.center[j].id==details.center_id)
                {
                    this.requestDetails[index].center_id=this.center[j]
                    break
                }
            }
            for (let k=0;k<details.file_request_detail.length;k++)
            {
                this.file_array[index].files.push(details.file_request_detail[k].file)
                this.requestDetails[index].file_id.push(details.file_request_detail[k].file_id)
            }


        },
        checkWorn(i){
            if(this.edit_request_array[0].request_detail[i].worn==1)
            {
                return true
            }
            else if(this.edit_request_array[0].request_detail[i].worn==0)
            {
                return false
            }
        },
        convertDate(date) {
            return moment(date).utc("jYYYY-jMM-jDDTHH:mm:ss.SSZ").format("jYYYY-jMM-jDD HH:mm:ss")
        },
        deleteImg(index, file_index) {

            Swal.fire({
                position: 'center',
                heightAuto: false,
                icon: 'question',
                title: "آیا ردیف حذف شود؟",
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonText: "بله",
                cancelButtonText: "انصراف",
                confirmButtonColor: "#d33"

            }).then((response) => {
                if (response.isConfirmed) {
                    axios.delete('api/file/delete/' + this.file_array[file_index].files[index].id)
                        .then((response) => {
                            this.file_array[file_index].files.splice(index, 1);
                            this.requestDetails[this.my_index].id.splice(index, 1);
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: response.data.message,
                                showConfirmButton: false,
                                timer: 2000
                            })
                        })
                        .catch((response) => {
                            alert("حذف با خطا مواجه شد");
                            console.log(response)
                        });
                }

            })
        },
        send_itemDataId(product_obj, index) {
            if (product_obj) {
                this.loading = true;
                $('.circle' + index).removeClass('load-error');
                $('.check' + index).removeClass('error');
                $('.circle' + index).show();
                $('.circle' + index).removeClass('load-complete');
                $('.circle' + index).addClass('circle-loader');
                $('.check' + index).addClass('checkmark');
                $('.check' + index).hide();

                axios.put('api/rayvarz/product/sync', {
                        itemDataId: product_obj.itemDataId
                    }
                ).then((response) => {
                    if (response.data.success) {
                    }
                }).catch(error => {
                    if (!error.response.data.success) {
                        this.loading = false;
                        $('.circle' + index).hide();
                        Swal.fire({
                            heightAuto: false,
                            icon: 'error',
                            title: 'خطا . . .',
                            text: error.response.data.message
                        })
                    }

                })

                axios.get('api/rayvarz/product/amount', {
                        params: {
                            itemDataId: product_obj.itemDataId,
                            warehouseId: this.warehouses.rayvarz_id
                        }

                    }
                ).then((response) => {
                    if (response.data.success) {
                        this.requestDetails[index].amount_rayvarz = response.data.data
                        this.loading = false;
                        $('.circle' + index).addClass('load-complete');
                        $('.check' + index).show();
                        $('.check' + index).addClass('draw');
                    } else {
                        this.loading = false;
                        // $('.circle' + index).hide();
                        $('.circle' + index).removeClass('load-complete');
                        $('.check' + index).removeClass('checkmark');
                        $('.circle' + index).addClass('load-error');
                        $('.check' + index).show();
                        $('.check' + index).removeClass('draw');
                        $('.check' + index).addClass('error');
                        // this.requestDetails[index].product_id = null
                        Swal.fire({
                            heightAuto: false,
                            position: 'center',
                            icon: 'error',
                            title: response.data.message,
                            text: "آیا ادامه می دهید؟",
                            showConfirmButton: true,
                            showCancelButton: true,
                            confirmButtonText: "بله",
                            cancelButtonText: "انصراف",
                            confirmButtonColor: "#51a139"
                        }).then((response) => {
                            if (response.isConfirmed) {
                                this.requestDetails[index].amount_rayvarz = null
                            } else {
                                this.requestDetails[index].product_id = null
                                $('.circle' + index).hide();
                            }

                        })
                    }
                }).catch(error => {

                    if (!error.response.data.success) {
                        this.loading = false;
                        $('.circle' + index).removeClass('load-complete');
                        $('.check' + index).removeClass('checkmark');
                        $('.circle' + index).addClass('load-error');
                        $('.check' + index).show();
                        $('.check' + index).removeClass('draw');
                        $('.check' + index).addClass('error');
                        Swal.fire({
                            heightAuto: false,
                            icon: 'error',
                            title: 'خطا . . .',
                            text: error.response.message
                        })
                    }

                })
            } else {
                $('.circle' + index).hide();
            }

        },
        showProducts() {
            if (this.warehouses) {
                this.request.warehouses_id = this.warehouses.id
                this.loadProducts()
            }

        },
        getApiAttribute(product_id) {
            axios.get('api/products/allRecordsOfProductById', {params: {id: product_id.id}}).then(({data}) => (this.attribute_product = data.data))
        },
        check_amount(val, amount_rayvarz, index) {
            if (this.loading) {
                Swal.fire({
                    heightAuto: false,
                    icon: 'error',
                    title: 'خطا . . .',
                    text: "لطفا تا بررسی موجودی کالا صبر کنید"
                })
            } else {
                if (this.requestDetails[index].product_id) {
                    if (val > amount_rayvarz) {
                        // this.requestDetails[index].amount = ''
                        Swal.fire({
                            heightAuto: false,
                            icon: 'error',
                            title: "مقدار درخواستی بیشتر از موجودی کالا می باشد",
                            text: "آیا ادامه می دهید؟",
                            showConfirmButton: true,
                            showCancelButton: true,
                            confirmButtonText: "بله",
                            cancelButtonText: "انصراف",
                            confirmButtonColor: "#51a139"
                        }).then((response) => {
                            if (response.isConfirmed) {

                            } else {
                                this.requestDetails[index].amount = ''
                            }

                        })
                    } else if (val < 1) {
                        this.requestDetails[index].amount = 1
                    }
                } else {
                    this.requestDetails[index].amount = ''
                    Swal.fire({
                        heightAuto: false,
                        icon: 'error',
                        title: 'خطا . . .',
                        text: "لطفا اول یک کالا انتخاب کنید"
                    })
                }
            }
        },
        checkItem(){
            for (let i=0;i<this.array_load.length;i++)
            {
                this.send_itemDataId(this.array_load[i],i)
            }
        }
    },
    created() {
        this.loadLocation()
        this.loadEdit()
    },

}

</script>
<style scoped>
#store_id .list_warehouse{
    max-height: 70%;
    overflow-y: auto;
}
.btn_warehouse{
    position: absolute;
    top: 85%;
}

.circle-loader {
    border: 4px solid rgba(0, 0, 0, 0.2);
    border-left-color: #5cb85c;
    animation: loader-spin 1.2s infinite linear;
    position: relative;
    display: inline-block;
    vertical-align: top;
    border-radius: 50%;
    width: 42px;
    height: 37px;
}

.load-complete {
    -webkit-animation: none;
    animation: none;
    border-color: #5cb85c;
    transition: border 500ms ease-out;
}

.checkmark {
    display: none;
}

.checkmark.draw:after {
    animation-duration: 800ms;
    animation-timing-function: ease;
    animation-name: checkmark;
    transform: scaleX(-1) rotate(135deg);
}

.checkmark:after {
    opacity: 1;
    height: 25px;
    width: 14px;
    transform-origin: left top;
    border-right: 4px solid #5cb85c;
    border-top: 4px solid #5cb85c;
    content: "";
    /*left: 1.75em;*/
    top: 17px;
    position: absolute;
}

@keyframes loader-spin {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

@keyframes checkmark {
    0% {
        height: 0;
        width: 0;
        opacity: 1;
    }
    20% {
        height: 0px;
        width: 14px;
        opacity: 1;
    }
    40% {
        height: 25px;
        width: 14px;
        opacity: 1;
    }
    100% {
        height: 25px;
        width: 14px;
        opacity: 1;
    }
}

.load-error {
    -webkit-animation: none;
    animation: none;
    border-color: red;
    transition: border 500ms ease-out;
}

.error {
    position: absolute;
    left: 16px;
    top: 1px;

}

.error:before, .error:after {
    position: absolute;
    content: " ";
    height: 27px;
    width: 3px;
    background-color: #f00;
}

.error:before {
    transform: rotate(45deg);
}

.error:after {
    transform: rotate(-45deg);
}

.btn_config {
    font-size: 11px;
    width: 85px;
}

#table-request-mobile tbody th {
    font-size: 14px;
}


ul.ks-cboxtags {
    list-style: none;
    padding: 20px;
}

ul.ks-cboxtags li {
    display: block;
}

ul.ks-cboxtags li label {
    display: inline-block;
    background-color: rgba(255, 255, 255, .9);
    border: 2px solid rgba(139, 139, 139, .3);
    color: #adadad;
    border-radius: 25px;
    white-space: nowrap;
    margin: 3px 0px;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-tap-highlight-color: transparent;
    transition: all .2s;
}

ul.ks-cboxtags li label {
    padding: 8px 12px;
    cursor: pointer;
}

ul.ks-cboxtags li label::before {
    display: inline-block;
    font-style: normal;
    font-variant: normal;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    font-size: 12px;
    padding: 2px 6px 2px 2px;
    content: "\f067";
    transition: transform .3s ease-in-out;
}

ul.ks-cboxtags li input:checked + label::before {
    content: "\f00c";
    transform: rotate(-360deg);
    transition: transform .3s ease-in-out;
}

ul.ks-cboxtags li input:checked + label {
    border: 2px solid #1bdbf8;
    background-color: #12bbd4;
    color: #fff;
    transition: all .2s;
}

ul.ks-cboxtags li input {
    position: absolute;
}

ul.ks-cboxtags li input {
    position: absolute;
    opacity: 0;
}

.save_warehous{
    width: 120px;
}
</style>

