export const BaseApi = {
    team: {
        all(query){
            return `/team/${query}`
        },
        create(){
            return `/team`
        },
        findOne(id){
            return `/team${id}`
        }
    },
    player: {
        create(){
            return '/player'
        },
        getFreeAgents(){
            return `/player/free-agents`
        }
    },
    player_Transfer: {
        create(){
            return '/player-transfer'
        },
    },
    shared: {
        getCountries(){
            return '/countries'
        },
        getCurrencies(){
            return '/currencies'
        }
    }
}