<template>
    <div v-if="this.isAuth == true">
        <div class="header-container">
            <header class="header navbar navbar-expand-sm">
                <a href="#" class="sidebarCollapse" data-placement="bottom">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-menu">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </a>
                <div class="nav-logo align-self-center">
                    <a class="navbar-brand"><img alt="logo" src="images/ardakan.png"> <span
                        class="navbar-brand-name">Warehouse Software</span></a>
                </div>

                <ul class="navbar-item flex-row mr-auto">

                </ul>

                <ul class="navbar-item flex-row nav-dropdowns">


                    <li class="nav-item dropdown user-profile-dropdown order-lg-0 order-1">
                        <a href="#" class="nav-link dropdown-toggle user" id="user-profile-dropdown"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media">
                                <img src="images/avatar.png" class="img-fluid" alt="admin-profile">
                                <div class="media-body align-self-center">
                                    <h6>{{ user.first_name }} {{ user.last_name }}</h6>
                                </div>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-chevron-down">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </a>
                        <div class="dropdown-menu position-absolute animated fadeInUp"
                             aria-labelledby="user-profile-dropdown">
                            <div class="">
                                <div class="dropdown-item">
                                    <a @click="logout" class="fas fa-sign-out-alt">
                                        Exit</a>
                                </div>
                            </div>
                        </div>

                    </li>
                </ul>
            </header>
            <div class="main-container" id="container">
                <div class="topbar-nav header navbar" role="banner">
                    <nav id="topbar" class="">
                        <ul class="list-unstyled menu-categories" id="topAccordion">

                            <li class="menu single-menu">
                                <a href="https://afgcapp.com/#/chart">
                                    <div class="">
                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-home">
                                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                        </svg>
                                        <span>Main page</span>
                                    </div>
                                </a>
                            </li>
                            <li v-if="hasAccessTo('bahrevari-automation')" class="menu single-menu">
                                <a href="#bahrevari" data-toggle="collapse" aria-expanded="false"
                                   class="dropdown-toggle">
                                    <div class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 17"
                                             fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-box">
                                            <path
                                                d="M5.229,6.531H4.362c-0.239,0-0.434,0.193-0.434,0.434c0,0.239,0.194,0.434,0.434,0.434h0.868c0.24,0,0.434-0.194,0.434-0.434C5.663,6.724,5.469,6.531,5.229,6.531 M10,6.531c-1.916,0-3.47,1.554-3.47,3.47c0,1.916,1.554,3.47,3.47,3.47c1.916,0,3.47-1.555,3.47-3.47C13.47,8.084,11.916,6.531,10,6.531 M11.4,11.447c-0.071,0.164-0.169,0.299-0.294,0.406c-0.124,0.109-0.27,0.191-0.437,0.248c-0.167,0.057-0.298,0.09-0.492,0.098v0.402h-0.35v-0.402c-0.21-0.004-0.352-0.039-0.527-0.1c-0.175-0.064-0.324-0.154-0.449-0.27c-0.124-0.115-0.221-0.258-0.288-0.428c-0.068-0.17-0.1-0.363-0.096-0.583h0.664c-0.004,0.259,0.052,0.464,0.169,0.613c0.116,0.15,0.259,0.229,0.527,0.236v-1.427c-0.159-0.043-0.268-0.095-0.425-0.156c-0.157-0.061-0.299-0.139-0.425-0.235C8.852,9.752,8.75,9.631,8.672,9.486C8.594,9.34,8.556,9.16,8.556,8.944c0-0.189,0.036-0.355,0.108-0.498c0.072-0.144,0.169-0.264,0.292-0.36c0.122-0.097,0.263-0.17,0.422-0.221c0.159-0.052,0.277-0.077,0.451-0.077V7.401h0.35v0.387c0.174,0,0.29,0.023,0.445,0.071c0.155,0.047,0.29,0.118,0.404,0.212c0.115,0.095,0.206,0.215,0.274,0.359c0.067,0.146,0.103,0.315,0.103,0.508H10.74c-0.007-0.201-0.06-0.354-0.154-0.46c-0.096-0.106-0.199-0.159-0.408-0.159v1.244c0.174,0.047,0.296,0.102,0.462,0.165c0.167,0.063,0.314,0.144,0.443,0.241c0.128,0.099,0.23,0.221,0.309,0.366c0.077,0.146,0.116,0.324,0.116,0.536C11.509,11.092,11.473,11.283,11.4,11.447 M18.675,4.795H1.326c-0.479,0-0.868,0.389-0.868,0.868v8.674c0,0.479,0.389,0.867,0.868,0.867h17.349c0.479,0,0.867-0.389,0.867-0.867V5.664C19.542,5.184,19.153,4.795,18.675,4.795M1.76,5.664c0.24,0,0.434,0.193,0.434,0.434C2.193,6.336,2,6.531,1.76,6.531S1.326,6.336,1.326,6.097C1.326,5.857,1.52,5.664,1.76,5.664 M1.76,14.338c-0.24,0-0.434-0.195-0.434-0.434c0-0.24,0.194-0.434,0.434-0.434s0.434,0.193,0.434,0.434C2.193,14.143,2,14.338,1.76,14.338 M18.241,14.338c-0.24,0-0.435-0.195-0.435-0.434c0-0.24,0.194-0.434,0.435-0.434c0.239,0,0.434,0.193,0.434,0.434C18.675,14.143,18.48,14.338,18.241,14.338 M18.675,12.682c-0.137-0.049-0.281-0.08-0.434-0.08c-0.719,0-1.302,0.584-1.302,1.303c0,0.152,0.031,0.297,0.08,0.434H2.981c0.048-0.137,0.08-0.281,0.08-0.434c0-0.719-0.583-1.303-1.301-1.303c-0.153,0-0.297,0.031-0.434,0.08V7.318c0.136,0.049,0.28,0.08,0.434,0.08c0.718,0,1.301-0.583,1.301-1.301c0-0.153-0.032-0.298-0.08-0.434H17.02c-0.049,0.136-0.08,0.28-0.08,0.434c0,0.718,0.583,1.301,1.302,1.301c0.152,0,0.297-0.031,0.434-0.08V12.682z M18.241,6.531c-0.24,0-0.435-0.194-0.435-0.434c0-0.24,0.194-0.434,0.435-0.434c0.239,0,0.434,0.193,0.434,0.434C18.675,6.336,18.48,6.531,18.241,6.531 M9.22,8.896c0,0.095,0.019,0.175,0.058,0.242c0.039,0.066,0.088,0.124,0.148,0.171c0.061,0.047,0.13,0.086,0.21,0.115c0.079,0.028,0.11,0.055,0.192,0.073V8.319c-0.21,0-0.322,0.044-0.437,0.132C9.277,8.54,9.22,8.688,9.22,8.896 M15.639,12.602h-0.868c-0.239,0-0.434,0.195-0.434,0.434c0,0.24,0.194,0.436,0.434,0.436h0.868c0.24,0,0.434-0.195,0.434-0.436C16.072,12.797,15.879,12.602,15.639,12.602 M10.621,10.5c-0.068-0.052-0.145-0.093-0.23-0.124c-0.086-0.031-0.123-0.06-0.212-0.082v1.374c0.209-0.016,0.332-0.076,0.465-0.186c0.134-0.107,0.201-0.281,0.201-0.516c0-0.11-0.02-0.202-0.062-0.277C10.743,10.615,10.688,10.551,10.621,10.5"></path>
                                        </svg>
                                        <span>Efficiency</span>
                                    </div>

                                </a>
                                <ul class="collapse submenu list-unstyled" id="bahrevari" data-parent="#topAccordion">
                                    <li>
                                        <a @click="redirectToLink('https://172.16.20.52/#/management')"
                                           class="mb-1 pr-2 py-1 d-block">
                                            <i class="fa fa-circle"></i>
                                            <span>Rating managers</span>
                                        </a>
                                    </li>
                                    <li v-if="hasAccessTo('bahrevari-report')">
                                        <a @click="redirectToLink('https://172.16.20.52/#/reports')"
                                           class="mb-1 pr-2 py-1 d-block">
                                            <i class="fa fa-circle"></i>
                                            <span>Reports</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li v-if="hasAccessTo('feeding-automation')" class="menu single-menu">
                                <a href="#food" data-toggle="collapse" aria-expanded="false"
                                   class="dropdown-toggle">
                                    <div class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 17"
                                             fill="none" stroke="currentColor" stroke-width="0.1" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-box">

                                            <path
                                                d="M18 11v7a2 2 0 0 1-4 0v-5h-2V3a3 3 0 0 1 3-3h3v11zM4 10a2 2 0 0 1-2-2V1a1 1 0 0 1 2 0v4h1V1a1 1 0 0 1 2 0v4h1V1a1 1 0 0 1 2 0v7a2 2 0 0 1-2 2v8a2 2 0 0 1-4 0v-8z"
                                                fill="white"></path>
                                        </svg>
                                        <span>Feeding</span>
                                    </div>
                                </a>
                                <ul class="collapse submenu list-unstyled" id="food" data-parent="#topAccordion">
                                    <li>
                                        <a @click="redirectToLink('https://172.16.20.51/#/food/reserve/')"
                                           class="mb-1 pr-2 py-1 d-block">
                                            <i class="fa fa-circle"></i>
                                            <span>Food reservation</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a @click="redirectToLink('https://172.16.20.51/#/food/reserve/compulsive/compulsive')"
                                           class="mb-1 pr-2 py-1 d-block">
                                            <i class="fa fa-circle"></i>
                                            <span>Emergency reservation</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a @click="redirectToLink('https://172.16.20.51/#/myreserve/list')"
                                           class="mb-1 pr-2 py-1 d-block">
                                            <i class="fa fa-circle"></i>
                                            <span>My reservations list</span>

                                        </a>
                                    </li>


                                </ul>
                            </li>
                            <li class="menu single-menu">
                                <a @click="redirectToLink('https://172.16.20.62')">
                                    <div class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                            <path
                                                d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                        </svg>
                                        <span>Bonus system</span>
                                    </div>
                                </a>
                            </li>

                            <li class="menu single-menu" v-if="hasAccessTo('salary-automation')">
                                <a href="#forms" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                    <div class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-clipboard">
                                            <path
                                                d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                            <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                        </svg>
                                        <span>Personnel</span>
                                    </div>
                                </a>
                                <ul class="collapse submenu list-unstyled" id="forms" data-parent="#topAccordion">
                                    <li>
                                        <a @click="redirectToLink('https://172.16.20.62/panel#/pps')"
                                           class="mb-1 pr-2 py-1 d-block">
                                            <i class="fa fa-circle"></i>
                                            <span>My pay slip</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://salary.afgc.ir:2061/forget" class="mb-1 pr-2 py-1 d-block">
                                            <i class="fa fa-circle"></i>
                                            <span>Forget password</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://salary.afgc.ir:2061/step1" class="mb-1 pr-2 py-1 d-block">
                                            <i class="fa fa-circle"></i>
                                            <span>Sign up</span> </a>
                                    </li>
                                    <li>
                                        <a @click="redirectToLink('https://172.16.20.61/panel#/bone')"
                                           class="mb-1 pr-2 py-1 d-block">
                                            <i class="fa fa-circle"></i>
                                            <span>My bonus</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="menu single-menu">
                                <a href="#menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                    <div class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-cpu">
                                            <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                                            <rect x="9" y="9" width="6" height="6"></rect>
                                            <line x1="9" y1="1" x2="9" y2="4"></line>
                                            <line x1="15" y1="1" x2="15" y2="4"></line>
                                            <line x1="9" y1="20" x2="9" y2="23"></line>
                                            <line x1="15" y1="20" x2="15" y2="23"></line>
                                            <line x1="20" y1="9" x2="23" y2="9"></line>
                                            <line x1="20" y1="14" x2="23" y2="14"></line>
                                            <line x1="1" y1="9" x2="4" y2="9"></line>
                                            <line x1="1" y1="14" x2="4" y2="14"></line>
                                        </svg>
                                        <span>Requests</span>
                                    </div>

                                </a>
                                <ul class="collapse submenu list-unstyled" id="menu" data-parent="#topAccordion">
                                    <li class="mb-2">
                                        <router-link to="/request" class="mb-1 pr-2 py-1 d-block">
                                            <i class="fa fa-circle"></i>
                                            <span>Request goods</span>
                                        </router-link>
                                    </li>

                                    <li class="mb-2">
                                        <router-link to="/myrequest" class="mb-1 pr-2 py-1 d-block">
                                            <i class="fa fa-circle"></i>
                                            <span>My requests</span>
                                        </router-link>
                                    </li>
                                    <li class="mb-2">
                                        <router-link to="/status" class="mb-1 pr-2 py-1 d-block">
                                            <i class="fa fa-circle"></i>
                                            <span>My awaiting confirmation requests</span>
                                        </router-link>
                                    </li>
                                </ul>
                            </li>

                            <li class="menu single-menu">
                                <a href="#components" data-toggle="collapse" aria-expanded="false"
                                   class="dropdown-toggle">
                                    <div class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-box">
                                            <path
                                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                        </svg>
                                        <span>Warehouse</span>
                                    </div>

                                </a>
                                <ul class="collapse submenu list-unstyled" id="components" data-parent="#topAccordion">
                                    <li class="mb-2" v-if="hasAccessTo('warehouse-cartable')">
                                        <router-link to="/wherehouse" class="mb-1 pr-2 py-1 d-block">
                                            <i class="fa fa-circle"></i>
                                            <span>Cartable warehouse</span>
                                        </router-link>
                                    </li>
                                    <li>
                                        <router-link to="/cancel_requests" class="mb-1 pr-2 py-1 d-block">
                                            <i class="fa fa-circle"></i>
                                            <span>Canceled requests</span>
                                        </router-link>

                                    </li>
                                    <li>
                                        <router-link to="/store_archive" class="mb-1 pr-2 py-1 d-block">
                                            <i class="fa fa-circle"></i>
                                            <span>Archive</span>
                                        </router-link>
                                    </li>
                                </ul>
                            </li>

                            <li class="menu single-menu">
                                <a href="#uiKit" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                    <div class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-zap">
                                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                                        </svg>
                                        <span>Courier</span>
                                    </div>

                                </a>
                                <ul class="collapse submenu list-unstyled" id="uiKit" data-parent="#topAccordion">
                                    <li class="mb-2" v-if="hasAccessTo('delivery-store')">
                                        <router-link to="/peyk_management" class="mb-1 pr-2 py-1 d-block">
                                            <i class="fa fa-circle"></i>
                                            <span>Introducing the courier</span>
                                        </router-link>
                                    </li>
                                    <li class="mb-2" v-if="hasAccessTo('vehicle-store')">
                                        <router-link to="/vehicle" class="mb-1 pr-2 py-1 d-block">
                                            <i class="fa fa-circle"></i>
                                            <span>Introducing the vehicle</span>
                                        </router-link>
                                    </li>
                                    <li class="mb-2">
                                        <router-link to="/receive_request_peyk" class="mb-1 pr-2 py-1 d-block">
                                            <i class="fa fa-circle"></i>
                                            <span>Requests pending delivery</span>
                                        </router-link>
                                    </li>
                                    <li class="mb-2" v-if="hasAccessTo('delivery-cartable')">
                                        <router-link to="/delivery_kartable" class="mb-1 pr-2 py-1 d-block">
                                            <i class="fa fa-circle"></i>
                                            <span>Cartable Courier</span>
                                        </router-link>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu single-menu">
                                <a href="#tables" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                    <div class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-layout">
                                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                            <line x1="3" y1="9" x2="21" y2="9"></line>
                                            <line x1="9" y1="21" x2="9" y2="9"></line>
                                        </svg>
                                        <span>Confirmations</span>
                                    </div>

                                </a>
                                <ul class="collapse submenu list-unstyled" id="tables" data-parent="#topAccordion">
                                    <li class="mb-2">
                                        <router-link to="/new_confirm" class="mb-1 pr-2 py-1 d-block">
                                            <i class="fa fa-circle"></i>
                                            <span>New confirmations</span>
                                        </router-link>
                                    </li>
                                    <li class="mb-2">
                                        <router-link to="/confirm_user" class="mb-1 pr-2 py-1 d-block">
                                            <i class="fa fa-circle"></i>
                                            <span>Assign confirmation to users</span>
                                        </router-link>
                                    </li>
                                </ul>
                            </li>

                            <li class="menu single-menu" v-if="hasAccessTo('setting')">
                                <a href="#more" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                    <div class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-plus-circle">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="12" y1="8" x2="12" y2="16"></line>
                                            <line x1="8" y1="12" x2="16" y2="12"></line>
                                        </svg>
                                        <span>Settings</span>
                                    </div>

                                </a>
                                <ul class="collapse submenu list-unstyled" id="more" data-parent="#topAccordion">
                                    <li class="mb-2" v-if="hasAccessTo('role-assignPermissionToRole')">
                                        <router-link to="/permission" class="mb-1 pr-2 py-1 d-block">
                                            <span>Permissions</span>
                                        </router-link>
                                    </li>
                                    <li v-if="hasAccessTo('manage-users')" class="mb-2">
                                        <router-link to="/user" class="mb-1 pr-2 py-1 d-block">
                                            <span>User management</span>
                                        </router-link>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="overlay"></div>
        <div class="search-overlay"></div>
    </div>
</template>

<script>
import storeLogin from "./storeLogin";

export default {
    data() {
        return {
            permissions: [],
            user: '',
            isAuth: false
        }
    },
    methods: {
        hasAccessTo(permission) {

            // console.log(this.permissions.includes(permission))
            return this.permissions.includes(permission)

        },

        getUserPermissions() {

            axios.get('api/permissions/loginUser').then(({data}) => (this.permissions = data.data, localStorage.setItem('permissions', this.permissions)))
        },
        redirectToLink(address) {
            axios.post('api/authenticate', {address: address}).then((response) => {

                window.location.href = response.data.url;
            }).catch(error => {
                this.allerrors = error.response.data
                if (error.response.data.status == '406') {

                }
            })
        },
        logout() {
            if (confirm("Do you want to exit the program?")) {
                localStorage.removeItem('access_token')
                localStorage.removeItem('token_expire')
                storeLogin.commit('logoutUser')
                window.location.href = '/';
            }

        },
        loadUser() {
            axios.get('api/user/getById').then(({data}) => (this.user = data.data));
        }
    },
    created() {
        this.isAuth = storeLogin.state.isLoggedIn
        if (this.isAuth == true) {
            this.loadUser()
            this.getUserPermissions()
        }
    },

    name: "MenuBar"
}

</script>

<style>

</style>
