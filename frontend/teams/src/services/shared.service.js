import { API } from "../shared/axios-config"
import { BaseApi } from "../route/api"

class SharedService {
    async getCountries(){
        return await API.get(BaseApi.shared.getCountries())
    }
    async getCurrencies(){
        return await API.get(BaseApi.shared.getCurrencies())
    }
}

export default new SharedService()