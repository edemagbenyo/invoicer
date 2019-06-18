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
                                    <input type="text" class="form-control" v-model="settings.name">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="">Telephone</label>
                                    <input type="text" class="form-control" v-model="settings.telephone">
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Alternative Telephone</label>
                                    <input type="text" class="form-control" v-model="settings.telephone2">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" v-model="settings.email">
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Website</label>
                                    <input type="text" class="form-control" v-model="settings.website">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="">Our Details</label>
                                    <textarea class="form-control" cols="30" rows="3" v-model="settings.details"></textarea>
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Address</label>
                                    <textarea class="form-control" cols="30" rows="3" v-model="settings.address"></textarea>
                                </div>
                            </div>
                            <h3>Bank Information</h3>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="">Bank Name</label>
                                    <input type="text" class="form-control" v-model="settings.bankname">
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Account Name</label>
                                    <input type="text" class="form-control" v-model="settings.accountname">
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Short Code</label>
                                    <input type="text" class="form-control" v-model="settings.shortcode">
                                </div>
                                <div class="col-sm-12">
                                    <label for="">Account Number</label>
                                    <input type="text" class="form-control" v-model="settings.accountnumber">
                                </div>
                            </div>
                            <h3>Fiscal Information</h3>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="">VAT %</label>
                                    <input type="text" class="form-control" v-model="settings.vat">
                                </div>
                                
                                
                            </div>

                            <button type="submit" @click.prevent="updateSettings" class="btn btn-default">Submit</button>
                       </form>
                    </div>
                </div>
            </div>
</template>

<script>
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
        }
    }
</script>


<style>
    
</style>
