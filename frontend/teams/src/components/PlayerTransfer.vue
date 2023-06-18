<script>
  import { defineComponent } from 'vue'
  import PlayerTransferService from '../services/player-transfer.service'
  import playerService from '../services/player.service'

    export default defineComponent({
      name: 'PlayerTransfer',
      components: {
      },
      props: {
        teamId: {
          type: Number,
          required: true,
        }
      },
      data: () => ({
        currentPage: 1,
        isTeamVisible: false,
        isCreateTeamVisible: false,
        itemsPerPage: 5,
        totalPages: 50,
        players: []
      }),
      watch: {

      },
      methods: {
        async onClickHandler(page){
          await this.fetchFreeAgents(page)
        },
        async fetchFreeAgents(page = 1){
          try{
            const response = await playerService.getFreeAgents(`?page=${page}&limit=${this.itemsPerPage}`)
            this.totalPages = response?.data?.total
            this.players = response?.data?.items
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
        await this.fetchFreeAgents()
      },
      
    })
</script>
<template>
<div class="player-transfer-wrap w-2/5">
                <div class="border p-4">
                  <span class="text-2xl">Transfer Window</span>
                </div>
                <div class="mt-4">
                  <table>
                    <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Available For Transfer</th>
                      <th>Worth</th>
                      <th>Buy</th>
                    </tr>
                    <tr v-for="player in this.players" :key="player.id">
                      <td>{{ player.firstName }}</td>
                      <td>{{ player.lastName }}</td>
                      <td v-if="player.isFreeAgent">Yes</td>
                      <td v-else>No</td>
                      <td>{{ formatAmount(player.worth) }}</td>
                      <td><button><font-awesome-icon class="text-2xl" icon="fa-solid fa-cart-shopping"/></button></td>
                    </tr>
                  </table>
                </div>

                <!-- pagination -->
                <div class="mt-4">
                    <vue-awesome-paginate
                        :total-items="totalPages"
                        v-model="currentPage"
                        :items-per-page="itemsPerPage"
                        :max-pages-shown="totalPages"
                        :on-click="onClickHandler"
                    />
                </div>
              </div>
</template>

<style>
  
</style>