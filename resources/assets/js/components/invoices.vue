<template>
    <div class="col-md-10 col-md-offset-1">
       <div class="panel panel-default">
           <div class="panel-heading">
               <h3>List of all invoices</h3>
           </div>
           <div class="panel-body">
                <table class="table table-bordered" id="invoices">
                    <thead>
                        <td>
                            Date
                        </td>
                        <td>
                            Client
                        </td>
                        <td>
                            Total
                        </td>
                        <td>
                            Options
                        </td>
                    </thead>

                    <tbody>
                        <tr v-for="(item,index) of invoices" :key="index">
                            <td>{{item.date}}</td>
                            <td>{{item.client}}</td>
                            <td>{{item.total}}</td>
                            <td>
                                <a  :href="CONFIG.API_URL+'/print'">
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
import CONFIG from '../config';
export default {
    created(){
        this.$store.dispatch('loadInvoices');
    },
    computed:{
        invoices:function(){
            return this.$store.getters.getInvoices;
        }
    },
    methods:{
    },
    updated(){
        // $(document).ready( function () {
        //     $('#invoices').DataTable({
        //         select: true,
        //     });
        // } );
    }
    
}
</script>
