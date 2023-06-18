<script>
  import { defineComponent } from 'vue';

    export default defineComponent({
      name: 'CreateTeam',
      components: {
      },
      props: {
      },
      emits: ['goBack'],
      data: () => ({
        currentPage: 1,
        isTeamVisible: false,
        isCreateTeamVisible: false,
      }),
      watch: {

      },
      methods: {
      },
      mount () {
        
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
          <div class="team-players-wrap w-6/12 flex flex-col">
                <div class="team-info border p-4">
                  <div class="w-full flex">
                    <label for="team_name" class="w-3/12">Name</label>
                    <input type="text" id="team_name" class="border p-1 ml-4 w-6/12"/>
                  </div>
                  
                  <div class="w-full mt-2 flex">
                    <label for="team_name" class="w-3/12">Country</label>
                    <select id="team_name" class="border p-1 ml-4 w-6/12">
                      <option value="">France</option>
                    </select>
                  </div>

                  <div class="mt-2 flex">
                    <label for="team_name" class="w-3/12">Money Balance</label>
                    <input type="number" id="team_name" class="border p-1 ml-4 w-6/12"/>
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
                    <tr class="table-form">
                      <td><input type="text" class="border"/></td>
                      <td><input type="text" class="border"/></td>
                      <td>
                      <select class="border">
                        <option disabled>Select Option</option>
                        <option value="false">Yes</option>
                        <option value="true">No</option>
                      </select>
                    </td>
                      <td class="flex justify-between">
                        <input type="number" class="w-9/12 border"> 
                        <button class="w-1/5"><font-awesome-icon class="text-2xl" icon="fa-solid fa-square-plus"/></button>
                      </td>
                    </tr>
                </table>
                </div>
              </div>
        </div>
</template>

<style>
  
</style>