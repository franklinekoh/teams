import { API } from "../shared/axios-config"
import { BaseApi } from "../route/api"

class PlayerService{
    async create(payload){
        return await API.post(BaseApi.player.create(), payload)
    }

    async getFreeAgents(query = ''){
        return await API.get(BaseApi.player.getFreeAgents(query))
    }

}

export default new PlayerService()