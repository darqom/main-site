const vChart = $('#visitor-chart');
const visitorsChart = new Chart(vChart, {
	type: 'line',
	data: {
		labels: vLabels,
		datasets: [
		{
			label: 'Hits',
			backgroundColor: 'rgb(3, 177, 252)',
			borderColor: 'rgb(3, 177, 252)',
			data: vHits,
			fill: false
		},
		{
			label: 'Pengunjung',
			backgroundColor: 'rgb(255, 99, 132)',
			borderColor: 'rgb(255, 99, 132)',
			data: vTotals,
			fill: false
		}
		]
	},
	options: {
		responsive: true
	}
});
