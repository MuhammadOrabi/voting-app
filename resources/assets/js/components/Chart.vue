<template>
    <div class="container">
        <div class="text-center" v-if="type == 'guest'">
              <fieldset class="form-group">
                <div class="form-check form-check-inline" v-for="label in labels">
                    <input type="radio" :id="label" :value="label" v-model="vote">
                    <label :for="label">{{ label }}</label>
                </div>
              </fieldset>
              <form class="form-group">
                  <button v-if="vote != ''" @click="saveVote" class="btn btn-success">Vote</button>
              </form>
        </div>
        <LineChart :id="id" :height="150"></LineChart>
    </div>
</template>

<script>
    import LineChart from './LineChart.js'
    import axios from 'axios';
    export default {

        name: 'Chart',
        props: ['id', 'type'],
        components: {
            LineChart
        },
        mounted () { 
            this.getData();
        },
        data () {
            return {
                labels: [],
                vote: ''
            };
        },
        methods: {
            getData () {
                axios.get('/api/data/' + this.id ).then(function(res) {
                    this.labels = res.data.labels;
                }.bind(this))
                .catch(function(err) {
                    console.log(err);
                });
            },
            saveVote () {
                axios.patch('/api/poll/' + this.id, {
                    option: this.vote
                })
                .then(function (res) {
                   this.getData();

                }.bind(this));
            }
        }
    };
</script>
