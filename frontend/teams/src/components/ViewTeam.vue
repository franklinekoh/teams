<script>
  import { defineComponent } from 'vue';
  import PlayerTransfer from './PlayerTransfer.vue';

    export default defineComponent({
      name: 'ViewTeam',
      components: {
        PlayerTransfer
      },
      emits: ['goBack'],
      data: () => ({
        currentPage: 1,
        isTeamVisible: false,
        isCreateTeamVisible: false,
      }),
      watch: {

      },
      methods: {},
      mount () {

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
                  <p>Team Name: <span class="font-bold"> Real Maldrid</span></p>
                  <p>Team Country: <span class="font-bold">Spain</span></p>
                  <p>Money Balance: <span class="font-bold">200,000,000 USD</span></p>
                </div>
                <div class="player-wrap mt-4">
                  <table>
                    <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Available For Transfer</th>
                      <th>Worth</th>
                    </tr>
                    <tr>
                      <td>Tega</td>
                      <td>Akpa</td>
                      <td>yes</td>
                      <td>100</td>
                    </tr>
                    <tr class="table-form">
                      <td><input type="text"/></td>
                      <td><input type="text"/></td>
                      <td>
                      <select>
                        <option disabled>Select Option</option>
                        <option value="false">Yes</option>
                        <option value="true">No</option>
                      </select>
                    </td>
                      <td class="flex justify-between">
                        <input type="number" class="w-9/12"> 
                        <button class="w-1/5"><font-awesome-icon class="text-2xl" icon="fa-solid fa-floppy-disk"/></button>
                      </td>
                    </tr>
                </table>
                </div>
              </div>
            
              <!-- PlayerTransfer -->
            <PlayerTransfer :team-id=7 />

          </div>
        </div>
</template>

<style>
  
</style>