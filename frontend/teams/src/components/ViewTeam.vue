<script>
  import { defineComponent } from 'vue'
  import PlayerTransfer from './PlayerTransfer.vue'
  import PlayerService from '../services/player.service'

    export default defineComponent({
      name: 'ViewTeam',
      components: {
        PlayerTransfer
      },
      emits: ['goBack'],
      props: {
        teamData: {
          type: Object,
          required: true,
        }
      },
      data: () => ({
        currentPage: 1,
        isTeamVisible: false,
        isCreateTeamVisible: false,
        countries: [],
        newPlayer: {
            first_name: '',
            last_name: '',
            is_free_agent: false,
            worth: 0,
            team_id: null
        }
      }),
      watch: {

      },
      methods: {
        async savePlayer(player){
            player.team_id = this.teamData.id;
            try{
                // Frontend form validation here.
                const response = await PlayerService.create(player)
                this.teamData.players.push(response?.data)
                this.newPlayer = {
                    first_name: '',
                    last_name: '',
                    is_free_agent: false,
                    worth: 0,
                    team_id: null
                }
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
        formatAmount(amount) {
            // should be a utility/generic/composable function in real life
            let newAmount = parseFloat(amount);
            if (!newAmount) {
            return amount;
            }

            return newAmount.toLocaleString('en-US', {
                style: 'currency',
                currency: 'USD',
            });
        },
      },
      async mounted() {
      }
    })
</script>
<template>
    <div class="show-team-wrap">
          <!-- Show team and players -->
          <div class="flex justify-between">
            <h3 class="text-3xl font-bold">Real Maldrid</h3>
            <!-- Add arrow left icon -->
            <button @click="$emit('goBack')"><font-awesome-icon class="text-3xl" icon="fa-solid fa-arrow-left"/> <span class="text-xl">Back</span></button>
          </div>
          <div class="flex justify-between mt-4">
              <div class="team-players-wrap w-6/12 flex flex-col">
                <div class="team-info border p-4">
                  <p>Team Name: <span class="font-bold"> {{ teamData.name }}</span></p>
                  <p>Team Country: <span class="font-bold">{{ teamData.country }}</span></p>
                  <p>Money Balance: <span class="font-bold">{{ formatAmount(teamData.moneyBalance) }}</span></p>
                </div>
                <div class="player-wrap mt-4">
                  <table>
                    <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Available For Transfer</th>
                      <th>Worth</th>
                    </tr>
                    <tr v-for="(player, index) in teamData.players" :key="index">
                      <td>{{player.firstName}}</td>
                      <td>{{player.lastName}}</td>
                      <td v-if="player.isFreeAgent">Yes</td>
                      <td v-else>No</td>
                      <td>{{ formatAmount(player.worth) }}</td>
                    </tr>
                    <tr class="table-form">
                      <td><input type="text" class="border" v-model="newPlayer.first_name"/></td>
                      <td><input type="text" class="border" v-model="newPlayer.last_name"/></td>
                      <td>
                      <select v-model="newPlayer.is_free_agent" class="border">
                        <option disabled>Select Option</option>
                        <option :value="true">Yes</option>
                        <option :value="false">No</option>
                      </select>
                    </td>
                      <td class="flex justify-between">
                        <input type="number" v-model="newPlayer.worth" class="w-9/12 border"> 
                        <button class="w-1/5" @click="savePlayer(newPlayer)"><font-awesome-icon class="text-2xl" icon="fa-solid fa-floppy-disk"/></button>
                      </td>
                    </tr>
                </table>
                </div>
              </div>
            
              <!-- PlayerTransfer -->
            <PlayerTransfer :team-id="this.teamData.id" />

          </div>
        </div>
</template>

<style>
  
</style>