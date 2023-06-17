import { API } from "../shared/axios-config"
import { BaseApi } from "../route/api"

class TeamService {
    async all(query = ''){
        return await API.get(BaseApi.team.all(query))
    }
    async findOne(id){
        return await API.get(BaseApi.team.findOne(id))
    }
    async create(payload){
        return await API.post(BaseApi.team.create(), payload)
    }
}

export default new TeamService()