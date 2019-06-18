<template>
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Create new Certificate</h3>
                    </div>

                    <div class="panel-body">
                        
                        <form class="form-horizontal">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">Company Name</label>
                                    <input type="text" class="form-control" v-model="form.name">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">Description of works</label>
                                    <textarea class="form-control" rows="3" v-model="form.description"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="">Work Date</label>
                                    <date-picker v-model="form.workdate" :config="options"></date-picker>
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Expiry Date</label>
                                    <date-picker v-model="form.expirydate" :config="options"></date-picker>
                                </div>
                                <div class="col-sm-6"></div>
                            </div>

                            <button type="submit" @click.prevent="saveCertificate" class="btn btn-default">Submit</button>
                       </form>
                    </div>
                </div>
            </div>
</template>

<script>
import datePicker from 'vue-bootstrap-datetimepicker';

    export default {
        created(){
            // this.$store.dispatch('loadSettings');
        },
        computed:{
            // settings(){
            //     return this.$store.getters.getSettings;
            // },
            // updateStatus(){
            //     console.log("Status",this.$store.getters.getSaveSettingsStatus);
            //     return this.$store.getters.getSaveSettingsStatus;
            // }
        },
        data(){
            return {
               form:{
                   name:'',
                   description:'',
                   workdate:'',
                   expirydate:'',
               },
               options: {
                    format: 'DD-MM-YYYY',
                    useCurrent: true,
                },
            }
        },
        methods:{
            saveCertificate(){
                if(this.validateFields()){
                   return this.$store.dispatch('addNewCertificate',this.form);
                }
            },
            validateFields(){
                let validationInfo = true;

                return validationInfo;
            }
        },
        components: {
            datePicker,
        },
    }
</script>


<style>
    
</style>
