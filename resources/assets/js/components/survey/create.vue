<template>
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Settings information</h3>
                    </div>

                    <div class="panel-body">
                        
                        <div class="alert alert-info" role="alert" v-show="updateStatus==1">Updating</div>
                        <div class="alert alert-success" role="alert" v-show="updateStatus==2">Settings updated!</div>
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

                            <button type="submit" @click.prevent="updateSettings" class="btn btn-default">Submit</button>
                       </form>
                    </div>
                </div>
            </div>
</template>

<script>
import datePicker from 'vue-bootstrap-datetimepicker';

    export default {
        created(){
            this.$store.dispatch('loadSettings');
        },
        computed:{
            settings(){
                return this.$store.getters.getSettings;
            },
            updateStatus(){
                console.log("Status",this.$store.getters.getSaveSettingsStatus);
                return this.$store.getters.getSaveSettingsStatus;
            }
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
            updateSettings(){
                if(this.validateFields()){
                    console.log("Settings", this.settings);
                   return this.$store.dispatch('updateSettings',this.settings);
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
