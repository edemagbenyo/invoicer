import APP_CONFIG from '../config';


export default{


    /**
     * 
     * GET /surveys
     * 
     * Get all Reports
     */

     getSurveys(){
         return axios.get(APP_CONFIG.API_URL+'/surveys/list');
     },

     /**
      * POST /surveys
      * 
      */
     postSurveys(data){
         return axios.post(APP_CONFIG.API_URL+'/surveys',data);
     },

     /**
      * POST /surveys
      * 
      */
     putReport(data, ReportID){
         return axios.post(APP_CONFIG.API_URL+'/surveys'+ReportID,data);
     }

}