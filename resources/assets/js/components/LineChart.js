import { Bar } from 'vue-chartjs'
import axios from 'axios';
export default Bar.extend({
  	props: ['id'],
  	data () {
	    return {
	      	data: { labels: [], datasets: [ { label: 'Votes', backgroundColor: '#f87979', data: [] } ] }
	    };
  	},
  	mounted () {
	    this.getData();
  	},
  	methods: {
  		getData(){
  			axios.get('/api/data/' + this.id ).then(function(res) {
                this.data.labels = res.data.labels;
                this.data.datasets[0].data = res.data.votes;
                this.renderChart(this.data);
            }.bind(this))
            .catch(function(err) {
                console.log(err);
            });
  		}
  	}
})