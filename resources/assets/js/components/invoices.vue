<template>
    <div class="col-md-10 col-md-offset-1">
       <div class="panel panel-default">
           <div class="panel-heading">
               <h3>List of all invoices</h3>
           </div>
           <div class="panel-body">
                <table class="table table-bordered" id="invoices">
                    <thead>
                        <tr>
                            <th>
                                Date
                            </th>
                            <th>
                                Client
                            </th>
                            <th>
                                Subtotal(Ghc)
                            </th>
                            <th>
                                Total(Ghc)
                            </th>
                            <th>
                                Options
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="(item,index) of invoices" :key="index">
                            <td>{{item.date}}</td>
                            <td>{{item.client}}</td>
                            <td>{{item.subtotal}}</td>
                            <td>{{item.total}}</td>
                            <td>
                                <a @click="printInvoice(item.invoiceref)">
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
        printInvoice(ref){
            window.open(CONFIG.API_URL+'/print/'+ref+"/print","_blank")
        }
    },
    updated(){
        $(document).ready( function () {
            $('#invoices').DataTable({
                select: true,
            });
        } );
    }
    
}
</script>
