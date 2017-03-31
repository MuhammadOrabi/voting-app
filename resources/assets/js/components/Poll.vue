<template>
	<div>
		<div class="card mainCard">
			<div class="m-5 p-5">
				<div class="text-center">
					<button @click="newPoll = !newPoll; myPolls = false" class="btn btn-success">Create Poll</button>
					<button @click="showPolls" class="btn btn-primary">My Polls</button>
				</div>
			</div>
		</div>
		<hr>
		<div class="form-group" v-if="newPoll">
			<h4 class="text-center">New Poll</h4><br>
			<div class="col-md-4 push-md-4">
				<p class="alert-danger m-2" v-if="PollErr != ''">{{ PollErr }}</p>
				<input type="text" class="form-control" v-model="pollTitle" placeholder="Question...?!">
				<br><h4 class="text-center">Options</h4><br>
				<p class="alert-danger m-2" v-if="OptionErr != ''">{{ OptionErr }}</p>
				<input v-for="(op, key) in options" v-model="options[key]" type="text" class="form-control" placeholder="Option...">
				<br><button @click="options.push('')" class="btn btn-info">More Options</button>
				<button @click="submit" class="btn btn-outline-primary" >Submit</button>
			</div>
		</div>
		<div v-if="myPolls">
			<div class="card m-2" v-for="poll in polls" >
				<div class="card-header alert-danger">
					<a @click="destroy(poll.id)" href="#" class="card-link">Delete</a>
				</div>
				<div class="card-block">
					<a :href="'/poll/' + poll.id" class="card-link">{{ poll.poll }}</a>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import axios from 'axios';
export default {

  	name: 'Poll',
  	props: ['user'],
  	data () {
    	return {
    		newPoll: true,
    		myPolls: false,
    		pollTitle: '',
    		options: ['', ''],
    		polls: {},
    		PollErr: '',
    		OptionErr: ''
    	};
  	},
  	methods: {
  	  	submit () {
	  	    axios.post('/api/poll', {
	    		poll: this.pollTitle,
			    options: this.options,
			    option: this.options[0],
			    id: this.user
			})
		  	.then(function (res) {
		  		this.pollTitle = '';
		    	this.options = ['',''];
		    	this.PollErr =  '';
    			this.OptionErr = '';
		  	}.bind(this))
		  	.catch(function (err) {
		  		if (err.response.data.poll) {
		  			this.PollErr = err.response.data.poll[0];
		  		}
		  		if (err.response.data.option) {	  			
	    			this.OptionErr = err.response.data.option[0];
		  		}
		  		this.pollTitle = '';
		    	this.options = ['',''];
		  	}.bind(this));
  	  	},
  	  	showPolls () {
  	  		axios.get('/api/poll/' + this.user ).then(function(res) {
  	  			this.polls = res.data.polls;
  	  			this.myPolls = true;
  	  			this.newPoll = false;
  	  		}.bind(this))
  	  		.catch(function(err) {
  	  			console.log(err);
  	  		});
  	  	},
  	  	destroy (id) {
  	  		axios.delete('/api/poll/' + id).then(function(res) {
  	  			this.showPolls();
  	  		}.bind(this)).catch(function(err) {
  	  			console.log(err);
  	  		});
  	  	}
  	}
};
</script>

<style>
	.mainCard{
		background: #86CFC9;
	}
</style>