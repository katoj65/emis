<template>
    <div class="nk-body npc-default has-apps-sidebar has-sidebar ">
        <div class="nk-app-root">
            <div class="nk-apps-sidebar is-dark" style="background: #29347a;">
                <div class="nk-apps-brand">
                    <a href="#" class="logo-link">
                        EMIS
                    </a>
                </div>
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-body">
                        <div class="nk-sidebar-content" data-simplebar>
                            <div class="nk-sidebar-menu">
                                <!-- Menu -->
                                <ul class="nk-menu apps-menu">
                                    <li
                                        class="nk-menu-item"
                                        v-b-tooltip.hover
                                        v-b-popover.hover.top="'I am popover directive content!'" title="Popover Title">
                                        <a
                                            href="javascript:null"
                                            class="nk-menu-link"
                                            @click="mainSidebar('pre')"
                                        >
                                            <span class="nk-menu-icon"
                                                ><em
                                                    class="icon ni ni-dashboard"
                                                ></em
                                            ></span>
                                        </a>
                                    </li>
                                    <li
                                        class="nk-menu-item"
                                        v-b-tooltip.hover
                                        title="Primary"
                                    >
                                        <a
                                            href="javascript:null"
                                            class="nk-menu-link"
                                            @click="mainSidebar('primary')"
                                        >
                                            <span class="nk-menu-icon"
                                                ><em
                                                    class="icon ni ni-speed"
                                                ></em
                                            ></span>
                                        </a>
                                    </li>
                                    <li
                                        class="nk-menu-item"
                                        v-b-tooltip.hover
                                        title="Secondary"
                                    >
                                        <a
                                            href="javascript:null"
                                            class="nk-menu-link"
                                            @click="mainSidebar('secondary')"
                                        >
                                            <span class="nk-menu-icon"
                                                ><em
                                                    class="icon ni ni-bitcoin-cash"
                                                ></em
                                            ></span>
                                        </a>
                                    </li>

                                    <li
                                        class="nk-menu-item"
                                        v-b-tooltip.hover
                                        title="PTC"
                                    >
                                        <a
                                            href="javascript:null"
                                            class="nk-menu-link"
                                            @click="mainSidebar('ptc')"
                                        >
                                            <span class="nk-menu-icon"
                                                ><em
                                                    class="icon ni ni-inbox"
                                                ></em
                                            ></span>
                                        </a>
                                    </li>

                                    <li
                                        class="nk-menu-item"
                                        v-b-tooltip.hover
                                        title="BVT"
                                    >
                                        <a
                                            href="javascript:null"
                                            class="nk-menu-link"
                                            @click="mainSidebar('bvt')"
                                        >
                                            <span class="nk-menu-icon"
                                                ><em
                                                    class="icon ni ni-invest"
                                                ></em
                                            ></span>
                                        </a>
                                    </li>

                                    <li
                                        class="nk-menu-item"
                                        v-b-tooltip.hover
                                        title="University"
                                    >
                                        <a
                                            href="javascript:null"
                                            class="nk-menu-link"
                                            @click="mainSidebar('university')"
                                        >
                                            <span class="nk-menu-icon"
                                                ><em
                                                    class="icon ni ni-chat"
                                                ></em
                                            ></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div
                                class="nk-sidebar-footer"
                                style="background: #29347a;"
                            >
                                <ul class="nk-menu nk-menu-md">
                                    <li class="nk-menu-item">
                                        <a
                                            href="#"
                                            class="nk-menu-link"
                                            title="Settings"
                                        >
                                            <span class="nk-menu-icon"
                                                ><em
                                                    class="icon ni ni-setting"
                                                ></em
                                            ></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div
                            class="nk-sidebar-profile nk-sidebar-profile-fixed dropdown"
                            style="background: #29347a;"
                        >
                            <a
                                href="#"
                                data-toggle="dropdown"
                                data-offset="50,-60"
                            >
                                <div class="user-avatar">
                                    <span>AB</span>
                                </div>
                            </a>
                            <div
                                class="dropdown-menu dropdown-menu-md ml-4"
                                style="background: #29347a;"
                            >
                                <div
                                    class="dropdown-inner user-card-wrap d-none d-md-block"
                                >
                                    <div class="user-card">
                                        <div class="user-avatar">
                                            <span>AB</span>
                                        </div>
                                        <div class="user-info">
                                            <span class="lead-text"
                                                >Abu Bin Ishtiyak</span
                                            >
                                            <span class="sub-text text-soft"
                                                >info@softnio.com</span
                                            >
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="dropdown-inner"
                                    style="background: #29347a;"
                                >
                                    <ul class="link-list">
                                        <li>
                                            <a
                                                href="html/user-profile-regular.html"
                                                ><em
                                                    class="icon ni ni-user-alt"
                                                ></em
                                                ><span>View Profile</span></a
                                            >
                                        </li>
                                        <li>
                                            <a
                                                href="html/user-profile-setting.html"
                                                ><em
                                                    class="icon ni ni-setting-alt"
                                                ></em
                                                ><span>Account Setting</span></a
                                            >
                                        </li>
                                        <li>
                                            <a
                                                href="html/user-profile-activity.html"
                                                ><em
                                                    class="icon ni ni-activity-alt"
                                                ></em
                                                ><span>Login Activity</span></a
                                            >
                                        </li>
                                    </ul>
                                </div>
                                <div class="dropdown-inner">
                                    <ul class="link-list">
                                        <li>
                                            <inertia-link
                                                :href="route('logout')"
                                                ><em
                                                    class="icon ni ni-signout"
                                                ></em
                                                ><span>
                                                    Sign out</span
                                                ></inertia-link
                                            >
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- main @s -->
            <div class="nk-main ">
                <!-- wrap @s -->
                <div class="nk-wrap ">
                    <!-- main header @s -->
                    <Header />
                    <!-- main header @e -->

                    <SidebarSec v-bind="{ lmenu }" />

                    <!-- content @s -->
                    <div
                        class="nk-content"
                        style="padding:0;padding-top:0px;background:white;"
                    >
                        <div class="container-fluid">
                            <div
                                class="nk-content-inner"
                                style="padding:0;min-height:1000px;"
                            >
                                <div>
                                    <slot />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- content @e -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- main @e -->
        </div>
    </div>
</template>

<script>
import MainMenu from "@/Shared/MainMenu";
import SidebarMain from "../Pages/Dashboard/SidebarMain";
import Header from "../Pages/Dashboard/Header";
import SidebarSec from "../Pages/Dashboard/SidebarSec";

export default {
    components: {
        SidebarMain,
        Header,
        SidebarSec,
        MainMenu
    },

    data() {
        return {
            lmenu: "pre"
        };
    },

    methods: {
        mainSidebar: function(xmenu, lmenu) {
            this.lmenu = xmenu;
        }
    }
};



</script>

<style></style>
