import reportAPI from '../api/report';

export const reports = {

    state:{
        reports:[],
        loadreportsStatus:0,

        report:{},
        savereportStatus:0,
        updatereportStatus:0,
        deletereportStatus:0,
    },

    actions:{
        addNewreport:function({commit},data){
            commit('setSaveReportsStatus',1);
            
            reportAPI.postReports(data)
            .then(response=>{
                console.log("Saved values....", response.data);
                commit('setSaveReportsStatus',2);
                commit('setReport',response.data)
            })
            .catch(err=>{
                commit('setSaveReportsStatus',3);
            });
        },
        editReport:function({commit},data){
            commit('setUpdateReportsStatus',1);
            reportAPI.putreport(data,reportID)
            .then(response=>{
                console.log("Response returned ....", response.data);
                commit('setUpdateReportsStatus',2);
                
            })
            .catch(err=>{
                commit('setUpdateReportsStatus',3);
            });
        },
        loadReports({commit}){
            commit('setLoadReportsStatus',1);
            reportAPI.getReports()
            .then(response=>{
                console.log("report Loaded...", response.data);
                commit('setLoadReportsStatus',2);
                commit('setReports',response.data);
            })
            .catch(err=>{
                commit('setLoadReportsStatus',2)
                return err;
            });
        },

    },
    mutations:{
        setReports(state, data){
            state.reports = data
        },
        setReport(state, data){
            state.report = data
        },
        setLoadReportsStatus(state, data){
            state.loadreportsStatus = data;
        },
        setSaveReportsStatus(state, data){
            state.savereportStatus = data;
        },
        setUpdateReportsStatus(state, data){
            state.updatereportStatus = data;
        }
    },
    getters:{
        getReports(state){
            return state.reports;
        },
        getReport(state){
            return state.report;
        },
        getLoadreportsStatus(state){
            return state.loadreportsStatus;
        },
        getSaveReportsStatus(state){
            return state.savereportStatus;
        },
        updateSavereportsStatus(state){
            return state.updatereportStatus;
        },
    }

}