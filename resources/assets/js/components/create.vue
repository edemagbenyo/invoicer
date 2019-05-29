<template>
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>New Invoice</h3>
                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="">Invoice Ref</label>
                                    <input type="email" class="form-control" v-model="invoiceref" readonly placeholder="#######">
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Date</label>
                                    <date-picker v-model="form.date" :config="options"></date-picker>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="">Our Details</label>
                                    <textarea class="form-control" cols="30" rows="3" v-model="settings.details" readonly></textarea>
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Customer Details</label>
                                    <textarea class="form-control" cols="30" rows="3" v-model="form.clientdetails"></textarea>
                                </div>
                            </div>

                            <items ref="invoiceitems"></items> 
                            <div v-show="saveStatus==2" class="alert alert-success" role="alert">Invoice saved!</div> 
                            <div v-show="!validations.is_valid" class="alert alert-danger" role="alert">{{validations.text}}</div> 
                            <a @click="reload" v-show="saveStatus==2"  class="btn btn-warning">New Invoice</a>
                            <button type="submit" v-show="saveStatus!==2"  @click.prevent="saveInvoice" class="btn btn-default">Issue Invoice</button>
                            <button v-show="saveStatus==2" @click.prevent="print" class="btn btn-success"> <span class="glyphicon glyphicon-print"></span> Print Invoice</button>
                       </form>
                    </div>
                </div>
            </div>
</template>

<script>
import datePicker from 'vue-bootstrap-datetimepicker';
import items from './invoice-item';
import config from '../config';
    export default {
        created(){
            this.$store.dispatch('loadInvoiceRef');
            this.$store.dispatch('loadSettings');
        },
        data(){
            return {
                options: {
                    format: 'DD-MM-YYYY',
                    useCurrent: true,
                },
                form:{
                    clientdetails:'',
                    date:new Date,
                },
                info:{
                    details:(this.settings && this.settings.details)?this.settings.details:'No info yet'
                },
                validations:{
                    is_valid:true,
                    text:''
                }
            }
        },
        computed:{
            invoiceref:function(){
                return this.$store.getters.getInvoiceRef;
            },
            settings:function(){
                return this.$store.getters.getSettings;
            },
            saveStatus(){
                return this.$store.getters.setSaveInvoiceStatus;
            }
        },
        methods:{
            saveInvoice(){
                if(this.validateFields()){
                    let data={
                        invoiceitems:this.$refs.invoiceitems.lines,
                        vattotal:Number(this.$refs.invoiceitems.vattotal),
                        subtotal:this.$refs.invoiceitems.subtotal,
                        total:this.$refs.invoiceitems.total,
                        date:this.form.date,
                        clientdetails:this.form.clientdetails,
                        invoiceref: this.invoiceref


                    }   
                   let result = this.$store.dispatch('addNewInvoice',data);

                }
            },
            validateFields(){
                let validationInfo = true;
                    if(this.form.clientdetails.trim() == ''){
                        this.validations.is_valid = false;
                        this.validations.text = "Customer details information cannot be empty."
                        validationInfo = false;
                    }else{
                        validationInfo = true;
                    }
                return validationInfo;
            },
            reload(){
                location.reload()
            },
            print(){
                window.open(config.API_URL+"/print","_blank")
            }
        },
        components: {
            datePicker,
            items
        },
    }
</script>
