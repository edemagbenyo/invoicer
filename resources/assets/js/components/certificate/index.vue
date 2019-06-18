<template>
    <div class="col-md-10 col-md-offset-1">
       <div class="panel panel-default">
           <div class="panel-heading">
               <h3>List of all certificates
                 <a href="/api/certificates/create" class=" btn btn-primary pull-right">Create Certificate</a>
               </h3>
           </div>
           <div class="panel-body">
                <table class="table table-bordered" id="certificates">
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
                        <tr v-for="(item,index) of certificates" :key="index">
                            <td>{{item.details.name}}</td>
                            <td>{{item.details.description}}</td>
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
                                <a @click="printCertificates(item.certificateid)">
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
        this.$store.dispatch('loadCertificates');
    },
    computed:{
        certificates:function(){
            return this.$store.getters.getCertificates;
        }
    },
    methods:{
        printCertificates(certificateID){
             window.open(CONFIG.API_URL+'/certificates/print/'+certificateID,"_blank")
        }
    },
    updated(){
        $(document).ready( function () {
            $('#certificates').DataTable({
                select: true,
            });
        } );
    }
    
}
</script>
