<script>
  import { defineComponent } from 'vue';

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
      }),
      watch: {

      },
      methods: {
        onClickHandler(page){

        }
      },
      mount () {
       
      }
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
                    <tr>
                      <td>Tega</td>
                      <td>Akpa</td>
                      <td>yes</td>
                      <td>100</td>
                      <td><button><font-awesome-icon class="text-2xl" icon="fa-solid fa-cart-shopping"/></button></td>
                    </tr>
                  </table>
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
</template>

<style>
  
</style>