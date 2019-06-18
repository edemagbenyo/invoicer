<template>
    <div class="col-md-10 col-md-offset-1">
       <div class="panel panel-default">
           <div class="panel-heading">
               <h3>List of all Reports
                 <a href="/api/reports/create" class=" btn btn-primary pull-right">Create Report</a>
               </h3>
           </div>
           <div class="panel-body">
                <table class="table table-bordered" id="reports">
                    <thead>
                        <tr>
                            <th>
                                Work done
                            </th>
                            <th>
                                Premises
                            </th>
                            <th>
                                Date
                            </th>
                            <th>
                                Options
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="(item,index) of reports" :key="index">
                            <td>{{item.details.name}}</td>
                            <td>{{item.details.premises}}</td>
                            <td>{{item.details.workdate}}</td>
                            <td>
                                <a href="#">
                                    <span class="glyphicon glyphicon-edit"></span>
                                    Edit
                                </a>
                                <a href="#">
                                    <span class="glyphicon glyphicon-trash"></span>
                                    Delete
                                </a>
                                <a @click="printReport(item.reportid)">
                                    <span class="glyphicon glyphicon-print"></span>
                                    Print
                                </a>
                            </td>
                        </tr>
                    </tbody>

                </table>
           </div>
       </div>
    </div>
</template>
<script>
import CONFIG from '../../config';
export default {
    created(){
        this.$store.dispatch('loadReports');
    },
    computed:{
        reports:function(){
            return this.$store.getters.getReports;
        }
    },
    methods:{
        printReport(reportID){
            window.open(CONFIG.API_URL+'/reports/print/'+reportID,"_blank")
        }
    },
    updated(){
        $(document).ready( function () {
            $('#reports').DataTable({
                select: true,
            });
        } );
    }
    
}
</script>
