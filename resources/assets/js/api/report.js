import APP_CONFIG from '../config';


export default{


    /**
     * 
     * GET /reports
     * 
     * Get all Reports
     */

     getReports(){
         return axios.get(APP_CONFIG.API_URL+'/reports/list');
     },

     /**
      * POST /reports
      * 
      */
     postReports(data){
         return axios.post(APP_CONFIG.API_URL+'/reports',data);
     },

     /**
      * POST /reports
      * 
      */
     putReport(data, ReportID){
         return axios.post(APP_CONFIG.API_URL+'/reports'+ReportID,data);
     }

}