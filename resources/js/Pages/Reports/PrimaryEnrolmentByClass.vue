<template>
  <div class="card card-full">
    <!-- .nk-ibx-head -->
    <div class="nk-block">
      <div class="card-inner" style="padding: 0; padding-top: 35px">
        <nav
          style="border-bottom: solid thin #f5f6fa; padding-bottom: 15px"
          class="border-bottom"
        >
          <ul class="breadcrumb breadcrumb-pipe">
            <li class="breadcrumb-item"><router-link to="/report/primary/enrolment-by-class">PRIMARY ENROLMENT BY CLASS</router-link></li>
          </ul>
        </nav>

        <div class="row g-gs" style="padding-top: 10px">
          <div class="col-lg-12 col-xxl-12">
            <div class="card card-full">
              <!-- .nk-ibx-head -->

              <div class="nk-block">
                <div class="card-inner" style="padding: 0; padding-top: 0px">
                  <div style="padding: 0px">
                    <div class="row g-gs" style="padding: 0px">
                      <div class="col-sm-12 col-lg-12 col-xxl-12" style="padding: 0">
                        <div class="card card-bordered card-full" style="margin-top: 5px">
                          <div class="card card-stretch" style="padding: 0">
                            <div class="card-inner-group">
                              <PrimaryEnrolByClass />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!--end tab menu-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import PrimaryEnrolByClass from "../TableEnrolment/PrimaryEnrolByClass";

export default {
  components: {
    PrimaryEnrolByClass,
  },
};
</script>

<style></style>
