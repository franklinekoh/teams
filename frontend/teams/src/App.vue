<script>
  import { defineComponent } from 'vue';

    export default defineComponent({
      name: 'App',
      data: () => ({
        currentPage: 1,
      }),
      watch: {

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
        <div class="flex">
          <h3 class="text-3xl font-bold">Teams</h3>
          <!-- Add plus icon -->
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
              <td><a>view</a></td>
            </tr>
            <tr>
              <td>Real Madrid</td>
              <td>Italy</td>
              <td>500,000,000 USD</td>
              <td><a>view</a></td>
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
  </div>
</template>

<style>
  
</style>
