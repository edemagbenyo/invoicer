

let api_url='';

switch (process.env.NODE_ENV) {
    case 'development':
        api_url='http://invoice.test/api'
        break;
    case 'production':
        api_url='http://invoice.edemagbenyo.com'
        break

    default:
        break;
}

export default {
    API_URL : api_url
}