import axios from 'axios'


axios.get('https://www.goodreads.com/book/review_counts.json?isbns=0441172717%2C0141439602&key=mWah2MYuwQlW1jB5s6pIw')
	.then(res => {
		console.log(res);
	})
	.catch(err => {console.log(err);});

// fetch('https://www.goodreads.com/search/index.xml' +
// 	'?q=harry+potter&page=1&key=mWah2MYuwQlW1jB5s6pIw').then(function (resp) {
// 	return resp.text();
// })
// 	.then(function (data) {
// 		console.log(data);
// 	});
