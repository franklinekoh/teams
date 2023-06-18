<script>
  import { defineComponent } from 'vue';

    export default defineComponent({
      name: 'App',
      components: {
      },
      data: () => ({
        currentPage: 1,
        isTeamVisible: false,
        isCreateTeamVisible: false,
      }),
      watch: {

      },
      methods: {
        showTeam() {
        this.isTeamVisible = true;
        },
        closeTeam() {
          this.isTeamVisible = false;
        },
        showCreateTeam() {
          this.isCreateTeamVisible = true;
        },
        closeCreateTeam() {
          this.isCreateTeamVisible = false;
        },
        onClickHandler(page){

        }
      },
      mount () {

      }
    })
</script>

<template>
  <div id="body-wrap">
    <!-- Header -->
    <div class="main-nav">
      <div class="header">
        <a class="logostyle">Teams App</a>
      </div>
    </div>
    <!-- List teams -->
    <div class="team-lists mt-4 p-8">
        <div class="flex justify-between">
          <h3 class="text-3xl font-bold">Teams</h3>
          <!-- Add plus icon -->
          <button class="text-3xl" @click="showCreateTeam"><font-awesome-icon icon="fa-solid fa-square-plus" /></button>
        </div>
        <div class="mt-4">
          <table>
            <tr>
              <th>Name</th>
              <th>Country</th> 
              <th>Money Balance</th>
              <th>View Players</th>
            </tr>
            <tr>
              <td>Real Madrid</td>
              <td>Italy</td>
              <td>500,000,000 USD</td>
              <td><button @click="showTeam"><font-awesome-icon class="text-2xl" icon="fa-solid fa-eye"/></button></td>
            </tr>
            <tr>
              <td>Real Madrid</td>
              <td>Italy</td>
              <td>500,000,000 USD</td>
              <td><button><font-awesome-icon class="text-2xl" icon="fa-solid fa-eye"/></button></td>
            </tr>
          </table>
        </div>

        <div class="show-team-wrap" v-if="isTeamVisible">
          <!-- Show team and players -->
          <div class="flex justify-between">
            <h3 class="text-3xl font-bold">Real Maldrid</h3>
            <!-- Add arrow left icon -->
            <button @click="closeTeam"><font-awesome-icon class="text-3xl" icon="fa-solid fa-arrow-left"/> <span class="text-xl">Back</span></button>
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
                    <tr>
                      <td>Tega</td>
                      <td>Akpa</td>
                      <td>yes</td>
                      <td>100</td>
                      <td><button><font-awesome-icon class="text-2xl" icon="fa-solid fa-cart-shopping"/></button></td>
                    </tr>
                  </table>
                </div>
              </div>
        
          </div>
        </div>

        <!-- Create team -->
        <div class="create-team-wrap" v-if="isCreateTeamVisible">
          <div class="flex justify-between">
            <h3 class="text-3xl font-bold">Create Team</h3>
            <!-- Add arrow left icon -->
            <button @click="closeCreateTeam"><font-awesome-icon class="text-3xl" icon="fa-solid fa-arrow-left"/> <span class="text-xl">Back</span></button>
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
        <!-- pagination -->
        <div class="mt-4">
          <vue-awesome-paginate
            :total-items="50"
            v-model="currentPage"
            :items-per-page="5"
            :max-pages-shown="5"
            :on-click="onClickHandler"
          />
        </div>
    </div>
  </div>
</template>

<style>
  
</style>
