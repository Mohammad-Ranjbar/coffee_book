<template>
	<div class="col-md-4" dir="rtl">
		<div class="dropdown">
			<button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
			        aria-haspopup="true" aria-expanded="false">
				ترتیب بر اساس
			</button>
			<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<a class="dropdown-item" href="/listOfBook/{{$group->id}}?new=1">جدید ترین</a>
				<a class="dropdown-item" href="/listOfBook/{{$group->id}}?popular=1">پرطرفدارترین</a>
				{{--<a class="dropdown-item" href="#">پربازدیدترین</a>--}}
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name: 'Sort',
		props: ['at'],
		methods: {
			sort(by) {
				axios.get('/replies/' + this.at.id +by);

			},

		},
	};
</script>

<style scoped>

</style>
