<script>
  import { defineComponent } from 'vue'
  import SharedService from '../services/shared.service'
  import TeamService from '../services/team.service'
  import { useToast } from "vue-toastification";

    export default defineComponent({
      setup() {
        const toast = useToast();
        return { toast }
      },
      name: 'CreateTeam',
      components: {
      },
      props: {
      },
      emits: ['goBack'],
      data: () => ({
        team: {
           name: '',
           country: 'United Kingdom',
           money_balance: 0,
           players: [
            {
                is_free_agent: false,
                worth: 0,
                first_name: '',
                last_name: ''
            }
           ]
        },
        countries: []
      }),
      watch: {

      },
      methods: {
        addPlayer(){
            this.team.players.push(
                {
                    is_free_agent: false,
                    worth: 0,
                    first_name: '',
                    last_name: ''
                }
            )
        },
        async saveTeam(team){
            // frontend form validtion should go here
            try{
                await TeamService.create(team);
                this.$emit('goBack')
            }catch(e){
                this.handleError(e)
            }
        },
        async fetchCountries(){
            try{
                const response = await SharedService.getCountries();
                this.countries = response?.data
            }catch(e){
                this.handleError(e)
            }
        },
        handleError(error) {
        // use composables/utils to implement a generic function for this, given the time
        let message =
          error?.response?.data?.message ||
          error?.response?.message ||
          error.toString()
          alert(message)
         this.toast.error(message)  
        },
      },
      async mounted() {
        await this.fetchCountries() 
      }
    })
</script>
<template>
       <!-- Create team -->
       <div class="create-team-wrap">
          <div class="flex justify-between">
            <h3 class="text-3xl font-bold">Create Team</h3>
            <!-- Add arrow left icon -->
            <button @click="$emit('goBack')"><font-awesome-icon class="text-3xl" icon="fa-solid fa-arrow-left"/> <span class="text-xl">Back</span></button>
          </div>
          <div class="team-players-wrap w-8/12 flex flex-col mt-4">
                <div class="team-info border p-4">
                  <div class="w-full flex">
                    <label for="team_name" class="w-3/12">Name</label>
                    <input type="text" id="team_name" v-model="team.name" class="border p-1 ml-4 w-6/12"/>
                  </div>
                  
                  <div class="w-full mt-2 flex">
                    <label for="team_name" class="w-3/12">Country</label>
                    <select id="team_name" v-model="team.country"  class="border p-1 ml-4 w-6/12">                 
                      <option :value="country.name" v-for="(country, index) in countries" :key="index">{{ country.name }}</option>
                    </select>
                  </div>

                  <div class="mt-2 flex">
                    <label for="team_name" class="w-3/12">Money Balance</label>
                    <input type="number" id="team_name" v-model="team.money_balance" class="border p-1 ml-4 w-6/12"/>
                  </div>
                </div>
                <div class="player-wrap mt-4">
                  <table>
                    <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Available For Transfer</th>
                      <th>Worth</th>
                    </tr>
                    <tr class="table-form" v-for="player in team.players">
                      <td><input type="text" class="border" v-model="player.first_name"/></td>
                      <td><input type="text" class="border" v-model="player.last_name"/></td>
                      <td>
                      <select class="border" v-model="player.is_free_agent">
                        <option disabled>Select Option</option>
                        <option :value="false">No</option>
                        <option :value="true">Yes</option>
                      </select>
                    </td>
                      <td class="flex justify-between">
                        <input type="number" v-model="player.worth" class="w-9/12 border"> 
                        <button @click="addPlayer" class="w-1/5"><font-awesome-icon class="text-2xl" icon="fa-solid fa-square-plus"/></button>
                      </td>
                    </tr>
                </table>
                </div>
                <div class="">
                    <button @click="saveTeam(team)" class="w-1/5 text-xl float-right p-2 mt-4 rounded button text-white">
                        <font-awesome-icon class="text-2xl" icon="fa-solid fa-floppy-disk"/> Save
                    </button>
                </div>
              </div>

              
        </div>
</template>

<style>
  
</style>