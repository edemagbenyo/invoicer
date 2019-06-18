import APP_CONFIG from '../config';


export default{


    /**
     * 
     * GET /certificates
     * 
     * Get all certificates
     */

     getCertificates(){
         return axios.get(APP_CONFIG.API_URL+'/certificates/list');
     },

     /**
      * POST /certificates
      * 
      */
     postCertificates(data){
         return axios.post(APP_CONFIG.API_URL+'/certificates',data);
     },

     /**
      * POST /certificates
      * 
      */
     putCertificate(data, certificateID){
         return axios.post(APP_CONFIG.API_URL+'/certificates'+certificateID,data);
     }

}