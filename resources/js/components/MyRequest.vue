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
        <!--/////////////////////////////////////////////////////-->
<div>
        <div class="radio">
            <input v-model="searchQuery" label="در حال جریان" type="radio" name="filter" value="1" checked
                   @click="progress">
            <input v-model="searchQuery" label="لغو شده" type="radio" name="filter" value="5" @click="progress">
            <input label="آرشیو" type="radio" name="filter" @click="archive">
        </div>
        <div>
            <h4 class="mb-4 my-font-size">درخواست های من</h4>
        </div>
</div>
        <div class="text-center scroll">
            <table id="table_status" class="table table-bordered style_table">
                <thead>
                <tr>

                    <th>شماره درخواست</th>
                    <th>واحد درخواست کننده</th>
                    <th>تاریخ</th>
                    <th>وضعیت تائید</th>
                    <th>مرحله درخواست</th>
                    <th>توضیحات</th>
                    <th>کد تحویل</th>
                    <th>مشاهده جزئیات</th>
                </tr>
                </thead>
                <tbody id="tbody_status">
                <tr v-for="(request,index) in resultQuery" :key="index">

                    <td label="شماره درخواست">{{ request.request_number }}</td>
                    <td label="واحد درخواست کننده">{{ request.unit.name }}</td>
                    <td label="تاریخ">
                        {{convertDate(request.created_at)}}
                    </td>

                    <td label="وضعیت تائید">
                        <i v-if="request.confirmed==null" class="badge badge-warning">در انتظار تائید</i>
                        <i v-if="request.confirmed==0" class="badge badge-danger">عدم تائید</i>
                        <i v-if="request.confirmed==1" class="badge badge-success">تائید</i>
                    </td>
                    <td label="مرحله درخواست">
                        <i class="badge badge-info"
                           :class="{ 'badge-danger': request.status.id==5 , 'badge-warning': request.status.id==1}">{{ request.status.name }}</i>
                    </td>
                    <td label="توضیحات">
                        <textarea class="form-control" disabled>{{request.descriptions}}</textarea>
                    </td>
                    <td label="کد تحویل">
                        {{ request.validated_code }}
                    </td>
                    <td label="مشاهده جزئیاتس">

                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal-details" @click="request_info(request.id)"> نمایش جزئیات
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
import moment from 'moment-jalaali'
export default {
    name: "myrequest",
    data() {
        return {
            request_all: '',
            details_confirm: [],
            request_id: 0,
            details_id_array: [],
            file_array: null,
            searchQuery: 1,
        }
    }, methods: {
        // loadRequest() {
        //     axios.get('api/requests/user').then(({data}) => (this.request_all = data.data))
        // },
        request_info(request_id) {
            for (let i = 0; i < this.request_all.length; i++) {
                if (this.request_all[i].id == request_id) {
                    this.request_id = i;
                }
            }
        },
        showFile(details) {
            this.file_array = details.file_request_detail;
        },
        downloadFile(file_id) {
            axios.get('/file-download', {
                params: {'fileId': file_id}
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
        disable_btn(details) {
            if (details.file_request_detail != '') {
                return false
            } else {
                return true
            }
        },
        getLoadConfirm(detailsID) {
            axios.get('api/requestDetailsConfirms/confirmsOfRequestDetail', {
                params: {
                    'requests_detail_id': detailsID,
                }
            }).then(({data}) => (this.details_confirm = data.data));

        },
        progress() {
            axios.get('api/requests/notArchivedRequestsOfUserId').then(({data}) => (this.request_all = data.data.data))
        },
        archive() {
            axios.get('api/requests/archivedRequestsOfUserId').then(({data}) => (this.request_all = data.data))
        },
        convertDate(date){
        return  moment(date).utc("jYYYY-jMM-jDDTHH:mm:ss.SSZ").format("jYYYY-jMM-jDD HH:mm:ss")
        }
    }, components: {
        Multiselect
    },
    computed: {
        resultQuery() {
            if (this.request_all) {
                return this.request_all.filter(item => {
                    const filter = this.searchQuery;
                    const progress = String(item.status.id).includes(1) || String(item.status.id).includes(2) || String(item.status.id).includes(3) || String(item.status.id).includes(4);
                    const cancel = String(item.status.id).includes(filter);
                    if (this.searchQuery == 1) {
                        return progress
                    }
                    else if (this.searchQuery == 5)
                    {
                        return cancel
                    }
                });

            }

        }
    },
    created() {
        this.progress()
    }

}
$(window).on('popstate', function() {
    $('.modal').click();
});
</script>


<style scoped>
.container {
    display: flex;
    flex-direction: column;
    align-items: center;
}

#table_status {
    font-size: 13px;
}

.badge {
    font-weight: 400;
    font-size: 14px;
}

.fa-info-circle {
    color: #69a3c5;
}

.fa-info-circle:hover {
    color: #007cc5;
}

.scroll {
    height: 90%;
    overflow-y: scroll;
}

.radio {
    float: left;
    background: #454857;
    padding: 4px;
    border-radius: 3px;
    box-shadow: inset 0 0 0 3px rgba(35, 33, 45, 0.3),
    0 0 0 3px rgba(185, 185, 185, 0.3);
    position: relative;
}

.radio input {
    width: auto;
    height: 100%;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    outline: none;
    cursor: pointer;
    border-radius: 2px;
    padding: 4px 8px;
    background: #454857;
    color: #bdbdbdbd;
    font-size: 14px;
    transition: all 100ms linear;
}

.radio input:checked {
    background-image: linear-gradient(180deg, #91a7d8, #7482bb);
    color: #fff;
    box-shadow: 0 1px 1px #0000002e;
    text-shadow: 0 1px 0px #79485f7a;
}

.radio input:before {
    content: attr(label);
    display: inline-block;
    text-align: center;
    width: 100%;
}

textarea {
    height: 40px;
}
#table-information{
    font-size: 13px;
}
</style>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

