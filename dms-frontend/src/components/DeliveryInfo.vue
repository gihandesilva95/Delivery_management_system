<template>
    <div class="shipping-form">
      <h1>Shipping Information Form</h1>
      <form @submit.prevent="submitForm">
        <div>
          <label for="pickup_address">Pickup Address:</label>
          <input v-model="formData.pickup_address" id="pickup_address" type="text" required />
        </div>
        <div>
          <label for="pickup_name">Pickup Name:</label>
          <input v-model="formData.pickup_name" id="pickup_name" type="text" required />
        </div>
        <div>
          <label for="pickup_contact_no">Pickup Contact No:</label>
          <input v-model="formData.pickup_contact_no" id="pickup_contact_no" type="text" required />
        </div>
        <div>
          <label for="pickup_email">Pickup Email:</label>
          <input v-model="formData.pickup_email" id="pickup_email" type="email" required />
        </div>
        <div>
          <label for="delivery_address">Delivery Address:</label>
          <input v-model="formData.delivery_address" id="delivery_address" type="text" required />
        </div>
        <div>
          <label for="delivery_name">Delivery Name:</label>
          <input v-model="formData.delivery_name" id="delivery_name" type="text" required />
        </div>
        <div>
          <label for="delivery_contact_no">Delivery Contact No:</label>
          <input v-model="formData.delivery_contact_no" id="delivery_contact_no" type="text" required />
        </div>
        <div>
          <label for="delivery_email">Delivery Email:</label>
          <input v-model="formData.delivery_email" id="delivery_email" type="email" required />
        </div>
        <div>
          <label for="type_of_good">Type of Good:</label>
          <select v-model="formData.type_of_good" id="type_of_good" required>
            <option value="document">Document</option>
            <option value="parcel">Parcel</option>
          </select>
        </div>
        <div>
          <label for="delivery_provider">Delivery Provider:</label>
          <select v-model="formData.delivery_provider" id="delivery_provider" required>
            <option value="DHL">DHL</option>
            <option value="STARTRACK">STARTRACK</option>
            <option value="ZOOM2U">ZOOM2U</option>
            <option value="TGE">TGE</option>
          </select>
        </div>
        <div>
          <label for="priority">Priority:</label>
          <select v-model="formData.priority" id="priority" required>
            <option value="Standard">Standard</option>
            <option value="Express">Express</option>
            <option value="Immediate">Immediate</option>
          </select>
        </div>
        <div>
          <label for="shipment_pickup_date">Shipment Pickup Date:</label>
          <input v-model="formData.shipment_pickup_date" id="shipment_pickup_date" type="date" required />
        </div>
        <div>
          <label for="shipment_pickup_time">Shipment Pickup Time:</label>
          <input v-model="formData.shipment_pickup_time" id="shipment_pickup_time" type="time" required />
        </div>
        <div>
          <label for="package_description">Package Description:</label>
          <textarea v-model="formData.package_description" id="package_description" required></textarea>
        </div>
        <div>
          <label for="length">Length:</label>
          <input v-model="formData.length" id="length" type="number" required />
        </div>
        <div>
          <label for="width">Width:</label>
          <input v-model="formData.width" id="width" type="number" required />
        </div>
        <div>
          <label for="height">Height:</label>
          <input v-model="formData.height" id="height" type="number" required />
        </div>
        <div>
          <label for="weight">Weight:</label>
          <input v-model="formData.weight" id="weight" type="number" required />
        </div>
  
        <button type="submit" class="add-btn">Save</button>
      </form>
    </div>
  </template>
  
  <script>
  import axios from 'axios';

  export default {
    data() {
      return {
        formData: {
          pickup_address: '',
          pickup_name: '',
          pickup_contact_no: '',
          pickup_email: '',
          delivery_address: '',
          delivery_name: '',
          delivery_contact_no: '',
          delivery_email: '',
          type_of_good: '',
          delivery_provider: '',
          priority: '', 
          shipment_pickup_date: '',
          shipment_pickup_time: '',
          status: 'Pending',
          package_description: '',
          length: '',
          width: '',
          height: '',
          weight: ''
        }
      };
    },
    methods: {
        async submitForm() {
            try {
            const response = await axios.post('http://127.0.0.1:8000/api/delivery', this.formData, {
                headers: {
                'Content-Type': 'application/json'
                }
            });
            console.log('Response from Laravel:', response.data);
            alert('Delivery task successfully created!');
            this.resetForm();
            } catch (error) {
            console.error('Error submitting the form:', error.response ? error.response.data : error.message);
            alert('Failed to submit the form. Check the console for details.');
            }
        },
        resetForm() {
            this.formData = {
            pickup_address: '',
            pickup_name: '',
            pickup_contact_no: '',
            pickup_email: '',
            delivery_address: '',
            delivery_name: '',
            delivery_contact_no: '',
            delivery_email: '',
            type_of_good: '',
            delivery_provider: '',
            priority: '', 
            shipment_pickup_date: '',
            shipment_pickup_time: '',
            status: 'pending',
            package_description: '',
            length: '',
            width: '',
            height: '',
            weight: ''
            };
        }
    } 
};
</script>
  

  