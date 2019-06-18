import certificateAPI from '../api/certificate';

export const certificates = {

    state:{
        certificates:[],
        loadCertificatesStatus:0,

        certificate:{},
        saveCertificateStatus:0,
        updateCertificateStatus:0,
        deleteCertificateStatus:0,
    },

    actions:{
        addNewCertificate:function({commit},data){
            commit('setSaveCertificatesStatus',1);
            
            certificateAPI.postCertificates(data)
            .then(response=>{
                console.log("New Cert...", response.data);
                commit('setSaveCertificatesStatus',2);
                commit('setCertificate',response.data)
            })
            .catch(err=>{
                commit('setSaveCertificatesStatus',3);
            });
        },
        editCertificate:function({commit},data){
            commit('setUpdateCertificatesStatus',1);
            certificateAPI.putCertificate(data,certificateID)
            .then(response=>{
                console.log("Response returned ....", response.data);
                commit('setUpdateCertificatesStatus',2);
                
            })
            .catch(err=>{
                commit('setUpdateCertificatesStatus',3);
            });
        },
        loadCertificates({commit}){
            commit('setLoadCertificatesStatus',1);
            certificateAPI.getCertificates()
            .then(response=>{
                console.log("Certificate Loaded...", response.data);
                commit('setLoadCertificatesStatus',2);
                commit('setCertificates',response.data);
            })
            .catch(err=>{
                commit('setLoadCertificatesStatus',2)
                return err;
            });
        },

    },
    mutations:{
        setCertificates(state, data){
            state.certificates = data
        },
        setCertificate(state, data){
            state.certificate = data
        },
        setLoadCertificatesStatus(state, data){
            state.loadCertificatesStatus = data;
        },
        setSaveCertificatesStatus(state, data){
            state.saveCertificateStatus = data;
        },
        setUpdateCertificatesStatus(state, data){
            state.updateCertificateStatus = data;
        }
    },
    getters:{
        getCertificates(state){
            return state.certificates;
        },
        getCertificate(state){
            return state.certificate;
        },
        getLoadCertificatesStatus(state){
            return state.loadCertificatesStatus;
        },
        getSaveCertificatesStatus(state){
            return state.saveCertificateStatus;
        },
        updateSaveCertificatesStatus(state){
            return state.updateCertificateStatus;
        },
    }

}