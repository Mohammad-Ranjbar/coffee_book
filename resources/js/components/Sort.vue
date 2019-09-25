<template>
	<div class="col-md-4" dir="rtl">
		<div class="dropdown">
			<button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
			        aria-haspopup="true" aria-expanded="false">
				ترتیب بر اساس
			</button>
			<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<a class="dropdown-item" @click="newest">جدید ترین</a>
				<a class="dropdown-item" @click="popular">پرطرفدارترین</a>

			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name: 'Sort',
		props: ['at'],
		data() {
			return {
				'books' : []
			};
		},
		methods: {
			newest() {
				axios.get('/listOfBook/' + this.at.id + '/?new=1').then(res =>
					this.books = res.data )

			},
			popular() {
				axios.get('/listOfBook/' + this.at.id + '/?popular=1');

			},
		},
	};
</script>

<style scoped>

</style>
