<template>
    <div class="containe  r1 p-5 p-md-5 pt-4 height-100 w-100">

<!--     مودال ارجاع درخواست  //////////////////////////////  -->
        <div class="modal" tabindex="-1" id="reference">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">ارجاع درخواست</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body form-group text-right">
                        <label>گروه</label>
                        <multiselect v-model="reference_temp.group_id"  track-by="name"
                                      placeholder="انتخاب" :options="group" :searchable="true"
                                      :showLabels="false">
                        </multiselect>

                        <label>زیر مجموعه</label>
                        <multiselect v-model="reference_temp.subset_id" track-by="name"
                                      placeholder="انتخاب" :options="subset" :searchable="true"
                                      :showLabels="false">
                        </multiselect>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            لغو
                        </button>
                        <button type="button" class="btn btn-primary" @click="sendReference">ارسال</button>
                    </div>
                </div>
            </div>
        </div>



<!--  مودال ارسال به پیک //////////////////////////////-->
        <div class="modal" tabindex="-1" id="modal_peyk">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">ارسال به پیک</h5>
                        <button type="button" class="btn-close" data-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body form-group text-right">
<div class="row">
    <div class="col-6 d-flex align-items-center">
        <input v-model="peyk_temp.type_send" type="radio" name="select_send" class="option-input radio ml-2" value="manual">
        <label class="my-auto"> انتخاب دستی </label>
    </div>
    <div class="col-6 d-flex align-items-center">
        <input v-model="peyk_temp.type_send" type="radio" name="select_send" class="option-input radio ml-2" value="auto">
        <label class="my-auto"> انتخاب اتوماتیک </label>
    </div>
    <div v-if="peyk_temp.type_send=='manual'" class="col-10 mt-3">
        <multiselect v-model="peyk_id" :options="peyks.map(type => type.id)" :custom-label="opt => peyks.find(x => x.id == opt).first_name+' '+peyks.find(x => x.id == opt).last_name+' '+peyks.find(x => x.id == opt).personnel_code" :showLabels="false" placeholder="نام پیک" @input="SetObj"></multiselect>

    </div>

</div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            لغو
                        </button>
                        <button type="button" class="btn btn-primary">ارسال</button>
                    </div>
                </div>
            </div>
        </div>




<!-- مودال نمایش تائیدیه ها   ///////////////////////////// -->
        <div class="modal" tabindex="-1" id="modal-confirme">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">وضعیت درخواست</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body form-group text-right">
                        <div>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>
                                            ردیف
                                        </th>
                                        <th>
                                            نام تائید کننده
                                        </th>
                                        <th>
                                            وضعیت تائید
                                        </th>
                                        <th>
                                            تاریخ
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <template v-if="request_all!=''">
                                    <tr v-if="request_all[request_id].request_confirm!=''" v-for="(confirm,index) in request_all[request_id].request_confirm" :key="index">
                                        <td>
                                            {{index+1}}
                                        </td>
                                        <td>
                                           {{confirm.user.first_name}} {{confirm.user.last_name}}
                                        </td>
                                        <td>
                                            <i v-if="confirm.confirmed==null" class="badge badge-warning">در انتظار تائید</i>
                                            <i v-if="confirm.confirmed==0" class="badge badge-danger">عدم تائید</i>
                                            <i v-if="confirm.confirmed==1" class="badge badge-success">تائید</i>
                                        </td>
                                        <td>
                                            {{confirm.updated_at}}
                                        </td>
                                    </tr>
                                    </template>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            بستن
                        </button>
                    </div>
                </div>
            </div>
        </div>




<!--    مودال پرینت    ////////////////////////////////-->
        <div id="printMe">
            <div class="modal" tabindex="-1" id="modal-print">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">

                            <div class="row w-100">
                                <div class="col-4 d-flex">
                                    <h5>انبار:</h5>
                                    <h5>مرکزی</h5>
                                </div>
                                <div class="col-4">
                                    <h2 class="print-head">رسید تحویل</h2>
                                </div>
                                <div class="col-4 text-left">
                                    <h5 class="inline">تاریخ:</h5>
                                    <h5 class="inline">1400/04/23</h5>
                                </div>
                            </div>


                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>

                        <div class="row mt-xl-3 p-3">
                            <div class="col-md-3 d-flex">
                                <p>نام کالا:</p>
                                <h5>لباس کار</h5>
                            </div>
                            <div class="col-md-3 d-flex">
                                <p>تعداد:</p>
                                <h5>2</h5>
                            </div>
                            <div class="col-md-3 d-flex">
                                <p>واحد درخواست کننده:</p>
                                <h5>مکانیک</h5>
                            </div>
                            <div class="col-md-3 d-flex">
                                <p>محل مصرف:</p>
                                <h5>مکانیک</h5>
                            </div>
                        </div>
                        <div class="row text-right inline p-3">
                            <p class="inline">آدرس تحویل:</p>
                            <p class="inline">فلوت - دفتر تولید</p>
                        </div>

                        <div class="row m-0 mt-xl-3 text-center">
                            <div class="col-md-4 border">

                                <div class="signature">
                                    <p>مسئول انبار</p>
                                </div>
                            </div>

                            <div class="col-md-4 border">

                                <div class="signature">
                                    <p>مسئول پیک</p>
                                </div>
                            </div>

                            <div class="col-md-4 border">

                                <div class="signature">
                                    <p>دریافت کننده</p>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button v-print="printObj" type="button" id="btnPrint"
                                    class="btn btn-primary">چاپ
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<!-- مودال نمایش جزئیات   ///////////////////////////////////////-->
        <div class="modal" tabindex="-1" id="modal-details" aria-labelledby="modal-details">
            <div class="modal-dialog modal-xl" role="dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">نمایش جزئیات</h5>
                        <button type="button" class="close text-left" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body form-group text-right">
                        <table id="table-information" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th colspan="10"><h4>نمایش جزئیات</h4></th>

                            </tr>
                            <tr>
                                <th>
                                    <!--                                    <div class="checkbox-custom">-->
                                    <!--                                    <label>-->
                                    <!--                                        <input v-model="allSelected" type="checkbox" name="select_send" class="option-input radio ml-2"  @click="selectAll">-->
                                    <!--                                        <b></b>-->
                                    <!--                                    </label>-->
                                    <!--                                </div>-->
                                    انتخاب
                                </th>
                                <th>ردیف</th>
                                <th>نام کالا</th>
                                <th>مشخصات کالا</th>
                                <th>تعداد</th>
                                <th>واحد درخواست کننده</th>
                                <th>محل مصرف</th>
                                <th>انبار</th>
                                <th>وضعیت درخواست</th>
                                <th>شماره درخواست</th>

                            </tr>
                            </thead>
                            <tbody>
                            <template v-if="request_all!=''">
                                <tr v-if="request_all[request_id].request_detail!=''" v-for="(details,index) in request_all[request_id].request_detail" :key="index">
                                    <td>
                                        <!--                                        <input v-model="details_id_array" type="checkbox" name="select_send" class="option-input radio ml-2" :value="details.id">-->
                                        <div class="checkbox-custom">
                                            <label>
                                                <input v-model="details_id_array" type="checkbox" name="select_send" class="option-input radio ml-2" :value="details.id" >
                                                <b></b>
                                            </label>
                                        </div>


                                    </td>
                                    <td>{{index+1}}</td>
                                    <td>{{details.product.name}}</td>
                                    <td>بزرگ</td>
                                    <td>{{details.amount}}</td>
                                    <td>{{request_all[request_id].unit.name}}</td>
                                    <td>{{details.location}}</td>
                                    <td>{{details.warehouse.name}}</td>
                                    <td> <i v-if="details.confirmed==null" class="badge badge-warning">در انتظار تائید</i>
                                        <i v-if="details.confirmed==0" class="badge badge-danger">عدم تائید</i>
                                        <i v-if="details.confirmed==1" class="badge badge-success">تائید</i></td>
                                    <td>123456</td>

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
                        <button type="button" class="btn btn-success"
                                data-dismiss="modal">
                            ثبت تائید
                        </button>
                        <button type="button" class="btn btn-success"
                                data-toggle="modal"
                                data-target="#modal_peyk" @click="close_modal">
                            ارسال به پیک
                        </button>
                    </div>
                </div>
            </div>
        </div>

<!--        /////////////////////////////////////////////////////////////-->





        <h4 class="mb-4">وضعیت درخواست</h4>
        <div class="text-center">
            <table id="table_status" class="table table-bordered ">
                <thead>
                <tr>
                    <th>ردیف</th>
                    <th>واحد درخواست کننده</th>
                    <th>شماره درخواست</th>
<!--                    <th>تاییدیه سرپرست / مدیر واحد</th>-->
<!--                    <th>تاییدیه مدیریت</th>-->
                    <th>وضعیت درخواست</th>
                    <th>ارجاع</th>
                    <th>ارسال به پیک</th>
                    <th>گزارش وضعیت تائید</th>
                    <th>پرینت رسید تحویل</th>
                    <th>مشاهده جزئیات</th>
                </tr>
                </thead>
                <tbody id="tbody_status">
                <tr v-for="(request,index) in request_all" :key="index">
                    <td>{{index+1}}</td>
                    <td>{{request.unit.name}}</td>
                    <td>123456</td>

                    <td>
                        <i v-if="request.confirmed==null" class="badge badge-warning">در انتظار تائید</i>
                        <i v-if="request.confirmed==0" class="badge badge-danger">عدم تائید</i>
                        <i v-if="request.confirmed==1" class="badge badge-success">تائید</i>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-table" data-bs-toggle="modal"
                                data-bs-target="#reference" @click="request_info(index)">
                            <i class="fas fa-share-square"></i>
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-table" data-bs-toggle="modal"
                                data-bs-target="#modal_peyk" @click="request_info(index)">
                            <i class="fas fa-paper-plane"></i>
                        </button>

                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-table" data-bs-toggle="modal"
                                data-bs-target="#modal-confirme" @click="request_info(index)">
                            <i class="fas fa-binoculars"></i>
                        </button>

                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-table" data-bs-toggle="modal"
                                data-bs-target="#modal-print" @click="request_info(index)">
                            <i class="fas fa-print"></i>
                        </button>

                    </td>
                    <td>

                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal-details" @click="request_info(index)"><i class="fas fa-info-circle"></i> نمایش جزئیات
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

export default {
    name: "status",
    data() {
        return {
            request_all:'',
            group:['تولید','فنی'],subset:['رامین اقتداری - کارشناس','علی کمالی - سرپرست'],
            printObj: {
                id: "printMe",
            },
request_id:0,
            reference_temp:{group_id:'',subset_id:''},
            peyk_temp:{peyk_id:'',type_send:''},
            details_id_array:[],
            allSelected:false,
            temp_request:[],
            peyks:[],
            peyk_id:''
        }
    }, methods: {
        loadRequest(){
            axios.get('api/requests/all').then(({data}) => (this.request_all = data.data))
        },
        request_info(index){
            this.request_id=index;
        },
        sendReference(){

        },
        SetObj(){
            this.temp_request=[]
            for (let i=0;i<this.details_id_array.length;i++)
            {
              this.temp_request.push({peyk_id:this.request_all[this.request_id].user_id,details_id:this.details_id_array[i]})
            }
        },
        close_modal()
        {
            $("#modal-details .close").click()
        },
        loadPeyk() {
            axios.get('api/user/all').then(({data}) => (this.peyks = data.data));
        },

    }, components: {
        Multiselect
    },
    created() {
        this.loadRequest()
        this.loadPeyk()
    }
}

$(document).ready(function () {
    $(window).on('resize', function () {
        if ($(window).width() < 1024) {
            $('#demo1 > th').contents().unwrap().wrap('<div/>');
        } else {
            $('#demo1 div').contents().unwrap().wrap('<th/>');
            $('#demo1 > th').attr("colspan", 12);
        }
    })
});

</script>


<style scoped>
.container {
    display: flex;
    flex-direction: column;
    align-items: center;
}
#table_status{
    font-size: 13px;
}
.rich-media-node {
    width: 80px;
    padding: 8px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: center;
    color: white;
    background-color: #f7c616;
    border-radius: 4px;
}

.tree-container > svg, .tree-container .dom-container {
    top: -185px !important;
}

#printMe {
    direction: rtl;
    text-align: center;
}

.badge {
    font-weight: 400;
    font-size: 14px;
}

@media only screen
and (max-width: 760px), (min-device-width: 768px)
and (max-device-width: 1024px) {

    table td, tr {
        display: block;
    }


    table thead tr {
        position: absolute;
        /*top: -9999px;*/
        right: -9999px;
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

    #table_status td:nth-of-type(1):before {
        content: "ردیف";
    }

    #table_status td:nth-of-type(2):before {
        content: "واحد درخواست کننده";
    }

    #table_status td:nth-of-type(3):before {
        content: "شماره درخواست";
    }

    #table_status td:nth-of-type(4):before {
        content: "تائید سرپرست / مدیر واحد";
    }

    #table_status td:nth-of-type(5):before {
        content: "تائیدیه مدیریت";
    }

    #table_status td:nth-of-type(6):before {
        content: "وضعیت درخواست";
    }

    #table_status td:nth-of-type(7):before {
        content: "ارجاع";
    }

    #table_status td:nth-of-type(8):before {
        content: "ارسال به پیک";
    }

    #table_status td:nth-of-type(9):before {
        content: "گزارش وضعیت تائید";
    }

    #table_status td:nth-of-type(10):before {
        content: "پرینت رسید تحویل";
    }

    #table_status td:nth-of-type(11):before {
        content: "مشاهده جزئیات";
    }

    #table-information td:nth-of-type(1):before {
        content: "ردیف";
    }
    #table-information td:nth-of-type(2):before {
        content: "واحد درخواست کننده";
    }

    #table-information td:nth-of-type(3):before {
        content: "شماره درخواست";
    }

    #table-information td:nth-of-type(4):before {
        content: "تائید سرپرست / مدیر واحد";
    }

    #table-information td:nth-of-type(5):before {
        content: "تائیدیه مدیریت";
    }

    #table-information td:nth-of-type(6):before {
        content: "وضعیت درخواست";
    }

    #table-information td:nth-of-type(7):before {
        content: "ارجاع";
    }

    #table-information td:nth-of-type(8):before {
        content: "ارسال به پیک";
    }

    #table-information td:nth-of-type(9):before {
        content: "گزارش وضعیت تائید";
    }

    #table-information td:nth-of-type(10):before {
        content: "پرینت رسید تحویل";
    }

    #table-information td:nth-of-type(11):before {
        content: "مشاهده جزئیات";
    }
}


.checkbox-custom {
    position: relative;
}

.checkbox-custom input[type=checkbox] {
    display: none;
}

.checkbox-custom input[type=checkbox]~b {
    cursor: pointer;
    outline: 0;
    position: relative;
    display: inline-block;
    margin: 4px 1px 0;
    background-color: #ffffff;
    border: 2px solid #6fcb6f;
    width: 24px;
    height: 24px;
    vertical-align: middle;
    line-height: 1;
    text-align: center;
    font-size: 20px;
    color: #3aad3c;
}

.checkbox-custom input[type=checkbox]:checked~b:after {
    content: '\2713';
}

</style>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
