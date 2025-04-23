<template>
    <div class="delivery-list">
      <h2>Saved Delivery Tasks</h2>
      <div v-if="loading">Loading...</div>
      <div v-else>
        <div v-if="deliveries.length">
          <table border="1" cellpadding="10">
            <thead>
              <tr>
                <th>Pickup Name</th>
                <th>Pickup Contact</th>
                <th>Delivery Name</th>
                <th>Delivery Contact</th>
                <th>Type</th>
                <th>Provider</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Pickup Date</th>
                <th>Pickup Time</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(delivery, index) in deliveries" :key="index">
                <td>{{ delivery.pickup_name }}</td>
                <td>{{ delivery.pickup_contact_no }}</td>
                <td>{{ delivery.delivery_name }}</td>
                <td>{{ delivery.delivery_contact_no }}</td>
                <td>{{ delivery.type_of_good }}</td>
                <td>{{ delivery.delivery_provider }}</td>
                <td>{{ delivery.priority }}</td>
                <td>{{ delivery.status }}</td>
                <td>{{ delivery.shipment_pickup_date }}</td>
                <td>{{ delivery.shipment_pickup_time }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div v-else>
          No delivery data found.
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        deliveries: [],
        loading: true
      };
    },
    async created() {
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/delivery');
        this.deliveries = response.data;
      } catch (error) {
        console.error('Failed to fetch delivery data:', error);
      } finally {
        this.loading = false;
      }
    }
  };
  </script>
  