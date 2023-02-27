<template>


<div class="nk-block nk-block-lg">

                                        <div class="card card-preview" style="padding:0;border:none;margin-top:-30px;">
                                            <div class="card-inner">


<div style="margin-bottom:20px;font-weight:bold;"> Academic Institution Per District </div>


                                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                    <div class="row justify-between g-2">
                                                        <div class="col-7 col-sm-6 text-left">
                                                            <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                                <label><input type="search" class="form-control form-control-sm" placeholder="Type in to Search" aria-controls="DataTables_Table_0">
                                                                </label></div></div>

                                                                <div class="col-5 col-sm-6 text-right"><div class="datatable-filter">
                                                                    <div class="dataTables_length" id="DataTables_Table_0_length">
                                                                        <label><span class="d-none d-sm-inline-block">Show</span>
                                                                        <div class="form-control-select">



                                                                            <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select custom-select-sm form-control form-control-sm">
                                                                                <option value="10">10</option>
                                                                            <option value="25">25</option>
                                                                            <option value="50">50</option>
                                                                            <option value="100">100</option>
                                                                            </select>
                                                                             </div>
                                                                             </label>
                                                                            </div>
                                                                            </div>
                                                                            </div>
                                                                            </div>
                                                                            <div class="datatable-wrap my-3">

                                                                                <table class="datatable-init table dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">



                                                    <thead>
                                                        <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">District</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Region</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Number of Schools</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Number of Learners </th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending">Number of Teachers</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    <tr role="row" class="odd" v-for="n in 100">
                                                            <td class="dtr-control sorting_1" tabindex="0">Wakiso</td>
                                                            <td> Central  </td>
                                                            <td> 20{{ n }} </td>
                                                            <td> 10{{ n  }}</td>

                                                            <td> 3{{ n }} </td>


                                                        </tr>

                                                        </tbody>
                                                </table>

                                                </div><div class="row align-items-center"><div class="col-7 col-sm-12 col-md-9"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">Prev</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item disabled" id="DataTables_Table_0_ellipsis"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="6" tabindex="0" class="page-link">…</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="7" tabindex="0" class="page-link">12</a></li><li class="paginate_button page-item next" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="8" tabindex="0" class="page-link">Next</a></li></ul></div></div><div class="col-5 col-sm-12 col-md-3 text-left text-md-right"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">1 -10 of 120</div></div></div></div>
                                            </div>
                                        </div><!-- .card-preview -->
                                    </div>



</template>
<script>
export default {

}
</script>
