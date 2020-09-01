

let api_url='';

switch (process.env.NODE_ENV) {
    case 'development':
        api_url='http://localhost:8000/api'
        break;
    case 'production':
        api_url='http://invoice.edemagbenyo.com/api'
        break

    default:
        break;
}

export default {
    API_URL : api_url
}