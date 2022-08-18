<template>
    <div>
        <select id="location" name="location">
            <option disabled>Kies een stad</option>
            <option disable v-if="location" :value="location" :name="location">{{location}}</option>
            <option disable v-if="location">------------------</option>
            <option v-for="city in cities" :value="city.name" :name="city.name">
                {{ city.name }}
            </option>
        </select>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    props:  ['location'] ,
    data() {
        return {
            cities: {},
        }
    },
    methods: {
        getCity(){
            axios.get('/api/v1/cities')
                .then((response)=>{
                    console.log(response.data.results[2]);
                    this.cities = response.data.results
            })
        }
    },
    created() {
        this.getCity()
        console.log(this.location);
    },
}
</script>