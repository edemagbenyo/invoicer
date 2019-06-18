<template>
    <div class="col-md-10 col-md-offset-1">
       <div class="panel panel-default">
           <div class="panel-heading">
               <h3>List of all survey
                 <a href="/api/survey/create" class=" btn btn-primary pull-right">Create Certificate</a>
               </h3>
           </div>
           <div class="panel-body">
                <table class="table table-bordered" id="survey">
                    <thead>
                        <tr>
                            <th>
                                Company
                            </th>
                            <th>
                                Work Done
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
                        <tr v-for="(item,index) of survey" :key="index">
                            <td>{{item.name}}</td>
                            <td>{{item.work}}</td>
                            <td>{{item.data}}</td>
                            <td>
                                <a href="#">Edit</a>
                                <a @click="printInvoice(item.certificateID)">
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
        this.$store.dispatch('loadsurvey');
    },
    computed:{
        survey:function(){
            return this.$store.getters.getsurvey;
        }
    },
    methods:{
        printsurvey(certificateID){
            window.open(CONFIG.API_URL+'/printcertificate/'+certificateID,"_blank")
        }
    },
    updated(){
        $(document).ready( function () {
            $('#survey').DataTable({
                select: true,
            });
        } );
    }
    
}
</script>
