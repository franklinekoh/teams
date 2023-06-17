import { API } from "../shared/axios-config"
import { BaseApi } from "../route/api"

class PlayerTransferService {
    async create(payload){
        return await API.post(BaseApi.playerTransfer.create(), payload)
    }
}

export default new PlayerTransferService()