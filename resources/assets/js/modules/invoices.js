import invoiceAPI from '../api/invoice';

export const invoices = {


    state:{
        invoice:{},
        saveInvoiceStatus:0,
        invoices:[],
        loadInvoicesStatus:0,
        invoiceRef:null,
        settings:{},
        loadSettingsStatus:0,
        saveSettingsStatus:0
    },
    actions:{
        addNewInvoice:function({commit},data){
            commit('setSaveInvoiceStatus',1);
            invoiceAPI.postAddNewInvoice(data)
            .then(response=>{
                console.log("Response returned ....", response.data);
                commit('setSaveInvoiceStatus',2);
                
            })
            .catch(err=>{
                commit('setSaveInvoiceStatus',3);

            });
        },
        updateSettings({commit},data){
            commit('setSaveSettingsStatus',1);
            invoiceAPI.updateSettingsInfo(data)
            .then(response=>{
                console.log("updated settings information...", response.data);
                commit('setSaveSettingsStatus',2);
                
            })
            .catch(err=>{
                commit('setSaveSettingsStatus',3);

            });
        },
        loadInvoiceRef({commit}){
            invoiceAPI.getInvoiceRef()
            .then(response=>{
                commit('setInvoiceRef',response.data.invoiceref);
            })
        },
        loadSettings({commit}){
            commit('setLoadSettingsStatus',1)
            invoiceAPI.getSettings()
            .then(response=>{
                commit('setSettings',response.data);
                commit('setLoadSettingsStatus',2);
            })
            .catch(err=>{
                commit('setLoadSettingsStatus',3)

            })
        },
        loadInvoices({commit}){
            commit('setLoadInvoicesStatus',1)
            invoiceAPI.getInvoices()
            .then(response=>{
                console.log("Result of invoices",response.data);
                commit('setInvoices',response.data);
                commit('setLoadInvoicesStatus',2);
            })
            .catch(err=>{
                commit('setLoadInvoicesStatus',3)

            })
        }

    },
    mutations:{
        setSaveInvoiceStatus(state, status){
            state.saveInvoiceStatus = status
        },
        setInvoices(state, data){
            state.invoices = data
        },
        setInvoiceRef(state,data){
            state.invoiceRef = data
        },
        setSettings(state,data){
            state.settings = data
        },
        setLoadSettingsStatus(state, status){
            state.loadSettingsStatus= status
        },
        setLoadInvoicesStatus(state, status){
            state.loadInvoicesStatus= status
        },
        setSaveSettingsStatus(state, status){
            state.saveSettingsStatus= status
        },
    },
    getters:{
        getInvoices(state){
            return state.invoices
        },
        setSaveInvoiceStatus(state){
            return state.saveInvoiceStatus;
        },
        getInvoiceRef(state){
            return state.invoiceRef;
        },
        getSettings(state){
            return state.settings;
        },
        getLoadSettingsStatus(state){
            return state.loadSettingsStatus;
        },
        getLoadInvoicesStatus(state){
            return state.loadInvoicesStatus;
        },
        getSaveSettingsStatus(state){
            return state.saveSettingsStatus;
        },
        
    }
}