<script>
  import { defineComponent } from 'vue'
  import TeamService from '../services/team.service'
  import { useToast } from "vue-toastification";

    export default defineComponent({
     setup() {
      const toast = useToast();
      return { toast }
    },
      name: 'ListTeam',
      components: {
      },
      emits: ['showTeam', 'showCreateTeam'],
      data: () => ({
        currentPage: 1,
        isTeamVisible: false,
        isCreateTeamVisible: false,
        itemsPerPage: 5,
        totalPages: null,
        teams: [],
      }),
      watch: {

      },
      methods: {
        showCreateTeam() {
          this.isCreateTeamVisible = true;
        },
        closeCreateTeam() {
          this.isCreateTeamVisible = false;
        },
        async onClickHandler(page){
            await this.fetchTeams(page)
        },
        async fetchTeams(page = 1){
            try{
               const response = await TeamService.all(`?page=${page}&limit=${this.itemsPerPage}`)
               this.totalPages = response?.data?.total
               this.teams = response?.data?.items
            }catch(e){
                this.handleError(e)
            }
        },
        formatAmount(amount) {
            // should be a utility function in real life
            let newAmount = parseFloat(amount);
            if (!newAmount) {
            return amount;
            }

            return newAmount.toLocaleString('en-US', {
                style: 'currency',
                currency: 'USD',
            });
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
         await this.fetchTeams()
      }
    })
</script>
<template>
    <div class="">
        <div class="flex justify-between">
          <h3 class="text-3xl font-bold">Teams</h3>
          <!-- Add plus icon -->
          <button class="text-3xl" @click="$emit('showCreateTeam')"><font-awesome-icon icon="fa-solid fa-square-plus" /></button>
        </div>
        <div class="mt-4">
          <table>
            <tr>
              <th>Name</th>
              <th>Country</th> 
              <th>Money Balance</th>
              <th>View Players</th>
            </tr>
            <tr v-for="team in teams" 
            :key="team.id">
              <td>{{ team.name }}</td>
              <td>{{ team.country }}</td>
              <td>{{ formatAmount(team.moneyBalance) }}</td>
              <td><button @click="$emit('showTeam', team)"><font-awesome-icon class="text-2xl" icon="fa-solid fa-eye"/></button></td>
            </tr>
          </table>
        </div>

        <!-- pagination -->
        <div class="mt-4">
          <vue-awesome-paginate
            v-if="totalPages"
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